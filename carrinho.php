<?php
    @session_start();

     $_SESSION["qtd_carrinho"] = 0;

     if  (!isset($_SESSION["carrinho"]) || ( count($_SESSION["carrinho"]) <= 0) ){

        echo '<h3>Nenhum item no carrinho';

     }else{

        echo '
        <h2>Carrinho de Compras</h2> 
        <table class="table table-light">
                <th>Descricao</th><th>Valor Un.</th><th>Qtd.</th><th>Valor Total</th>';
       $total =  0;
       foreach ($_SESSION["carrinho"] as $key => $value) {
         // echo "KEY: $key valor: ". $value["descricao"] . "<br>";
           $valorProd = $value["preco"]*$value["qtd"];
           echo '<tr>';
           echo '<td>'.$value["descricao"].'</td>';
           echo '<td>'.number_format($value["preco"], 2, ',', '.' ).'</td>';
           echo '<td><a class="btn btn-danger" href="alteraQtd.php?id='.$key.'&acao=subtrair">-</a>
           <input type="number" value="'.$value["qtd"].'" disabled>
           <a class="btn btn-primary" href="alteraQtd.php?id='.$key.'&acao=somar">+</a></td>';
           echo '<td>'.number_format($valorProd, 2, ',', '.' ).' 
            <a href="delCarrinho.php?id='.$key.'"><i class="fas fa-trash deleta"></i></a>
           </td>';
           echo '</tr>';
           $total = $total + $valorProd;
           $_SESSION["qtd_carrinho"] = $_SESSION["qtd_carrinho"] + $value["qtd"];
       }
       @$_SESSION["total_carrinho"] = $total;
       echo '<th>-</th><th>-</th><th>-</th><th>'.number_format($total, 2, ',', '.' ).'</th></table>';
           
     }   
?>

<a class="btn btn-primary btn-sm" href="index.php">
<span class="fas fa-shopping-cart"></span> Continuar Comprando</a>

<a class="btn btn-success btn-sm" href="?pg=FinalizarPedido">
<span class="fas fa-shopping-cart"></span> Finalizar Pedido</a>
