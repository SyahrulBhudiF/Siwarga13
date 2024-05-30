<?php

namespace App\Services;

class MabacService
{
    private $weight = [
        0.25,
        0.4,
        0.35,
    ];

    /**
     * Get MinMax Array
     *
     * @param array $data
     * @param callable $operation
     * @return array
     */
    public function minMax($data, $operation)
    {
        return array_map(function ($value) use ($operation) {
            return $operation($value);
        }, array_map(null, ...$data));
    }

    /**
     * Normalize the data
     *
     * @param array $data
     * @param array $min
     * @param array $max
     * @return array
     */
    public function normalized($data, $min, $max)
    {
        $result = [];

        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                if ($k == 0 || $k == 1) {
                    $result[$key][$k] = round(($v - $max[$k]) / ($min[$k] - $max[$k]), 3);

                } else {
                    $result[$key][$k] = round(($v - $min[$k]) / ($max[$k] - $min[$k]), 3);
                }
            }
        }

        return $result;
    }

    /**
     * Weight the data
     *
     * @param array $data
     * @return array
     */
    public function weightV($data)
    {
        $result = [];

        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                $result[$key][$k] = round(($v * $this->weight[$k]) + $this->weight[$k], 3);
            }
        }

        return $result;
    }

    /**
     * Get the limits
     *
     * @param array $data
     * @return array
     */
    public function limitsG($data)
    {
        $result = [];
        $transposed = array_map(null, ...$data);
        $length = count($data);

        foreach ($transposed as $product) {
            $result[] = round(array_product($product) ** (1 / $length), 3);
        }

        return $result;
    }

    /**
     * Get the distance
     *
     * @param array $v
     * @param array $g
     * @return array
     */
    public function distanceQ($v, $g)
    {
        $result = [];

        foreach ($v as $key => $value) {
            $result[$key] = array_map(function ($v, $g) {
                return $v - $g;
            }, $value, $g);
        }

        return $result;
    }

    /**
     * Get the score of the data
     *
     * @param array $data
     * @return array
     */
    public function rankS($data)
    {
        $result = [];

        foreach ($data as $key => $value) {
            $result[$key] = round(array_sum($value), 3);
        }

        return $result;
    }
}
