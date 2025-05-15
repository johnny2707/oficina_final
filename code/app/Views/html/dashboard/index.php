<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12 row">
                <div id="" class="col-sm-12 col-md-8 bg-primary">
                    <div></div>
                </div>
                <div id="schedule" class="col-sm-12 col-md-4 p-3 bg-secondary">
                    <div class="card rounded-3 p-3">
                        <div id="dailySchedule"></div>
                    </div>
                </div>
                <div id="" class="col-sm-12 col-md-4 bg-success">
                    <div></div>
                </div>
                <div id="" class="col-sm-12 col-md-8 bg-danger">
                    <div></div>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>