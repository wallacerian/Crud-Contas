<?php

include_once '../model/Conexao.class.php';
include_once '../model/Manager.class.php';
include_once 'dependencias.php';

$manager = new Manager();

$id = $_POST['id'];

?>

<h2 class="text-center">
    Page of Update <i class="fa fa-user-edit"></i>
</h2>
<hr>

<form method="POST" action="../controller/update_client.php">

    <div class="container">
        <div class="form-row">

            <?php foreach ($manager->getInfo("agendamento", $id) as $client_info): ?>

            <div class="col-md-6">
                descricao:
                <input class="form-control" type="text" name="descricao" required autofocus
                       value="<?= $client_info['descricao'] ?>"><br>
            </div>

            <div class="col-md-4">
                Data Pagamento:
                <input class="form-control" type="tel" id="data_pagamento" name="data_pagamento" required
                       id="data_pagamento" value="<?= $client_info['data_pagamento'] ?>"><br>
            </div>


            <div class="col-md-4">
                Valor:
                <input class="form-control" type="text" id="valor" name="valor" required value="<?= $client_info['valor'] ?>" onKeyPress="return(MascaraMoeda(this,'.',',',event))"><br>
            </div>
              <div clear="both" ></divclear>
            <div class="col-md-4">

                <input type="hidden" name="id" value="<?= $client_info['id'] ?>">

                <?php endforeach; ?>

                <button class="btn btn-warning btn-lg">
                    Editar <i class="fa fa-user-edit"></i>
                </button>
                <br><br>

                <a href="../index.php">
                    Voltar
                </a>

            </div>

        </div>
    </div>

</form>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#data_pagamento').mask('99/99/9999');
        $('#data_vencimento').mask('99/99/9999');
        return false;
    });

    function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e) {
        var sep = 0;
        var key = '';
        var i = j = 0;
        var len = len2 = 0;
        var strCheck = '0123456789';
        var aux = aux2 = '';
        var whichCode = (window.Event) ? e.which : e.keyCode;
        if (whichCode == 13) return true;
        key = String.fromCharCode(whichCode); // Valor para o código da Chave
        if (strCheck.indexOf(key) == -1) return false; // Chave inválida
        len = objTextBox.value.length;
        for (i = 0; i < len; i++)
            if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
        aux = '';
        for (; i < len; i++)
            if (strCheck.indexOf(objTextBox.value.charAt(i)) != -1) aux += objTextBox.value.charAt(i);
        aux += key;
        len = aux.length;
        if (len == 0) objTextBox.value = '';
        if (len == 1) objTextBox.value = '0' + SeparadorDecimal + '0' + aux;
        if (len == 2) objTextBox.value = '0' + SeparadorDecimal + aux;
        if (len > 2) {
            aux2 = '';
            for (j = 0, i = len - 3; i >= 0; i--) {
                if (j == 3) {
                    aux2 += SeparadorMilesimo;
                    j = 0;
                }
                aux2 += aux.charAt(i);
                j++;
            }
            objTextBox.value = '';
            len2 = aux2.length;
            for (i = len2 - 1; i >= 0; i--)
                objTextBox.value += aux2.charAt(i);
            objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
        }
        return false;
    }
</script>