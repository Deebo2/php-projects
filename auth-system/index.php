<?php require 'includes/header.php'; ?>
<?php require 'config.php'; ?>
<?php
    $select = $conn->query('SELECT * FROM posts');
    $select->execute();
    $posts = $select->fetchAll(PDO::FETCH_OBJ);
    if ($select->rowCount() == 0) {
        echo 'There are no posts yet';
    }

 ?>
<main class="form-signin w-50 m-auto mt-5">
    <?php foreach ($posts as $post): ?>
    <div class="card">
      
        <div class="card-body">
            <h5 class="card-title"><?= $post->title; ?></h5>
            <p class="card-text"><?= substr($post->body, 0, 80).'.....'; ?></p>
            <a href="show.php?id=<?= $post->id; ?>" class="btn btn-primary">More</a>
        </div>
    </div>
    <br>
    <?php endforeach; ?>
</main>
<?php require 'includes/footer.php'; ?>
