<div class="row">
  <div class="col-md-12">
     <div class="card card-secondary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">SubCategorias</div>
        </div>
        <div class="card-body">
            <div class="row">
              <div class="col-12">
                <label for="validationCustom04" class="form-label">Selecione uma categoria</label>
                <select class="form-select" id="categoria" name="categoria" required>
                    <?php
                      include("includes/conexao.php");
                      $listar = mysqli_query($conexao,"SELECT * FROM tb_categorias ORDER BY categoria");
                      while ($linha = mysqli_fetch_assoc($listar)) {
                          $id = $linha['id'];
                          $categoria = $linha['categoria'];
                          echo '<option value="' . $id . '">' . htmlspecialchars($categoria) . '</option>';
                      }
                    ?>  
                 </select>
               
              </div>
            </div>
            <div class="row" style="margin-top: 5px;">
              <div class="col-12">
                  <label for="validationCustom04" class="form-label">Preencha a descrição da Subcategoria</label>
                  <input class="form-control form-control-lg" type="text" id="subcategoria" name="subcategoria" placeholder="Informe a SubCategoria">
              </div>
            </div>
                  <br>
            <input type="hidden" id="id" name="id" value="0">
            <button type="submit" id="btnSalvar" class="btn btn-primary">Salvar</button>
            <button id="btnCancel" class="btn btn-danger" style="display: none;">Cancelar</button>
        </div>
    </div>
  </div>            
</div>

<div id="listar"></div>


<script>
      $(document).ready(function() {
        $('#categoria').focus();
        $("#btnSalvar").click(function() {
            var categoria = $('#categoria').val(); //Recupera o valor do campo Categoria
            var subcategoria = $('#subcategoria').val(); //Recupera o valor do campo Categoria
            var id        = $('#id').val(); //recupera o valor do campo ID escondido
            if (categoria === '') {
               // alert('Por favor, informe a Categoria.');
                modalAlerta('Atenção', 'Por favor, informe a Categoria.');
                $('#categoria').focus();
                return false;
            }
            $.ajax({
                type: 'POST',
                url: 'cadastros/subcategorias/salvar.php',
                data: { txtcategoria: categoria, txtsubcategoria: subcategoria, id:id },
                success: function(resposta) {
                  modalAlerta('Retorno', resposta);
                  $("#listar").load("cadastros/subcategorias/listar.php"); 
                    $('#subcategoria').val('');
                    $('#categoria').focus();
                },
                error: function() {
                    alert('Erro ao salvar a categoria. Por favor, tente novamente.');
                }
            });
        });

        $("#btnCancel").click(function() {
            // Limpa os campos e esconde o botão Cancelar
            $('#categoria').val('');
            $('#id').val('0');
            $('#categoria').focus();
            $("#btnCancel").hide();
        });

       // Listar categorias
       $("#listar").load("cadastros/subcategorias/listar.php"); 

    });
</script>