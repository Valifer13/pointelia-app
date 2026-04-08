<?php 

function monthConverter($input)
{
    $bulan = [
        1 => 'Januari',
        2 => 'Februari', 
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
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