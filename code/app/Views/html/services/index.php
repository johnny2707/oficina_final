<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Ficha Técnica</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-4">
                    <div class="card-body bg-body-tertiary rounded-4">
                        <div class="form-group d-flex flex-row align-items-end gap-3 mb-3">
                            <label for="" class="form-label">Search</label>
                            <input type="text" id="searchService" class="form-control">
                        </div>
                    
                        <table id="serviceList" class="table table-responsive table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Duração</th>
                                    <th>Preço Final</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>