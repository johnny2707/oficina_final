<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">A Minha Conta</h2>
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
                                        <h1 class="modal-title fs-3" id="exampleModalLabel">Mudar Nome de Utilizador</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body row">
                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">Nome de Utilizador</label>
                                    </div>
                                    <div class="col-sm-10 d-flex align-items-end">
                                        <input type="text" name="username" class="form-control saveNewUsernameModalInput" value="<?= $userInfo[0]['user_name'] ?>">
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn btn-primary saveNewUsername" name="saveNewUsername">Guardar Alterações</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade m-auto" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-3" id="exampleModalLabel">Alterar Palavra-Passe</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                <div class="modal-body row">
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <label class="form-label">Palavra-Passe</label>
                                    </div>
                                    <div class="col-sm-8 d-flex align-items-end">
                                        <input type="password" name="password" class="form-control changePasswordModalInput">
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-4 d-flex align-items-end">
                                        <label class="form-label">Confirmação de Palavra-Passe</label>
                                    </div>
                                    <div class="col-sm-8 d-flex align-items-end">
                                        <input type="password" name="passwordConfirmation" class="form-control changePasswordConfirmationModalInput">
                                    </div>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn btn-primary saveNewPasswordButton" name="saveNewPasswordButton" data-bs-dismiss="modal">Guardar Alterações</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3>Informação</h3>

                        <div class="row mb-5">
                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">Nome de Utilizador</label>
                            </div>
                            <div class="col-sm-4 d-flex align-items-end">
                                <input type="text" name="username" class="form-control userName" value="<?= $userInfo[0]['user_name'] ?>" disabled>
                                <button class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#usernameModal" aria-label="Edit Username" data-bs-original-title="Edit Username"><i class="bi bi-pencil-square"></i></button>
                            </div>

                            <div class="w-100 d-block mb-3"></div>

                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">Email</label>
                            </div>
                            <div class="col-sm-4 d-flex align-items-end">
                                <input type="email" name="email" class="form-control userEmail" value="<?= $userInfo[0]['user_email'] ?>" disabled>
                            </div>
                        </div>

                        <hr>

                        <h3>Palavra-Passe</h3>

                        <div class="row mb-5">
                            <div class="col-sm-2 d-flex align-items-end">
                                <button class="btn btn-secondary btn-w1" name="changePasswordModal" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Alterar Palavra-Passe</button>
                            </div>
                        </div>

                        <hr>

                        <h3>Personalização</h3>

                        <div class="row mb-5">

                            <div class="col-sm-2 d-flex align-items-center">
                                <label class="form-label m-0">Tema da Aplicação</label>
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

                        <h3>Zona de Perigo</h3>

                        <div class="row">
                            <div class="col-sm-2 d-flex align-items-end">
                                <button class="btn btn-danger btn-w1" name="deleteAccountButton">Apagar Conta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>