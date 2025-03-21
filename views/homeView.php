<?php include __DIR__ . '/partials/header.php' ?>
<div class="container col-lg-4 my-4">

    <!-- Formulaire d'ajout de post -->
    <div class="card my-4">
        <div class="card-body">
            <form method="post" action="<?php echo BASE_URL; ?>/post/add" enctype="multipart/form-data" >
                <div class="mb-4">
                    <label for="postImage" class="form-label">Choisir une image</label>
                    <input class="form-control form-control-lg" id="postImage" name="image" type="file">
                </div>

                <div class="mb-4">
                    <label class="form-label" for="legende">Description</label>
                    <textarea id="legende" name="legende" class="form-control" required ></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Poster</button>

            </form>
        </div>
    </div>

    <?php if(!empty($posts)) : ?>
        <?php foreach ($posts as $post) : ?>
            <div class="card mb-3">
                <img src="<?php echo BASE_URL . "/post-img/" . $post['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="card-text">
                        <h2 class="h5"><?php echo $post['legende'] ?></h2>
                        <small class="text-muted">
                            <?php echo $post['created'] ?>
                        </small>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div>
                        <span><?php echo $post['nbrLikes']; ?> J'aime</span>
                    </div>
                    <div>
                        <a href="<?php echo BASE_URL ?>/like/add/<?php echo $post['id'] ?>">Like</a>
                    </div>
                </div>
            </div> 
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php include __DIR__ . '/partials/footer.php' ?>