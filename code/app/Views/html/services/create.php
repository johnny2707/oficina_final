<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Novo Serviço</h2>
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
                            
                            <form id="serviceForm" method="POST" action="<?= base_url('services/store') ?>">
                                <?= csrf_field() ?>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Nome do Serviço</label>
                                        <input type="text" class="form-control" id="service_name" name="name" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label">Preço</label>
                                        <div class="input-group">
                                            <span class="input-group-text">€</span>
                                            <input type="number" step="0.01" class="form-control" id="service_price" name="price" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Descrição</label>
                                        <textarea class="form-control" id="service_description" name="service_description" rows="4"></textarea>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="duration" class="form-label">Duração (minutos)</label>
                                        <input type="number" class="form-control" id="service_duration" name="duration">
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="form-label">Estado</label>
                                        <select class="form-select" id="service_status" name="status">
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Produtos Utilizados no Serviço</label>
                                        <div class="card">
                                            <div class="card-body">
                                                <div id="productsContainer">
                                                    <!-- Products will be added here dynamically -->
                                                </div>
                                                <button type="button" class="btn btn-outline-primary" id="addProductBtn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler-plus" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="m0 0h24v24H0z" fill="none"></path>
                                                        <path d="m12 5l0 14"></path>
                                                        <path d="m5 12l14 0"></path>
                                                    </svg>
                                                    Adicionar Produto
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
document.addEventListener('DOMContentLoaded', function() {
    let productIndex = 0;
    let productsData = [];
    
    // Pre-load products data
    fetch('<?= base_url('products/getAllProducts') ?>')
        .then(response => response.json())
        .then(data => {
            data.forEach(element => {
                console.log(element);
                
                // Fixed: Match the field names with TomSelect configuration
                var newItem = {
                    id: element.product_id,           // Changed from 'value' to 'id'
                    name: element.product_description  // Changed from 'text' to 'name'
                };
                productsData.push(newItem);
            });
            console.log('Products loaded:', productsData);
        })
        .catch(error => {
            console.error('Error loading products:', error);
        });
    
    document.getElementById('addProductBtn').addEventListener('click', function() {
        const container = document.getElementById('productsContainer');
        
        const productRow = document.createElement('div');
        productRow.className = 'row mb-2 product-row';
        productRow.innerHTML = `
            <div class="col-md-5">
                <select class="form-select product-select" name="products[${productIndex}][product_id]" required>
                    <option value="">Selecionar Produto</option>
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" step="0.01" class="form-control product-quantity" name="products[${productIndex}][product_quantity]" placeholder="Quantidade" min="0.01" required>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-outline-danger remove-product">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        `;

        container.appendChild(productRow);
        
        const newSelect = productRow.querySelector('.product-select');
        
        if (newSelect) {
            // Ensure products are loaded before initializing TomSelect
            if (productsData.length === 0) {
                console.warn('Products data not yet loaded. Consider showing a loading indicator.');
            }
            
            requestAnimationFrame(() => {
                try {
                    const tomSelectInstance = new TomSelect(newSelect, {
                        valueField: 'id',
                        labelField: 'name',
                        searchField: 'name',
                        placeholder: 'Selecionar Produto',
                        options: productsData,
                        create: false,
                        // Added configurations for better UX
                        maxItems: 1,
                        closeAfterSelect: true,
                        // Ensure dropdown appears above other elements
                        dropdownParent: 'body',
                        render: {
                            option: function(data, escape) {
                                return '<div>' + escape(data.name) + '</div>';
                            },
                            item: function(data, escape) {
                                return '<div>' + escape(data.name) + '</div>';
                            }
                        }
                    });
                    
                    // Store the instance for cleanup
                    newSelect.tomSelectInstance = tomSelectInstance;
                    
                } catch (error) {
                    console.error('Error initializing TomSelect:', error);
                }
            });
        }
        
        productIndex++;
        
        // Add event listener for remove button
        const removeBtn = productRow.querySelector('.remove-product');
        if (removeBtn) {
            removeBtn.addEventListener('click', function() {
                const selectElement = productRow.querySelector('.product-select');
                // Fixed: Use the stored instance instead of .tomselect
                if (selectElement && selectElement.tomSelectInstance) {
                    selectElement.tomSelectInstance.destroy();
                }
                productRow.remove();
            });
        }
    });

});
                                </script>
                            </form>
                        
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary w-100 mt-3 createServiceBtn" id="createServiceBtn">Criar</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>