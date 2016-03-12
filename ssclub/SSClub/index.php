<?php
ob_start();
require_once('session.php');
require_once('function.php'); 
?>
<?php 
		if(isset($_GET['page']))
		{
					$page=$_GET['page'];
		}
		else{
				$page="frontpage";
			}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>SS CLUB</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style_responsive.css" rel="stylesheet" />
   <link href="css/style_default.css" rel="stylesheet" id="style_color" />
	<link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
   <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
   <script type="text/javascript">
   
   // show other person details javascript for checkin table
function showTable() 
{
if(document.getElementById('noofperson').value=="1") {
document.getElementById('table').style.display = "none";
}
if(document.getElementById('noofperson').value!="1") {
document.getElementById('table').style.display = "table";
}
	
if(document.getElementById('noofperson').value=="1"){
document.getElementById('hide').style.display = "none";
}
if(document.getElementById('noofperson').value!="1"){
document.getElementById('hide').style.display = "block";
}
}
//

	


// bill javascript code

/*function calculate() {
		var qty = document.getElementById('qty').value;	
		var rate = document.getElementById('rate').value;
		var result = document.getElementById('amount');	
		var myResult = qty * rate;
		result.value = myResult;
		
		
     }
	 
function getbooth(id)
{
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("show").innerHTML=xmlhttp.responseText;
	if(responseText == 0){
					UsernameAvailResult.html('<span class="success">Username name available</span>');
					
				}
    }
  }
xmlhttp.open("GET","showbooth.php?id="+id,true);
xmlhttp.send();	
}*/

</script>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#boothno').keyup(function(){ // Keyup function for check the user action in input
		var Username = $(this).val(); // Get the username textbox using $(this) or you can use directly $('#username')
		var UsernameAvailResult = $('#show'); // Get the ID of the result where we gonna display the results
		if(Username.length > 0) { // check if greater than 2 (minimum 3)
			UsernameAvailResult.html('Loading..'); // Preloader, use can use loading animation here
			var UrlToPass = 'action=username_availability&username='+Username;
			$.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
			type : 'POST',
			data : UrlToPass,
			url  : 'showbooth.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					UsernameAvailResult.html('<span class="success" style="color:#339900;font-size:14px;">empty</span>');
				}
				else if(responseText > 0){
					UsernameAvailResult.html('<span class="error" style="color:#FF0000;font-size:14px">Occupied</span>');
					document.getElementById('boothno').value="";
				}
			}
			});
		}
		
	});
	
	$('#username').keydown(function(e) { // Dont allow users to enter spaces for their username and passwords
		if (e.which == 32) {
			return false;
  		}
	});
	
});
</script>
   
   
 	<style media="screen">

#noPrint{ display:block; }

.yesPrint{ display: block !important; }


	</style> 

	<style media="print">

#noPrint{ display: none; }

.yesPrint{ display: block !important; }
	
    </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
         <?php require_once("header.php")?>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   
      <!-- BEGIN SIDEBAR -->
      <div id="sidebar" class="nav-collapse collapse">
		<?php  require_once("sidebar.php");?>
    <!-- END SIDEBAR -->
   	<!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                 
                   <!-- END THEME CUSTOMIZER-->
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                  
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div align="center" style="color:#000"><strong><?php  if(isset($_GET['msg'])) { echo $_GET['msg'];}?></strong></div>
            
            <?php 
					if($page)
					{
						require_once($page.'.php');	
						
					}
			
			?>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <?php require_once("footer.php");?>
  
  
  
		
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->    
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.3.min.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script src="js/scripts.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>