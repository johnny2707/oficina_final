<?= $this->extend("html/template/index") ?>

<?= $this->section("content") ?>

<?php

    foreach ($userData->getResultArray() as $data) {
        $name       = $data['name'];
        $username   = $data['username'];
        $email      = $data['email'];
        $roleID     = $data['roleID'];
    }

?>

<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Utilizadores
                </div>
                <h2 class="page-title">Edição</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="name" value="<?=$name?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Nome de Utilizador</label>
                                    <input type="text" class="form-control" name="username" value="<?=$username?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?=$email?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Grupo de Permissões</label>
                                    <select class="form-select select-role" name="role" autocomplete="off">
                                        <option value="" selected>Selecione uma opção</option>
                                        <?php foreach ($allRoles as $roles) : ?>
                                            <option value="<?=$roles['id']?>" <?=$roles['id'] == $roleID ? 'selected' : ''?>><?=$roles['name']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary ms-auto submitButtonWebmovel updateUser" data-id="<?=$userID?>">Editar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>