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

    public function index(){
        $jad = $this->jadwalDao->fetchAllJadwal();
        $det = $this->detailDao->fetchAllDetail();

        // var_dump($jad);
        var_dump($det);
        include_once 'view/home-info.php';
    }
}

?>