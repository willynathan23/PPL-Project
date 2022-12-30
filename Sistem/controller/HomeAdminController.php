<?php

class HomeAdminController
{
   private $jadwalDao;
   private $detailDao;

   public function __construct()
   {
      $this->jadwalDao = new JadwalDaoImpl();
      $this->detailDao = new DetailDaoImpl();
   }

   public function index()
   {
      $detail = $this->detailDao->fetchAllDetail();

      include_once 'view-admin/home.php';
   }
}
