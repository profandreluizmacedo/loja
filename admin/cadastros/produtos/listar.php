<?php
  include("../../includes/conexao.php");
  $listar = mysqli_query($conexao, 
        "SELECT tp.id, tp.nome, ts.subcategoria, tp.preco, tp.foto FROM tb_produtos tp
         inner join tb_subcategorias ts on ts.id = tp.id_subcategoria order by tp.id desc");

    if(mysqli_num_rows($listar) > 0) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-bordered table-hover">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">#</th>';
        echo '<th scope="col">SubCategoria</th>';
        echo '<th scope="col">Nome</th>';
        echo '<th scope="col">Preço</th>';
        echo '<th scope="col">Foto</th>';
        echo '<th scope="col">Ações</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        
        while($linha = mysqli_fetch_array($listar)) {
            $id = $linha['id'];        
            $subcategoria = $linha['subcategoria'];
            $nome = $linha['nome'];
            $preco = number_format($linha['preco'], 2, ',', '.');
            
             // Buscando a categoria relacionada à subcategoria
            
            echo '<tr>';
            echo '<th scope="row">' . $id . '</th>';
            echo '<td>' . $subcategoria . '</td>';
            echo '<td>' . $nome . '</td>';
            echo '<td>' . $preco . '</td>';
            echo '<td><img src="cadastros/produtos/fotos/' . $linha['foto'] . '" width="100" class="rounded-circle"></td>';
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
        var subcategoria = $(this).closest("tr").find("td").eq(1).text(); 

        //Carrego a descricao no Campo txtcategoria

        $('select option').filter(function() {
            // Compara o texto de cada opção com o texto desejado
            return $(this).text() === categoria;
         }).prop('selected', true); // Define a propriedade 'selected' como true para a opção encontrada
      

        $("#subcategoria").val(subcategoria);
        $("#id").val(id);
        $("#btnCancel").show();

    });

    $(".btnExcluir").click(function() {
        var id = $(this).closest("tr").find("th").text(); 
        var botao = $(this);     
       // if (confirm("Tem certeza que deseja excluir esta categoria?")) {
        modalPergunta("Confirma Exclusão", "Deseja realmente excluir a Subcategoria?").then((resposta) => {
        if (resposta) {
            botao.prop("disabled", true).text("Excluindo...");
            $.post("cadastros/subcategorias/excluir.php", 
            { id: id }, function(resposta) {
                botao.prop("disabled", false).text("Excluir");
                modalAlerta('Retorno', resposta);
                $("#listar").load("cadastros/subcategorias/listar.php");
            });
            
          } //Encerra o if(resposta)
        }); //Encerra o ModalPergunta
    });



    </script>