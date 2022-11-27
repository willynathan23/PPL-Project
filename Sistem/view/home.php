<form action="" method="post">
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
            <div class="modal-content">
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
                        <input type="date" name="tanggal">
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
                    <p class="fs-6 fw-bold">Asisten</p>

                    <div class="row mb-2">
                        <div class="col-4">
                            <label for="namamahasiswa">Nama Mahasiswa</label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="namamahasiswa" id="namamahasiswa"><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <label for="totaljam">Total Jam</label>
                        </div>
                        <div class="col-8">
                            <input type="number" name="totaljam" id="totaljam" min=0>
                        </div>
                    </div>
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
        <tr>
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
            echo '<td>' . $item->getSemester()->getJumlahSemester() . '</td>';
            echo '<td>
            <button onclick="infojadwal(\'' . $item->getKelas() . '\')" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </svg>
            </button>
            </td>';
            echo '</tr>';
        }
        ?>
    </tbody>

    <script>
        $(document).ready(function() {
            $("#abs").DataTable();
        });

        function infojadwal(id) {
            window.location = "index.php?ahref=info&pjid=" + id;
        }
    </script>
</table>