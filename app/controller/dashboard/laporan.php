<?php

$no = 0;

if (isset($_POST['cek'])) {
    # code...
    $no = 1;
    $tipe = $_POST['tipe'];
    $nilai = $_POST['nilai'];

    $queryNilai = $crud->read(
        "nilai",
        "INNER JOIN siswa ON nilai.nisn = siswa.nisn
         ORDER BY nilai.nisn ASC"
    );

    $querySiswa = $crud->read(
        "siswa",
        "ORDER BY nisn ASC"
    );

    $queryKriteria = $crud->read(
        "kriteria",
        "ORDER BY kode_kriteria ASC"
    );

    foreach ($queryNilai as $row) {
        # code...
        $no++;
        $nisn = $row['nisn'];
        $nama = $row['nama_siswa'];
        $jk = $row['jk_siswa'];
        $total_nilai = round($spk->PreferenceVektor($row), 5);

        $dataHasil[] = [
            "Ai" => "A" . $no,
            "nisn" => $nisn,
            "nama" => $nama,
            "jk" => $jk,
            "total_nilai" => $total_nilai
        ];
    }

    usort($dataHasil, fn ($a, $b) => $a['total_nilai'] <=> $b['total_nilai']);
}
