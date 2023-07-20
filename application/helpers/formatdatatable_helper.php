<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 	
if (!function_exists('encode')) {

    function encode($data) {
        $CI = & get_instance();
        $data_encoded = $CI->converter->encode($data);
        return $data_encoded;
    }

}
if (!function_exists('decode')) {

    function decode($data) {
        $CI = & get_instance();
        $data_decoded = $CI->converter->decode($data);
        return $data_decoded;
    }

}

if (!function_exists('aksi')) {
    function aksi($id) {
        $CI = & get_instance();
        $id = $CI->converter->encode($id);
        
        $format = '<div class="ms-auto text-center">';
        $format .= '<a class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="delete_event(`'.$id.'`)"><i class="material-icons text-sm me-2">delete</i>Delete</a>';
        $format .= '<a class="btn btn-link text-dark px-3 mb-0" onclick="openModal(`'.$id.'`)"><i class="material-icons text-sm me-2">edit</i>Edit</a>';
        $format .= '</div>';

        return $format;
    }

}

if (!function_exists('format_aksi')) {
    function format_aksi($judul, $id, $url) {
        $CI = & get_instance();
        $id = $CI->converter->encode($id);
        $format = '<a href="'.base_url().''.$url.'/'.$id.' " class="btn btn-link px-3 mb-0">'.$judul.'</a>';

        return $format;
    }

}

if (!function_exists('format_status')) {
    function format_status($status) {
        $CI = & get_instance();
        
        if($status == 'AKTIF'){
            $format = '<span class="badge badge-sm bg-gradient-success">'.$status.'</span>';

        } else {
            $format = '<span class="badge badge-sm bg-gradient-secondary">'.$status.'</span>';
        }

        return $format;
    }

}

if (!function_exists('format_tanggal_indo')) {
    function format_tanggal_indo($tanggal) {
        $CI = & get_instance();

        return tanggal($tanggal);
    }
}

function tanggal($tanggal)
{
    // Daftar nama bulan dalam Bahasa Indonesia
    $nama_bulan = array(
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
    );

    // Memisahkan tanggal, bulan, dan tahun
    $tanggal_array = explode('-', $tanggal);
    $tahun = $tanggal_array[0];
    $bulan = (int) $tanggal_array[1];
    $hari = (int) $tanggal_array[2];

    // Mengambil nama bulan dalam Bahasa Indonesia
    $nama_bulan_indonesia = $nama_bulan[$bulan];

    // Format tanggal ke dalam format Indonesia
    $format_tanggal = $hari . ' ' . $nama_bulan_indonesia . ' ' . $tahun;

    return $format_tanggal;
}