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

    public function index() { 
        $tambah = filter_input(INPUT_POST,'btnSubmit');
        if (isset($tambah)){
            $dosen = filter_input(INPUT_POST, 'txtDosen');
            $matkul = filter_input(INPUT_POST, 'txtMatkul');
            $kelas = filter_input(INPUT_POST, 'txtKelas');
            $tipe = filter_input(INPUT_POST, 'txtTipe');
            $ruangan = filter_input(INPUT_POST, 'txtRuangan');
            $semester = filter_input(INPUT_POST, 'txtSemester');
        
            if (empty($matkul)){
                echo '<div class="bg-error">Please fill Mata Kuliah</div>';
            } elseif (empty($kelas)){
                echo '<div class="bg-error">Please fill Kelas</div>';
            } elseif (empty($tipe)){
                echo '<div class="bg-error">Please fill Tipe</div>';
            } elseif (empty($ruangan)){
                echo '<div class="bg-error">Please fill Ruangan</div>';
            } elseif (empty($semester)){
                echo '<div class="bg-error">Please fill Semester</div>';
            } else {
                $jadwal = new Jadwal();
                $jadwal->getDosen()->setNrp($dosen);
                $jadwal->getMatkul()->setKodeM($matkul);
                $jadwal->setKelas($kelas);
                $jadwal->setTipe($tipe);
                $jadwal->getRuangan()->setKodeR($ruangan);
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
                    echo '<div class="bg-error">Error on add data</div>';
                }
            }
        }
        $jad = $this->jadwalDao->fetchAllJadwal();
        $dos = $this->dosenDao->fetchAllDosen();
        $matt = $this->matkulDao->fetchAllMatkul();
        $ruang = $this->ruanganDao->fetchAllRuangan();
        $sems = $this->semesterDao->fetchAllSemester();
        include_once 'view/home.php';
    }
}
