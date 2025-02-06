<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>
    
    <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title">Calendário</h2>
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
                                    <div id="schedule"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
<?= $this->endSection() ?>