<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title; ?> Academical Survilance System.</title>

     <!-- Bootstrap Core CSS -->
<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?php echo web_root; ?>font/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="<?php echo web_root; ?>font/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- DataTables CSS -->
<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet">

<!-- datetime picker CSS -->
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<link href="<?php echo web_root; ?>css/modern.css" rel="stylesheet">
<link href="<?php echo web_root; ?>css/costum.css" rel="stylesheet">

<link href="<?php echo web_root; ?>css/ekko-lightbox.css" rel="stylesheet">

<link rel="stylesheet" href="<?php echo web_root; ?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> 

<link href="<?php echo web_root; ?>css/style.css" rel="stylesheet" media="screen">
<link href="<?php echo web_root; ?>css/diapo.css" rel="stylesheet" media="screen">
 <style type="text/css">

.p {

  color: white;
   margin-bottom: 0;
  margin-top: 0;
 
  list-style: none;
}

.p > a { 
  color: white;

  margin-bottom: 0;
  margin: 0;
  padding: 0;
  text-decoration:none;
   background-color: #0E9154;;
}
.p > a:hover ,
.p > a:focus {
   color: black; 
   text-decoration:none;
   background-color: #0E9154;
}


 
.title-logo  {
    color:black;
    text-decoration:none;
    font-size: 42px;
    font-family: "broadway";
    /*font-style: bold;*/
    padding: 0;
    margin: 0;
    top: 0;
  
  }
.title-logo:hover {
  color: blue; 
  text-decoration:none; 
}
.carttxtactive {
  color: red;
  font-style: bold;
  box-shadow: red;

}
.carttxtactive:hover {
   color: white;
}

.menu  li {
  left: 0px;
  width: 150px;
  padding: 0 3px 0 3px;
  text-align: center;
 
}
.stretch{ 
  margin-bottom: -20px; 
}
.stretch img{ 
  width: 100%;
  padding: 0;
  margin: 0;
}

</style>

<style>
    .da-thumbs li a div {
      top: 0px;
      left: -100%;
      -webkit-transition: all 0.3s ease;
      -moz-transition: all 0.3s ease-in-out;
      -o-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
    }
    .da-thumbs li a:hover div{
      left: 0px;
    }
  </style>
 
</head>

<body style="Pbackground-color:#e0e4e5" >

<div class="navbar-fixed-top navbar-TOPsm container" style="background-color: #0E9154;"    role="navigation">
  <div class="container">
    <div class="navbar-header">
          <h5 class="navbar-menu p" >Web Based Student Management System.</h5>
         <button type="button" class="navbar-toggle btn-xs p" data-toggle="collapse" data-target=".smMenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button> 
    </div>
      <div  class="collapse navbar-collapse  smMenu " style="background-color: #0E9154;"> 

      
          <ul class="navbar-nav p navbar-right " style="min-height:20px; background-color: #0E9154;">
           <?php 
                if (isset($_SESSION['ACCOUNT_ID']) ){  
                 if ($_SESSION['ACCOUNT_TYPE']=='Administrator') { 
            ?>
                <li class="dropdown  dropdown-toggle">
                   <a  href="<?php echo web_root; ?>admin/">
                      <i class="fa fa-dashboard fa-fw"></i>
                      Admin Page
                   </a>  
                </li>   
                <li class="divider">  | </li> 

            <?php }elseif($_SESSION['ACCOUNT_TYPE']=='Officer'){ ?>
                <li class="dropdown  dropdown-toggle">
                   <a  href="<?php echo web_root; ?>admin/">
                      <i class="fa fa-dashboard fa-fw"></i>
                      Officer Page
                   </a>  
                </li>   
                <li class="divider">  | </li>
             <?php }else{  ?>
              <li class="dropdown  dropdown-toggle">
                   <a  href="<?php echo web_root; ?>admin/">
                      <i class="fa fa-dashboard fa-fw"></i>
                      Instructor Page
                   </a>  
                </li>   
                <li class="divider">  | </li>

             <?php } } ?>

            <?php if (isset($_SESSION['IDNO']) ){  

              $student = New Student();
              $singlestudent = $student->single_student($_SESSION['IDNO']);  
            ?> 
           
            <li class="dropdown  dropdown-toggle">
               <a  href="<?php echo web_root; ?>index.php?q=profile">
                  <i class="fa fa-user fa-fw"></i>
                    <?php echo $singlestudent->FNAME. ' ' . $singlestudent->LNAME ; ?>
              
               </a>  
            </li>  
            <li class="divider">  | </li>
             <li><a  href="logout.php"><i class="material-icons"> </i> Logout</a></li>  
 
          <?php  }?> 

        </ul>
      </div>

  </div>
