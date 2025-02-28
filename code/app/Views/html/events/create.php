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
                                        <input type="text" id="selectType" name="eventType" class="form-control">
                                    </div>

                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">date</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input type="date" id="eventDate" name="eventDate" class="form-control">
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">start</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input type="time" id="eventStart" name="eventStart" class="form-control">
                                    </div>

                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">end</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-end">
                                        <input type="time" id="eventEnd" name="eventEnd" class="form-control">
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">description</label>
                                    </div>
                                    <div class="col-sm-10 d-flex align-items-end">
                                        <input type="text" id="eventDescription" name="eventDescription" class="form-control">
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>

                                    <div class="col-sm-2 d-flex align-items-end">
                                        <label class="form-label">observations</label>
                                    </div>
                                    <div class="col-sm-10 d-flex align-items-end">
                                        <textarea type="text" id="eventObservations" name="eventObservations" class="form-control" style="min-height: 5rem; field-sizing: content;"></textarea>
                                    </div>

                                    <div class="w-100 d-block mb-3"></div>
                                </div>

                                <button type="button" class="btn btn-primary w-100 createEventButton">Criar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
<?= $this->endSection() ?>