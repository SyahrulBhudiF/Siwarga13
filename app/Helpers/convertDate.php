<?php
/**
 * convert date
 *
 * @param $date
 */
function convertDate($date)
{
    \Carbon\Carbon::setLocale('id');
    $months = [
        'Januari' => 'January', 'Februari' => 'February', 'Maret' => 'March', 'April' => 'April',
        'Mei' => 'May', 'Juni' => 'June', 'Juli' => 'July', 'Agustus' => 'August',
        'September' => 'September', 'Oktober' => 'October', 'November' => 'November', 'Desember' => 'December'
    ];
    $dateString = str_replace(array_keys($months), $months, $date);
    $formatted = \Carbon\Carbon::createFromFormat('d F Y', $dateString)->isoFormat('dddd, D MMMM Y');

    return $formatted;
}
