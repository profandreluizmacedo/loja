<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Liquidatech</title>
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

.navbar-brand {
    font-weight: 700;
    font-size: 1.9rem;
    color: var(--primary-color) !important;
    letter-spacing: 1px;
}

.contact-hero {
    background: linear-gradient(rgba(18, 18, 18, 0.8), rgba(18, 18, 18, 0.8)), url('https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80');
    background-size: cover;
    background-position: center;
    color: var(--light-color);
    padding: 100px 0 90px;
    margin-bottom: 40px;
    text-shadow: 0 2px 8px rgba(0,0,0,0.8);
}

.contact-form {
    background: var(--dark-gray);
    padding: 40px 35px 45px;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(255, 107, 53, 0.15);
    transition: box-shadow 0.3s ease;
    color: var(--light-color);
}

.contact-form:hover {
    box-shadow: 0 12px 35px rgba(255, 107, 53, 0.25);
}

.contact-info {
    background: var(--dark-gray);
    color: var(--light-color);
    padding: 40px 30px;
    border-radius: 15px;
    height: 100%;
    box-shadow: 0 8px 20px rgba(255, 107, 53, 0.2);
}

.contact-info i {
    font-size: 1.7rem;
    margin-bottom: 18px;
    color: var(--accent-color);
}

.footer {
    background-color: var(--dark-gray);
    color: var(--light-color);
    padding: 50px 0 45px;
    margin-top: 60px;
    font-size: 0.9rem;
    letter-spacing: 0.03em;
}

.section-title {
    position: relative;
    margin-bottom: 40px;
    padding-bottom: 12px;
    font-weight: 700;
    font-size: 2rem;
    color: var(--light-color);
    text-align: center;
}

.section-title:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 4px;
    background-color: var(--accent-color);
    border-radius: 3px;
}

.contact-method {
    text-align: center;
    padding: 28px 25px;
    border-radius: 15px;
    background: var(--dark-gray);
    box-shadow: 0 3px 18px rgba(255, 107, 53, 0.12);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    color: var(--light-color);
}

.contact-method:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 28px rgba(255, 107, 53, 0.22);
}

.contact-method i {
    font-size: 3rem;
    color: var(--primary-color);
    margin-bottom: 18px;
}

.map-container {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(255, 107, 53, 0.1);
}

.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    font-weight: 600;
    padding: 12px 30px;
    font-size: 1.1rem;
    border-radius: 8px;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    color: var(--dark-color);
}

.btn-primary:hover {
    background-color: #e95e14;
    border-color: #e95e14;
    box-shadow: 0 6px 14px rgba(233, 94, 20, 0.4);
    color: var(--dark-color);
}

.btn-primary:focus, .btn-primary:active {
    box-shadow: 0 0 0 0.4rem rgba(255, 107, 53, 0.5);
}

.form-label {
    font-weight: 600;
    color: var(--light-gray);
}

.form-control, .form-select {
    border-radius: 8px;
    border: 1.8px solid #495057;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    font-size: 1rem;
    padding: 10px 14px;
    background-color: var(--dark-color);
    color: var(--light-color);
}

.form-control::placeholder {
    color: var(--secondary-color);
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 6px rgba(255, 107, 53, 0.25);
    outline: none;
    background-color: var(--dark-gray);
}

.form-check-label {
    color: var(--light-gray);
    font-weight: 500;
}

.accordion-button {
    font-weight: 600;
    font-size: 1.1rem;
    color: var(--light-gray);
    background-color: var(--dark-gray);
    box-shadow: 0 3px 12px rgba(255, 107, 53, 0.1);
    border-radius: 12px;
    margin-bottom: 12px;
    transition: background-color 0.3s ease;
}

.accordion-button:not(.collapsed) {
    background-color: var(--primary-color);
    color: var(--dark-color);
    box-shadow: 0 8px 20px rgba(255, 107, 53, 0.25);
}

.accordion-body {
    color: var(--secondary-color);
    font-size: 1rem;
    line-height: 1.5;
    padding: 18px 20px;
}

.social-links a {
    transition: color 0.3s ease;
    color: var(--light-gray);
}

.social-links a:hover {
    color: var(--accent-color) !important;
}

.navbar-light {
    background-color: var(--dark-gray) !important;
    box-shadow: 0 2px 8px rgb(0 0 0 / 0.7);
}

.navbar-nav .nav-link {
    font-weight: 600;
    color: var(--secondary-color);
    transition: color 0.3s ease;
}

.navbar-nav .nav-link.active, 
.navbar-nav .nav-link:hover {
    color: var(--primary-color);
}

.navbar-nav .dropdown-menu {
    border-radius: 12px;
    box-shadow: 0 6px 25px rgba(255, 107, 53, 0.15);
    background-color: var(--dark-gray);
}

.navbar-nav .dropdown-item {
    color: var(--light-gray);
}

