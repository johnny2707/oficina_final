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
                                        <input type="date" class="form-control" id="inputAddress" placeholder="Data de Entrada">
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
                                        <label for="inputAddress" class="form-label">Type</label>
                                        <input type="text" class="form-control" id="inputAddress" placeholder="Type">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs" id="pageNavigationTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="servicos-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#servicos"
                            type="button"
                            role="tab"
                            aria-controls="servicos"
                            aria-selected="false"
                        >
                            Serviços
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="cliente-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#cliente"
                            type="button"
                            role="tab"
                            aria-controls="cliente"
                            aria-selected="false"
                        >
                            Cliente
                        </button>
                    </li> 
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="veiculo-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#veiculo"
                            type="button"
                            role="tab"
                            aria-controls="veiculo"
                            aria-selected="false"
                        >
                            Veículo
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="agendamento-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#agendamento"
                            type="button"
                            role="tab"
                            aria-controls="agendamento"
                            aria-selected="false"
                        >
                            Agendamento
                        </button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div
                        class="tab-pane active py-3 bg-body-secondary border border-top-0 px-3"
                        id="servicos"
                        role="tabpanel"
                        aria-labelledby="servicos-tab"
                    >
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Código</th>
                                        <th scope="col">Descrição</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Unidade</th>
                                        <th scope="col">Preço s/IVA</th>
                                        <th scope="col">Desconto</th>
                                        <th scope="col">Preço</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <tr draggable="false">
                                        <td scope="row"><input class="form-control serviceSelect" type="text" name="serviceSelect" id="serviceSelect"></td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div
                        class="tab-pane py-3 bg-body-secondary border border-top-0 px-3"
                        id="cliente"
                        role="tabpanel"
                        aria-labelledby="cliente-tab"
                    >

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="clientName" class="form-label">Name</label>
                                    <input type="text" class="form-control clientName" id="clientName" placeholder="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="clientNif" class="form-label">Nif</label>
                                    <input type="text" class="form-control clientNif" id="clientNif" placeholder="nif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="clientAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control clientAddress" id="selectVehicle" placeholder="address">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="clientCity" class="form-label">City</label>
                                    <input type="text" class="form-control clientCity" id="clientCity" placeholder="city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="clientPostCode" class="form-label">Post Code</label>
                                    <input type="text" class="form-control clientPostCode" id="clientPostCode" placeholder="post code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="clientCounty" class="form-label">County</label>
                                    <input type="text" class="form-control clientCounty" id="clientCounty" placeholder="county">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="clientCountry" class="form-label">Country</label>
                                    <input type="text" class="form-control clientCountry" id="clientCountry" placeholder="country">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="clientPhoneNumber" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control clientPhoneNumber" id="clientPhoneNumber" placeholder="phone number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="clientEmail" class="form-label">Email</label>
                                    <input type="text" class="form-control clientEmail" id="clientEmail" placeholder="email">
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div
                        class="tab-pane py-3 bg-body-secondary border border-top-0 px-3"
                        id="veiculo"
                        role="tabpanel"
                        aria-labelledby="veiculo-tab"
                    >

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="vehicleBrand" class="form-label">Brand</label>
                                    <input type="text" class="form-control vehicleBrand" id="vehicleBrand" placeholder="brand">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="vehicleModel" class="form-label">Model</label>
                                    <input type="text" class="form-control vehicleModel" id="vehicleModel" placeholder="model">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="vehicleYear" class="form-label">Year</label>
                                    <input type="text" class="form-control vehicleYear" id="vehicleYear" placeholder="year">
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
                                    <label for="vehicleChassi" class="form-label">Chassi</label>
                                    <input type="text" class="form-control vehicleChassi" id="vehicleChassi" placeholder="chassi">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div
                        class="tab-pane py-3 bg-body-secondary border border-top-0 px-3"
                        id="agendamento"
                        role="tabpanel"
                        aria-labelledby="agendamento-tab"
                    >
                        
                        <div class="row">
                            
                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">Mechanic</label>
                            </div>
                            <div class="col-sm-4 d-flex align-items-end">
                                <input type="text" id="selectMechanic" name="mechanicNumber" class="form-control">
                            </div>

                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">Date</label>
                            </div>
                            <div class="col-sm-4 d-flex align-items-end">
                                <input type="date" id="eventDate" name="eventDate" class="form-control">
                            </div>

                            <div class="w-100 d-block mb-3"></div>

                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">Start</label>
                            </div>
                            <div class="col-sm-4 d-flex align-items-end">
                                <input type="time" id="eventStart" name="eventStart" class="form-control">
                            </div>

                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">End</label>
                            </div>
                            <div class="col-sm-4 d-flex align-items-end">
                                <input type="time" id="eventEnd" name="eventEnd" class="form-control">
                            </div>

                            <div class="w-100 d-block mb-3"></div>

                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">Description</label>
                            </div>
                            <div class="col-sm-10 d-flex align-items-end">
                                <input type="text" id="eventDescription" name="eventDescription" class="form-control">
                            </div>

                            <div class="w-100 d-block mb-3"></div>

                            <div class="col-sm-2 d-flex align-items-end">
                                <label class="form-label">Observations</label>
                            </div>
                            <div class="col-sm-10 d-flex align-items-end">
                                <textarea type="text" id="eventObservations" name="eventObservations" class="form-control" style="min-height: 5rem; field-sizing: content;"></textarea>
                            </div>

                            <div class="w-100 d-block mb-3"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>