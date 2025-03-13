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
                <div class="card rounded-3 mb-3">
                    <div class="card-body py-5 row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="selectProduct" placeholder="Produto">

                            <div class="mb-5 w-100"></div>

                            <div class="row">

                                <div class="col-sm-2 d-flex align-items-end">
                                    <label for="inputName" class="form-label">Código</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputName" placeholder="Código">
                                </div>

                                <div class="col-sm-2 d-flex align-items-end">
                                    <label for="inputName" class="form-label">Preço</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputName" placeholder="Preço">
                                </div>

                                <div class="mb-3 w-100"></div>

                                <div class="col-sm-2 d-flex align-items-end">
                                    <label for="inputName" class="form-label">Unidade</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputName" placeholder="Unidade">
                                </div>

                                <div class="col-sm-2 d-flex align-items-end">
                                    <label for="inputName" class="form-label">Stock</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputName" placeholder="Stock">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>