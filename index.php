<?php

include_once 'model/Conexao.class.php';
include_once 'model/Manager.class.php';

$manager = new Manager();

?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once 'view/dependencias.php'; ?>
</head>
<body>
<div class="container">
    <h2 class="text-center">
        List of Clients <i class="fa fa-list"></i>
    </h2>
    <h5 class="text-right">
        <a href="view/page_register.php" class="btn btn-primary btn-xs">
            <i class="fa fa-user-plus"></i>
        </a>
    </h5>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead">
            <tr>
                <th>ID</th>
                <th>Descricão</th>
                <th>Data Da Conta Pagamento</th>
                <th>Valor</th>
                <th></th>
                <th>AÇÕES</th>
                <th>Excluir</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($manager->listClient("agendamento") as $client): ?>
                <tr>
                    <td><?php echo $client['id']; ?></td>
                    <td><?php echo $client['descricao']; ?></td>
                    <td><?php echo $client['data_pagamento']; ?></td>
                    <td><?php echo $client['valor']; ?></td>
                    <td></td>
                    <td>
                        <form method="POST" action="view/page_update.php">

                            <input type="hidden" name="id" value="<?= $client['id'] ?>">

                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-user-edit"></i>
                            </button>

                        </form>
                    </td>
                    <td>
                        <form method="POST" action="controller/delete_client.php"
                              onclick="return confirm('Você tem certeza que deseja excluir ?');">

                            <input type="hidden" name="id" value="<?= $client['id'] ?>">

                            <button class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </button>

                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
    </div>
</body>
</html>