.navbar-nav .dropdown-item:hover {
    background-color: var(--primary-color);
    color: var(--dark-color) !important;
}

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <i class="fas fa-laptop-code me-2"></i>LOJAETEC
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Início</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Ar e Ventilação</a></li>
                            <li><a class="dropdown-item" href="#">Áudio</a></li>
                            <li><a class="dropdown-item" href="#">Câmeras e Drones</a></li>
                            <li><a class="dropdown-item" href="#">Celular & Smartphone</a></li>
                            <li><a class="dropdown-item" href="#">Computadores</a></li>
                            <li><a class="dropdown-item" href="#">Conectividade</a></li>
                            <li><a class="dropdown-item" href="#">Eletroportáteis</a></li>
                            <li><a class="dropdown-item" href="#">Espaço Gamer</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#ofertas">Ofertas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contato.html">Contato</a>
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

    <!-- Contact Hero -->
    <section class="contact-hero">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Entre em Contato Conosco</h1>
            <p class="lead">Estamos aqui para ajudar! Entre em contato com nossa equipe para tirar dúvidas ou obter suporte.</p>
        </div>
    </section>

    <!-- Contact Content -->
    <div class="container mb-5">
        <!-- Contact Methods -->
        <section class="mb-5">
            <h2 class="section-title text-center">Formas de Contato</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="contact-method">
                        <i class="fas fa-phone-alt"></i>
                        <h4>Telefone</h4>
                        <p>Fale diretamente com nosso atendimento</p>
                        <h5 class="text-primary">(11) 3456-7890</h5>
                        <small>Segunda a Sexta, 9h às 18h</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-method">
                        <i class="fas fa-envelope"></i>
                        <h4>E-mail</h4>
                        <p>Envie suas dúvidas e solicitações</p>
                        <h5 class="text-primary">contato@liquidatech.com</h5>
                        <small>Respondemos em até 24h</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-method">
                        <i class="fas fa-comments"></i>
                        <h4>Chat Online</h4>
                        <p>Atendimento rápido e personalizado</p>
                        <button class="btn btn-primary mt-2">Iniciar Chat</button>
                        <small>Disponível no horário comercial</small>
                    </div>
                </div>
            </div>
        </section>

        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="contact-form">
                    <h2 class="section-title">Envie sua Mensagem</h2>
                    <p class="text-muted mb-4">Preencha o formulário abaixo e entraremos em contato o mais breve possível.</p>
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Primeiro Nome *</label>
                                <input type="text" class="form-control" id="firstName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Sobrenome *</label>
                                <input type="text" class="form-control" id="lastName" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail *</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Assunto *</label>
                            <select class="form-select" id="subject" required>
                                <option value="" selected disabled>Selecione um assunto</option>
                                <option value="suporte">Suporte Técnico</option>
                                <option value="vendas">Dúvidas sobre Vendas</option>
                                <option value="produto">Informações sobre Produto</option>
                                <option value="devolucao">Trocas e Devoluções</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="orderNumber" class="form-label">Número do Pedido (se aplicável)</label>
                            <input type="text" class="form-control" id="orderNumber">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Mensagem *</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Descreva sua dúvida ou solicitação..." required></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="newsletter">
                            <label class="form-check-label" for="newsletter">Desejo receber novidades e promoções por e-mail</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg px-4">
                            <i class="fas fa-paper-plane me-2"></i>Enviar Mensagem
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="contact-info">
                    <h2 class="mb-4">Informações de Contato</h2>
                    
                    <div class="mb-4">
                        <i class="fas fa-map-marker-alt"></i>
                        <h5>Endereço</h5>
                        <p>Av. Tecnologia, 123<br>Jardim das Inovações<br>São Paulo, SP<br>CEP: 01234-567</p>
                    </div>
                    
                    <div class="mb-4">
                        <i class="fas fa-phone"></i>
                        <h5>Telefone</h5>
                        <p>(11) 3456-7890<br>(11) 98765-4321 (WhatsApp)</p>
                    </div>
                    
                    <div class="mb-4">
                        <i class="fas fa-envelope"></i>
                        <h5>E-mail</h5>
                        <p>contato@liquidatech.com<br>vendas@liquidatech.com<br>suporte@liquidatech.com</p>
                    </div>
                    
                    <div class="mb-4">
                        <i class="fas fa-clock"></i>
                        <h5>Horário de Atendimento</h5>
                        <p>Segunda a Sexta: 9h às 18h<br>Sábado: 9h às 13h<br>Domingo: Fechado</p>
                    </div>
                    
                    <div class="mb-4">
                        <i class="fas fa-share-alt"></i>
                        <h5>Redes Sociais</h5>
                        <div class="social-links mt-3">
                            <a href="#" class="text-white me-3 fs-5"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-white me-3 fs-5"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-white me-3 fs-5"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-white fs-5"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- FAQ Section -->
        <section class="mt-5">
            <h2 class="section-title text-center">Perguntas Frequentes</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse1">
                                    Qual o prazo de entrega?
                                </button>
                            </h2>
                            <div id="faqCollapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    O prazo de entrega varia de acordo com a região. Para a capital de São Paulo, o prazo é de 2 a 5 dias úteis. Para outras localidades, consulte o prazo no momento da finalização do pedido.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse2">
                                    Como funciona a troca de produtos?
                                </button>
                            </h2>
                            <div id="faqCollapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Você tem até 7 dias para solicitar a troca de produtos a partir da data de recebimento. Entre em contato conosco pelo telefone, e-mail ou chat para iniciar o processo de troca.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse3">
                                    Vocês oferecem garantia estendida?
                                </button>
                            </h2>
                            <div id="faqCollapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sim, oferecemos garantia estendida para a maioria dos nossos produtos. Consulte a disponibilidade para o produto desejado no momento da compra.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Map Section -->
        <section class="mt-5">
            <h2 class="section-title text-center">Nossa Localização</h2>
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.075426745261!2d-46.65342658440709!3d-23.565734367638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8da0aa315%3A0xd59f9431f2c9776a!2sAv.%20Paulista%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1633456142454!5m2!1spt-BR!2sbr" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
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
                        <li><a href="index.html" class="text-white-50">Início</a></li>
                        <li><a href="index.html#produtos" class="text-white-50">Produtos</a></li>
                        <li><a href="index.html#ofertas" class="text-white-50">Ofertas</a></li>
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