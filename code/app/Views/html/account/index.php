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
                        <h3>Account Info</h3>

                        <?php ?>

                        <div class="row mb-5">
                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">username</label>
                            </div>
                            <div class="col-sm-4 d-flex align-items-end">
                                <input type="text" name="username" class="form-control" value="<?php # $userInfo[0]['user_name'] ?>" disabled>
                                <button class="btn btn-primary ms-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit Username" data-bs-original-title="Edit Username"><i class="bi bi-pencil-square"></i></button>
                            </div>

                            <div class="w-100 d-block mb-3"></div>

                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">email</label>
                            </div>
                            <div class="col-sm-4 d-flex align-items-end">
                                <input type="text" name="username" class="form-control" value="<?php # $userInfo[0]['user_email'] ?>" disabled>
                                <button class="btn btn-primary ms-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit Email" data-bs-original-title="Edit Email"><i class="bi bi-pencil-square"></i></button>
                            </div>

                            <div class="w-100 d-block mb-3"></div>

                            <div class="col-sm-2 d-flex align-items-end">
                                <button class="btn btn-secondary">change password</button>
                            </div>
                        </div>

                        <h3>Personalization</h3>

                        <div class="row">
                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">primary color</label>
                            </div>

                            <div class="col-sm-1 d-flex align-items-end">
                                <input type="color" name="primaryColor" id="primaryColorPicker" class="form-control form-control-color">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">secondary color</label>
                            </div>

                            <div class="col-sm-1 d-flex align-items-end">
                                <input type="color" name="secondaryColor" id="secondaryColorPicker" class="form-control form-control-color">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>