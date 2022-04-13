<?php  
     if (!isset($_SESSION['IDNO'])){
      redirect(web_root."index.php");
     }
 
?>
 
<div class="row">
      <div class="col-lg-12"> 
            <h3 class="page-header">Student Grades </h3>
       	 
       		</div>
        	
   		 	    <form action="controller.php?action=delete" Method="POST">  
			      <div class="table-responsive">			
				<table id="dash-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				 <thead>
				  	<thead> 
				  		<th>Subject</th>
				  		<th>Description</th> 
				  		<th>Unit</th> 
				  		<th>Year Level</th>
				  		<th>Semester</th> 
				  		<th>Average</th>
				  		<th>Remarks</th>
				 
				  	</thead>	
				  </thead> 
				  <tbody>
				  	<?php  
				  	

						$sql = "SELECT * FROM `studentsubjects` st,`subject` s WHERE st.`SUBJ_ID`=s.`SUBJ_ID` and st.`IDNO`='".$_SESSION['IDNO']."'";
				  		$mydb->setQuery($sql);

				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
						 

				  		echo '<tr>';
				  		
				  		echo '<td>'. $result->SUBJ_CODE.'</td>';
				  		echo '<td>'. $result->SUBJ_DESCRIPTION.'</td>';
				  		echo '<td>' . $result->UNIT.'</a></td>'; 
				  		echo '<td>'. $result->LEVEL.'</td>'; 
				  		echo '<td>'. $result->SEMESTER.'</td>';
				  		echo '<td>'. $result->AVERAGE.'</td>'; 
				  		echo '<td>'. $result->OUTCOME.'</td>'; 
				  	
				  		 
				  		
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
 
				
			</div>
				</form>
	

</div> 

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>