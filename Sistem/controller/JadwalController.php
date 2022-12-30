<?php
class JadwalController
{
    private $jadwalDao;
    private $dosenDao;
    private $matkulDao;
    private $ruanganDao;
    private $semesterDao;
    private $detailDao;
    private $asistenDao;
    private $mahasiswaDao;

    public function __construct()
    {
        $this->jadwalDao = new JadwalDaoImpl();
        $this->dosenDao = new DosenDaoImpl();
        $this->matkulDao = new MatkulDaoImpl();
        $this->ruanganDao = new RuanganDaoImpl();
        $this->semesterDao = new SemesterDaoImpl();
        $this->detailDao = new DetailDaoImpl();
        $this->asistenDao = new AsistenDaoImpl();
        $this->mahasiswaDao = new MahasiswaDaoImpl();
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
            $namamahasiswa1 = filter_input(INPUT_POST, 'namamahasiswa1');
            $totaljam1 = filter_input(INPUT_POST, 'totaljam1');
            $namamahasiswa2 = filter_input(INPUT_POST, 'namamahasiswa2');
            $totaljam2 = filter_input(INPUT_POST, 'totaljam2');
            $namamahasiswa3 = filter_input(INPUT_POST, 'namamahasiswa3');
            $totaljam3 = filter_input(INPUT_POST, 'totaljam3');
            $materi = filter_input(INPUT_POST, 'materi');

            if (empty($matkul) || empty($semester) || empty($pertemuan) || empty($tanggal) || empty($waktumulai) || empty($waktuselesai) || empty($materi)) {
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

                if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
                    $directory = 'uploads';
                    $fileExtension = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
                    $newFileName = uniqid() . "." . $fileExtension;
                    $targetFile = "$directory/$newFileName";
                    if ($_FILES['gambar']['size'] > 1024 * 2048) {
                        echo '<script>
                            swal({
                                title: "Input failed!",
                                text: "File image too big!",
                                icon: "error",
                            });
                      </script>';

                        $result = $this->detailDao->insertNewDetail($jadwal, $pertemuan, $tanggal, $waktumulai, $waktuselesai, $materi);
                    } else {

                        move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile);

                        $result = $this->detailDao->insertNewDetail($jadwal, $pertemuan, $tanggal, $waktumulai, $waktuselesai, $materi, $newFileName);
                    }
                } else {

                    $result = $this->detailDao->insertNewDetail($jadwal, $pertemuan, $tanggal, $waktumulai, $waktuselesai, $materi);
                }




                if (isset($namamahasiswa1) && !empty($namamahasiswa1) && isset($totaljam1) && !empty($totaljam1)) {
                    $mahasiswa = $this->mahasiswaDao->fetchMahasiswa($namamahasiswa1);


                    $result = $this->asistenDao->insertNewAsisten($jadwal, $mahasiswa, $pertemuan, $tanggal, $totaljam1);
                }

                if (isset($namamahasiswa2) && !empty($namamahasiswa2) && isset($totaljam2) && !empty($totaljam2)) {
                    $mahasiswa = $this->mahasiswaDao->fetchMahasiswa($namamahasiswa2);


                    $result = $this->asistenDao->insertNewAsisten($jadwal, $mahasiswa, $pertemuan, $tanggal, $totaljam2);
                }

                if (isset($namamahasiswa3) && !empty($namamahasiswa3) && isset($totaljam3) && !empty($totaljam3)) {
                    $mahasiswa = $this->mahasiswaDao->fetchMahasiswa($namamahasiswa3);


                    $result = $this->asistenDao->insertNewAsisten($jadwal, $mahasiswa, $pertemuan, $tanggal, $totaljam3);
                }

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
}
