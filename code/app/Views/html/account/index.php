<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">My Account</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-3">
                    <div class="card-body py-5">

                        <div class="modal fade m-auto" id="usernameModal" tabindex="-1" aria-labelledby="usernameModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Username</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body row">
                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">username</label>
                                    </div>
                                    <div class="col-sm-10 d-flex align-items-end">
                                        <input type="text" name="username" class="form-control" value="<?= $userInfo[0]['user_name'] ?>">
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" name="saveNewUsername">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade m-auto" id="emailModal" tabindex="-1" aria-labelledby="emailModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Email</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body row">
                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">email</label>
                                    </div>
                                    <div class="col-sm-10 d-flex align-items-end">
                                        <input type="text" name="email" class="form-control" value="<?= $userInfo[0]['user_email'] ?>">
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" name="saveNewEmail">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Account Info</h3>

                        <div class="row mb-5">
                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">username</label>
                            </div>
                            <div class="col-sm-4 d-flex align-items-end">
                                <input type="text" name="username" class="form-control" value="<?= $userInfo[0]['user_name'] ?>" disabled>
                                <button class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#usernameModal" aria-label="Edit Username" data-bs-original-title="Edit Username"><i class="bi bi-pencil-square"></i></button>
                            </div>

                            <div class="w-100 d-block mb-3"></div>

                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">email</label>
                            </div>
                            <div class="col-sm-4 d-flex align-items-end">
                                <input type="text" name="username" class="form-control" value="<?= $userInfo[0]['user_email'] ?>" disabled>
                                <button class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#emailModal" aria-label="Edit Email" data-bs-original-title="Edit Email"><i class="bi bi-pencil-square"></i></button>
                            </div>
                        </div>

                        <hr>

                        <h3>Password</h3>

                        <div class="row mb-5">
                            <div class="col-sm-2 d-flex align-items-end">
                                <button class="btn btn-secondary btn-w1" name="changePasswordButton">change password</button>
                            </div>
                        </div>

                        <hr>

                        <h3>Personalization</h3>

                        <div class="row mb-5">
                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">primary color</label>
                            </div>

                            <div class="col-sm-1 d-flex align-items-end">
                                <input type="color" name="primaryColor" id="primaryColorPicker" class="form-control form-control-color">
                            </div>
                            
                            <div class="w-100 d-block mb-3"></div>

                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">secondary color</label>
                            </div>

                            <div class="col-sm-1 d-flex align-items-end">
                                <input type="color" name="secondaryColor" id="secondaryColorPicker" class="form-control form-control-color">
                            </div>

                            <div class="w-100 d-block mb-3"></div>

                            <div class="col-sm-2 d-flex align-items-center">
                                <label class="form-label m-0">color scheme</label>
                            </div>

                            <div class="col-sm-1 d-flex align-items-start">
                                <div class="d-none d-lg-flex justify-content-center align-items-center gap-5 flex-row flex-row-auto">
                                    <a href="?theme=dark" class="fs-1 nav-link p-0 hide-theme-dark" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode" data-bs-original-title="Enable dark mode">
                                        <i class="bi bi-moon-fill"></i>
                                    </a>
                                    <a href="?theme=light" class="fs-1 nav-link p-0 hide-theme-light" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode" data-bs-original-title="Enable light mode">
                                        <i class="bi bi-sun-fill"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h3>Danger Zone</h3>

                        <div class="row">
                            <div class="col-sm-2 d-flex align-items-end">
                                <button class="btn btn-danger btn-w1" name="deleteAccountButton">delete account</button>
                            </div>
                            
                            <div class="w-100 d-block mb-3"></div>

                            <div class="col-sm-2 d-flex align-items-end">
                                <a class="btn btn-danger btn-w1" href="<?= base_url('auth/logout') ?>">logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>