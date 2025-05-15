<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Produtos</h2>
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
                            <label for="" class="form-label">Procurar</label>
                            <input type="text" id="searchProduct" class="form-control">
                        </div>
                    
                        <table id="productList" class="table table-responsive table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Preço</th>
                                    <th>Unidade</th>
                                    <th>Stock</th>
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