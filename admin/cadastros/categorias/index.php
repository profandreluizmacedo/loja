<div class="row">
  <div class="col-md-12">
     <div class="card card-secondary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Categorias</div>
        </div>
        <div class="card-body">
            <input class="form-control form-control-lg" type="text" id="categoria" name="categoria" placeholder="Informe a Categoria">
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
            var id        = $('#id').val(); //recupera o valor do campo ID escondido
            if (categoria === '') {
               // alert('Por favor, informe a Categoria.');
                modalAlerta('Atenção', 'Por favor, informe a Categoria.');
                $('#categoria').focus();
                return false;
            }
            $.ajax({
                type: 'POST',
                url: 'cadastros/categorias/salvar.php',
                data: { txtcategoria: categoria, id:id },
                success: function(resposta) {
                  modalAlerta('Retorno', resposta);
                  $("#listar").load("cadastros/categorias/listar.php"); 
                    $('#categoria').val('');
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
       $("#listar").load("cadastros/categorias/listar.php");   



    });
</script>