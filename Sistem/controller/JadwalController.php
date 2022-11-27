<?php
class JadwalController
{
    private $jadwalDao;
    private $dosenDao;
    private $matkulDao;
    private $ruanganDao;
    private $semesterDao;

    public function __construct()
    {
        $this->jadwalDao = new JadwalDaoImpl();
        $this->dosenDao = new DosenDaoImpl();
        $this->matkulDao = new MatkulDaoImpl();
        $this->ruanganDao = new RuanganDaoImpl();
        $this->semesterDao = new SemesterDaoImpl();
    }

    public function index()
    {
        $tambah = filter_input(INPUT_POST, 'btnSubmit');

        if (isset($tambah)) {

            $matkul = filter_input(INPUT_POST, 'matkul');
            $semester = filter_input(INPUT_POST, 'semester');
            $pertemuan = filter_input(INPUT_POST, 'pertemuan');
            $tanggal = filter_input(INPUT_POST, 'tanggal');
            $waktumulai = filter_input(INPUT_POST, 'waktumulai');
            $waktuselesai = filter_input(INPUT_POST, 'waktuselesai');
            $namamahasiswa = filter_input(INPUT_POST, 'namamahasiswa');
            $totaljam = filter_input(INPUT_POST, 'totaljam');

            if (empty($matkul) || empty($semester) || empty($pertemuan) || empty($tanggal) || empty($waktumulai) || empty($waktuselesai) || empty($namamahasiswa) || empty($totaljam)) {
                echo '<script>
                    swal({
                        title: "Input failed!",
                        text: "Please fill all the inputs!",
                        icon: "error",
                      });
                      </script>';
            } else {
                $arrayMatkul = explode(' ', $matkul);

                $matkul = $arrayMatkul[0];
                $kelas = $arrayMatkul[1];
                $tipe = $arrayMatkul[2];

                $jadwal = new Jadwal();
                $jadwal->getDosen()->setNrp($_SESSION['nrp']);
                $jadwal->getMatkul()->setKodeM($matkul);
                $jadwal->setKelas($kelas);
                $jadwal->setTipe($tipe);
                $jadwal->getRuangan()->setKodeR($this->jadwalDao->fetchRuanganFromJadwal($kelas, $matkul, $_SESSION['nrp'], $semester, $tipe)[0]);
                $jadwal->getSemester()->setPeriode($semester);
                $result = $this->jadwalDao->insertNewJadwal($jadwal);
                if ($result) {
                    echo '<script>
                    swal({
                        title: "Good job!",
                        text: "Add Data Success",
                        icon: "success",
                      });
                      </script>';
                } else {
                    echo '<script>
                    swal({
                        title: "Input failed!",
                        text: "Error on add data!",
                        icon: "error",
                      });
                      </script>';
                }
            }
        }
        $jad = $this->jadwalDao->fetchAllJadwal($_SESSION['nrp']);
        $sems = $this->semesterDao->fetchAllSemester();
        include_once 'view/home.php';
    }

    public function detailJadwal()
    {
        $pertemuan = filter_input(INPUT_GET, 'pid');
        if (isset($pertemuan) && $pertemuan != '') {
            $det = $this->productDao->fetchDetail($pertemuan);
        }
        include_once 'view/home-info.php';
    }
}
