<?php


function formatRp($param)
{

    $hasil_rupiah = "Rp " . number_format($param, 0, ',', '.');

    return $hasil_rupiah;
}