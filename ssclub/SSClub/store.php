<?php 
ob_start();
		require_once('session.php');
		require_once("function.php");

?>
<?php 
		if(isset($_GET['page']))
				{
					$page=$_GET['page'];	
					
				}else{
					
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
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript">
	// Javascript code to select product type,Model on input of Weapon Number
        
        function getpcode(id){
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
    document.getElementById("subcat").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","pcode.php?weapon="+id,true);
xmlhttp.send();
        }
        
		function getWeapon(id)
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
    document.getElementById("subcat").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","ajax.php?weapon="+id,true);
xmlhttp.send();
}
// end of weapon number code

	// Repeat Javascript code to select product type,Model on input of Weapon Number from addmoreproduct.php page
		function getWeaponno(id)
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
    document.getElementById("subcat1").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","ajax.php?weapon="+id,true);
xmlhttp.send();
}
	
	// javascript codeing to disable dealer NiC and license_no	
document.onreadystatechange = function () {

	if(document.form.plan.value == "Dealer")
	{
		document.getElementById('cnic').disabled=true;	
			
	}else
	if(document.form.plan.value =="individual")
	{
		document.getElementById('cnic').disabled=false;	
	}
}
// javascript coding to disable dealer NIC and License_no
function getValue(){
	if(document.form.plan.value=="Dealer")
	{
		document.getElementById('cnic').disabled=true;	
	}else
	
	if(document.form.plan.value=="individual")
	{
		document.getElementById('cnic').disabled=false;	
	}		
	
}


// calcutale total from salesbill when rectification enter
//function showTotal()
//{
//	var rect = document.getElementById('rectification').value;
	//var gtotal=document.getElementById('gtotal').value;
	//document.getElementById('total').value=gtotal;

	//gtotal.value=total;
	//	alert(total);
		//var total = document.getElementById('total').value;
		//total.value='green';
		//total.value=gtotal;
		//alert(gtotal);
		// var sum = parseInt(rect) + parseInt(total);
		
		//alert(sum);
		//total.value=sum;
		
//}

// onload




// ajax codeing
function getPurchase(id)
{
	if(document.getElementById('product').value=="Fire Arms")
	{
		
			document.getElementById('weapon_no').disabled=false;	
	}else{
			document.getElementById('weapon_no').disabled=true;
		}

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
    document.getElementById("subcat").innerHTML=xmlhttp.responseText;
	
    }
  }
xmlhttp.open("GET","ajax.php?id="+id,true);
xmlhttp.send();
}

// ajax code for sales
function getSub(id)
{
	if(document.getElementById('product').value=="Fire Arms")
	{
		
			document.getElementById('weapon').disabled=false;	
	}else{
			document.getElementById('weapon').disabled=true;
		}
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
    document.getElementById("subcat").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax.php?id="+id,true);
xmlhttp.send();
}
   
   function calculate() {
		var qty = document.getElementById('qty').value;	
		var rate = document.getElementById('price').value;
		var result = document.getElementById('amount');	
		var myResult = qty * rate;
		result.value = myResult;
		}
		
// ajax coding for purchase report

function getPurch(id)
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
    document.getElementById("subcat").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax.php?id="+id,true);
xmlhttp.send();	
	
}
//

function getmodel(id)
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
    document.getElementById("model").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax2.php?id="+id,true);
xmlhttp.send();	
	
}

// script for total generate from sales

 function rate(){
		var qty = document.getElementById('quantity').value;	
		var rate = document.getElementById('amount').value;
		var result = document.getElementById('total');	
		var myResult = qty * rate;
		result.value = myResult;	 

}

// script for total generate from sadd more prodcut in sales

function tot(){
		var qty = document.getElementById('quantity').value;	
		var rate = document.getElementById('rate').value;
		var result = document.getElementById('total');	
		var myResult = qty * rate;
		result.value = myResult;	 

}



// add more product product type product model

function getprodcut(id)
{
	if(document.getElementById('product').value=="Fire Arms")
	{
		
			document.getElementById('weapon').disabled=false;	
	}else{
			document.getElementById('weapon').disabled=true;
		}
	
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
    document.getElementById("subcat1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax.php?id="+id,true);
xmlhttp.send();
}

   



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
       <?php require_once("headerstore.php")?>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
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