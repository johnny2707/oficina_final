<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Utilizadores
                </div>
                <h2 class="page-title">Alterar Palavra-Passe</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Palavra-Passe Antiga</label>
                                    <input type="password" class="form-control" name="old-password">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Nova Palavra-Passe</label>
                                    <input type="password" class="form-control" name="new-password">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Confirmar Nova Palavra-Passe</label>
                                    <input type="password" class="form-control" name="confirm-new-password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary ms-auto submitButtonWebmovel updateMyPassword">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>