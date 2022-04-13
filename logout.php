<?php 
require_once 'include/initialize.php';

@session_start();


 $sql="INSERT INTO `tbllogs` (`USERID`, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) 
          VALUES (".$_SESSION['IDNO'].",'".date('Y-m-d H:i:s')."','Student','Logged out')";
           $mydb->setQuery($sql) ;
          $mydb->executeQuery();

   if ($_SESSION['ACCOUNTTYPE']=='Officer') { 
		  // 2. Unset all the session variables
			unset($_SESSION['ACCOUNT_ID']);
			unset($_SESSION['ACCOUNT_NAME']);   
			unset($_SESSION['ACCOUNT_USERNAME']);  
			unset($_SESSION['ACCOUNT_PASSWORD']); 	 
			unset($_SESSION['ACCOUNT_TYPE'] );		
   }

		unset($_SESSION['IDNO']);   		 
		unset($_SESSION['ACC_USERNAME']); 	 
		unset($_SESSION['ACC_PASSWORD']); 	 
		unset($_SESSION['FNAME']);			 
		unset($_SESSION['LNAME']);			 
		unset($_SESSION['MI']);				 
		unset($_SESSION['PADDRESS']);	 
		unset($_SESSION['COURSEID']);		 
		unset($_SESSION['CONTACT']);		 
		unset($_SESSION['COURSELEVEL']);	 
		unset($_SESSION['ACCOUNTTYPE']);	 


redirect("index.php?logout=1");
?> 	 