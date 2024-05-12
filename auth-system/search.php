<?php 
    require "config.php";

    if(isset($_POST['search'])){
        $search = $_POST['search'];
        $select =  $conn->query("SELECT * FROM posts WHERE title LIKE '%{$search}%'");
        $select->execute();
        $rows = $select->fetchAll(PDO::FETCH_OBJ);
        if($select->rowCount() > 0){
            echo "<div class='alert alert-success'>{$select->rowCount()} results has been found</div>";
            
        }else{
            echo "<h2 class='alert alert-danger'>No result has been found !! </h2>";
        }
    }


?>
 <?php foreach ($rows as $row): ?>
    <div class="card">
      
        <div class="card-body">
            <h5 class="card-title"><?= $row->title; ?></h5>
            <p class="card-text"><?= substr($row->body, 0, 80).'.....'; ?></p>
            <a href="show.php?id=<?= $row->id; ?>" class="btn btn-primary">More</a>
        </div>
    </div>
    <br>
    <?php endforeach; ?>