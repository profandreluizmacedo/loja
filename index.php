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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        <a class="nav-link" href="?page=contato">Contato</a>
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
    
     <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'contato': include("contato/index.php");  break;
                default: include("produtos.php");   break;
            }
        } else {
            include("produtos.php");
        }
     ?>   

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