<div class="container mt-3">
    <p class="fs-2">Berita Acara</p>


    <div class="row" style="background-color: #b1d6b0;">


        <div class="row mt-2">
            <div class="col-6 fs-5">
                <p>Jadwal</p>
            </div>
            <div class="col-6 text-end">
                <button type="button" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg>
                </button>
            </div>
        </div>
        <hr>
        <!-- Mata Kuliah -->
        <div class="row fs-4">
            <div class="col-2">
                Mata Kuliah
            </div>
            <div class="col-1 text-end">:</div>
            <div class="col-9">
                <?php
                foreach ($det as $item) {
                    echo '<p>' . $item->getJadwal()->getMatkul()->getKodeM() . '-' . $item->getJadwal()->getMatkul()->getNamaM() . '</p>';
                }
                ?>


            </div>
        </div>

        <!-- Kelas -->
        <div class="row fs-4">
            <div class="col-2">
                Kelas
            </div>
            <div class="col-1 text-end">:</div>
            <div class="col-9">
                <?php
                foreach ($det as $item) {
                    echo '<p>' . $item->getJadwal()->getKelas() . '</p>';
                }
                ?>
            </div>
        </div>

        <!-- Tipe -->
        <div class="row fs-4">
            <div class="col-2">
                Tipe
            </div>
            <div class="col-1 text-end">:</div>
            <div class="col-9">
                <?php
                foreach ($det as $item) {
                    echo '<p>' . $item->getJadwal()->getTipe() . '</p>';
                }
                ?>
            </div>
        </div>

        <!-- Semester -->
        <div class="row fs-4">
            <div class="col-2">
                Semester
            </div>
            <div class="col-1 text-end">:</div>
            <div class="col-9">
                <?php
                foreach ($det as $item) {
                    echo '<p>' . $item->getJadwal()->getSemester()->getPeriode() . '</p>';
                }
                ?>
            </div>
        </div>

        <!-- Pertemuan -->
        <div class="row fs-5 mt-3">
            <div class="col-6">
                <p>Pertemuan ke-
                    <?php
                    foreach ($det as $item) {
                        echo '<p>' . $item->getJumlahP() . '</p>';
                    }
                    ?>
                </p>
            </div>
            <div class="col-6 text-end">
                <button type="button" class="btn border border-dark" onclick="asis()">Asisten</button>
            </div>
        </div>
        <hr>

        <!-- Tanggal -->
        <div class="row fs-4">
            <div class="col-2">
                Tanggal
            </div>
            <div class="col-1 text-end">:</div>
            <div class="col-9">
                <?php
                foreach ($det as $item) {
                    echo '<p>' . $item->getWaktuP() . '</p>';
                }
                ?>
            </div>
        </div>

        <!-- Jam Mulai -->
        <div class="row fs-4">
            <div class="col-2">
                Jam Mulai
            </div>
            <div class="col-1 text-end">:</div>
            <div class="col-9">
                <?php
                foreach ($det as $item) {
                    echo '<p>' . $item->getJMulai() . '</p>';
                }
                ?>
            </div>
        </div>

        <!-- Jam Selesai -->
        <div class="row fs-4 mb-5">
            <div class="col-2">
                Jam Selesai
            </div>
            <div class="col-1 text-end">:</div>
            <div class="col-9">
                <?php
                foreach ($det as $item) {
                    echo '<p>' . $item->getJSelesai() . '</p>';
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        function asis() {
            swal("No Input Asisten", "Tidak ada asisten yang terdaftar", "error");
        }
    </script>
</div>