<?php include __DIR__ . '/partials/header.php' ?>
<div class="container col-lg-4 my-4">
    <?php if(!empty($posts)) : ?>
        <?php foreach ($posts as $post) : ?>
            <div class="card mb-3" style="width: 18rem;">
                <img src="<?php echo BASE_URL . "/post-img/" . $post['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text"><?php echo $post['legende'] ?></p>
                </div>
            </div> 
        <?php endforeach; ?>
    <?php endif; ?>
    
</div>
<?php include __DIR__ . '/partials/footer.php' ?>