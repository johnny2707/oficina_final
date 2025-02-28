<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>
    
    <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title">Criar Evento</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card mb-1 rounded-3">
                            <div class="card-body bg-body-tertiary">
                                <div class="row">
                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">vehicle</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input type="text" id="selectVehicle" name="vehicleLicensePlate" class="form-control">
                                    </div>
                                    
                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">mechanic</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input type="text" id="selectMechanic" name="mechanicNumber" class="form-control">
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">type</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input type="text" name="eventType" class="form-control">
                                    </div>

                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">date</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input type="text" name="eventDate" class="form-control">
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">start</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input type="text" name="eventStart" class="form-control">
                                    </div>

                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">end</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input type="text" name="eventEnd" class="form-control">
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">description</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input type="text" name="eventDescription" class="form-control">
                                    </div>

                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">observations</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input type="text" name="EventObservations" class="form-control">
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>
                                </div>

                                <button type="button" class="btn btn-primary w-100">Criar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
<?= $this->endSection() ?>