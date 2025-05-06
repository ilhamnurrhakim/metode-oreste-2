<?php

class SPK extends CRUD
{
    public function RankAVG($kode, $value, $order = 0)
    {
        $queryNilai = $this->read("nilai", "ORDER BY nisn ASC");

        foreach ($queryNilai as $data) {
            # code...
            $arr[] = $data[$kode];
        }

        if ($order) {
            sort($arr);
        } else {
            rsort($arr);
        }

        array_unshift($arr, $value + 1);
        $keys = array_keys($arr, $value);

        if (count($keys) == 0) {
            return NULL;
        }

        $result = array_sum($keys) / count($keys);

        return $result;
    }

    public function DistabceScore($kode, $value, $count)
    {
        $rankAvg = $this->RankAVG($kode, $value);
        $ketetapan = 0.5;
        $pangkat = 3;

        $result = pow((($ketetapan * pow($rankAvg, $pangkat)) + ($ketetapan * pow($count, $pangkat))), (1 / $pangkat));

        return $result;
    }

    public function PreferenceVektor($value)
    {
        $queryKriteria = $this->read("kriteria", "ORDER BY kode_kriteria ASC");

        foreach ($queryKriteria as $data) {
            # code...
            $bobot[] = $data['bobot_kriteria'];
        }

        $C1 = $this->DistabceScore("C1", $value['C1'], 1);
        $C2 = $this->DistabceScore("C2", $value['C2'], 2);
        $C3 = $this->DistabceScore("C3", $value['C3'], 3);
        $C4 = $this->DistabceScore("C4", $value['C4'], 4);
        $C5 = $this->DistabceScore("C5", $value['C5'], 5);

        $result = ($C1 * $bobot[0]) + ($C2 * $bobot[1]) + ($C3 * $bobot[2]) + ($C4 * $bobot[3]) + ($C5 * $bobot[4]);

        return $result;
    }

    public function Keputusan($tipe, $nilai, $no, $total_nilai)
    {
        if ($tipe == "Ranking") {
            # code...
            $no = $no - 1;
            if ($no <= $nilai) {
                # code...
                $keterangan = "Terpilih";
            } else {
                # code...
                $keterangan = "Tidak Terpilih";
            }
        } elseif ($tipe == "Total Nilai") {
            # code...
            if ($nilai >= $total_nilai) {
                # code...
                $keterangan = "Terpilih";
            } else {
                # code...
                $keterangan = "Tidak Terpilih";
            }
        } else {
            # code...
            $keterangan = "-";
        }

        return $keterangan;
    }
}
