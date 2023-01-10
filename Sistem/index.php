<?php
session_start();
include_once 'util/PDOUtil.php';
include_once 'entity/Dosen.php';
include_once 'entity/Jadwal.php';
include_once 'entity/Matkul.php';
include_once 'entity/Ruangan.php';
include_once 'entity/Semester.php';
include_once 'entity/DetailJadwal.php';
include_once 'entity/Mahasiswa.php';
include_once 'entity/AdminTU.php';
include_once 'entity/Asisten.php';
include_once 'dao/UserDaoImpl.php';
include_once 'dao/DosenDaoImpl.php';
include_once 'dao/JadwalDaoImpl.php';
include_once 'dao/MatkulDaoImpl.php';
include_once 'dao/RuanganDaoImpl.php';
include_once 'dao/SemesterDaoImpl.php';
include_once 'dao/DetailDaoImpl.php';
include_once 'dao/AsistenDaoImpl.php';
include_once 'dao/MahasiswaDaoImpl.php';
include_once 'dao/AdminDaoImpl.php';
include_once 'controller/JadwalController.php';
include_once 'controller/LoginController.php';
include_once 'controller/DetailController.php';
include_once 'controller/ProfileController.php';
include_once 'controller/MahasiswaController.php';
include_once 'controller/MataKuliahController.php';
include_once 'controller/DosenController.php';
include_once 'controller/RuanganController.php';
include_once 'controller/SemesterController.php';
include_once 'controller/JadwalAdminController.php';
include_once 'controller/AsistenController.php';
include_once 'controller/HomeAdminController.php';


if (!isset($_SESSION['web_login'])) {
    $_SESSION['web_login'] = false;
}
if (!isset($_SESSION['web_admin'])) {
    $_SESSION['web_admin'] = false;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="style/style.css">
    <title>Absensi</title>
</head>

<body>
    <?php
    if ($_SESSION['web_login'] || $_SESSION['web_admin']) {
    ?>
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color:#89FF41;">
            <div class="container">
                <a class="navbar-brand" style="color: #747474;">Hi, <?php echo $_SESSION['nama'] ?? '' ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="?ahref=home">
                                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-4" href="?ahref=profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-4" href="?ahref=logout">
                                <svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        <?php
        $menu = filter_input(INPUT_GET, "ahref");
        if ($_SESSION['web_login']) {
            switch ($menu) {
                case "home":
                    $jadwalController = new JadwalController();
                    $jadwalController->index();
                    break;
                case "profile":
                    $profileController = new ProfileController();
                    $profileController->index();
                    break;
                case "logout":
                    $loginContoller = new LoginController();
                    $loginContoller->logout();
                    break;
                case "info":
                    $detailController = new DetailController();
                    $detailController->index();
                    break;
                case "asisten":
                    $asistenController = new AsistenController();
                    $asistenController->index();
                    break;
                default:
                    $loginContoller = new LoginController();
                    $loginContoller->index();
            }
        } else if ($_SESSION['web_admin']) {
            switch ($menu) {
                case "home":
                    $homeAdminController = new HomeAdminController();
                    $homeAdminController->index();
                    break;
                case "profile":
                    $profileController = new ProfileController();
                    $profileController->index();
                    break;
                case "logout":
                    $loginContoller = new LoginController();
                    $loginContoller->logout();
                    break;
                case "mahasiswa":
                    $mahasiswaController = new MahasiswaController();
                    $mahasiswaController->index();
                    break;
                case "upmahasiswa":
                    $mahasiswaController = new MahasiswaController();
                    $mahasiswaController->upindex();
                    break;
                case "matakuliah":
                    $matakuliahController = new MataKuliahController();
                    $matakuliahController->index();
                    break;
                case "upmatakuliah":
                    $matakuliahController = new MataKuliahController();
                    $matakuliahController->upindex();
                    break;
                case "dosen":
                    $dosenController = new DosenController();
                    $dosenController->index();
                    break;
                case "updosen":
                    $dosenController = new DosenController();
                    $dosenController->upindex();
                    break;
                case "ruangan":
                    $ruanganController = new RuanganController();
                    $ruanganController->index();
                    break;
                case "upruangan":
                    $ruanganController = new RuanganController();
                    $ruanganController->upindex();
                    break;
                case "semester":
                    $semesterController = new SemesterController();
                    $semesterController->index();
                    break;
                case "upsemester":
                    $semesterController = new SemesterController();
                    $semesterController->upindex();
                    break;
                case "jadwal":
                    $jadwalController = new JadwalAdminController();
                    $jadwalController->index();
                    break;
                default:
                    $loginContoller = new LoginController();
                    $loginContoller->index();
            }
        }
    } else {
        $loginContoller = new LoginController();
        $loginContoller->index();
    }
        ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>