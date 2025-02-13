<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Ficha de Reparação</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12">
                <div class="card rounded-3">
                    <div class="card-body py-5 row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Cliente</label>
                                        <input type="text" class="form-control selectClient" id="selectClient" placeholder="Cliente">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Data de Entrada</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Data de Entrada">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Matrícula</label>
                                        <input type="text" class="form-control selectVehicle" id="selectVehicle" placeholder="Matrícula">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Km</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Km">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Observações</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Peças a Substituir</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Trabalhos a Realizar</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Preço</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Preço">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Data de Saída</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Data de Saída">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Estado</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Selecione o Estado</option>
                                            <option value="1">Em Reparação</option>
                                            <option value="2">Reparado</option>
                                            <option value="3">Entregue</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="inputAddress" class="form-label">Observações</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
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