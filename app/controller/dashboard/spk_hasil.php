<?php

$no = 0;

$queryHasil = $crud->read(
    "hasil",
    "INNER JOIN siswa ON hasil.nisn = siswa.nisn
     ORDER BY hasil.total_nilai DESC"
);
