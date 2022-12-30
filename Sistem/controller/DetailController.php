<?php
class DetailController
{
    private $detailDao;
    private $jadwalDao;

    public function __construct()
    {
        $this->detailDao = new DetailDaoImpl;
        $this->jadwalDao = new JadwalDaoImpl;
    }

    public function index()
    {
        $kode = filter_input(INPUT_GET, 'kode');
        $kelas = filter_input(INPUT_GET, 'kelas');
        $semester = filter_input(INPUT_GET, 'semester');
        $ruangan = filter_input(INPUT_GET, 'ruangan');
        $nrpdosen = filter_input(INPUT_GET, 'nrpdosen');

        if (isset($kode) && isset($kelas) && isset($semester) && isset($ruangan) && isset($nrpdosen)) {
            $details = $this->detailDao->fetchAllDetailForDosen($kelas, $kode, $nrpdosen, $semester, $ruangan);
        } else {
            header('location:index.php?ahref=home');
        }
        include_once 'view/home-info.php';
    }
}
