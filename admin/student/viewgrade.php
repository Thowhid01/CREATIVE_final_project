<?php  
     if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

  @$IDNO = $_GET['id'];
    if($IDNO==''){
  redirect("index.php");
}
  $student = New Student();
  $res = $student->single_student($IDNO);
  
?>

<div class="row">
 <div class="col-lg-12">
 <div class="col-md-5">
 	<h2 ><?php echo   $res->LNAME.','. $res->FNAME.' '. $res->MNAME; ?></h2>
       
 </div>
  <?php 
$sql =" SELECT * FROM tblstudent s,`course` c,`department` d 
       WHERE s.COURSE_ID=c.COURSE_ID AND c.`DEPT_ID`=d.`DEPT_ID` AND `IDNO`='{$IDNO}'";
$mydb->setQuery($sql);

$cur = $mydb->loadSingleResult(); 
 ?>
  <div class="col-lg-7">
  	<div class="col-md-6">
  		<p>Course:<?php echo $cur->COURSE_NAME . ' [ '. $cur->COURSE_DESC. ' ]' ?> </p>
  	</div>
  	<div class="col-md-6">
  		<p>Department :<?php echo $cur->DEPARTMENT_NAME . ' [ '. $cur->DEPARTMENT_DESC. ' ]';?> </p>
  	</div>
  </div>


              
  </div>
  </div> 
<div class="row">
      <div class="col-lg-12"> 
            <h3 class="page-header">Student Subjects  <small><a target="_blank" href="printcurriculumn.php?id=<?php echo $IDNO; ?>" class="btn btn-primary btn-sm "><i class="fa fa-print"></i> Print Curriculumn</a></small></h3>
       	 
       		</div> 
        	
   		 	    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive">			
				<table id="dash-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<th>ID</th>
				  		<th>
				  		
				  		
				  		 Subject</th>
				  		<th>Description</th> 
				  		<th>Unit</th>
				 
				  		<th>Pre-Requisite</th>
				  		<th>Average</th>
				  		<th>Remarks</th>
				  		<th>YearLevel</th>
				  		<th>Semester</th>


				  		<th width="10%" >Action</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php  
				  	
				  	if ($_SESSION['ACCOUNT_TYPE']=='Instructor') {
				  		
				  		$sql ="SELECT * FROM `tblstudent` st, `grades` g,`subject` s ,studentsubjects ss,tblinstructorsubject i
						WHERE st.`IDNO`=g.`IDNO` and g.`SUBJ_ID`=s.`SUBJ_ID`  and s.`SUBJ_ID`=ss.`SUBJ_ID` AND g.`IDNO`=ss.`IDNO` AND ss.SUBJ_ID =i.SUBJ_ID and st.`IDNO`='{$IDNO}'";
				  	}else{

				  		$sql = "SELECT * FROM `tblstudent` st, `grades` g,`subject` s ,studentsubjects ss
						WHERE st.`IDNO`=g.`IDNO` and g.`SUBJ_ID`=s.`SUBJ_ID`  and s.`SUBJ_ID`=ss.`SUBJ_ID` AND g.`IDNO`=ss.`IDNO` and st.`IDNO`='{$IDNO}'";
				  	}
				  		
						$mydb->setQuery($sql);

				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  	
				  		echo '<td>' . $result->SUBJ_ID.'</a></td>';
				  		echo '<td>'. $result->SUBJ_CODE.'</td>';
				  		echo '<td>'. $result->SUBJ_DESCRIPTION.'</td>';
				  		echo '<td>' . $result->UNIT.'</a></td>';
				  		
				  		echo '<td>' . $result->PRE_REQUISITE.'</a></td>';
				  		echo '<td>'. $result->AVE.'</td>'; 
				  		echo '<td>'. $result->REMARKS.'</td>'; 
				  		echo '<td>'. $result->YEARLEVEL.'</td>'; 
				  		echo '<td>'. $result->SEMESTER.'</td>';
				  		

				  		echo '<td align="center" > <a  title="Edit" data-title="Add Grade" href="addmodalgrades.php?id='.$result->SUBJ_ID.'&IDNO='.$result->IDNO.'&gid='.$result->GRADE_ID.'" data-toggle="lightbox" >  <span class="fa fa-plus fw-fa"></span> Add gardes</a>
				  					  </td>';
				  		 
				  		
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
 
			
			</div>
				</form>
	

</div> 

<?php echo $IDNO; ?>