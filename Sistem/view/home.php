<style>
    .cari{
        background-color: white;
        width: 100%;
        border-radius: 5px;
        outline: none;
        border: none;
        border-radius: 5px;
        padding: 0 60px 0 20px;
        font-size: 18px;
    }

    .cari .namamahasiswa {
        /* opacity: 0; */
        /* pointer-events: none; */
        padding: 10px 8px;
        max-height: 280px;
        overflow-y: auto;
        /* list-style: none; */
    }

    .namamahasiswa li {
        list-style: none;
        cursor: default;
        border-radius: 3px;
        background-color: white;
        padding: 8px 12px;
        width: 100%;
        /* display: none; */

    }

    .namamahasiswa li:hover {
        background: #efefef;
    }
</style>
<form action="" method="post" enctype="multipart/form-data">
    <!-- Button trigger modal -->
    <button type="button" class="btn mt-3" style="background-color: #0EAB01; color:white;" data-bs-toggle="modal" data-bs-target="#Input">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg>
        Input Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="Input" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #D5FFBC;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Berita Acara</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Mata Kuliah -->
                    <p class="fs-6 fw-bold">Mata Kuliah :</p>
                    <select class="form-select" aria-label="Default select example" name="matkul">
                        <option selected>Select</option>
                        <?php
                        /**@var $item Matkul */
                        foreach ($jad as $item) {
                            echo '<option value="' . $item->getMatkul()->getKodeM() . ' ' . $item->getKelas() . ' ' . $item->getTipe() . '">' . $item->getMatkul()->getNamaM() . ' ' . $item->getKelas() . ' / ' . $item->getTipe() . '</option>';
                        }
                        ?>
                    </select>
                    <hr>

                    <!-- Semester -->
                    <p class="fs-6 fw-bold">Semester</p>
                    <select class="form-select mb-4" aria-label="Default select example" name="semester">
                        <option selected>Select</option>

                        <?php

                        /**@var $item Semester */
                        foreach ($sems as $item) {
                            echo '<option value="' . $item->getPeriode() . '">' . $item->getPeriode() . '</option>';
                        }
                        ?>
                    </select>
                    <hr>

                    <!-- Pertemuan -->
                    <p class="fs-6 fw-bold">Pertemuan</p>
                    <select class="form-select" aria-label="Default select example" name="pertemuan">
                        <option selected>Select</option>

                        <?php

                        for ($i = 1; $i <= 16; $i++) {
                            echo "<option value='$i'>" . $i . '</option>';
                        }
                        ?>
                    </select>
                    <hr>

                    <!-- Waktu,tgl -->
                    <p class="fs-6 fw-bold">Waktu</p>
                    <div class="row mb-3">
                        <!-- Tanggal -->
                        <p class="fs-6">Tanggal</p>
                        <input type="date" name="tanggal" class="py-1 mx-3" style="width: 90%;">
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <!-- Waktu mulai -->
                            <p class="fs-6">Waktu mulai</p>
                            <input type="time" name="waktumulai">
                        </div>
                        <div class="col-6">
                            <!-- Waktu selesai -->
                            <p class="fs-6">Waktu selesai</p>
                            <input type="time" name="waktuselesai">
                        </div>
                    </div>
                    <hr>

                    <!-- Asisten -->
                    <p class="fs-6 fw-bold">Asisten 1</p>
                    <div class="cari">
                        <input id="keyword" type="text" placeholder="Nama Asisten 1" style="width: 100%;">
                        <div class="namamahasiswa" id="nama">
                            <li>asd</li>
                            <li>qwe</li>
                            <li>xczxc</li>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="namamahasiswa1">Nama Mahasiswa 1</label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="namamahasiswa1" id="namamahasiswa1"><br>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="totaljam1">Total Jam 1</label>
                        </div>
                        <div class="col-8">
                            <input type="number" name="totaljam1" id="totaljam1" min=0>
                        </div>
                    </div>

                    <p class="fs-6 fw-bold">Asisten 2</p>

                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="namamahasiswa2">Nama Mahasiswa 2</label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="namamahasiswa2" id="namamahasiswa2"><br>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="totaljam2">Total Jam 2</label>
                        </div>
                        <div class="col-8">
                            <input type="number" name="totaljam2" id="totaljam2" min=0>
                        </div>
                    </div>

                    <p class="fs-6 fw-bold">Asisten 3</p>

                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="namamahasiswa3">Nama Mahasiswa 3</label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="namamahasiswa3" id="namamahasiswa3"><br>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label for="totaljam3">Total Jam 3</label>
                        </div>
                        <div class="col-8">
                            <input type="number" name="totaljam3" id="totaljam3" min=0>
                        </div>
                    </div>
                    <!-- Materi -->
                    <p class="fs-6 fw-bold">Materi</p>
                    <textarea class="form-control mb-4" id="materi" style="height: 5rem;" data-sb-validations="required" name="materi" required></textarea>

                    <!-- Bukti Kegiatan -->
                    <p class="fs-6 fw-bold">Bukti Kegiatan</p>

                    <input type="file" class="form-control mb-4" name="gambar" accept="image/png, image/jpeg">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Add" name="btnSubmit" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
</form>

<div class="container mt-3 mb-3">
    <h1 class="display-4">Berita Acara PBM Online</h1>
</div>

<table class="display" id="abs">
    <thead>
        <tr style="background-color: #89FF41;">
            <th>Mata Kuliah</th>
            <th>Kelas</th>
            <th>Ruangan</th>
            <th>Tipe</th>
            <th>Semester</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        /**@var $item Jadwal */

        foreach ($jad as $item) {

            echo '<tr>';
            echo '<td>' . $item->getMatkul()->getNamaM() . '</td>';
            echo '<td>' . $item->getKelas() . '</td>';
            echo '<td>' . $item->getRuangan()->getNamaR() . '</td>';
            echo '<td>' . $item->getTipe() . '</td>';
            echo '<td>' . $item->getSemester()->getPeriode() . '</td>';
            echo '<td>
            <a href="index.php?ahref=info&kode=' . $item->getMatkul()->getKodeM() . '&kelas=' . $item->getKelas() . '&semester=' . $item->getSemester()->getPeriode() . '&ruangan=' . $item->getRuangan()->getKodeR() . '&nrpdosen=' . $_SESSION['nrp'] . '">
            <button class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </svg>
            </button>
            </a>
            </td>';
            echo '</tr>';
        }
        ?>
    </tbody>

    <script>
        $(document).ready(function() {
            $("#abs").DataTable();
        });
    </script>
</table>

<script>
    var keyword = document.getElementById('keyword');
    var nama = document.getElementById('namamahasiswa');

    // event keyword

    keyword.addEventListener('keyup', function(){
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            if (xhr.readyState == 4 && xhr.status == 200){
                nama.innerHTML = xhr.responseText;
            }
        }

        xhr.open('GET', 'ajax/asisten.php', true);
        xhr.send();

    });
</script>