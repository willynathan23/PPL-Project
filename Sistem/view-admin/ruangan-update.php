<div class="container">

   <form method="POST" class="mb-2">
      <div class="row mb-3">
         <label for="kode" class="form-label fs-5">Kode Ruangan</label>
         <input type="text" class="form-control" name="kode" placeholder="Kode Matkul" id="kode" autocomplete="off" readonly value="<?php echo $ruangan->getKodeR() ?>">
      </div>
      <div class="row mb-3">
         <label for="nama" class="form-label fs-5">Nama Ruangan</label>
         <input type="text" class="form-control" name="nama" placeholder="Nama Ruangan" id="nama" autocomplete="off" value="<?php echo $ruangan->getNamaR() ?>">
      </div>

      <input type="submit" value="Update Data" name="btnSubmit" class="btn btn-primary me-2">
      <a name="btnBack" class="btn btn-info me-2" href="?ahref=ruangan">Go Back<a>
   </form>

</div>