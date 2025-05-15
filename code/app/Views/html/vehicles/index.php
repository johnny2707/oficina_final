<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>
    
    <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title">O Meu Veículo</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-12">

                        <input type="text" class="form-control" placeholder="Select Vehicle" name="vehicleSelection" id="vehicleSelection">
                        
                        <div class="card rounded-3 mt-5">
                            <div class="card-body py-5">
                                <div id="vehicleData">
                                    <h3>Informação</h3>

                                    <div class="row mb-5">
                                        <div class="col-sm-2 d-flex align-items-end">
                                            <label class="form-label">Maticula</label>
                                        </div>
                                        <div class="col-sm-4 d-flex align-items-end">
                                            <input type="text" name="licensePlate" class="form-control" value="" disabled>
                                        </div>

                                        <div class="col-sm-2 d-flex align-items-end">
                                            <label class="form-label">Marca</label>
                                        </div>
                                        <div class="col-sm-4 d-flex align-items-end">
                                            <input type="text" name="brand" class="form-control" value="" disabled>
                                        </div>

                                        <div class="w-100 d-block mb-3"></div>

                                        <div class="col-sm-2 d-flex align-items-end">
                                            <label class="form-label">Modelo</label>
                                        </div>
                                        <div class="col-sm-4 d-flex align-items-end">
                                            <input type="text" name="model" class="form-control" value="" disabled>
                                        </div>
                                        
                                        <div class="col-sm-2 d-flex align-items-end">
                                            <label class="form-label">Ano</label>
                                        </div>
                                        <div class="col-sm-4 d-flex align-items-end">
                                            <input type="text" name="year" class="form-control" value="" disabled>
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