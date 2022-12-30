<?php

class ProfileController
{
   private $dosenDao;
   public function __construct()
   {
      $this->dosenDao = new DosenDaoImpl();
   }

   public function index()
   {
      $btnSubmit = filter_input(INPUT_POST, 'btnSubmit');

      if (isset($btnSubmit)) {
         $oldPassword = filter_input(INPUT_POST, 'oldPassword');
         $newPassword = filter_input(INPUT_POST, 'newPassword');
         $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

         if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
            echo '<script>
                    swal({
                        title: "Input failed!",
                        text: "Please fill all the inputs!",
                        icon: "error",
                      });
                      </script>';
         } else if ($newPassword !== $confirmPassword) {
            echo '<script>
                    swal({
                        title: "Input failed!",
                        text: "Confirmation password is not same!",
                        icon: "error",
                      });
                      </script>';
         } else {
            $md5password = md5($newPassword);

            $newDosen = new Dosen();
            $newDosen->setNrp($_SESSION['nrp']);
            $newDosen->setPassword($md5password);

            $result = $this->dosenDao->updatePasswordDosen($newDosen);
            if ($result) {
               echo '<script>swal("Change password success", "", "success")</script>';
            } else {
               echo '<script>swal("Change password failed", "Silakan coba lagi!", "error")</script>';
            }
         }
      }

      include_once "view/profile.php";
   }
}
