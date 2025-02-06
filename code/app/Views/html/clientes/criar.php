<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>
    
    <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title">Criação de Cliente</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card mb-1">
                            <div class="card-body bg-body-tertiary">
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Código Cliente <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="clientCode" class="form-control clientCode"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Nome <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="clientName" class="form-control clientName"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Contribuinte <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="clientTaxPayer" class="form-control clientNif"></div>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs" id="pageNavigationTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active"
                                    id="informacao-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#informacao"
                                    type="button"
                                    role="tab"
                                    aria-controls="informacao"
                                    aria-selected="true"
                                >
                                    Informação
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link"
                                    id="veiculos-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#veiculos"
                                    type="button"
                                    role="tab"
                                    aria-controls="veiculos"
                                    aria-selected="false"
                                >
                                    Veículo
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content">
                                <div
                                class="tab-pane active pt-3 bg-body-secondary border border-top-0 px-3"
                                id="informacao"
                                role="tabpanel"
                                aria-labelledby="informacao-tab"
                            >
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Morada <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="clientAddress" class="form-control clientAddress" id="select"></div>

                                    <div class="w-100 d-md-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Localidade <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="clientCity" class="form-control clientCity"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Código Postal <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="clientPostCode" class="form-control clientPostCode"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">País <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="clientCountry" class="form-control clientCountry"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Destrito <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="clientCounty" class="form-control clientCounty"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Idioma</label></div>
                                    <div class="col-sm-3"><input type="text" name="clientLanguage" class="form-control clientLanguage"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Email <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="clientEmail" class="form-control clientEmail"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Telemóvel <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="tel" name="clientPhoneNumber" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" class="form-control clientPhoneNumber"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Grupo <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="clientGroup" class="form-control clientGroup"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                    
                                    <div class="col-sm-2 d-flex align-items-center"><label class="form-label">Observações</label></div>
                                    <div class="col-sm-8"><textarea type="text" name="clientObservations" class="form-control clientObservations"></textarea></div>

                                    <div class="w-100 d-block mb-3"></div>

                                </div>
                            </div>
                            <div
                                class="tab-pane pt-3 bg-body-secondary border border-top-0 px-3"
                                id="veiculos"
                                role="tabpanel"
                                aria-labelledby="veiculos-tab"
                            >
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Matrícula <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="vehicleLicensePlate" class="form-control vehicleLicensePlate" pattern="[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Marca <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="vehicleBrand" class="form-control vehicleBrand"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Modelo <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-8"><input type="text" name="vehicleModel" class="form-control vehicleModel"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Ano <sup class="text-danger">*</sup></label></div>
                                    <div class="col-sm-3"><input type="text" name="vehicleYear" class="form-control vehicleYear" pattern="[0-9]{4}"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Chassi</label></div>
                                    <div class="col-sm-3"><input type="text" name="vehicleChassi" class="form-control vehicleChassi"></div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2"><label class="form-label">Observações</label></div>
                                    <div class="col-sm-8"><textarea name="vehicleObservations" class="form-control vehicleObservations"></textarea></div>

                                    <div class="w-100 d-block mb-3"></div>
                                </div> 
                            </div>
                        </div>

                        <button type="button" class="btn btn-primary mt-5 registerClient" name="registerClient">registar cliente</button>
                    </div>
                </div>
            </div>
        </div>
        
<?= $this->endSection() ?>