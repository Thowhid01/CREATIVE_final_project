<style type="text/css">
	.panel-body{
		min-height: 150px;
		text-align: center;
		font-size: 75px; 
	}
</style>

<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading" style="background-color: #039056;">
			Collection of Student
		</div>
		<div class="panel-body" style="color:cyan">
			<?php 
				$sql ="SELECT * FROM `tblstudent`";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$allstudent = $mydb->num_rows($cur);

				echo $allstudent;
			?>
		</div>
	</div>
</div>
 
<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading" style="background-color: #039056;">
			Collection of Officer
		</div>
		<div class="panel-body" style="color:darkblue">
		   <?php 
				$sql ="SELECT * FROM `tblstudent` WHERE ACCOUNTTYPE='Officer'";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$allofficer = $mydb->num_rows($cur);

				echo $allofficer;
			?>
		</div>
	</div>
</div>
<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading" style="background-color: #039056;">
			Collection of User
		</div>
		<div class="panel-body" style="color:green">
			<?php 
				$sql ="SELECT * FROM `useraccounts`";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$alluser = $mydb->num_rows($cur);

				echo $alluser;
			?>
		</div>
	</div>
</div>  
<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading" style="background-color: #039056;">
			Collection of Payments
		</div>
		<div class="panel-body"  style="color:red">
			<?php 


					$sql ="SELECT SUM(`PAYMENT`) as 'Payment',COURSE_NAME FROM course c, `tblexpenses` e, `tblfees` f WHERE c.`COURSE_ID`=e.`COURSE_ID` AND e.`EXPENSEID`=f.`EXPENSEID`";
					$mydb->setQuery($sql);
					$collection = $mydb->loadSingleResult();
				 

					echo $collection->Payment .'<br>';
			




			
			?>
		</div>
	</div>
</div>
  