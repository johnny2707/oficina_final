<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>
    
    <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title">Lista de Clientes</h2>
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
                                    <input type="text" id="searchClient" class="form-control">
                                </div>
                            
                                <table id="clientList" class="table table-responsive table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>NIF</th>
                                            <th>Nome</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal modal-xl fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-2" id="exampleModalLabel">Consulta de Cliente</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card mb-1">
                                            <div class="card-body bg-body-tertiary">
                                                <div class="row">
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Código Cliente</label></div>
                                                    <div class="col-sm-3"><input type="text" name="clientCode" class="form-control clientCode" disabled></div>

                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Contribuinte</label></div>
                                                    <div class="col-sm-3"><input type="text" name="clientTaxPayer" class="form-control clientNif" disabled></div>

                                                    <div class="w-100 d-block mb-3"></div>
                                                
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Nome</label></div>
                                                    <div class="col-sm-8"><input type="text" name="clientName" class="form-control clientName" disabled></div>

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
                                                    id="contactos-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#contactos"
                                                    type="button"
                                                    role="tab"
                                                    aria-controls="contactos"
                                                    aria-selected="false"
                                                >
                                                    Contacto
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
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Morada</label></div>
                                                    <div class="col-sm-8"><input type="text" name="clientAddress" class="form-control clientAddress" id="select" disabled></div>

                                                    <div class="w-100 d-md-block mb-3"></div>
                                                
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Localidade</label></div>
                                                    <div class="col-sm-8"><input type="text" name="clientCity" class="form-control clientCity" disabled></div>

                                                    <div class="w-100 d-block mb-3"></div>
                                                
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Código Postal</label></div>
                                                    <div class="col-sm-3"><input type="text" name="clientPostCode" class="form-control clientPostCode" disabled></div>

                                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                                
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">País</label></div>
                                                    <div class="col-sm-3"><input type="text" name="clientCountry" class="form-control clientCountry" disabled></div>

                                                    <div class="w-100 d-block mb-3"></div>
                                                
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Destrito</label></div>
                                                    <div class="col-sm-3"><input type="text" name="clientCounty" class="form-control clientCounty" disabled></div>

                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Idioma</label></div>
                                                    <div class="col-sm-3"><input type="text" name="clientLanguage" class="form-control clientLanguage" disabled></div>

                                                    <div class="w-100 d-block mb-3"></div>

                                                    <div class="col-sm-2 d-flex align-items-center"><label class="form-label">Observações</label></div>
                                                    <div class="col-sm-8"><textarea type="text" name="clientObservations" class="form-control clientObservations" disabled></textarea></div>

                                                    <div class="w-100 d-block mb-3"></div>

                                                </div>
                                            </div>
                                            <div
                                                class="tab-pane pt-3 bg-body-secondary border border-top-0 px-3"
                                                id="contactos"
                                                role="tabpanel"
                                                aria-labelledby="contactos-tab"
                                            >
                                                <div class="row">
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Contacto</label></div>
                                                    <div class="col-sm-8"><input type="text" name="" class="form-control" id="selectContacto"></div>

                                                    <div class="w-100 d-block mb-3"></div>
                                                
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Email</label></div>
                                                    <div class="col-sm-8"><input type="text" name="contactEmail" class="form-control contactEmail" disabled></div>

                                                    <div class="w-100 d-block mb-3"></div>
                                                
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Mobile Number</label></div>
                                                    <div class="col-sm-3"><input type="text" name="contactMobileNumber" class="form-control contactMobileNumber" disabled></div>
                                                
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Phone Number</label></div>
                                                    <div class="col-sm-3"><input type="text" name="contactPhoneNumber" class="form-control contactPhoneNumber" disabled></div>

                                                    <div class="w-100 d-block mb-3"></div>

                                                    <div class="col-sm-2 d-flex align-items-center"><label class="form-label">Observações</label></div>
                                                    <div class="col-sm-8"><textarea type="text" name="contactObservations" class="form-control contactObservations" disabled></textarea></div>

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
                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Matrícula</label></div>
                                                    <div class="col-sm-3"><input type="text" id="selectVehicle" class="form-control selectVehicle" pattern="[A-Z0-9]{2}-[A-Z0-9]{2}-[A-Z0-9]{2}"></div>

                                                    <div class="w-100 d-block d-md-none mb-3"></div>

                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Marca</label></div>
                                                    <div class="col-sm-3"><input type="text" name="vehicleBrand" class="form-control vehicleBrand" disabled></div>

                                                    <div class="w-100 d-block mb-3"></div>

                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Modelo</label></div>
                                                    <div class="col-sm-8"><input type="text" name="vehicleModel" class="form-control vehicleModel" disabled></div>

                                                    <div class="w-100 d-block mb-3"></div>

                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Ano</label></div>
                                                    <div class="col-sm-3"><input type="text" name="vehicleYear" class="form-control vehicleYear" pattern="[0-9]{4}" disabled></div>

                                                    <div class="w-100 d-block d-md-none mb-3"></div>

                                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Chassi</label></div>
                                                    <div class="col-sm-3"><input type="text" name="vehicleChassi" class="form-control vehicleChassi" disabled></div>

                                                    <div class="w-100 d-block mb-3"></div>

                                                    <div class="col-sm-2"><label class="form-label">Observações</label></div>
                                                    <div class="col-sm-8"><textarea name="vehicleObservations" class="form-control vehicleObservations" disabled></textarea></div>

                                                    <div class="w-100 d-block mb-3"></div>
                                                </div> 
                                            </div>
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