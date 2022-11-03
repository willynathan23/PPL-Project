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
                    <!-- Dosen -->
                    <p class="fs-6">Dosen</p>
                    <select class="form-select" aria-label="Default select example" name="txtDosen">
                        <option selected>Select</option>
                        <?php
                            /**@var $item Dosen */
                            foreach ($dos as $item) {
                                echo '<option value="' . $item->getNrp() . '">' . $item->getNama() . '</option>';
                            }
                            ?>
                    </select>
                    <!-- Mata Kuliah -->
                    <p class="fs-6">Mata Kuliah :</p>
                    <select class="form-select" aria-label="Default select example" name="txtMatkul">
                        <option selected>Select</option>
                        <?php
                            /**@var $item Matkul */
                            foreach ($matt as $item) {
                                echo '<option value="' . $item->getKode() . '">' . $item->getNama() . '</option>';
                            }
                            ?>
                    </select>
                    <!-- Kelas -->
                    <p class="fs-6">Kelas</p>
                    <select class="form-select" aria-label="Default select example" name="txtKelas">
                        <option selected>Select</option>
                        <option value="1">A</option>
                        <option value="2">B</option>
                    </select>
                    <!-- Tipe -->
                    <p class="fs-6">Tipe</p>
                    <select class="form-select" aria-label="Default select example" name="txtTipe">
                        <option selected>Select</option>
                        <option value="1">Teori</option>
                        <option value="2">Praktek</option>
                    </select>
                    <!-- Ruangan -->
                    <p class="fs-6">Ruangan</p>
                    <select class="form-select" aria-label="Default select example" name="txtRuangan">
                        <option selected>Select</option>
                        <?php
                            /**@var $item Ruangan */
                            foreach ($ruang as $item) {
                                echo '<option value="' . $item->getKode() . '">' . $item->getNama() . '</option>';
                            }
                            ?>
                    </select>
                    <!-- Semester -->
                    <p class="fs-6">Semester</p>
                    <select class="form-select" aria-label="Default select example" name="txtSemester">
                        <option selected>Select</option>
                        <?php
                            /**@var $item Semester */
                            foreach ($sems as $item) {
                                echo '<option value="' . $item->getKode() . '">' . $item->getNama() . '</option>';
                            }
                            ?>
                    </select>
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
            <th>NIK</th>
            <th>Nama Dosen</th>
            <th>Mata Kuliah</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        /**@var $item Jadwal */
        foreach ($jad as $item) {
            echo '<tr>';
            echo '<td>' . $item->getDosen()->getNrp() . '</td>';
            echo '<td>' . $item->getDosen()->getNama() . '</td>';
            echo '<td>' . $item->getMatkul()->getNama() . '</td>';
            echo '<td>' . $item->getKelas() . '</td>';
            echo '<td>
            <button onclick="infojadwal(\'' . $item->getId() . '\')" class="btn btn-primary     ">
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
    </script>
</table>