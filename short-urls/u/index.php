<?php require '../config.php'; ?>
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $select = $conn->query("SELECT * FROM urls WHERE id = '$id'");
        $select->execute();
        $data = $select->fetch(PDO::FETCH_OBJ);
        //increase clicks
        $clicks = $data->clicks + 1;
        //update clicks for this id
        $update = $conn->prepare("UPDATE urls SET clicks = :clicks WHERE id = '$id'");
        $update->execute([':clicks' => $clicks]);

        header('location: '.$data->url.'');
    }
?>