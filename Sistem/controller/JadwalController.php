<?php
class JadwalController
{
    private $jadwalDao;

    public function __construct()
    {
        $this->jadwalDao = new JadwalDaoImpl();
        $this->dosenDao = new DosenDaoImpl();
        $this->matkulDao = new MatkulDaoImpl();
        $this->ruanganDao = new RuanganDaoImpl();
        $this->semesterDao = new SemesterDaoImpl();
    }

    public function index(){
        $tambah = filter_input(INPUT_POST,'btnSubmit');
        if (isset($tambah)){
            $dosen = filter_input(INPUT_POST, 'txtDosen');
            $matkul = filter_input(INPUT_POST, 'txtMatkul');
            $kelas = filter_input(INPUT_POST, 'txtKelas');
            $tipe = filter_input(INPUT_POST, 'txtTipe');
            $ruangan = filter_input(INPUT_POST, 'txtRuangan');
            $semester = filter_input(INPUT_POST, 'txtSemester');
        
            if (empty($dosen)){
                echo '<div class="bg-error">Please fill Dosen</div>';
            } else if (empty($matkul)){
                echo '<div class="bg-error">Please fill Mata Kuliah</div>';
            } else if (empty($kelas)){
                echo '<div class="bg-error">Please fill Kelas</div>';
            } else if (empty($tipe)){
                echo '<div class="bg-error">Please fill Tipe</div>';
            } else if (empty($ruangan)){
                echo '<div class="bg-error">Please fill Ruangan</div>';
            } else if (empty($semester)){
                echo '<div class="bg-error">Please fill Semester</div>';
            } else {
                $jadwal = new Jadwal();
                $jadwal->getDosen()->setNrp($dosen);
                $jadwal->getMatkul()->setKode($matkul);
                $jadwal->setKelas($kelas);
                $jadwal->setTipe($tipe);
                $jadwal->getRuangan()->setKode($ruangan);
                $jadwal->getSemester()->setPeriode($semester);
                
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

?>