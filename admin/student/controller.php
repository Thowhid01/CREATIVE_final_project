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

	case 'addgrade' :
	doUpdateGrades();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

	case 'setofficer' :
	doSetOfficer();
	break;

    case 'resetpassword' :
	doResetPassword();
	break;

 

 
	}
   
	function doInsert(){
		global $mydb;
		if(isset($_POST['submit'])){ 
			if ($_POST['FNAME'] == "" OR $_POST['LNAME'] == "" OR $_POST['MI'] == ""
				OR $_POST['optionsRadios'] == "" OR $_POST['BIRTHDATE'] == "" OR $_POST['PADDRESS'] == "") {
				$messageStats = false;
				message("All field is required!","error");
				redirect('index.php?view=add');
			}else{	

					$age = date_diff(date_create($_POST['BIRTHDATE']),date_create('today'))->y;
					 if ($age < 15){
					       message("Invalid age. 15 years old and above is allowed.", "error");
					       redirect("index.php?view=view&id=".$_POST['IDNO']);

					    }else{


				 
							$student = New Student(); 
							$res = $student->single_student($_POST['STUDID']);
							if ($res) {
								
								message("Id number is already exist.","error");
								redirect("index.php?view=add");
							}

							$student->IDNO 			= $_POST['STUDID'];
							$student->FNAME 		= $_POST['FNAME'];
							$student->LNAME 		= $_POST['LNAME'];
							$student->MNAME 		= $_POST['MI'];
							$student->SEX 			= $_POST['optionsRadios'];
							$student->BDAY 			= date_format(date_create($_POST['BIRTHDATE']),'Y-m-d');
							$student->BPLACE 		= $_POST['BIRTHPLACE'];
							$student->STATUS 		= $_POST['CIVILSTATUS'];
							$student->NATIONALITY 	= $_POST['NATIONALITY'];
							$student->RELIGION 		= $_POST['RELIGION'];
							$student->CONTACT_NO	= $_POST['CONTACT'];
							$student->HOME_ADD 		= $_POST['PADDRESS'];
							$student->ACC_USERNAME	= $_POST['STUDID'];
							$student->ACC_PASSWORD 	= sha1($_POST['STUDID']);
							$student->COURSE_ID   	= $_POST['COURSEID'];
							
							$student->create();


							$studetails = New StudentDetails();
							$studetails->IDNO 				= $_POST['STUDID'];
							$studetails->GUARDIAN	 	= $_POST['GUARDIAN'];
							$studetails->GCONTACT 		= $_POST['GCONTACT'];
							$studetails->create();
				  
							$sql= "SELECT * FROM `subject` s, `course` c WHERE s.`COURSE_ID`=c.`COURSE_ID` AND CURRICULUM='New Curriculum' AND c.`COURSE_ID`=".$_POST['COURSEID'];
							$mydb->setQuery($sql);
							$res = $mydb->loadResultList();
							foreach ($res as $row) {
								
								$studentsubject = New StudentSubjects();
								$studentsubject->IDNO 		= $_POST['STUDID'];
								$studentsubject->SUBJ_ID	= $row->SUBJ_ID;
								$studentsubject->LEVEL 		= $row->YEARLEVEL;
								$studentsubject->SEMESTER 	= $row->SEMESTER;
								$studentsubject->SY 		= $_POST['SY'];
								$studentsubject->ATTEMP 	= 1; 
								$studentsubject->create();

								$grade = New Grade();
								$grade->IDNO = $_POST['STUDID'];
								$grade->SUBJ_ID	 = $row->SUBJ_ID;
								$grade->SEMS     = $row->SEMESTER;
								$grade->create();
							}

							$studAuto = New Autonumber();
							$studAuto->studauto_update();

							 message("New student created successfully!", "success");
							redirect("index.php");
						}
				
			}
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){


	$age = date_diff(date_create($_POST['BIRTHDATE']),date_create('today'))->y;
 if ($age < 15){
       message("Invalid age. 15 years old and above is allowed.", "error");
       redirect("index.php?view=view&id=".$_POST['IDNO']);

    }else{
    	$stud = New Student();
		$stud->FNAME 				= $_POST['FNAME'];
		$stud->LNAME 				= $_POST['LNAME'];
		$stud->MNAME 				= $_POST['MI'];
		$stud->SEX 					= $_POST['optionsRadios'];
		$stud->BDAY 				= date_format(date_create($_POST['BIRTHDATE']),'Y-m-d');
		$stud->BPLACE 				= $_POST['BIRTHPLACE'];
		$stud->STATUS 				= $_POST['CIVILSTATUS'];
		$stud->NATIONALITY			= $_POST['NATIONALITY'];
		$stud->RELIGION 			= $_POST['RELIGION'];
		$stud->CONTACT_NO 			= $_POST['CONTACT'];
		$stud->HOME_ADD 			= $_POST['PADDRESS'];
		 
		$stud->update($_POST['IDNO']);


		$studetails = New StudentDetails();
		$studetails->GUARDIAN	 	= $_POST['GUARDIAN'];
		$studetails->GCONTACT 		= $_POST['GCONTACT'];
		$studetails->update($_POST['IDNO']);

		message("Student has been updated!", "success");
		redirect("index.php?view=view&id=".$_POST['IDNO']);
    }
			
	 


		}
	}


	function doDelete(){
	
				$id = 	$_GET['id'];

				$subj = New Subject();
	 		 	$subj->delete($id);
			 
			message("User already Deleted!","info");
			redirect('index.php');
		

		
	}

	function doUpdateGrades(){
		global $mydb;


		if(isset($_POST['save'])){ 
			$idno = $_POST['IDNO'];
			$subid =$_POST['SUBJ_ID'];

				$pre="";
				$idno = $_POST['IDNO'];
			
		}
	} 
 
 function doSetOfficer(){
 	global $mydb;

 	if ($_GET['status']=='Set Officer') {
 	

 		$status = 'Officer';
 		$ID = $_POST['ID'];
 		message("A new officer has been added!", "success");

 		$sql= "SELECT * FROM tblstudent WHERE IDNO='".$ID."'";
 		$mydb->setQuery($sql);
 		$stud = $mydb->loadSingleResult();


		$user = New User();
		$user->EMPID 				= $stud->IDNO;
		$user->POSITION 			= $_POST['POSITION'];
		$user->ACCOUNT_NAME 		= $stud->FNAME . ' '. $stud->LNAME;
		$user->ACCOUNT_USERNAME		= $stud->ACC_USERNAME;
		$user->ACCOUNT_PASSWORD		= $stud->ACC_PASSWORD;
		$user->ACCOUNT_TYPE			= 'Officer';
		$user->create();

 	}else{

 		$status = 'Student';
 		$ID = $_GET['id'];
 		message("Officer has been deactivated!", "success");

		$sql= "DELETE FROM useraccounts WHERE EMPID='".$_GET['id']."'";
 		$mydb->setQuery($sql);
 		$mydb->executeQuery();
 	}

    $sql ="UPDATE `tblstudent` SET `ACCOUNTTYPE` ='".$status."' WHERE `IDNO`='".$ID."'";
 	$mydb->setQuery($sql);
 	$mydb->executeQuery();

	
	redirect("index.php");
 }

 function doResetPassword()
{
	global $mydb;

	$sql = "SELECT * FROM `tblstudent` WHERE `IDNO`='".$_GET['id']."'";
	$mydb->setQuery($sql);
	$res  = $mydb->loadSingleResult();

			$stud = New Student(); 
			$stud->ACC_PASSWORD = sha1($res->IDNO);
			$stud->update($res->IDNO);

	
		if ($res->ACCOUNTTYPE=='Officer') {
			
				$user = New User();
				$user->ACCOUNT_PASSWORD =  sha1($res->IDNO);
				$user->update_officer($res->IDNO);

		
		}
		redirect("index.php");
		message("Password has been reset!","info");
}
?>