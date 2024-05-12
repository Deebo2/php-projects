<?php include('core/init.php'); ?>
<?php 
//var_dump($_POST['id']);
$db=new Database();
$db->query("DELETE FROM `contact` WHERE id = :id");


$db->bind(':id',$_POST['id']);


if($db->execute()){
	echo "the contact deleted successfully";
}else{
	echo "Could not deleted the contact";
}

//var_dump($_POST);*/
?>