<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-12 row">
                <div id="" class="col-sm-12 col-md-8 p-3">
                    <div class="card rounded-3 p-3">

                        <h3 class="text-dark mb-3">Vehicle Work Queue</h3>
                        
                        <!-- Vehicle Selection List -->
                        <div id="vehicle-list" class="vehicle-selection">
                            <?php if (isset($vehicles) && !empty($vehicles)): ?>
                                <?php foreach ($vehicles as $vehicle): ?>
                                    <div class="card mb-3 vehicle-card" data-vehicle-id="<?= $vehicle['vehicle_id'] ?>" style="cursor: pointer;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5 class="card-title mb-1"><?= esc($vehicle['vehicle_brand']) ?> <?= esc($vehicle['vehicle_model']) ?></h5>
                                                    <p class="card-text text-muted mb-1">License: <?= esc($vehicle['vehicle_license_plate']) ?></p>
                                                </div>
                                                <span class="badge bg-warning">Pending</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="text-center text-muted p-3">
                                    <i class="fas fa-car fa-2x mb-2"></i>
                                    <p>No vehicles in queue</p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Work Interface (Hidden by default) -->
                        <div id="work-interface" class="work-interface" style="display: none;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 id="current-vehicle-title" class="text-dark mb-0"></h4>
                                <button class="btn btn-outline-secondary btn-sm" onclick="backToVehicleList()">
                                    <i class="fas fa-arrow-left"></i> Back
                                </button>
                            </div>
                            
                            <div class="alert alert-info">
                                <strong>Status:</strong> <span class="badge bg-primary">Working</span>
                            </div>

                            <!-- Service Steps -->
                            <div class="mb-4">
                                <h5>Service Steps</h5>
                                <div id="service-steps" class="list-group">
                                    <!-- Steps will be loaded dynamically -->
                                </div>
                            </div>

                            <!-- Products Required -->
                            <div class="mb-4">
                                <h5>Required Products</h5>
                                <div id="required-products" class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Products will be loaded dynamically -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Complete Work Button -->
                            <button class="btn btn-success" onclick="completeWork()">
                                <i class="fas fa-check"></i> Complete Work
                            </button>
                        </div>
                    </div>

                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const vehicleCards = document.querySelectorAll('.vehicle-card');
                        
                        vehicleCards.forEach(card => {
                            card.addEventListener('click', function() {
                                const vehicleId = this.getAttribute('data-vehicle-id');
                                console.log('Selected Vehicle ID:', vehicleId);
                                selectVehicle(vehicleId);
                            });
                        });
                    });

                    function selectVehicle(vehicleId) {
                        // Update vehicle status to working
                        fetch('/services/start-work', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify({vehicle_id: vehicleId})
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Hide vehicle list and show work interface
                                document.getElementById('vehicle-list').style.display = 'none';
                                document.getElementById('work-interface').style.display = 'block';
                                
                                // Update interface with vehicle data
                                document.getElementById('current-vehicle-title').textContent = 
                                    `${data.vehicle.make} ${data.vehicle.model} - ${data.vehicle.license_plate}`;
                                
                                // Load service steps
                                loadServiceSteps(data.service_steps);
                                
                                // Load required products
                                loadRequiredProducts(data.products);
                            }
                        });
                    }

                    function loadServiceSteps(steps) {
                        const container = document.getElementById('service-steps');
                        container.innerHTML = '';
                        
                        steps.forEach((step, index) => {
                            const stepElement = document.createElement('div');
                            stepElement.className = 'list-group-item d-flex justify-content-between align-items-center';
                            stepElement.innerHTML = `
                                <div>
                                    <span class="fw-bold">${index + 1}.</span> ${step.description}
                                </div>
                                <input type="checkbox" class="form-check-input" onchange="updateStepStatus(${step.id}, this.checked)">
                            `;
                            container.appendChild(stepElement);
                        });
                    }

                    function loadRequiredProducts(products) {
                        const tbody = document.querySelector('#required-products tbody');
                        tbody.innerHTML = '';
                        
                        products.forEach(product => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${product.name}</td>
                                <td>${product.quantity}</td>
                                <td><span class="badge bg-secondary">Pending</span></td>
                            `;
                            tbody.appendChild(row);
                        });
                    }

                    function backToVehicleList() {
                        document.getElementById('work-interface').style.display = 'none';
                        document.getElementById('vehicle-list').style.display = 'block';
                    }

                    function updateStepStatus(stepId, completed) {
                        fetch('/dashboard/update-step', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify({step_id: stepId, completed: completed})
                        });
                    }

                    function completeWork() {
                        if (confirm('Are you sure you want to complete this work?')) {
                            // Handle work completion
                            fetch('/dashboard/complete-work', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    backToVehicleList();
                                    location.reload(); // Refresh to update vehicle list
                                }
                            });
                        }
                    }
                    </script>
                </div>

                <div id="schedule" class="col-sm-12 col-md-4 p-3">
                    <div class="card rounded-3 p-3">
                        <h3 class="text-dark mb-3">Low Stock Products</h3>
                        <div class="list-group">
                            <?php if (isset($lowStockProducts) && !empty($lowStockProducts)): ?>
                                <?php foreach (array_slice($lowStockProducts, 0, 5) as $product): ?>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1"><?= esc($product['product_description']) ?></h6>
                                            <small class="text-muted">SKU: <?= esc($product['product_code']) ?></small>
                                        </div>
                                        <span class="badge bg-danger rounded-pill"><?= $product['product_stock'] ?></span>
                                    </div>
                                <?php endforeach; ?>
                                <?php if (count($lowStockProducts) > 5): ?>
                                    <div class="list-group-item text-center">
                                        <small class="text-muted">Showing 5 of <?= count($lowStockProducts) ?> products</small>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="text-center text-muted p-3">
                                    <i class="fas fa-check-circle fa-2x mb-2"></i>
                                    <p>All products have sufficient stock</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>