<style type="text/css">
	.panel-body{
		min-height: 150px;
		text-align: center;
		font-size: 75px; 
	}
	.col-md-4 {
		padding: 0px;
		margin: 0px;
		text-align: center;
		width: 15%;
	}


</style>
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-3">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Collection of Student
		</div>
		<div class="panel-body">
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
		<div class="panel-heading">
			Collection of Payments
		</div>
		<div class="panel-body" style="font-size: 30px;">
			<?php 

					$sql ="SELECT SUM(`PAYMENT`) as 'Payment',COURSE_NAME FROM course c, `tblexpenses` e, `tblfees` f WHERE c.`COURSE_ID`=e.`COURSE_ID` AND e.`EXPENSEID`=f.`EXPENSEID`";
					$mydb->setQuery($sql);
					$collection = $mydb->loadSingleResult();
				 

					echo $collection->Payment .'<br>';
		


 
			?>
		</div>
	</div>
</div> 
<div class="col-md-3"></div>
</div>  
<style type="text/css">
	
* {margin: 0; padding: 0;}

.tree ul {
    padding-top: 20px; position: relative;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}



.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}


.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}


.tree li:only-child{ padding-top: 0;}


.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}

.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}


.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #ccc;
	padding: 5px 10px;
	text-decoration: none;
	color: #666;
	font-family: arial, verdana, tahoma;
	font-size: 11px;
	display: inline-block;
	
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}


.tree li a:hover, .tree li a:hover+ul li a {
	background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
}

.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
} 
.tree a{
	
}
.tree a > img {
	width: 50px;
}

</style>



<?php
function loadDataOrg($position=""){
global $mydb;
	$sql="SELECT * FROM `tblstudent`  , `useraccounts` WHERE IDNO=`EMPID` AND `POSITION` Like '%{$position}%'";
	$mydb->setQuery($sql);
	$cur = $mydb->executeQuery();
	$maxrow = $mydb->num_rows($cur);

	if ($maxrow>0) {
	
		$res = $mydb->loadSingleResult(); 
		echo '<img src="'.web_root.'/student/'.$res->STUDPHOTO.'" /><br/>';
		echo $res->FNAME . ' '.$res->LNAME;
 
	}else{
		echo 'None';
	}
	
}	
?>
</style>
<div class="container" style="margin-buttom:30px;">
<h1 class="page-header">Organizational Chart</h1>
 <div class="tree">
    <ul> 
      		<li>
				 <a href="#"><?php loadDataOrg("President"); ?> <br/>President</a>
					<ul>
						<li><a href="#"><?php loadDataOrg("Secretary"); ?> <br/>Secretary</a></li>
						<li>
							<a href="#"><?php loadDataOrg("Vice-President"); ?> <br/>Vice President</a>
							<ul>
								<li>
									<a href="#"><?php loadDataOrg("Treasurer-1"); ?> <br/>Treasurer-1</a>
								</li>
								<li>
									<a href="#"><?php loadDataOrg("Auditor"); ?> <br/>Auditor</a>
									<ul>
										<li><a href="#"><?php loadDataOrg("PIO-1"); ?> <br/>PIO-1</a>
											<ul>
												<li><a href=""><?php loadDataOrg("Business Manager-1"); ?> <br/>Business Manager-1</a>
													<ul>
														<li><a href=""><?php loadDataOrg("First Year Rep."); ?> <br/>First Year Rep.</a></li> 
														<li><a href=""><?php loadDataOrg("Second Year Rep."); ?> <br/>Second Year Rep.</a></li> 
													</ul>
													<ul>
														<li style="padding-top:20px;"><a href="" style="width:215px"><?php loadDataOrg("Adonis"); ?> <br/>Adonis</a></li>  
													</ul>
												</li> 
											</ul>
										</li>
										<li><a href="#"><?php loadDataOrg("PIO-2"); ?> <br/>PIO-2</a>
											<ul>
												<li><a href=""><?php loadDataOrg("Business Manager-2"); ?> <br/>Business Manager-2</a>
													<ul>
														<li><a href=""><?php loadDataOrg("Third Year Rep."); ?> <br/>Third Year Rep.</a></li> 
														<li><a href=""><?php loadDataOrg("Fourth Year Rep."); ?> <br/>Fourth Year Rep.</a></li> 
													</ul>
													<ul>
														<li style="padding-top:20px;"><a href="" style="width:215px;border-left:1px solid #ddd"><?php loadDataOrg("Muse"); ?> <br/>Muse</a></li>  
													</ul>
												</li> 
											</ul>
										</li>
									</ul>
								</li>
								<li>
									<a href="#"><?php loadDataOrg("Treasurer-2"); ?> <br/>Treasurer-2</a>
								</li>
							</ul>
						</li>
						<li><a href="#"><?php loadDataOrg("Sub-Secretary"); ?> <br/>Sub-Secretary</a></li>
					</ul>
				</li> 
	</ul>
</div>
</div>

<br/>
<br/>
<br/>
<br/>
<br/>