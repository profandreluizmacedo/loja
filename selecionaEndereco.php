<?php
  if (!isset($_SESSION["cliente"])){
    echo "Faça seu Login para continuar";
    include("cadastroLogin.php");
    exit();
  }
?>
<div class="container">
<fieldset class="border p-2">
<legend  class="w-auto">Selecione o endereço para entrega</legend>
    <div id="listaEnderecos">

    </div>
</fieldset>

<fieldset class="border p-2">
<legend  class="w-auto">Cadastre um endereço para entrega</legend>
<form id="FrmEndereco" name="FrmEndereco" action="salvaEndereco.php" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Descrição do Endereço ex: (Minha Casa, Casa dos meus pais, Meu Serviço)</label>
        <input type="text" class="form-control" name="descricao" id="descricao" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Endereço</label>
        <input type="text" class="form-control" name="endereco" id="endereco" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Número</label>
        <input type="text" class="form-control" name="numero" id="numero" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Bairro</label>
        <input type="text" class="form-control" name="bairro" id="bairro" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Cep</label>
        <input type="text" class="form-control" name="cep" id="cep" aria-describedby="emailHelp">
    </div>
    <div class="row">
        <div class="col-md-6">
            <label for="estado" class="form-label">Estado</label>
                <select class="form-select" name="estado" id="estado" required="">  
                <option value="0" selected>Selecione o estado</option>                                                    
                    <?php
                        include_once("includes/conexao.php");
                        $qryCategorias = mysqli_query($conexao,"select distinct codigo_estado, nome_estado from tb_cidades order by nome_estado");
                        while ($listaCat = mysqli_fetch_assoc($qryCategorias)){
                            echo '<option value="'.$listaCat["codigo_estado"].'">'.$listaCat["nome_estado"].'</option>';
                        }
                    ?>                                
                </select>
                <div class="invalid-feedback">Por favor Selecione um estado.</div>
            </div>

            <div class="col-md-6">
            <label for="cidade" class="form-label">Cidade</label>
                <select class="form-select" name="cidade" id="cidade" required="">                                                   
                    <option value="0">Selecione um estado primeiro</option>                            
                </select>
                <div class="invalid-feedback">Por favor Selecione a Cidade.</div>
            </div>
     </div>

<button type="submit" id="btnCadEndereco" class="btn btn-primary">Cadastrar Endereço</button>
</form>
</fieldset>

<button type="button" id="btnFinalizar" class="btn btn-success">Finalizar Pedido</button>

                    </div>

<script>
    $('#estado').change(function (){
    var estado = $('#estado option:selected').val();
    if (parseInt(estado) != 0){
        $.post("cidades.php",{estado:estado},function(cidades){
        $("#cidade").html(cidades)  ;
    })
     }
 });

   $("#btnFinalizar").click(function(){
      const radioSelecionado = $('input[type="radio"][name="endereco_entrega"]:checked').val();

   if (!radioSelecionado) {
    alert("Nenhum endereço selecionado.");
    exit();
   }

   $.post("salvaPedido.php",{id_endereco:radioSelecionado},function(retorno){
       //Redireciona para a Página de Sucesso
       window.location.href = "index.php?page=Sucesso";
    }) 

 })

 $("#listaEnderecos").load("listaEnderecos.php");

$("#btnCadEndereco").click(function(){
    //Valida os campos
    if ($("#descricao").val() == ''){
        $("#descricao").css("border-color","red");
        alert("Favor Preencha o campo Descrição");
        $("#descricao").focus();      
        return false;
    }

    if ($("#endereco").val() == ''){
        $("#endereco").css("border-color","red");
        alert("Favor Preencha o campo Endereço");
        $("#endereco").focus();      
        return false;
    }

    if ($("#numero").val() == ''){
        $("#numero").css("border-color","red");
        alert("Favor Preencha o campo Número");
        $("#numero").focus();      
        return false;
    }

    if ($("#bairro").val() == ''){
        $("#bairro").css("border-color","red");
        alert("Favor Preencha o campo Bairro");
        $("#bairro").focus();      
        return false;
    }

    if ($("#cep").val() == ''){
        $("#cep").css("border-color","red");
        alert("Favor Preencha o campo Cep");
        $("#cep").focus();      
        return false;
    }

    if ($("#estado").val() == '0'){
        $("#estado").css("border-color","red");
        alert("Favor Preencha o campo estado");
        $("#estado").focus();      
        return false;
    }

    if ($("#cidade").val() == '0'){
        $("#cidade").css("border-color","red");
        alert("Favor Preencha o campo cidade");
        $("#cidade").focus();      
        return false;
    }
    
    $('#FrmEndereco').ajaxForm(function(retorno) {
       // alert(retorno);
        mostraDialogo(retorno, 'info', 3000);
        $("#listaEnderecos").load("listaEnderecos.php");
    });

})
</script>