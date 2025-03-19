<?php include __DIR__ . '/partials/header.php' ?>

<div class="container">
    <div class="row justify-content-lg-center">
        <div class="col-lg-4">
            <h1>Photoshare - Login</h1>
            <?php if (!empty($error)) : ?>
                <div class="alert alert-danger">
                    <p class="mb-0"><?php echo $error; ?></p>
                </div>
            <?php endif; ?>
            <form action="<?php echo BASE_URL ?>/login" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="pass">
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/partials/footer.php' ?>