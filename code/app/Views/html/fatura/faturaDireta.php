<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>
    
    <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title">Fatura Direta</h2>
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
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Matrícula</label></div>
                                    <div class="col-sm-3"><input type="text" id="vehicleSelect" name="veiculoMatricula" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Marca e Modelo</label></div>
                                    <div class="col-sm-8"><input type="text" name="veiculoMarca" class="form-control"></div>

                                    <div class="w-100 d-block mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Ano</label></div>
                                    <div class="col-sm-3"><input type="text" name="veiculoAno" class="form-control"></div>

                                    <div class="w-100 d-block d-md-none mb-3"></div>
                                
                                    <div class="col-sm-2 d-flex align-items-end"><label class="form-label">Quilómetros</label></div>
                                    <div class="col-sm-3"><input type="text" name="veiculoQuilometros" class="form-control"></div>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-tabs" id="pageNavigationTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                    class="nav-link active"
                                    id="fatura-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#fatura"
                                    type="button"
                                    role="tab"
                                    aria-controls="fatura"
                                    aria-selected="false"
                                >
                                    Fatura
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
                        </ul>
                        <div class="tab-content">
                            <div
                                class="tab-pane active py-3 bg-body-secondary border border-top-0 px-3"
                                id="fatura"
                                role="tabpanel"
                                aria-labelledby="fatura-tab"
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
                                
                                <div class="row pt-5">
                                    <div class="col-sm-2">Total Bruto</div>
                                    <div class="col-sm-10"><span id="totalBrutoValor">0</span>€</div>
                                    <hr class="my-2">
                                    <div class="col-sm-2">Desconto Global</div>
                                    <div class="col-sm-10"><span id="descontoGlobalValor">0</span>€</div>
                                    <hr class="my-2">
                                    <div class="col-sm-2">Total Liquido</div>
                                    <div class="col-sm-10"><span id="totalLiquidoValor">0</span>€</div>
                                    <hr class="my-2">
                                    <div class="col-sm-2"><b>TOTAL</b></div>
                                    <div class="col-sm-10"><span id="totalValor">0</span>€</div>
                                </div>
                            </div>

                            <div
                                class="tab-pane py-3 bg-body-secondary border border-top-0 px-3"
                                id="agendamento"
                                role="tabpanel"
                                aria-labelledby="agendamento-tab"
                            >

                                <div class="row">

                                    

                                </div>

                            </div>
                            
                            <div
                                class="tab-pane py-3 bg-body-secondary border border-top-0 px-3"
                                id="cliente"
                                role="tabpanel"
                                aria-labelledby="cliente-tab"
                            >

                                <div class="row">

                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?= $this->endSection() ?>