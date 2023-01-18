<form action="" method="post" enctype="multipart/form-data">
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-6">
                <h1 class="display-4">Jadwal</h1>
            </div>
            <div class="col-6 text-end">
                <button type="button" class="btn mt-3" style="background-color: #0EAB01; color:white;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                    Input Data
                </button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Jadwal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <label for="nikId" class="form-label">NIK</label>
                            <select name="nik" id="nikID">
                                <option selected>---Please Select Name---</option>
                                <?php
                                /**@var $item dosen */
                                foreach ($doss as $item) {
                                    echo '<option value="' . $item->getNrp() . '">' . $item->getNrp() . ' / ' . $item->getNama() . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row mb-2">
                            <label for="kodeId" class="form-label">Kode Matakuliah</label>
                            <select name="kode" id="kodeID">
                                <option selected>---Please Select Matakuliah---</option>
                                <?php
                                /**@var $item matakuliah */
                                foreach ($matkul as $item) {
                                    echo '<option value="' . $item->getKodeM() . '">' . $item->getKodeM() . ' ' . $item->getNamaM() . '</option>';
                                }
                                ?>
                            </select>

                        </div>
                        <div class="row mb-2">
                            <label for="semesterId" class="form-label">Periode Semester</label>
                            <select name="semester" id="semesterID">
                                <option selected>---Please Select Periode---</option>
                                <?php
                                /**@var $item semester */
                                foreach ($sems as $item) {
                                    echo '<option value="' . $item->getPeriode() . '">' . $item->getPeriode() . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row mb-2">
                            <label for="ruanganId" class="form-label">Kode Ruangan</label>
                            <select name="ruangan" id="ruanganID">
                                <option selected>---Please Select Ruangan---</option>
                                <?php
                                /**@var $item semester */
                                foreach ($ruang as $item) {
                                    echo '<option value="' . $item->getKodeR() . '">' . $item->getNamaR() . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row mb-2">
                            <label for="MatkulId" class="form-label">Kelas</label>
                            <select name="kelas" id="kelasID">
                                <option selected>---Please Select Class</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </div>
                        <div class="row mb-2">
                            <label for="MatkulId" class="form-label">Tipe</label>
                            <select name="tipe" id="kelasID">
                                <option selected>---Please Select Tipe</option>
                                <option value="Teori">Teori</option>
                                <option value="Praktikum">Praktikum</option>
                            </select>
                        </div>
                        <div class="row mt-3">
                            <input type="file" name="upcsv" accept=".csv">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Add" name="btnSubmit" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="display" id="abs">
        <thead>
            <tr style="background-color: #89FF41;">
                <th>NIK</th>
                <th>Dosen</th>
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


            foreach ($jadwal as $item) {

                echo '<tr>';
                echo '<td>' . $item->getDosen()->getNrp() . '</td>';
                echo '<td>' . $item->getDosen()->getNama() . '</td>';
                echo '<td>' . $item->getMatkul()->getNamaM() . '</td>';
                echo '<td>' . $item->getKelas() . '</td>';
                echo '<td>' . $item->getRuangan()->getNamaR() . '</td>';
                echo '<td>' . $item->getTipe() . '</td>';
                echo '<td>' . $item->getSemester()->getPeriode() . '</td>';

                echo '<td>
                <button class="btn btn-warning">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
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
</form>