<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>
    
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-12">

                    <div class="card mb-1 rounded-3">
                        <div class="card-body bg-body-tertiary">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="my-5">Intervenção</h1>
                                </div>

                                <!-- Event Information -->
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Intervenção</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['event_id'] ?? '' ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Estado</label>
                                        <select class="form-control" id="event_status" onchange="changeEventStatus(this.value)">
                                            <option value="0" <?= ($data['event'][0]['event_status'] ?? '') == '0' ? 'selected' : '' ?>>Em espera</option>
                                            <option value="1" <?= ($data['event'][0]['event_status'] ?? '') == '1' ? 'selected' : '' ?>>Em progresso</option>
                                            <option value="2" <?= ($data['event'][0]['event_status'] ?? '') == '2' ? 'selected' : '' ?>>Finalizada</option>
                                        </select>
                                    </div>

                                    <script>
                                    function changeEventStatus(status) {
                                        const eventId = '<?= $data['event'][0]['event_id'] ?? '' ?>';
                                        
                                        fetch('<?= base_url('calendar/changeProgress') ?>', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-Requested-With': 'XMLHttpRequest'
                                            },
                                            body: JSON.stringify({
                                                event_id: eventId,
                                                progress: status
                                            })
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            console.log('Success:', data);
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            notyf.error('Erro ao atualizar estado');
                                        });
                                    }
                                    </script>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label class="form-label">Data</label>
                                        <input type="date" class="form-control" value="<?= $data['event'][0]['event_date'] ?? '' ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Início</label>
                                        <input type="time" class="form-control" value="<?= $data['event'][0]['event_start'] ?? '' ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Fim</label>
                                        <input type="time" class="form-control" value="<?= $data['event'][0]['event_end'] ?? '' ?>">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label">Observações</label>
                                        <textarea class="form-control" rows="3"><?= $data['event'][0]['event_observations'] ?? '' ?></textarea>
                                    </div>
                                </div>

                                <!-- Vehicle Information -->
                                 <div class="col-12">
                                    <h1 class="mb-5 mt-3">Veículo</h1>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Matrícula</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['vehicle_license_plate'] ?? '' ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Chassi</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['vehicle_chassi'] ?? '' ?>">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label class="form-label">Marca</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['vehicle_brand'] ?? '' ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Modelo</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['vehicle_model'] ?? '' ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Ano</label>
                                        <input type="number" class="form-control" value="<?= $data['event'][0]['vehicle_year'] ?? '' ?>">
                                    </div>
                                </div>

                                <!-- Service Information -->
                                
                                <div class="col-12">
                                    <h1 class="mb-3">Serviço</h1>
                                </div>
                            
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Código</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['service_code'] ?? '' ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nome</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['service_name'] ?? '' ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Preço (€)</label>
                                        <input type="number" step="0.01" class="form-control" value="<?= $data['event'][0]['service_price'] ?? '' ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Duração (minutos)</label>
                                        <input type="number" class="form-control" value="<?= $data['event'][0]['service_duration'] ?? '' ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label">Descrição</label>
                                        <textarea class="form-control" rows="3" readonly><?= $data['event'][0]['service_description'] ?? '' ?></textarea>
                                    </div>
                                </div>

                                <!-- Client Information -->
                                    <div class="col-12">
                                        <h1 class="mb-3">Cliente</h1>
                                    </div>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Código</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['client_code'] ?? '' ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nome</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['client_name'] ?? '' ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">NIF</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['client_nif'] ?? '' ?>" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Língua</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['client_language'] ?? '' ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label">Morada</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['client_address'] ?? '' ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <label class="form-label">Cidade</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['client_city'] ?? '' ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Código Postal</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['client_post_code'] ?? '' ?>" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">País</label>
                                        <input type="text" class="form-control" value="<?= $data['event'][0]['client_country'] ?? '' ?>" readonly>
                                    </div>
                                </div>

                                <!-- Products Information -->
                                    <div class="col-12">
                                        <h1 class="mb-3">Produtos</h1>
                                    </div>

                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Descrição</th>
                                                        <th>Preço (€)</th>
                                                        <th>Quantidade</th>
                                                        <th>Stock</th>
                                                        <th>Total (€)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($data['products']) && is_array($data['products'])): ?>
                                                        <?php foreach ($data['products'] as $product): ?>
                                                            <tr>
                                                                <td><?= $product['product_code'] ?? '' ?></td>
                                                                <td><?= $product['product_description'] ?? '' ?></td>
                                                                <td><?= number_format($product['product_price'] ?? 0, 2) ?></td>
                                                                <td><?= $product['product_quantity'] ?? 0 ?></td>
                                                                <td><?= $product['product_stock'] ?? 0 ?></td>
                                                                <td><?= number_format(($product['product_price'] ?? 0) * ($product['product_quantity'] ?? 0), 2) ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Work Hours Section -->
                                    <div class="col-12">
                                        <h1 class="mb-3">Horas de Trabalho Diárias</h1>
                                    </div>

                                <!-- Existing Work Hours Table -->
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="workHoursTable">
                                                <thead>
                                                    <tr>
                                                        <th>Data</th>
                                                        <th>Início</th>
                                                        <th>Fim</th>
                                                        <th>Total de Horas</th>
                                                        <th>Ações</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Existing work hours will be loaded here -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add New Work Hours -->
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label class="form-label">Data</label>
                                        <input type="date" class="form-control" id="work_date">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Início</label>
                                        <input type="time" class="form-control" id="work_start_time">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Fim</label>
                                        <input type="time" class="form-control" id="work_end_time">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">&nbsp;</label>
                                        <button type="button" class="btn btn-primary w-100" onclick="addWorkHours()">Adicionar Horas de Trabalho</button>
                                    </div>
                                </div>
                                

                                <!-- Add New Products Section -->
                                    <div class="col-12">
                                        <h1 class="mb-3">Adicionar Produtos Extra</h1>
                                    </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Código</label>
                                        <input type="text" class="form-control" id="new_product_code" placeholder="Código do Produto">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Descrição</label>
                                        <input type="text" class="form-control" id="new_product_description" placeholder="Descrição do Produto">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Preço (€)</label>
                                        <input type="number" step="0.01" class="form-control" id="new_product_price" placeholder="0.00">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Quantidade</label>
                                        <input type="number" class="form-control" id="new_product_quantity" placeholder="1">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">&nbsp;</label>
                                        <button type="button" class="btn btn-primary w-100" onclick="addProduct()">Adicionar Produto</button>
                                    </div>
                                </div>

                                <!-- Work Notes Section -->
                                    <div class="col-12">
                                        <h1 class="mb-3">Notas</h1>
                                    </div>

                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label">Notas (Uso Interno)</label>
                                        <textarea class="form-control" rows="4" name="work_notes" placeholder="Adiciona notas sobre o trabalho, problemas encontrados e outros..."></textarea>
                                    </div>
                                </div>

                                <script>
                                function addWorkHours() {
                                    const date = document.getElementById('work_date').value;
                                    const startTime = document.getElementById('work_start_time').value;
                                    const endTime = document.getElementById('work_end_time').value;
                                    
                                    if (!date || !startTime || !endTime) {
                                        notyf.error('Please fill all work hours fields');
                                        return;
                                    }
                                    
                                    // Calculate total hours
                                    const start = new Date('2000-01-01 ' + startTime);
                                    const end = new Date('2000-01-01 ' + endTime);
                                    const diff = (end - start) / (1000 * 60 * 60);
                                    const totalHours = diff > 0 ? diff.toFixed(1) : 0;
                                    
                                    const tableBody = document.querySelector('#workHoursTable tbody');
                                    const newRow = tableBody.insertRow();
                                    newRow.innerHTML = `
                                        <td>${date}</td>
                                        <td>${startTime}</td>
                                        <td>${endTime}</td>
                                        <td>${totalHours} hours</td>
                                        <td><button type="button" class="btn btn-danger" onclick="this.closest('tr').remove()"><i class="bi bi-trash"></i></button></td>
                                    `;
                                    
                                    // Clear form
                                    document.getElementById('work_date').value = '';
                                    document.getElementById('work_start_time').value = '';
                                    document.getElementById('work_end_time').value = '';
                                }

                                function addProduct() {
                                    const code = document.getElementById('new_product_code').value;
                                    const description = document.getElementById('new_product_description').value;
                                    const price = document.getElementById('new_product_price').value;
                                    const quantity = document.getElementById('new_product_quantity').value;
                                    
                                    if (!code || !description || !price || !quantity) {
                                        notyf.error('Please fill all product fields');
                                        return;
                                    }
                                    
                                    const table = document.querySelector('.table tbody');
                                    const newRow = table.insertRow();
                                    newRow.innerHTML = `
                                        <td>${code}</td>
                                        <td>${description}</td>
                                        <td>${parseFloat(price).toFixed(2)}</td>
                                        <td>${quantity}</td>
                                        <td>-</td>
                                        <td>${(parseFloat(price) * parseInt(quantity)).toFixed(2)}</td>
                                    `;
                                    
                                    // Clear form
                                    document.getElementById('new_product_code').value = '';
                                    document.getElementById('new_product_description').value = '';
                                    document.getElementById('new_product_price').value = '';
                                    document.getElementById('new_product_quantity').value = '';
                                }

                                // Calculate total work hours
                                document.addEventListener('DOMContentLoaded', function() {
                                    const startTime = document.querySelector('input[name="work_start_time"]');
                                    const endTime = document.querySelector('input[name="work_end_time"]');
                                    const totalHours = document.querySelector('input[name="total_hours"]');
                                    
                                    function calculateHours() {
                                        if (startTime && endTime && startTime.value && endTime.value) {
                                            const start = new Date('2000-01-01 ' + startTime.value);
                                            const end = new Date('2000-01-01 ' + endTime.value);
                                            const diff = (end - start) / (1000 * 60 * 60);
                                            if (totalHours) {
                                                totalHours.value = diff > 0 ? diff.toFixed(1) : 0;
                                            }
                                        }
                                    }
                                    
                                    if (startTime) startTime.addEventListener('change', calculateHours);
                                    if (endTime) endTime.addEventListener('change', calculateHours);
                                });
                                </script>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
        
<?= $this->endSection() ?>