    <!-- Contact Hero -->
    <section class="contact-hero">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Faça seu login ou cadaste-se</h1>
            <p class="lead">Se já possui cadastro faça seu login, caso ainda não possua um cadastro cadastre-se.</p>
        </div>
    </section>

    <!-- Contact Content -->
    <div class="container mb-5">
         <section class="mb-5">
            <div class="row g-4">

<fieldset class="border p-2" style="width:34%;float:left">
<legend  class="w-auto">Faça login</legend>
<form action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="loginemail" id="loginemail" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <input type="password" name="loginsenha" id="loginsenha" class="form-control" id="exampleInputPassword1">
    </div>
<button type="submit" id="btnLogin" class="btn btn-primary">Entrar</button>
</form>
</fieldset>

<fieldset class="border p-2" style="width:65%;float:right">
<legend  class="w-auto">Faça seu Cadastro</legend>
<form action="?page=NovoCliente" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Telefone</label>
        <input type="text" class="form-control" name="telefone" id="telefone" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">CPF</label>
        <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" id="exampleInputPassword1">
    </div>
<button type="submit" class="btn btn-primary">Cadastrar</button>
</form>
</fieldset>

</div>
</div>
</div>

<script>
    $("#btnLogin").click(function(){
        if ($("#loginemail").val() == ""){
            alert("Favor preencha o email");
            return false;
        }
        if ($("#loginsenha").val() == ""){
            alert("Favor preencha o Senha");
            return false;
        }
        $.post("loginCliente.php",{login:$("#loginemail").val(), senha:$("#loginsenha").val()}, function(retorno){
            if (retorno==1){
                $(location).attr('href', '?pg=Pedidos');
            }else{
                alert(retorno);
            }
        })
    })

</script>