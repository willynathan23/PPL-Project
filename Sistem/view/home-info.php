<div class="container mt-3">
    <p class="fs-2">Berita Acara</p>
</div>
<div class="c   ontainer mt-3">
    <div class="row">
        <!-- Mata Kuliah -->
        <div class="row fs-4">
            <div class="col-2">
                Mata Kuliah
            </div>
            <div class="col-1 text-end">:</div>
            <div class="col-9">
                <?php echo $details[0]->getJadwal()->getMatkul()->getKodeM(); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Kelas -->
        <div class="row fs-4">
            <div class="col-2">
                Kelas
            </div>
            <div class="col-1 text-end">:</div>
            <div class="col-9">
                <?php echo $details[0]->getJadwal()->getKelas(); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Tipe -->
        <div class="row fs-4">
            <div class="col-2">
                Tipe
            </div>
            <div class="col-1 text-end">:</div>
            <div class="col-9">
                <?php echo $details[0]->getJadwal()->getTipe(); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Semester -->
        <div class="row fs-4">
            <div class="col-2">
                Semester
            </div>
            <div class="col-1 text-end">:</div>
            <div class="col-9">
                <?php echo $details[0]->getJadwal()->getSemester()->getPeriode(); ?>
            </div>
        </div>
    </div>
</div>


<?php foreach ($details as $item) { ?>
    <div class="container mt-3">
        <div class="row" style="background-color: #b1d6b0;">

            <!-- Pertemuan -->
            <div class="row fs-5 mt-3">
                <div class="col-6">
                    <p>Pertemuan ke-
                        <b> <?php echo $item->getJumlahP() ?></b>
                    </p>
                </div>
                <!-- Asisten -->
                <div class="col-6 text-end">
                    <a href="index.php?ahref=asisten&kode=<?php echo $kode; ?>&kelas=<?php echo $kelas; ?>&semester=<?php echo $semester; ?>&nrpdosen=<?php echo $nrpdosen ?>&pertemuan=<?php echo $item->getJumlahP() ?>">
                        <button type="button" class="btn border border-dark">Asisten</button>
                    </a>
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
                    <?php echo $item->getTglPertemuan(); ?>
                </div>
            </div>

            <!-- Jam Mulai -->
            <div class="row fs-4">
                <div class="col-2">
                    Jam Mulai
                </div>
                <div class="col-1 text-end">:</div>
                <div class="col-9">
                    <?php echo $item->getJMulai(); ?>

                </div>
            </div>

            <!-- Jam Selesai -->
            <div class="row fs-4">
                <div class="col-2">
                    Jam Selesai
                </div>
                <div class="col-1 text-end">:</div>
                <div class="col-9">
                    <?php echo $item->getJSelesai() ?>
                </div>
            </div>

            <!-- Materi -->
            <div class="row fs-4 mb-5">
                <div class="col-2">
                    Materi
                </div>
                <div class="col-1 text-end">:</div>
                <div class="col-9">
                    <?php echo $item->getMateri() ?>
                </div>
            </div>
        </div>

    </div>
<?php } ?>

<script>
    // function asis() {
    //     swal("No Input Asisten", "Tidak ada asisten yang terdaftar", "error");
    // }
</script>