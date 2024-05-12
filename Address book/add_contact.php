<?php include('core/init.php'); ?>
<?php 

$db=new Database();
$db->query("INSERT INTO `contact` (first_name,last_name,email,phone,address1,address2,city,state,zipcode,notes,contact_group) VALUES (:first_name,:last_name,:email,:phone,:address1,:address2,:city,:state,:zipcode,:notes,:contact_group)");

$db->bind(':first_name',$_POST['first_name']);
$db->bind(':last_name',$_POST['last_name']);
$db->bind(':email',$_POST['email']);
$db->bind(':phone',$_POST['phone']);
$db->bind(':address1',$_POST['address1']);
$db->bind(':address2',$_POST['address2']);
$db->bind(':city',$_POST['city']);
$db->bind(':state',$_POST['state']);
$db->bind(':zipcode',$_POST['zipcode']);
$db->bind(':notes',$_POST['notes']);
$db->bind(':contact_group',$_POST['contact_group']);


if($db->execute()){
	echo "the contact added successfully";
}else{
	echo "Could not add the contact";
}

//var_dump($_POST);
?>