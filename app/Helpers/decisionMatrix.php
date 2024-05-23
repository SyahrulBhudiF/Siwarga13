<?php
function decisionMatrix($data): array
{
    $result = [];
    foreach ($data as $key => $value) {
        // jumlah_pekerja
        if ($value->jumlah_pekerja == 0) {
            $result[$key][0] = 1;

        } elseif ($value->jumlah_pekerja == 1) {
            $result[$key][0] = 2;

        } elseif ($value->jumlah_pekerja == 2) {
            $result[$key][0] = 3;

        } elseif ($value->jumlah_pekerja >= 3) {
            $result[$key][0] = 4;
        }

        // total_pendapatan
        if ($value->total_pendapatan >= 0 and $value->total_pendapatan <= 2000000) {
            $result[$key][1] = 1;

        } elseif ($value->total_pendapatan > 2000000 and $value->total_pendapatan <= 4000000) {
            $result[$key][1] = 2;

        } elseif ($value->total_pendapatan > 4000000 and $value->total_pendapatan <= 6000000) {
            $result[$key][1] = 3;

        } elseif ($value->total_pendapatan > 6000000) {
            $result[$key][1] = 4;
        }

        // jumlah_tanggungan
        if ($value->tanggungan >= 5) {
            $result[$key][2] = 4;

        } elseif ($value->tanggungan >= 3 && $value->tanggungan <= 4) {
            $result[$key][2] = 3;

        } elseif ($value->tanggungan == 1 || $value->tanggungan == 2) {
            $result[$key][2] = 2;

        } elseif ($value->tanggungan == 0) {
            $result[$key][2] = 1;
        }
    }

//        dd($result);

    return $result;
}
