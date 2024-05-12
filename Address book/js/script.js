$(document).ready(function(){
	//show the loading image
	$('#loaderImage').show();
	//load contacts
	showContacts();
	//add contact
	$(document).on('submit','#addContact',function(){
		$('#loaderImage').show();
		$.post('add_contact.php',$(this).serialize()).done(function(data){
			console.log(data);
			//$('#addModal').hide();
			showContacts();
		});
		return false;
		//alert('sadgdsag');
	});
	$(document).on('submit','#deleteContact',function(){
		$('#loaderImage').show();
		$.post('delete_contact.php',$(this).serialize()).done(function(data){
			//console.log(data);
			showContacts();
		});
		return false;
		//alert('sadgdsag');
	});
	//edit contact
	$(document).on('submit','#editContact',function(){
		$('#loaderImage').show();
		$.post('edit_contact.php',$(this).serialize()).done(function(data){
			console.log(data);
			//$('.editModal').hide();
			showContacts();
		});
		return false;
		
	});
});
function showContacts(){
	console.log("showing contacts ....");
	setTimeout("$('#pageContent').load('contact.php',function(){$('#loaderImage').hide();})",1000);
}