</div>
 
  <div class=" container stretch "  style="margin-top:-30px; "> 
    <div class="row">
        <img  src="<?php echo web_root; ?>image/a.jpg" style="margin-bottom: 25px;"  >  
    </div>
  </div> 
 <div class="navbar   navbar-magbanua  container" style="background-color: #0E9154;"    role="navigation">
    
      <div class="container ">
        <div class="navbar-header"> 
            <div class="navbar-menu p" >Menu</div>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bigMenu">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> 

       <?php echo web_root; ?>
        </div>
 
        <div class="collapse navbar-collapse bigMenu"   > 
          <ul class="nav navbar-nav menu" style="margin-left:-4%;"    > 

          <!-- <ul class="nav navbar-nav" >  -->
            <li class="dropdown dropdown-toggle <?php echo ($_GET['q']=='') ? "active" : false;?> ">
              <a href="<?php echo web_root.'index.php'; ?>">Home</a>
            </li>
            <li class="dropdown-toggle <?php echo ($_GET['q']=='department') ? "active" : false;?>" >
              <a href="<?php echo web_root.'index.php?q=department'; ?>">Department</a>
            </li>
            
            <li class="dropdown-toggle <?php echo ($_GET['q']=='blogs') ? "active" : false;?>" >
              <a href="<?php echo web_root.'index.php?q=blogs'; ?>">Announcement</a>
            </li>
 
             <li class="dropdown-toggle <?php echo ($_GET['q']=='contact') ? "active" : false;?>">
              <a href="<?php echo web_root.'index.php?q=contact';  ?>">Contact Us</a>
            </li> 
           <li class="dropdown-toggle <?php echo ($_GET['q']=='about') ? "active" : false;?> ">
             <a href="<?php echo web_root.'index.php?q=about';  ?>"> 
               About Us
             </a>
          </li>
          
          </ul>           
        </div> 
        <!--/.navbar-collapse --> 
    </div> 
   <!-- /.nav-collapse --> 
  </div> 
 <!-- /.container -->

<!-- pop up login -->
<?php // include "LogSignModal.php"; ?> 
<!-- end pop up login -->
  
<div class="container "> 
   <!-- start content --> 
   
  <?php  check_message(); ?> 
  
        <div class="row"> 
          <div id="page-wrapper">
               <?php

          if($title=='Profile'){
                echo ' <div class="row">';

                require_once $content;
                echo ' </div><br/>';
     
              }else{
  // check_message(); ?>

 
            <div class="row" style="min-height: 400px;">
           <div class="col-lg-3">
          
                  <?php 
                  require_once "sidebar.php";
                
                    ?>
             </div>
              <div class="col-lg-9">
                <div class="panel panel-default">
                  <div class="panel-heading" style="background-color:#008C44;color:#fff;">
                  <b><?php   
                  echo  $title . (isset($_GET['category']) ?  '  |  ' .$_GET['category'] : '' )?> </b> 
                  </div>
                  <div class="panel-body">
                 
                    <?php require_once $content; ?>
           
                     
                  </div>
                <!--   <div class="panel-footer">
                      Panel Footer
                  </div> -->
              </div>
          </div> 
        </div>
        <?php }

?>
       </div>
            <footer class="panel-footer" style="background-color:#008C44;color:#fff;" >
              <p align="center" >&copy; Academical Survilance System.</p>
           </footer>
      </div>

  </div>  
<!-- end of page  -->
 
<!-- jQuery -->
<script src="<?php echo web_root; ?>jquery/jquery.min.js"></script> 

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>input-mask/jquery.inputmask.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>input-mask/jquery.inputmask.date.extensions.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>input-mask/jquery.inputmask.extensions.js"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<!-- DataTables JavaScript -->
<script src="<?php echo web_root; ?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo web_root; ?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo web_root; ?>js/ekko-lightbox.js"></script>

<script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo web_root; ?>js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>  
<script src="<?php echo web_root;?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script> 
$(function () {
//Add text editor 
$("#ANNOUNCEMENT_WHAT").wysihtml5(); 
});


    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>


 
<script type="text/javascript">


$('#date_picker').datetimepicker({
  format: 'mm/dd/yyyy',
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
    });

 $(document).ready(function() {
    $('#dash-table').DataTable({
                responsive: true ,
                  "sort": false
        });
 
    });
</script>  

<?php  if (!isset($_GET['q'])) { ?> 

<script src="<?php echo web_root; ?>jquery/jquery-slide.min.js"></script> 
<script src="<?php echo web_root; ?>js/jquery.hoverdir.js"></script> 
<script type='text/javascript' src='<?php echo web_root; ?>js/jquery.easing.1.3.js'></script> 
<script type='text/javascript' src='<?php echo web_root; ?>js/jquery.hoverIntent.minified.js'></script> 
<script type='text/javascript' src='<?php echo web_root; ?>js/diapo.js'></script> 
    
 <script>
    jQuery(document).ready(function() {
      $(function(){
        $('.pix_diapo').diapo({
          pagination:false,
          pauseOnClick:false
        });
      });
    });
</script>  
<script type="text/javascript">
      $(function() {
        $('#da-thumbs > li').hoverdir();
      });
</script>
<?php } ?>
</body>
</html>