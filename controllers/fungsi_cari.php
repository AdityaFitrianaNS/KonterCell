<?php

// Fungsi untuk mencari paket indosat (keyword)
function cari_indosat($keyword) {
    $query = "SELECT * FROM tb_indosat WHERE
        nama_paket LIKE '%$keyword' OR
        jenis_paket LIKE '%$keyword' OR
        masa_aktif LIKE '%$keyword' OR
        tanggal_perbarui LIKE '%$keyword'
        ";
    return query($query);
}

// Fungsi untuk mencari paket axis (keyword)
function cari_axis($keyword) {
    $query = "SELECT * FROM tb_axis WHERE
        nama_paket LIKE '%$keyword' OR
        jenis_paket LIKE '%$keyword' OR
        masa_aktif LIKE '%$keyword' OR
        tanggal_perbarui LIKE '%$keyword'
        ";
    return query($query);
 }

// Fungsi untuk mencari paket tri (keyword)
function cari_tri($keyword) {
    $query = "SELECT * FROM tb_tri WHERE
        nama_paket LIKE '%$keyword' OR
        jenis_paket LIKE '%$keyword' OR
        masa_aktif LIKE '%$keyword' OR
        tanggal_perbarui LIKE '%$keyword'
        ";
    return query($query);
}

// Fungsi untuk mencari paket smartfren (keyword)
function cari_smartfren($keyword) {
    $query = "SELECT * FROM tb_smartfren WHERE
        nama_paket LIKE '%$keyword' OR
        jenis_paket LIKE '%$keyword' OR
        masa_aktif LIKE '%$keyword' OR
        tanggal_perbarui LIKE '%$keyword'
        ";
    return query($query);
}

// Fungsi untuk mencari paket telkomsel (keyword)
function cari_telkomsel($keyword) {
    $query = "SELECT * FROM tb_telkomsel WHERE
        nama_paket LIKE '%$keyword' OR
        jenis_paket LIKE '%$keyword' OR
        masa_aktif LIKE '%$keyword' OR
        tanggal_perbarui LIKE '%$keyword'
        ";
    return query($query);
}

// Fungsi untuk mencari paket xl (keyword)
function cari_xl($keyword) {
    $query = "SELECT * FROM tb_xl WHERE
        nama_paket LIKE '%$keyword' OR
        jenis_paket LIKE '%$keyword' OR
        masa_aktif LIKE '%$keyword' OR
        tanggal_perbarui LIKE '%$keyword'
        ";
    return query($query);
}

// Fungsi untuk mencari aksesoris (keyword)
function cari_aksesoris($keyword) {
    $query = "SELECT * FROM tb_aksesoris WHERE
        nama_aksesoris LIKE '%$keyword' OR
        jenis_aksesoris LIKE '%$keyword' OR
        stok LIKE '%$keyword' OR
        tanggal_perbarui LIKE '%$keyword'
        ";
    return query($query);
}

// Fungsi untuk mencari pembelian (keyword)
function cari_pembelian($keyword) {
    $query = "SELECT * FROM tb_pembelian WHERE
        nama_pembelian LIKE '%$keyword' OR
        tanggal_pembelian LIKE '%$keyword'
        ";
    return query($query);
}

// Fungsi untuk mencari keuangan (keyword)
function cari_keuangan($keyword) {
    $query = "SELECT * FROM tb_keuangan WHERE
        tanggal_keuangan LIKE '%$keyword' OR
        nama_pengisi LIKE '%$keyword'
        ";
    return query($query);
}
?>