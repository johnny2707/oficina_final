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
                        <form id="createProductForm" method="post" action="/products/create">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="productCode" class="form-label">Código</label>
                                        <input type="text" class="form-control" id="productCode" name="productCode" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="productPrice" class="form-label">Preço</label>
                                        <input type="number" step="0.01" class="form-control" id="productPrice" name="productPrice" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">Descrição</label>
                                <input type="text" class="form-control" id="productDescription" name="productDescription" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="productUnit" class="form-label">Unidade</label>
                                        <input type="text" class="form-control" id="selectUnit" name="productUnit" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="productStock" class="form-label">Stock</label>
                                        <input type="number" class="form-control" id="productStock" name="productStock" required>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3 createProductButton">Criar Produto</button>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>