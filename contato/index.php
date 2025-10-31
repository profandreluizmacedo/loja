    <style>
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


    </style>


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
                    <form method="POST">
                        <div class="mb-3">                    
                                <label for="firstName" class="form-label">Nome *</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>                 
                        <div class="mb-3">
                            <label for="subject" class="form-label">Assunto *</label>
                            <select class="form-select" id="assunto" name="assunto" required>
                                <option value="" selected disabled>Selecione um assunto</option>
                                <option value="suporte">Suporte Técnico</option>
                                <option value="vendas">Dúvidas sobre Vendas</option>
                                <option value="produto">Informações sobre Produto</option>
                                <option value="devolucao">Trocas e Devoluções</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>          
                        <div class="mb-3">
                            <label for="mesagem" class="form-label">Mensagem *</label>
                            <textarea class="form-control" id="mensagem" name="mensagem" rows="5" placeholder="Descreva sua dúvida ou solicitação..." required></textarea>
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

<script>
    $("form").submit(function(event) {
        event.preventDefault(); // Evita o envio padrão do formulário
      
        enviarFormulario();
    });

    function enviarFormulario() {
        $.ajax({
            type: "POST",
            url: "contato/email.php",
            data: {
            nome: $("#nome").val(),
            email: $("#email").val(),
            assunto: $("#assunto").val(),
            mensagem: $("#mensagem").val()
        },
        success: function(response) {
            alert("Mensagem enviada com sucesso!"+response);
        },
        error: function() {
            alert("Ocorreu um erro ao enviar a mensagem. Tente novamente.");
        }
    });
    }
</script>