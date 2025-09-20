<?php
  include("../../includes/conexao.php");
  $listar = mysqli_query($conexao, 
         "SELECT * FROM tb_categorias ORDER BY categoria");

    if(mysqli_num_rows($listar) > 0) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">Categoria</th>';
        echo '<th scope="col">Ações</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        while($linha = mysqli_fetch_array($listar)) {
            $id = $linha['id'];
            $categoria = $linha['categoria'];
            
            echo '<tr>';
            echo '<th scope="row">' . $id . '</th>';
            echo '<td>' . htmlspecialchars($categoria) . '</td>';
            echo '<td>
                    <button class="btn btn-sm btn-primary btnEditar">Editar</button>

                    <button class="btn btn-sm btn-danger btnExcluir">Excluir</button>

                  </td>';
            echo '</tr>';
        }
        
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    } else {
        echo '<div class="alert alert-info" role="alert">Nenhuma categoria cadastrada.</div>';
    }
?>

<script>

    $(".btnEditar").click(function() {
        var id = $(this).closest("tr").find("th").text();       
        var categoria = $(this).closest("tr").find("td").eq(0).text(); 

        //Carrego a descricao no Campo txtcategoria
        $("#categoria").val(categoria);
        $("#id").val(id);
        $("#btnCancel").show();

    });

    $(".btnExcluir").click(function() {
        var id = $(this).closest("tr").find("th").text(); 
        var botao = $(this);     
       // if (confirm("Tem certeza que deseja excluir esta categoria?")) {
        modalPergunta("Confirma Exclusão", "Deseja realmente excluir a categoria?").then((resposta) => {
        if (resposta) {
            botao.prop("disabled", true).text("Excluindo...");
            $.post("cadastros/categorias/excluir.php", 
            { id: id }, function(resposta) {
                botao.prop("disabled", false).text("Excluir");
                modalAlerta('Retorno', resposta);
                $("#listar").load("cadastros/categorias/listar.php");
            });
            
          } //Encerra o if(resposta)
        }); //Encerra o ModalPergunta
    });



    </script>