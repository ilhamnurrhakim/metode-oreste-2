<?php

$no = 1;
$total_bobot = 0;

$queryKriteria = $crud->read(
    "kriteria",
    "ORDER BY kode_kriteria ASC"
);

if (isset($_POST['tambah'])) {
    # code...
    $crud->create(
        "kriteria",
        "kode_kriteria, nama_kriteria, jenis_kriteria, bobot_kriteria",
        "'$_POST[kode_kriteria]', '$_POST[nama_kriteria]', '$_POST[jenis_kriteria]', 
         '$_POST[bobot_kriteria]'"
    );

    echo $fungsi->Redirect("?p=" . $page);
}

if (isset($_POST['edit'])) {
    # code...
    $crud->update(
        "kriteria",
        "nama_kriteria='$_POST[nama_kriteria]', jenis_kriteria='$_POST[jenis_kriteria]', 
         bobot_kriteria='$_POST[bobot_kriteria]'",
        "kode_kriteria = '$_POST[kode_kriteria]'"
    );

    echo $fungsi->Redirect("?p=" . $page);
}

if (isset($_POST['hapus'])) {
    # code...
    $crud->delete(
        "kriteria",
        "kode_kriteria",
        $_POST['kode_kriteria']
    );

    echo $fungsi->Redirect("?p=" . $page);
}
