<form action="" method="post">
    <!-- Button trigger modal -->
    <button type="button" class="btn mt-3" style="background-color: #0EAB01; color:white;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
        </svg>
        Input Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Berita Acara</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Prodi Studi -->
                    <p class="fs-6">Program Studi :</p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="1">Teknik Informatika</option>
                        <option value="2">Sistem Informasi</option>
                    </select>
                    <!-- Mata Kuliah -->
                    <p class="fs-6">Mata Kuliah :</p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <!-- Kelas -->
                    <p class="fs-6">Kelas</p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="1">A</option>
                        <option value="2">B</option>
                    </select>
                    <!-- Pertemuan -->
                    <p class="fs-6">Pertemuam ke-</p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3">4</option>
                        <option value="3">5</option>
                        <option value="3">6</option>
                        <option value="3">7</option>
                        <option value="3">8</option>
                        <option value="3">9</option>
                        <option value="3">10</option>
                        <option value="3">11</option>
                        <option value="3">12</option>
                        <option value="3">13</option>
                        <option value="3">14</option>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
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
            <th>No</th>
            <th>NIK</th>
            <th>Nama Dosen</th>
            <th>Program Studi</th>
            <th>Mata Kuliah</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

        ?>
    </tbody>

    <script>
        $(document).ready(function() {
            $("#abs").DataTable();
        });
    </script>
</table>