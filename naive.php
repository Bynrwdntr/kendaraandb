<?php
require 'connection.php';

function totalDataTraining() {
    global $conn;
    return (int) mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM kendaraan"))[0];
}

function jumlahDataKelas() {
    global $conn;
    $query = "SELECT COUNT(*) FROM kendaraan WHERE jenis_kendaraan=";

    $jumlahDataKendaraan['Mobil'] = (int) mysqli_fetch_row(mysqli_query($conn, $query . "'Mobil'"))[0];
    $jumlahDataKendaraan['Motor'] = (int) mysqli_fetch_row(mysqli_query($conn, $query . "'Motor'"))[0];
    $jumlahDataKendaraan['Sepeda'] = (int) mysqli_fetch_row(mysqli_query($conn, $query . "'Sepeda'"))[0];
    return $jumlahDataKendaraan;
}

function priorProbability() {
    $kelas['Mobil'] = jumlahDataKelas()['Mobil'] / totalDataTraining();
    $kelas['Motor'] = jumlahDataKelas()['Motor'] / totalDataTraining();
    $kelas['Sepeda'] = jumlahDataKelas()['Sepeda'] / totalDataTraining();
    return $kelas;
}

function conditionalProbability($nama_kolom, $nilai, $kelas_kendaraan) {
    global $conn;
    $query = "SELECT COUNT($nama_kolom) FROM kendaraan WHERE $nama_kolom = '$nilai' AND jenis_kendaraan=";
    $conditionalProbability[$kelas_kendaraan] = (int) mysqli_fetch_row(mysqli_query($conn, $query . "'$kelas_kendaraan'"))[0] / jumlahDataKelas()[$kelas_kendaraan];

    return $conditionalProbability;
}

function posteriorProbability($data) {
    $kelas = ['Mobil', 'Motor', 'Sepeda'];
    $probabilitas = [];
    
    foreach ($kelas as $k) {
        $atribut['jarak'] = conditionalProbability('jarak_tempuh_harian', $data['jarak'], $k);
        $atribut['penumpang'] = conditionalProbability('kebutuhan_penumpang', $data['penumpang'], $k);
        $atribut['lokasi'] = conditionalProbability('lokasi', $data['lokasi'], $k);
        $atribut['anggaran'] = conditionalProbability('anggaran', $data['anggaran'], $k);

        $probabilitas[$k] = $atribut['jarak'][$k] * $atribut['penumpang'][$k] * $atribut['lokasi'][$k] * $atribut['anggaran'][$k] * priorProbability()[$k];
    }

    arsort($probabilitas);
    return array_keys($probabilitas)[0];
}
?>
