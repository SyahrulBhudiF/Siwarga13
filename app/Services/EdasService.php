<?php

namespace App\Services;

class EdasService
{
    private $weight = [
        'C1' => 0.25,
        'C2' => 0.4,
        'C3' => 0.35,
    ];

    /*
     * Calculate the average of the data
     */
    public function average($data)
    {
        $result = array_map(function ($value) {
            return array_sum($value) / count($value);
        }, array_map(null, ...$data));

        return $result;
    }

    /*
     * Calculate PDA or NDA
     */
    public function calc($data, $avg, bool $isPDA)
    {
        $result = [];

        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                $result[$key][$k] = $avg[$k] != 0 ? round(max(0, (($k == 1 || $k == 0) == $isPDA ? $avg[$k] - $v : $v - $avg[$k]) / $avg[$k]), 3) : 0;
            }
        }

        return $result;
    }

    /*
     * Calculate the SP or SN
     */
    public function SPSN($data)
    {
        $result = [];

        foreach ($data as $key => $value) {
            $result[$key] = round(array_sum(array_map(function ($v, $w) {
                return $v * $w;
            }, $value, $this->weight)), 3);
        }

        return $result;
    }

    /*
     * Calculate the NSP or NSN
     */
    public function NSPNSN($data, bool $isNSP)
    {
        $result = [];

        foreach ($data as $key => $value) {
            $result[$key] = round($isNSP ? ($value / max($data)) : 1 - ($value / max($data)), 3);
        }

        return $result;
    }

    public function AS($nsp, $nsn)
    {
        $result = [];

        foreach ($nsp as $key => $value) {
            $result[$key] = round(($value + $nsn[$key]) / 2, 3);
        }

        return $result;
    }
}
