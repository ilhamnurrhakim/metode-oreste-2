<?php

$no = 1;

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

if (isset($_POST['tambah'])) {
    # code...
    $crud->create(
        "nilai",
        "nisn, C1, C2, C3, C4, C5",
        "'$_POST[nisn]', '$_POST[C1]', '$_POST[C2]', '$_POST[C3]', '$_POST[C4]', '$_POST[C5]'"
    );

    echo $fungsi->Redirect("?p=" . $page);
}

if (isset($_POST['edit'])) {
    # code...
    $crud->update(
        "nilai",
        "C1='$_POST[C1]', C2='$_POST[C2]', C3='$_POST[C3]', C4='$_POST[C4]', C5='$_POST[C5]'",
        "nisn = '$_POST[nisn]'"
    );

    echo $fungsi->Redirect("?p=" . $page);
}

if (isset($_POST['hapus'])) {
    # code...
    $crud->delete(
        "nilai",
        "nisn",
        $_POST['nisn']
    );

    echo $fungsi->Redirect("?p=" . $page);
}
