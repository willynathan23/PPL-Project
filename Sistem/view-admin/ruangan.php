<form action="" method="post" enctype="multipart/form-data">
    <div class="container mt-3 mb-3">
        <div class="row">
            <div class="col-6">
                <h1 class="display-4">Ruangan</h1>
            </div>
            <div class="col-6 text-end">
                <button type="button" class="btn mt-3" style="background-color: #0EAB01; color:white;" data-bs-toggle="modal" data-bs-target="#Input">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg>
                    Input Data
                </button>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="Input" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="InputLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="InputLabel">Add Ruangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label for="Ruangan" class="form-label">Kode</label>
                        <input type="text" name="txtKodeRuangan" placeholder="Kode Ruangan" autofocus>
                    </div>
                    <div class="row">
                        <label for="NamaRuangan" class="form-label">Nama Ruangan</label>
                        <input type="text" name="txtNamaRuangan" placeholder="Nama Ruangan" autofocus>
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


    <table class="display" id="abs">
        <thead>
            <tr style="background-color: #89FF41;">
                <th>Kode</th>
                <th>Ruangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            /**@var $item Ruangan */

            foreach ($ruangan as $item) {

                echo '<tr>';
                echo '<td>' . $item->getKodeR() . '</td>';
                echo '<td>' . $item->getNamaR() . '</td>';

                echo '<td>
            <button class="btn btn-warning" type="button" onclick="editRuangan(\'' . $item->getKodeR() . '\')">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </button>
            <button class="btn btn-danger" type="button" onclick="deleteRuangan(\'' . $item->getKodeR() . '\')">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
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

            function editRuangan(id) {
                window.location = 'index.php?ahref=upruangan&rid=' + id;
            };

            function deleteRuangan(id) {
                const confirmation = window.confirm("Are you sure want to delete this data?")
                if (confirmation) {
                    window.location = "index.php?ahref=ruangan&delcom=1&rid=" + id;
                }
            }
        </script>
    </table>
</form>