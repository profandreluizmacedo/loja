<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liquidatech - Sua Loja de Tecnologia</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
:root {
            --primary-color: #ff6b35;
            --secondary-color: #adb5bd;
            --accent-color: #ff6b35;
            --dark-color: #121212;
            --light-color: #f8f9fa;
            --dark-gray: #343a40;
            --light-gray: #e9ecef;
        }
                
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--dark-color);
            color: var(--light-color);
        }
        
        .navbar {
            background-color: var(--dark-gray);
        }
        
        .navbar-brand {
            font-weight: bold;
            font-size: 1.8rem;
            color: var(--primary-color) !important;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1496171367470-9ed9a91ea931?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            color: var(--light-color);
            padding: 100px 0;
            margin-bottom: 30px;
        }
        
        .product-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
            border: none;
            background-color: var(--dark-gray);
            color: var(--light-color);
            box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.4);
        }
        
        .product-price {
            color: var(--accent-color);
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .old-price {
            text-decoration: line-through;
            color: var(--secondary-color);
        }
        
        .category-card {
            background: var(--dark-gray);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            color: var(--light-color);
        }
        
        .category-card:hover {
            background: var(--primary-color);
            color: var(--dark-color);
            transform: scale(1.05);
        }
        
        .category-card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .promo-banner {
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            color: var(--light-color);
            padding: 40px 20px;
            border-radius: 10px;
            margin: 30px 0;
        }
        
        .footer {
            background-color: var(--dark-gray);
            color: var(--light-color);
            padding: 40px 0;
            margin-top: 50px;
        }
        
        .contact-form {
            background: var(--dark-gray);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }
        
        .section-title {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 10px;
            color: var(--light-color);
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .badge-discount {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--accent-color);
            color: var(--dark-color);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: var(--dark-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #e95e14;
            border-color: #e95e14;
        }
        .card-title2{
            color: #121212;
        }
  .card-text2{
    color: #121212;
  }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-laptop-code me-2"></i>LOJAETEC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Início</a>
                    </li>
                    <?php
                        include("admin/includes/conexao.php");
                        $categorias = mysqli_query($conexao, "SELECT * FROM tb_categorias ORDER BY categoria ASC");
                        while ($categoria = mysqli_fetch_array($categorias)) {
                            $subcategorias = mysqli_query($conexao, "SELECT * FROM tb_subcategorias WHERE id_categoria = " . $categoria['id'] . 
                            " ORDER BY subcategoria ASC");
                             if (mysqli_num_rows($subcategorias) > 0) {
                                echo '<li class="nav-item dropdown">';
                                echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown' . $categoria['id'] . '" 
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">' . $categoria['categoria'] . '</a>';
                                echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown' . $categoria['id'] . '">';
                                while ($subcategoria = mysqli_fetch_array($subcategorias)) {
                                    echo '<li><a class="dropdown-item" href="#">' . $subcategoria['subcategoria'] . '</a></li>';
                                }
                                echo '</ul>';
                                echo '</li>';
                            } else {
                                echo '<li class="nav-item"><a class="nav-link" href="#">' . $categoria['categoria'] . '</a></li>';
                            }
                        }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="contato.html">Contato</a>
                    </li>
                </ul>
                <form class="d-flex me-3">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar produtos...">
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <div class="d-flex">
                    <a href="#" class="btn btn-outline-secondary me-2">
                        <i class="fas fa-user"></i>
                    </a>
                    <a href="#" class="btn btn-outline-primary position-relative">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

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
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <i class="fas fa-gamepad"></i>
                        <h5>Espaço Gamer</h5>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <i class="fas fa-mobile-alt"></i>
                        <h5>Celulares</h5>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <i class="fas fa-laptop"></i>
                        <h5>Computadores</h5>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <i class="fas fa-headphones"></i>
                        <h5>Áudio</h5>
                    </div>
                </div>
            </div>
        </section>

        <!-- Promo Banner -->
        <section class="promo-banner text-center">
            <h2>Super Promoção em Memórias RAM</h2>
            <p class="fs-5">Até 40% de desconto em memórias DDR4 e DDR5</p>
            <a href="#" class="btn btn-light btn-lg mt-3">Aproveitar Oferta</a>
        </section>

        <!-- Featured Products -->
        <section class="mb-5">
            <h2 class="section-title">Produtos em Destaque</h2>
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="badge-discount">-15%</span>
                        <img src="play5.webp" class="card-img-top" alt="Controle PlayStation 5">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Console Sony PlayStation 5, Edição Digital</h5>
                            <p class="card-text">SSD 825GB, Controle Sem Fio DualSense + 2 Jogos Digitais</p>
                            <div class="mt-auto">
                                <p class="product-price">R$  3.533,07</p>
                                <p class="old-price">R$ 3.799,00</p>
                                <p class="text-muted small">ou 10x de R$ 379,90</p>
                                <a href="#" class="btn btn-primary w-100">Adicionar ao Carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="badge-discount">-20%</span>
                        <img src="munitor.jpg" class="card-img-top" alt="Monitor Gamer">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Monitor Gamer AOC Agon Pro</h5>
                            <p class="card-text">CS2 24, 24.1 Pol, eSports TN, FHD, 0.3ms, 610Hz, G-Sync, HDMI/DP, CS24A
                            </p>
                            <div class="mt-auto">
                                <p class="product-price">R$ 1.299,00</p>
                                <p class="old-price">R$ 1.599,00</p>
                                <p class="text-muted small">ou 12x de R$ 108,25</p>
                                <a href="#" class="btn btn-primary w-100">Adicionar ao Carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card h-100">
                        <img src="notboo.webp" class="card-img-top" alt="Notebook">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Notebook ASUS Vivobook 15 M1502</h5>
                            <p class="card-text">AMD Ryzen 5, 8GB RAM, 512GB SSD, 15.6"</p>
                            <div class="mt-auto">
                                <p class="product-price">R$ 2.899,00</p>
                                <p class="old-price">R$ 3.199,00</p>
                                <p class="text-muted small">ou 12x de R$ 241,58</p>
                                <a href="#" class="btn btn-primary w-100">Adicionar ao Carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card product-card h-100">
                        <span class="badge-discount">-25%</span>
                        <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Smartphone">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Samsung Galaxy A54</h5>
                            <p class="card-text">128GB, 6GB RAM, Câmera 50MP, Tela 6.7"</p>
                            <div class="mt-auto">
                                <p class="product-price">R$ 1.499,00</p>
                                <p class="old-price">R$ 1.999,00</p>
                                <p class="text-muted small">ou 10x de R$ 149,90</p>
                                <a href="#" class="btn btn-primary w-100">Adicionar ao Carrinho</a>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Liquidatech</h5>
                    <p>Sua loja de confiança para produtos de tecnologia com os melhores preços e qualidade.</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Links Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50">Início</a></li>
                        <li><a href="#" class="text-white-50">Produtos</a></li>
                        <li><a href="#" class="text-white-50">Ofertas</a></li>
                        <li><a href="contato.html" class="text-white-50">Contato</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Categorias</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white-50">Espaço Gamer</a></li>
                        <li><a href="#" class="text-white-50">Celulares</a></li>
                        <li><a href="#" class="text-white-50">Computadores</a></li>
                        <li><a href="#" class="text-white-50">Áudio</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Contato</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> Av. Tecnologia, 123</li>
                        <li><i class="fas fa-phone me-2"></i> (11) 3456-7890</li>
                        <li><i class="fas fa-envelope me-2"></i> contato@liquidatech.com</li>
                    </ul>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center pt-3">
                <p class="mb-0">&copy; 2025 Liquidatech. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>