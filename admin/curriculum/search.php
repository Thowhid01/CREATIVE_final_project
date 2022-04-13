<?php
 require_once ("../../include/initialize.php");


$searchTerm = $_GET['term'];

 $mydb->setQuery("SELECT * FROM `subject` WHERE `SUBJ_CODE` LIKE '%".$searchTerm."%' GROUP BY SUBJ_CODE");
 $res = $mydb->loadResultList();
 foreach ($res as $row ) {
 	
 	  $data[] = $row->SUBJ_CODE;
 }
 

echo json_encode($data);
?>