<?php
session_start();


if (!isset($_SESSION['user_name'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Digital - Landing Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            height: 100vh;
            background: url('img/pexels-stephen-leonardi-587681991-27087197.jpg') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 4rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .carousel-item img {
            object-fit: cover;
            height: 500px;
            width: 100%;
        }
        .service-icon {
            font-size: 3rem;
            color: #007bff;
        }

        .deitar {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .top-bar {
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>


<div class="top-bar">
    <div class="container">
        <?php if (isset($_SESSION['user_name'])): ?>
            <span>Bem-vindo, <?php echo $_SESSION['user_name']; ?>! <a href="logout.php">Sair</a></span>
        <?php else: ?>
            <span>Você não está logado. <a href="login.php">Entrar</a></span>
        <?php endif; ?>
    </div>
</div>


<section class="hero-section">
    <div>
        <h1>Bem-vindo à Acesso Digital</h1>
        <p>Conectando você ao mundo digital com qualidade e eficiência.</p>
        <a href="form.html" class="btn btn-primary btn-lg">Entre em Contato</a>
    </div>
</section>

<div id="carouselExampleCaptions" class="carousel slide mt-5">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/pexels-thisisengineering-3861969.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Serviço Rápido</h5>
                <p>Experimente a velocidade de nossos serviços.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/pexels-kindelmedia-7979605.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Suporte 24/7</h5>
                <p>Estamos aqui para ajudar a qualquer hora do dia.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/pexels-kevin-ku-92347-577585.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Planos Personalizados</h5>
                <p>Escolha o plano que se adapta às suas necessidades.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
    </button>
</div>


<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Sobre a Acesso Digital</h2>
            <p>A Acesso Digital é uma empresa dedicada a fornecer soluções de internet de alta qualidade para clientes em todo o país. Com anos de experiência no setor, oferecemos um serviço rápido, confiável e com suporte contínuo.</p>
        </div>
        <div class="col-md-6">
            <img src="img/pexels-olly-3764496.jpg" class="img-fluid rounded" alt="Sobre nós">
        </div>
    </div>
</div>

<div class="deitar">
    <div class="card" style="width: 18rem;">
        <img src="img/pexels-olly-837358.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Determinação</h5>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
        <img src="img/pexels-pixabay-39866.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Habilidade</h5>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
        <img src="img/pexels-tirachard-kumtanom-112571-601170.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Companheirismo</h5>
        </div>
    </div>
</div>

<div class="container">
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top dark">
        <div class="col mb-3">
            <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <p class="text-muted">© 2022</p>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
