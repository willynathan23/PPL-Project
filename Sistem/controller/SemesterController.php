<?php

class SemesterController
{
   private $semesterDao;

   public function __construct()
   {
      $this->semesterDao = new SemesterDaoImpl();
   }

   public function index()
   {

      $deleteCommand = filter_input(INPUT_GET, 'delcom');
      if (isset($deleteCommand) && $deleteCommand == 1) {
         $semesterId = filter_input(INPUT_GET, 'sid');
         $result = $this->semesterDao->deleteSemester($semesterId);

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

      $semester = $this->semesterDao->fetchAllSemester();



      include_once 'view-admin/semester.php';
   }


   public function upindex()
   {

      $sid = filter_input(INPUT_GET, 'sid');

      if (isset($sid)) {

         $semester = $this->semesterDao->fetchSemester($sid);
      }

      $btnSubmit = filter_input(INPUT_POST, 'btnSubmit');

      if (isset($btnSubmit)) {
         $periode = filter_input(INPUT_POST, 'periode');

         if (empty($periode)) {
            echo '<script>
                swal({
                    title: "Input failed!",
                    text: "Please fill all the inputs!",
                    icon: "error",
                  });
                  </script>';
         } else {

            $result = $this->semesterDao->updateSemester($semester, $periode);

            if ($result) {
               echo '<script>
                 window.location = "index.php?ahref=semester";
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


      include_once 'view-admin/semester-update.php';
   }
}
