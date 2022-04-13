<?php
require_once ("../../include/initialize.php");
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){
 
		if ($_POST['IDNO'] == "" OR $_POST['FEES'] == ""   ) {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	

			$fee = New FEES();
			
			$fee->EXPENSEID		= $_POST['DESCRIPTION'];  
			$fee->IDNO 			= $_POST['IDNO'];
			$fee->PAYMENT		= $_POST['FEES']; 
			$fee->REMARKS		= $_POST['REMARKS']; 
			$fee->USERNAME		= $_SESSION['ACCOUNT_USERNAME']; 
			$fee->TRANSDATE     = DATE('Y-m-d');
			$fee->create();
 
			message("Student is already paid.", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){

				$fee = New FEES();
			
			$fee->EXPENSEID		= $_POST['DESCRIPTION'];  
			$fee->IDNO 			= $_POST['IDNO'];
			$fee->PAYMENT		= $_POST['FEES']; 
			$fee->REMARKS		= $_POST['REMARKS']; 
			$fee->USERNAME		= $_SESSION['ACCOUNT_USERNAME']; 
			$fee->TRANSDATE     = DATE('Y-m-d');
			$fee->update($_POST['FEEID']);

			  message("Payment has been updated!", "success");
			redirect("index.php");
		}
	}


	function doDelete(){
		
		
		
				$id = 	$_GET['id'];

				$fee = New FEES();
	 		 	$fee->delete($id);
			 
			message("Payment already Deleted!","info");
			redirect('index.php');
	

		
	}
 
 
?>