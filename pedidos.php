<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos com Detalhes Colapsáveis</title>

<style>
/* 🎨 Estilos Globais da Tabela */
.tabela-pedidos {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    color: #000;
}
.tabela-pedidos th, .tabela-pedidos td {
    border: 1px solid #ddd;
    padding: 12px 15px;
    text-align: left;
    color: #000;
}
.tabela-pedidos thead {
    background-color: #007bff;
    color: white;
}
.pedido-linha {
    cursor: pointer;
    background-color: #e0f7fa;
    transition: background-color 0.2s;
}
.pedido-linha:hover {
    background-color: #b2ebf2;
}
.itens-colapsar {
    display: none;
    border-top: none;
    background-color: #f7f7f7;
}
.itens-colapsar td {
    padding: 0;
}
.conteudo-itens {
    padding: 10px;
}
.tabela-itens {
    width: 100%;
    border-collapse: collapse;
    color: #000;
}
.tabela-itens th, .tabela-itens td {
    border: 1px solid #eee;
    padding: 8px;
    font-size: 0.95em;
    color: #000;
}
.tabela-itens thead th {
    background-color: #ccf2ff;
    color: #333;
}
.seta {
    display: inline-block;
    transition: transform 0.3s;
    font-weight: bold;
    font-size: 1.2em;
    color: #000;
}
.aberto .seta {
    transform: rotate(90deg);
    color: #007bff;
}
</style>
</head>
<body>

<h2>📦 Meus Pedidos</h2>

<table class="tabela-pedidos">
    <thead>
        <tr>
            <th>ID do Pedido</th>
            <th>Data de Emissão</th>
            <th>Status</th>
            <th>Detalhes</th>
        </tr>
    </thead>
    <tbody>

<?php
// =======================
//  CONSULTA PRINCIPAL
// =======================
$id_cliente = $_SESSION["cliente"]["id"];
include_once("admin/includes/conexao.php");

$lista_pedidos = mysqli_query($conexao,
"SELECT id, emissao, 'APROVADO' as status FROM tb_pedidos WHERE id_cliente = $id_cliente");

while ($pedido = mysqli_fetch_assoc($lista_pedidos)) {
    $id_pedido = $pedido["id"];
    $emissao = date("d/m/Y", strtotime($pedido["emissao"]));
    $status = $pedido["status"] ?? "—";
?>

    <!-- Linha principal (clicável) -->
    <tr class="pedido-linha" data-id-pedido="<?= $id_pedido ?>">
        <td>#<?= $id_pedido ?></td>
        <td><?= $emissao ?></td>
        <td><?= $status ?></td>
        <td><span class="seta">▶</span></td>
    </tr>

    <!-- Linha oculta dos itens -->
    <tr class="itens-colapsar" data-id-pedido="<?= $id_pedido ?>">
        <td colspan="4">
            <div class="conteudo-itens">

                <p><strong>Itens do Pedido #<?= $id_pedido ?>:</strong></p>

                <table class="tabela-itens">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>QTD</th>
                            <th>Valor UN</th>
                            <th>Valor Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    // =======================
                    //  CONSULTA DOS ITENS
                    // =======================
                    $itens_pedido = mysqli_query($conexao,
                    "SELECT tp.nome, ti.qtd, ti.valor_unitario,
                    (ti.qtd * ti.valor_unitario) AS valor_total
                    FROM tb_pedidos_itens ti
                    INNER JOIN tb_produtos tp ON tp.id = ti.id_produto
                    WHERE ti.id_pedido = $id_pedido");

                    $soma_total = 0;

                    while ($itens = mysqli_fetch_assoc($itens_pedido)) {
                        $produto = $itens["nome"];
                        $qtd = $itens["qtd"];
                        $valorUN = number_format($itens["valor_unitario"], 2, ',', '.');
                        $valor_total = number_format($itens["valor_total"], 2, ',', '.');

                        $soma_total += $itens["valor_total"];
                    ?>
                        <tr>
                            <td><?= $produto ?></td>
                            <td><?= $qtd ?></td>
                            <td>R$ <?= $valorUN ?></td>
                            <td>R$ <?= $valor_total ?></td>
                        </tr>
                    <?php } ?>

                        <!-- TOTAL DO PEDIDO -->
                        <tr>
                            <td colspan="3" style="text-align: right; font-weight: bold;">TOTAL DO PEDIDO:</td>
                            <td style="font-weight: bold;">
                                R$ <?= number_format($soma_total, 2, ',', '.') ?>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </td>
    </tr>

<?php } // fim do loop ?>
    
    </tbody>
</table>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const linhasPedido = document.querySelectorAll('.pedido-linha');

    linhasPedido.forEach(linha => {
        linha.addEventListener('click', function() {
            const idPedido = this.getAttribute('data-id-pedido');
            const linhaItens = document.querySelector(`.itens-colapsar[data-id-pedido="${idPedido}"]`);

            if (linhaItens) {
                const visivel = linhaItens.style.display === 'table-row';

                document.querySelectorAll('.itens-colapsar').forEach(item => item.style.display = 'none');
                document.querySelectorAll('.pedido-linha').forEach(item => item.classList.remove('aberto'));

                if (!visivel) {
                    linhaItens.style.display = 'table-row';
                    this.classList.add('aberto');
                }
            }
        });
    });
});
</script>

</body>
</html>
