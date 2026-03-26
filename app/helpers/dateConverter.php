<?php 

function monthConverter($input)
{
    $bulan = [
        1 => 'January',
        2 => 'February', 
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December'
    ];

    if (is_numeric($input)) {
        return $bulan[(int)$input] ?? null;
    }

    $input = strtolower($input);
    foreach ($bulan as $key => $value) {
        if (strtolower($value) === $input) {
            return $key;
        }
    }

    return null;
}

function getFormatedDate($date)
{
    $timestamp = strtotime($date);

    $hari = date('d', $timestamp);
    $bulan = monthConverter(date('m', $timestamp));
    $tahun = date('Y', $timestamp);

    return "$hari $bulan $tahun";
}

function day($date)
{
    $hariInggris = date('l', strtotime($date));

    $mapping = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    ];

    return $mapping[$hariInggris];
}

function hourAndMinute($date)
{
    return date('H:i', strtotime($date));
}