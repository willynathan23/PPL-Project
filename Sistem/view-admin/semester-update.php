<div class="container">

   <form method="POST" class="mb-2">
      <div class="row mb-3">
         <label for="periode" class="form-label fs-5">Periode</label>
         <input type="text" class="form-control" name="periode" placeholder="Periode" id="periode" autocomplete="off" value="<?php echo $semester->getPeriode() ?>">
      </div>

      <input type="submit" value="Update Data" name="btnSubmit" class="btn btn-primary me-2">
      <a name="btnBack" class="btn btn-info me-2" href="?ahref=semester">Go Back<a>
   </form>

</div>