<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card card-secondary card-outline mb-4">
            <div class="card-header">
                <div class="card-title">Cadastro de Produtos</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <label for="subcategoria_produto" class="form-label">Selecione a Subcategoria</label>
                        <select class="form-select" id="id_subcategorias" name="id_subcategorias" required="">
                            <option value="">Selecione...</option>
                            <?php
                                // Inclui a conexão com o banco de dados
                                include("includes/conexao.php");
                               
                                // Adapte a tabela e campos conforme o seu banco real de subcategorias
                                $listar = mysqli_query ($conexao, "SELECT id, subcategoria FROM tb_subcategorias ORDER BY subcategoria");
                               
                                while ($linha = mysqli_fetch_array($listar)) {
                                    $id = $linha['id'];
                                    $subcategoria = $linha['subcategoria'];
                                    echo '<option value="' . $id . '">' . htmlspecialchars($subcategoria) . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
 
                <div class="row" style="margin-top: 15px;">
                    <div class="col-12">
                        <label for="nome" class="form-label">Nome do Produto</label>
                        <input class="form-control form-control-lg" type="text" id="nome" name="nome" placeholder="Informe o nome do produto" required>
                    </div>
                </div>
 
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-9">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Detalhes sobre o produto"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="preco" class="form-label">Preço (R$)</label>
                        <input class="form-control" type="text" id="preco" name="preco" placeholder="Ex: 19.99" required>
                    </div>
                </div>
 
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-4">
                        <label for="estoque" class="form-label">Estoque</label>
                        <input class="form-control" type="number" id="estoque" name="estoque" placeholder="Quantidade" min="0" required>
                    </div>
                    <div class="col-md-8">
                        <label for="foto" class="form-label">Foto do Produto</label>
                        <input class="form-control" type="file" id="foto" name="foto">
                    </div>
                </div>
               
                <br>
                <input type="hidden" id="id" name="id" value="0">
                <button type="submit" id="btnSalvarProduto" class="btn btn-primary">Salvar Produto</button>
                <button id="btnCancelProduto" class="btn btn-danger" style="display: none;">Cancelar</button>
            </div>
        </div>
    </div>        
</div>
 
<div id="listarProdutos"></div>
 
<script>
    $(document).ready(function() {
        // Carrega a listagem de produtos
        $("#listarProdutos").load("cadastros/produtos/listar.php");

        $('#preco').maskMoney({
        prefix: 'R$ ', // Define o prefixo como R$
        thousands: '.', // Define o separador de milhar como ponto
        decimal: ',',   // Define o separador decimal como vírgula
        precision: 3,   // Define a precisão para duas casas decimais
        allowZero: true // Permite o valor zero (exemplo: R$ 0,00)
      });
 
        // Foco inicial
        $('#nome').focus();
 
        // Ação do botão Salvar Produto
        $("#btnSalvarProduto").click(function() {
            var id_subcategorias = $('#id_subcategorias').val();
            var nome             = $('#nome').val();
            var descricao        = $('#descricao').val();
            var estoque          = $('#estoque').val();
            var preco            = $('#preco').val();
            var id               = $('#id').val();
 
            // Validação simples
            if (id_subcategorias === '') {
                modalAlerta('Atenção', 'Por favor, selecione a Subcategoria.');
                $('#id_subcategorias').focus();
                return false;
            }
            if (nome === '') {
                modalAlerta('Atenção', 'Por favor, informe o Nome do Produto.');
                $('#nome').focus();
                return false;
            }
           
            // ATENÇÃO: Para enviar a FOTO, você DEVE usar FormData e configurar o AJAX corretamente.
            // O código abaixo IGNORA o campo 'foto' e envia apenas os outros dados via POST simples.
            // Para implementar o upload de arquivo, o AJAX deve ser reescrito com FormData.
           
            $.ajax({
                type: 'POST',
                url: 'cadastros/produtos/salvar.php',
                data: {
                    txtidsubcategorias: id_subcategorias,
                    txtnome: nome,
                    txtdescricao: descricao,
                    txtestoque: estoque,
                    txtpreco: preco,
                    id: id
                    // Se for para incluir a foto, use FormData
                },
                success: function(resposta) {
                    modalAlerta('Retorno', resposta);
                    // Atualiza a listagem e limpa os campos
                    $("#listarProdutos").load("cadastros/produtos/listar.php");
                   
                    // Limpar os campos após salvar
                    $('#nome').val('');
                    $('#descricao').val('');
                    $('#estoque').val('');
                    $('#preco').val('');
                    $('#id').val('0');
                    $('#id_subcategorias').val(''); // Reseta a subcategoria selecionada
                    // Limpar o campo file é mais complexo em jQuery, pode ser ignorado ou feito via reset do form
                    $('#nome').focus();
                    $('#btnCancelProduto').hide(); // Esconde o botão de cancelar
                },
                error: function() {
                    alert('Erro ao salvar o produto. Por favor, tente novamente.');
                }
            });
        });
 
        // Ação do botão Cancelar
        $("#btnCancelProduto").click(function(){
            // Limpa os Campos e esconde o botão Cancelar
            $('#nome').val('');
            $('#descricao').val('');
            $('#estoque').val('');
            $('#preco').val('');
            $('#id_subcategorias').val('');
            $('#id').val('0');
            $('#nome').focus();
            $('#btnCancelProduto').hide();
        });
    });
</script>