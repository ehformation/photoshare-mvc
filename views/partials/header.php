<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photoshare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-secondary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
        <img style="max-width:200px" src="<?php echo BASE_URL ?>/assets/img/logo-ps.png" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php if(isset($_SESSION['user'])) : ?>
            <li class="nav-item">
                <a class="nav-link text-capitalize" href="<?php echo BASE_URL ?>/profile">Hello! <?php echo $_SESSION['user']['username'] ?> </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL ?>/logout">Déconnexion</a>
            </li>
        <?php endif; ?>
        <?php if(!isset($_SESSION['user'])) : ?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>/login">Se connecter</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL ?>/register">S'inscrire</a>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>