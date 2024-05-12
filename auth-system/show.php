<?php
    require 'includes/header.php';
    require 'config.php';
?>
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $getPost = $conn->query("SELECT * FROM posts WHERE id = '$id'");
        $getPost->execute();
        $post = $getPost->fetch(PDO::FETCH_OBJ);
    }
    $data = $conn->query("SELECT * FROM comments WHERE post_id='$id' ORDER BY id DESC");
    $data->execute();
    $comments = $data->fetchAll(PDO::FETCH_OBJ);
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $data = $conn->query("SELECT * FROM rates WHERE post_id='$id' AND user_id='$user_id' ");
        $data->execute();
        $rating = $data->fetch(PDO::FETCH_OBJ);
    }

?>
    <main class="form-signin w-80 m-auto mt-5">
    <div class="card">
    <div class="card-body">
            <h5 class="card-title"><?= $post->title; ?></h5><p>created by : <?= $post->username; ?></p>
            <p class="card-text"><?= $post->body; ?></p>
            <?php if (isset($_SESSION['username'])): ?>
            <form id="rating-form" method="POST">
            <div class="my-rating"></div>
            <input type="hidden" name="rating" id="rating" value="">
            <input type="hidden" name="post_id" id="post_id" value="<?= $post->id; ?>">
            <input type="hidden" name="user_id" id="user_id" value="<?= $_SESSION['user_id']; ?>">

            </form>
            <?php endif; ?>
        </div>
    </div>
    </main>
    <?php if (isset($_SESSION['username'])): ?>
        <main class="form-signin w-70 m-auto mt-5">
  <form method="POST" id="form-data">
    <div class="form-floating"> 
      <input name="username" type="hidden" class="form-control mt-5" id="username" value="<?= $_SESSION['username']; ?>">
    </div>
    <div class="form-floating"> 
      <input name="post_id" type="hidden" class="form-control mt-5" id="post_id" value="<?= $post->id; ?>">
    </div>

    <div class="form-floating">
      <textarea name="comment" rows="9" id="comment" class="form-control mt-2" placeholder="Comment Body"></textarea>
      <label for="floatingPassword">Add Comment</label>
    </div>
        
    <button name="submit" id="submit" class="w-100 btn btn-lg btn-primary mt-5" type="submit">Create Comment</button>

  </form>
  <div id="message" class="nothing"></div>
  <div id="delete-msg" class="nothing"></div>
    </main>
    <?php endif; ?>
    <?php foreach ($comments as $comment): ?>
    <main class="form-signin w-80 m-auto mt-3">
    <div class="card">
    <div class="card-body">
            <h5 class="card-title"><?= $comment->username; ?></h5>
            <p class="card-text"><?= $comment->comment; ?></p>
            <?php if (isset($_SESSION['username']) && $_SESSION['username'] == $comment->username): ?>
                <button id="delete-btn" class="btn btn-danger mt-3" value="<?= $comment->id; ?>">Delete</button>
            <?php endif; ?>
        </div>
    </div>
    </main>
    <?php endforeach; ?>

<?php require 'includes/footer.php'; ?>
<script>
    $(document).ready(function(){
        $(document).on('submit',function(e){
            e.preventDefault();
            //alert("submitted successfully");
            var formData = $('#form-data').serialize()+'&submit=submit';
            $.ajax({
                type : 'post',
                url : 'insert-comments.php',
                data : formData,
                success : function(){
                    //alert('comment created');
                    $('#comment').val(null);
                    $('#username').val(null);
                    $('#post_id').val(null);
                    $('#message').html("Added successfully").toggleClass("alert alert-success bg-success text-white mt-3");
                    fetch();
                }
            });
        });
        $('#delete-btn').on('click',function(e){
            e.preventDefault();
            var id = $(this).val();
            
            $.ajax({
                type : 'post',
                url : 'delete-comment.php',
                data : {
                    delete : 'delete',
                    id : id
                },
                success : function(){
                    
                    $('#delete-msg').html("deleted successfully").toggleClass("alert alert-success bg-success text-white mt-3");
                    fetch();
                }
            });
        });
        function fetch(){
            setInterval(() => {
                $('body').load('show.php?id=<?= $id; ?>');
            }, 10000);
        }
        //rating sys
        $(".my-rating").starRating({
            starSize: 25,
            initialRating: "<?php
                if (isset($rating->rating)) {
                    echo $rating->rating;
                } else {
                    echo 0;
                }
            ?>" ,
            callback: function(currentRating, $el){
                
                $('#rating').val(currentRating);
                $(".my-rating").click(function(e){
                    e.preventDefault();
                    var formdata = $("#rating-form").serialize()+"&insert=insert";
                    $.ajax({
                        type : "POST",
                        url : "insert-ratings.php",
                        data : formdata , 
                        success : function(){
                            alert(formdata);
                        }
                    });
                });
    }
});
    });
</script>