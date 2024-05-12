<?php
    require 'includes/header.php';

    require 'config.php';
?>
<?php
          if(!isset($_SESSION['username'])){
            header("location: index.php");
          }else{
            if (isset($_POST['submit'])) {
              if (empty($_POST['title']) || empty($_POST['body'])) {
                  echo 'some inputs are empty';
              } else {
                  $title = $_POST['title'];
                  $body = $_POST['body'];
                  $username = $_SESSION['username'];
                  $insert = $conn->prepare('INSERT INTO posts (title,body,username) VALUES (:title,:body,:username)');
                  $insert->execute([
                ':title' => $title,
                ':body' => $body,
                ':username' => $username,
              ]);
                  header('location: index.php');
              }
          }
          }
    

?>
<main class="form-signin w-50 m-auto">
  <form method="POST" action="create.php">
   
    <h1 class="h3 mt-5 fw-normal text-center ">Create Post</h1>

    <div class="form-floating"> 
      <input name="title" type="text" class="form-control mt-5" id="floatingInput" placeholder="Title">
      <label for="floatingInput">Post Title</label>
    </div>

    <div class="form-floating">
      <input name="username" type="hidden" class="form-control " id="floatingInput">
    </div>

    <div class="form-floating">
      <textarea name="body" rows="9" class="form-control mt-2" placeholder="Post Body"></textarea>
      <label for="floatingPassword">Body</label>
    </div>

    <button name="submit" class="w-100 btn btn-lg btn-primary mt-5" type="submit">Create</button>

  </form>
</main>

    <?php require 'includes/footer.php';
?>