<?php include_once 'dependencias.php'; ?>

<h2 class="text-center">
	Registo de contas <i class="fa fa-user-plus"></i>
</h2><hr>

<form method="POST" action="../controller/insert_client.php">
	
<div class="container">
	<div class="form-row">
		
		<div class="col-md-6">
			Descricão: <i class="fa fa-user"></i>
			<input class="form-control" type="text" name="descricao" required autofocus><br>
		</div>

		<div class="col-md-4">
			Dt. de Pagamento: <i class="fa fa-calendar"></i>
			<input class="form-control" type="tel" id="data_pagamento" name="data_pagamento" required><br>
		</div>

        <div class="col-md-6">
            Valor: <i class="fas fa-dollar-sign"></i>
            <input class="form-control" type="tel" name="valor"  required  onKeyPress="return(MascaraMoeda(this,'.',',',event))"><br>
        </div>
        <div style="clear:both"></div>
        </br>

		<div class="col-md-4">
			
			<button class="btn btn-primary btn-lg">
				
				Inserir Valor <i class="fa fa-user-plus"></i>

			</button><br><br>

			<a href="../index.php">
				Voltar
			</a>

		</div>

	</div>
</div>

</form>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> 

<script type="text/javascript">
	$(document).ready(function(){
        $('#data_pagamento').mask('99/99/9999');
        $('#data_vencimento').mask('99/99/9999');
            return false;
	});

    function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
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
        for(i = 0; i < len; i++)
            if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
        aux = '';
        for(; i < len; i++)
            if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
        aux += key;
        len = aux.length;
        if (len == 0) objTextBox.value = '';
        if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
        if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
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