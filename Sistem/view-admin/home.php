<br>
<div class="row text-end">
    <div class="col-4">
        <a href="?ahref=jadwal" style="text-decoration: none; color: black;">
            <div class="card" style="width: 18rem;">
                <img src="img/view-admin/foto3.jpg" class="card-img-top" alt="foto 3">
                <div class="card-body">
                    <h5 class="card-title">Jadwal</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4">
        <a href="?ahref=matakuliah" style="text-decoration: none; color: black;">
            <div class="card" style="width: 18rem;">
                <img src="img/view-admin//foto5.jpg" class="card-img-top" alt="foto 5">
                <div class="card-body">
                    <h5 class="card-title">Mata Kuliah</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4">
        <a href="?ahref=dosen" style="text-decoration: none; color: black;">
            <div class="card" style="width: 18rem;">
                <img src="img/view-admin/foto2.jpg" class="card-img-top" alt="foto 2">
                <div class="card-body">
                    <h5 class="card-title">Dosen</h5>
                </div>
            </div>
        </a>
    </div>
</div>

<br>

<div class="row text-end mb-5">
    <div class="col-4">
        <a href="?ahref=ruangan" style="text-decoration: none; color: black;">
            <div class="card" style="width: 18rem;">
                <img src="img/view-admin/foto1.jpg" class="card-img-top" alt="foto 1">
                <div class="card-body">
                    <h5 class="card-title">Ruangan</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4">
        <a href="?ahref=mahasiswa" style="text-decoration: none; color: black;">
            <div class="card" style="width: 18rem;">
                <img src="img/view-admin/foto4.jpg" class="card-img-top" alt="foto 4">
                <div class="card-body">
                    <h5 class="card-title">Mahasiswa</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col-4">
        <a href="?ahref=semester" style="text-decoration: none; color: black;">
            <div class="card" style="width: 18rem;">
                <img src="img/view-admin/foto6.jpeg" class="card-img-top" alt="foto 6">
                <div class="card-body">
                    <h5 class="card-title">Semester</h5>
                </div>
            </div>
        </a>
    </div>
</div>

<br>

<table class="display" id="abs" style="width: 100%;">
    <thead>
        <tr style="background-color: #89FF41;">
            <th>NIK</th>
            <th>Dosen</th>
            <th>Mata Kuliah</th>
            <th>Kelas</th>
            <th>Pertemuan</th>
            <th>Waktu mulai</th>
            <th>Waktu selesai</th>
            <th>Semester</th>
        </tr>
    </thead>
    <tbody>
        <?php
        /**@var $item Jadw */

        foreach ($detail as $item) {

            echo '<tr>';
            echo '<td>' . $item->getJadwal()->getDosen()->getNrp() . '</td>';
            echo '<td>' . $item->getJadwal()->getDosen()->getNama() . '</td>';
            echo '<td>' . $item->getJadwal()->getMatkul()->getKodeM() . '</td>';
            echo '<td>' . $item->getJadwal()->getKelas() . '</td>';
            echo '<td>' . $item->getJumlahP() . '</td>';
            echo '<td>' . $item->getJMulai() . '</td>';
            echo '<td>' . $item->getJSelesai() . '</td>';
            echo '<td>' . $item->getJadwal()->getSemester()->getPeriode() . '</td>';
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