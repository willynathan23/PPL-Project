<div class="container">

   <form method="POST" class="mb-2">
      <div class="row mb-3">
         <label for="nrp" class="form-label fs-5">NRP</label>
         <input type="text" class="form-control" name="nrp" placeholder="NRP" id="nrp" autocomplete="off" readonly value="<?php echo $dosen->getNrp() ?>">
      </div>
      <div class="row mb-3">
         <label for="nameId" class="form-label fs-5">Nama</label>
         <input type="text" class="form-control" name="nama" placeholder="Nama Dosen" id="nameId" autocomplete="off" value="<?php echo $dosen->getNama() ?>">
      </div>

      <input type="submit" value="Update Data" name="btnSubmit" class="btn btn-primary me-2">
      <a name="btnBack" class="btn btn-info me-2" href="?ahref=dosen">Go Back<a>
   </form>

</div>