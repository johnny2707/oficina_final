<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Utilizadores</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="<?=base_url('users/create')?>" class="btn btn-primary">
                        Criar Novo Utilizador
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body" style="padding: 0;">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter usersTable">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Utilizador</th>
                                <th>Email</th>
                                <th>Grupo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>