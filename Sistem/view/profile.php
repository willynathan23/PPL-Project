<div class="row">
    <div class="col-4" style="background-color: #B5FF87;">
        <div class="row mt-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
        </div>
        <div class="row fs-4 mt-4">
            <div class="col-4"></div>
            <div class="col-4">
                <p>7921344</p>
                <p>Dummy</p>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-7">
        <div class="row mt-5">
            <p class="fs-3">NRP</p>
            <p class="fs-4">7921344</p>
        </div>
        <div class="row mt-5">
            <p class="fs-3">Nama</p>
            <p class="fs-4">Dummy</p>
        </div>
        <div class="row mt-5">
            <p class="fs-3">Email</p>
            <p class="fs-4">Dummy@gmail.com</p>
        </div>
        <div class="row mt-5">
            <div class="col-6">
                <p class="fs-3">Password</p>
                <p class="fs-4">*******</p>
            </div>
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn mt-5 ms-5" style="color:#0EAB01;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Change
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">You Wanna Change Password?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label for="oldpass">Old Password</label>
                                    <input type="password" class="form-control" id="oldpass" name="txtPassword" required>
                                </div>
                                <div>
                                    <label for="newpass">New Password</label>
                                    <input type="password" class="form-control" id="newpass" name="txtPassword" required>
                                </div>
                                <div>
                                    <label for="conpass">Confirm Password</label>
                                    <input type="password" class="form-control" id="conpass" name="txtPassword" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>