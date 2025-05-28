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

                        <!-- <?php echo '<pre>'; print_r($interventionsData); ?> -->
                        
                        <?php if (!empty($interventionsData)): ?>
                            <?php foreach ($interventionsData as $vehicleData): ?>
                                <?php if (!empty($vehicleData['event'])): ?>
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <i class="ti ti-car me-2"></i>
                                                Veículo: <?= htmlspecialchars($vehicleData['license_plate']) ?>
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <?php foreach ($vehicleData['event'] as $event): ?>
                                                <?php
                                                // Calculate service duration in hours
                                                $startTime = new DateTime($event['event_start']);
                                                $endTime = new DateTime($event['event_end']);
                                                $duration = $startTime->diff($endTime);
                                                $hours = $duration->h + ($duration->i / 60); // Convert minutes to decimal hours
                                                
                                                // Calculate service total (price * hours)
                                                $serviceTotal = $event['service_price'] * $hours;
                                                
                                                // Calculate products total
                                                $productsTotal = 0;
                                                if (!empty($vehicleData['products'])) {
                                                    foreach ($vehicleData['products'] as $product) {
                                                        $productsTotal += $product['product_price'] * $product['product_quantity'];
                                                    }
                                                }
                                                
                                                // Calculate grand total
                                                $grandTotal = $serviceTotal + $productsTotal;
                                                
                                                // Get status badge
                                                $statusBadge = '';
                                                $statusText = '';
                                                switch($event['event_status']) {
                                                    case 1:
                                                        $statusBadge = 'bg-warning';
                                                        $statusText = 'Pendente';
                                                        break;
                                                    case 2:
                                                        $statusBadge = 'bg-success';
                                                        $statusText = 'Concluído';
                                                        break;
                                                    default:
                                                        $statusBadge = 'bg-secondary';
                                                        $statusText = 'Desconhecido';
                                                }
                                                ?>
                                                
                                                <div class="border-bottom pb-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h4 class="mb-2"><?= htmlspecialchars($event['service_name']) ?></h4>
                                                            <p class="text-muted mb-1">
                                                                <strong>Código:</strong> <?= htmlspecialchars($event['service_code']) ?>
                                                            </p>
                                                            <p class="text-muted mb-1">
                                                                <strong>Descrição:</strong> <?= htmlspecialchars($event['service_description']) ?>
                                                            </p>
                                                            <p class="text-muted mb-1">
                                                                <strong>Preço/Hora:</strong> €<?= number_format($event['service_price'], 2, ',', '.') ?>
                                                            </p>
                                                            <p class="text-muted mb-1">
                                                                <strong>Duração:</strong> <?= number_format($hours, 2, ',', '.') ?> horas
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1">
                                                                <strong>Data:</strong> <?= date('d/m/Y', strtotime($event['event_date'])) ?>
                                                            </p>
                                                            <p class="mb-1">
                                                                <strong>Horário:</strong> <?= date('H:i', strtotime($event['event_start'])) ?> - <?= date('H:i', strtotime($event['event_end'])) ?>
                                                            </p>
                                                            <p class="mb-1">
                                                                <strong>Estado:</strong> 
                                                                <span class="badge <?= $statusBadge ?>"><?= $statusText ?></span>
                                                            </p>
                                                            <p class="mb-1">
                                                                <strong>Veículo:</strong> <?= htmlspecialchars($event['vehicle_brand']) ?> <?= htmlspecialchars($event['vehicle_model']) ?> (<?= htmlspecialchars($event['vehicle_year']) ?>)
                                                            </p>
                                                        </div>
                                                    </div>
                                                    
                                                    <?php if (!empty($vehicleData['products'])): ?>
                                                        <div class="mt-3">
                                                            <h5>Produtos Utilizados:</h5>
                                                            <div class="table-responsive">
                                                                <table class="table table-sm">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Código</th>
                                                                            <th>Descrição</th>
                                                                            <th>Quantidade</th>
                                                                            <th>Preço Unit.</th>
                                                                            <th>Total</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($vehicleData['products'] as $product): ?>
                                                                            <tr>
                                                                                <td><?= htmlspecialchars($product['product_code']) ?></td>
                                                                                <td><?= htmlspecialchars($product['product_description']) ?></td>
                                                                                <td><?= htmlspecialchars($product['product_quantity']) ?></td>
                                                                                <td>€<?= number_format($product['product_price'], 2, ',', '.') ?></td>
                                                                                <td>€<?= number_format($product['product_price'] * $product['product_quantity'], 2, ',', '.') ?></td>
                                                                            </tr>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    
                                                    <!-- Total Summary -->
                                                    <div class="mt-3 p-3 bg-light rounded">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <h5 class="mb-0">Resumo da Intervenção</h5>
                                                            </div>
                                                            <div class="col-md-4 text-end">
                                                                <p class="mb-1"><strong>Serviço (<?= number_format($hours, 2, ',', '.') ?>h):</strong> €<?= number_format($serviceTotal, 2, ',', '.') ?></p>
                                                                <p class="mb-1"><strong>Produtos:</strong> €<?= number_format($productsTotal, 2, ',', '.') ?></p>
                                                                <hr class="my-2">
                                                                <h5 class="mb-0 text-primary"><strong>Total:</strong> €<?= number_format($grandTotal, 2, ',', '.') ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p class="text-muted">Não foram encontradas intervenções para os seus veículos.</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
<?= $this->endSection() ?>