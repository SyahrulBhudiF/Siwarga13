<?php

namespace App\Services;

use App\Http\Requests\civilliant\StoreCivilliantRequest;
use App\Http\Requests\status\StoreStatusRequest;
use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CivilliantService
{
    /**
     * @param StoreCivilliantRequest $requestCivil
     * @param StoreStatusRequest $requestStatus
     * @param $wargaId
     * store keluarga data
     */
    public static function updateOrCreateKeluarga(StoreCivilliantRequest $requestCivil, StoreStatusRequest $requestStatus, $wargaId)
    {
        if ($requestStatus->input('status_peran') == 'Kepala keluarga') {
            Keluarga::insert([
                'noKK' => $requestCivil->input('noKK'),
                'id_warga' => $wargaId,
                'total_pendapatan' => $requestCivil->input('pendapatan'),
                'tanggungan' => 1,
                'jumlah_pekerja' => $requestCivil->input('pendapatan') == 0 ? 0 : 1,
            ]);

        } else {
            $kk = Keluarga::where('noKK', $requestCivil->input('noKK'))->first();

            if ($kk) {
                $kk->update([
                    'total_pendapatan' => $kk->total_pendapatan + $requestCivil->input('pendapatan'),
                    'tanggungan' => $kk->tanggungan + 1,
                    'jumlah_pekerja' => $requestCivil->input('pendapatan') == 0 ? $kk->jumlah_pekerja : $kk->jumlah_pekerja + 1,
                ]);
            }
        }
    }

    /**
     * @param $civilliantRequest
     * @param $alamatRequest
     * @param $statusRequest
     * @param $warga
     * @param $alamat
     * @param $status
     * @return bool
     * update entities
     */
    public static function updateEntities($civilliantRequest, $alamatRequest, $statusRequest, $warga, $alamat, $status)
    {
        $updated = false;

        if ($civilliantRequest->all() !== []) {
            tap($warga)->update($civilliantRequest->all());
            $updated = true;
        }

        if ($alamatRequest->all() !== []) {
            tap($alamat)->update($alamatRequest->all());
            $updated = true;
        }

        if ($statusRequest->all() !== []) {
            tap($status)->update($statusRequest->all());

            if ($statusRequest->input('status_hidup') == 'Meninggal') {
                $warga->update([
                    'pendapatan' => 0,
                ]);
            }

            if ($statusRequest->input('status_hidup') == 'Meninggal' && $status->status_peran == 'Kepala keluarga') {
                $status->update([
                    'status_peran' => 'Anggota keluarga',
                ]);
            }

            $updated = true;
        }

        return $updated;
    }


    /**
     * @param $statusRequest
     * @param $pendapatanAwal
     * @param $pendapatanBaru
     * @param $kk
     * @return void
     * update keluarga
     */
    public static function updateKeluarga($statusRequest, $pendapatanAwal, $pendapatanBaru, $kk)
    {
        if ($statusRequest->input('status_hidup') == 'Meninggal') {

            if ($pendapatanAwal > 0) {
                $kk->update([
                    'total_pendapatan' => $kk->total_pendapatan - $pendapatanAwal,
                    'tanggungan' => $kk->tanggungan - 1,
                    'jumlah_pekerja' => $kk->jumlah_pekerja - 1,
                ]);

            } else {
                $kk->update([
                    'tanggungan' => $kk->tanggungan - 1,
                ]);
            }

        } else if ($pendapatanAwal != $pendapatanBaru) {
            $selisihPendapatan = $pendapatanBaru - $pendapatanAwal;

            $kk->update([
                'total_pendapatan' => $kk->total_pendapatan + $selisihPendapatan,
            ]);
        }
    }


    /**
     * @param Request $request
     * @param $rt
     * @return \Illuminate\Database\Eloquent\Builder
     * get filtered data
     */
    public static function getFilteredData(Request $request, $rt)
    {
        if (Auth::user()->role == 'RW') {
            $query = Warga::with('alamat', 'status')->orderBy('noKK', 'asc');

        } else {
            $query = Warga::with('alamat', 'status')
                ->whereHas('alamat', function ($query) {
                    $query->where('rt', Auth::user()->role);
                })
                ->orderBy('noKK', 'asc');
        }

        if ($rt !== null && $rt !== 'RW') {
            $query->whereHas('alamat', function ($query) use ($rt) {
                $query->where('rt', $rt);
            });
        }

        if ($request->has('peran')) {
            $query->whereHas('status', function ($query) use ($request) {
                $query->where('status_peran', $request->input('peran'));
            });
        }

        if ($request->has('gender')) {
            $query->where('jenis_kelamin', $request->input('gender'));
        }

        if ($request->has('status')) {
            $status = $request->input('status');

            if (is_array($status)) {
                $query->whereHas('status', function ($query) use ($status) {
                    $query->whereIn('status_hidup', $status);
                });

            } else {
                $query->whereHas('status', function ($query) use ($status) {
                    $query->where('status_hidup', $status);
                });
            }
        }

        return $query;
    }
}
