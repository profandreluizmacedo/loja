 <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Tecnologia com Preço Imbatível</h1>
            <p class="lead">Encontre os melhores produtos de tecnologia com descontos especiais</p>
            <a href="#" class="btn btn-primary btn-lg mt-3">Ver Ofertas</a>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <!-- Categories -->
        <section class="mb-5">
            <h2 class="section-title">Categorias em Destaque</h2>
            <div class="row g-4">
                <?php
                  $subcategorias = mysqli_query($conexao, "SELECT * FROM tb_subcategorias limit 4 ");  
                  $i = 0;
                  while ($row = mysqli_fetch_assoc($subcategorias)) {                
                    switch ($i) {
                      case 0: $icon = 'fas fa-gamepad'; break;
                      case 1: $icon = 'fas fa-mobile-alt'; break;
                      case 2: $icon = 'fas fa-laptop'; break;
                      case 3: $icon = 'fas fa-headphones'; break;
                      default: $icon = 'fas fa-box-open';
                    }
                    echo "
                        <div class='col-6 col-md-3'>
                            <div class='category-card'>
                                <i class='$icon'></i>
                                <h5>".$row['subcategoria']."</h5>
                            </div>
                        </div>
                      ";
                  }
                ?>       
            </div>
        </section>



        <!-- Featured Products -->
        <section class="mb-5">
            <h2 class="section-title">Produtos em Destaque</h2>
            <div class="row g-4">

            <?php
    
                $produtos = mysqli_query($conexao, "SELECT * FROM tb_produtos limit 4 ");  
                while ($row = mysqli_fetch_assoc($produtos)) {                
                    echo "
                    <div class='col-md-6 col-lg-3'>
                        <div class='card product-card h-100'>
                            <img src='admin/cadastros/produtos/fotos/".$row['foto']."' 
                            class='card-img-top' alt='".$row['nome']."'>
                            <div class='card-body d-flex flex-column'>
                                <h5 class='card-title'>".$row['nome']."</h5>
                                <p class='card-text'>".$row['descricao']."</p>
                                <div class='mt-auto'>
                                    <p class='product-price'>R$ ".$row['preco']."</p>                                  
                                    <p class='text-muted small'>ou 10x de R$ ".($row['preco']/10)."</p>
                                    <a href='addCarrinho.php?id_produto=".$row['id']."' class='btn btn-primary w-100'>Adicionar ao Carrinho</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
            ?>
             
            
            </div>
        </section>

        <!-- Special Offers -->
        <section class="mb-5">
            <h2 class="section-title">Ofertas Especiais</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="row g-0 h-100">
                            <div class="col-md-4">
                                <img src="https://images.unsplash.com/photo-1593640408182-31c70c8268f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Memória RAM">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column h-100">
                                    <h5 class="card-title2">Super Promo em Memórias RAM</h5>
                                    <p class="card-text2">Descontos de até 40% em memórias DDR4 e DDR5 das melhores marcas.</p>
                                    <a href="#" class="btn btn-outline-primary mt-auto">Ver Ofertas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="row g-0 h-100">
                            <div class="col-md-4">
                                <img src="https://images.unsplash.com/photo-1587202372634-32705e3bf49c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="Gabinetes">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column h-100">
                                    <h5 class="card-title2">Descontos Especiais em Gabinetes</h5>
                                    <p class="card-text2">Gabinetes gamer com design exclusivo e iluminação RGB com preços especiais.</p>
                                    <a href="#" class="btn btn-outline-primary mt-auto">Ver Ofertas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>