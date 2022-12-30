<?php

class RuanganController
{
   private $ruanganDao;

   public function __construct()
   {
      $this->ruanganDao = new RuanganDaoImpl();
   }

   public function index()
   {
      $deleteCommand = filter_input(INPUT_GET, 'delcom');
      if (isset($deleteCommand) && $deleteCommand == 1) {
         $ruanganId = filter_input(INPUT_GET, 'rid');
         $result = $this->ruanganDao->deleteRuangan($ruanganId);

         if ($result) {
            echo '<script>
                    swal({
                        title: "Good job!",
                        text: "Delete Data Success",
                        icon: "success",
                      });
                      </script>';
         } else {
            echo '<script>
            swal({
                title: "Input failed!",
                text: "Error on delete data!",
                icon: "error",
              });

              </script>';
         }
      }

      $ruangan = $this->ruanganDao->fetchAllRuangan();



      include_once 'view-admin/ruangan.php';
   }

   public function upindex()
   {

      $rid = filter_input(INPUT_GET, 'rid');

      if (isset($rid)) {

         $ruangan = $this->ruanganDao->fetchRuangan($rid);
      }

      $btnSubmit = filter_input(INPUT_POST, 'btnSubmit');

      if (isset($btnSubmit)) {
         $kode = filter_input(INPUT_POST, 'kode');
         $nama = filter_input(INPUT_POST, 'nama');

         if (empty($kode) || empty($nama)) {
            echo '<script>
                swal({
                    title: "Input failed!",
                    text: "Please fill all the inputs!",
                    icon: "error",
                  });
                  </script>';
         } else {
            $newRuangan = new Ruangan();

            $newRuangan->setKodeR($kode);
            $newRuangan->setNamaR($nama);

            $result = $this->ruanganDao->updateRuangan($newRuangan);

            if ($result) {
               echo '<script>
                 window.location = "index.php?ahref=ruangan";
                 </script>';
            } else {
               echo '<script>
               swal({
                   title: "Input failed!",
                   text: "Error on update data!",
                   icon: "error",
                 });

                 </script>';
            }
         }
      }


      include_once 'view-admin/ruangan-update.php';
   }
}
