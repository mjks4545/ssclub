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
    
    function getpro(id){
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
xmlhttp.open("GET","pcode.php?pcode="+id,true);
xmlhttp.send();
    }
    
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
xmlhttp.open("GET","pcode.php?pcode="+id,true);
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
	if(document.getElementById('product').value=="Pistol" || document.getElementById('product').value=="Rifle" || document.getElementById('product').value=="Shortgun")
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
  if(document.getElementById('product').value=="Pistol" || document.getElementById('product').value=="Rifle" || document.getElementById('product').value=="Shortgun")
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
   
   function priceget(id){
       $('#amount').hide();
  if(document.getElementById('product').value=="Pistol" || document.getElementById('product').value=="Rifle" || document.getElementById('product').value=="Shortgun")
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
                    document.getElementById("something123").innerHTML=xmlhttp.responseText;
                }
        }
    xmlhttp.open("GET","ajax5.php?pcode="+id,true);
    xmlhttp.send();
    document.getElementById("pcode").focus();
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
  if(document.getElementById('product').value=="Pistol" || document.getElementById('product').value=="Rifle" || document.getElementById('product').value=="Shortgun")
	{
		if(document.getElementById('weapon')){
         		document.getElementById('weapon').disabled=false;
		}	
	}else{
		if(document.getElementById('weapon')){
			document.getElementById('weapon').disabled=true;
			}
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
//

function getmodel(id)
{
  var id2 = $('#product').val();
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
xmlhttp.open("GET","ajax2.php?id="+id+"&id2="+id2,true);
xmlhttp.send();	
	
}





function pcodeget(id){
    var product = $('#product').val();
    var ptype = $('#subproduct').val();
    var pmodel = $('#pmodel').val();
    $('#pcode').hide();
    //alert(product);
    //alert(ptype);
    //alert(pmodel);
    
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
    document.getElementById("something").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax3.php?id1="+product+"&id2="+ptype+"&id3="+pmodel,true);
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
		var rate = document.getElementById('amount').value;
		var result = document.getElementById('total');	
		var myResult = qty * rate;
		result.value = myResult;	 

}



// add more product product type product model

function getprodcut(id)
{
  if(document.getElementById('product').value=="Pistol" || document.getElementById('product').value=="Rifle" || document.getElementById('product').value=="Shortgun")
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
            <?php if(!isset($_GET['page'])){ ?>
            <div style="margin-top: 180px;
margin-left: 400px;">
            <!-- BEGIN LOGO -->
				<a class="brand" href="mainpage.php" id="noPrint">
				     <img src="img/logo.png" alt="Admin Lab" />
				</a>
				<!-- END LOGO -->
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
           
            </div>
            <?php }else{ ?>
            <div style="height: 70px;"></div>
            <?php } ?>
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
         
         App.init();
      });
      
      
   </script>
   <script>
    
$( "#pcode" ).on('input',function() {
       
       $.ajax({
        type: "POST",
        url: 'pcode.php',
        data: $(this).serialize(),
        success: function(data){
           console.log(data);
            $('#product').val(data.p_name);
            if( data.p_name != 'Pistol' || data.p_name != 'Rifle' || data.p_name != 'Shrotgun' ){
                $("#weapon").prop('disabled', true);
            }else{
                $("#weapon").prop('disabled', false);
            }
            $('#subcat').html('<select name="subproduct" id="subproduct"><option>'+data.p_type+'</option></select>');
            $('#subofsubcat').html('<select name="pmodel" id="pmodel"><option>'+data.pmodel+'</option></select>');
       },
        dataType: 'json'
       });
    $.ajax({
        type: "POST",
        url: 'ajax4.php',
        data: $(this).serialize(),
        success: function(data1){
           //console.log(data1);
           
           $('#amount').val(data1);
       },
        //dataType: 'json'
       });
      
});
$('#weapon').on('input',function(){
  $.post( "productnamejquery.php", { name: $('#weapon').val() },function( data ) {
    $('#product').val(data);
  });
});

</script>
<style>
 /*

RESPONSTABLE 2.0 by jordyvanraaij
  Designed mobile first!

If you like this solution, you might also want to check out the 1.0 version:
  https://gist.github.com/jordyvanraaij/9069194

*/
.responstable {
  margin: 1em 0;
  width: 95%;
  overflow: hidden;
  background: #FFF;
  color: #024457;
  border-radius: 10px;
  border: 1px solid #167F92;
}
.responstable tr {
  border: 1px solid #D9E4E6;
}
.responstable tr:nth-child(odd) {
  background-color: #EAF3F3;
}
.responstable th {
  display: none;
  border: 1px solid #FFF;
  background-color: #167F92;
  color: #FFF;
  padding: 1em;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;
}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #D9E4E6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    padding: 1em;
  }
}

body {
  padding: 0 2em;
  font-family: Arial, sans-serif;
  color: #024457;
  background: #f2f2f2;
}

h1 {
  font-family: Verdana;
  font-weight: normal;
  color: #024457;
}
h1 span {
  color: #167F92;
}



#center {
    font-family: 'Average Sans', sans-serif;
  color: #FFF;
   width: 300px;
   height: 250px;
   position: absolute;
   left: 50%;
   top: 50%; 
   margin-left: -150px;
   margin-top: -350px;
  text-align: center;
}
#top {
  position: relative;
  width: 100%;
  height: 70px;

}
#orange {
  border-radius: 1px;
  position: relative;
  top: 25%;
  left: 50%;
  margin-left:-20px;
  width: 40px;
  height: 40px;
  background: #FA5D16;
}
#orange img {
  width: 40px;
}
#notification {
  position: relative;
  left: 155px;
  top: -30px;
  border-radius: 50%;
  border: 2px solid #FFF;
  width: 20px;
  height: 20px;
  background: #E93B19;
}
#bottom {
  position: relative;
  width: 100%;
  height: 150px;
}
#triangle-line {
  width: 100%;
  height: 20px;
}
#tri {
  position: relative;
  left: 140px;
  width: 0px;
  height: 0px;
  border-style: solid;
  border-width: 0 10px 20px 10px;
  border-color: transparent transparent rgba(121, 106, 77, 0.8) transparent;
}
#nots {
  line-height: 35px;
  width: 100%;
  height: 35px;
  background: rgba(121, 106, 77, 0.8);
  border-bottom: 1px solid rgba(89, 81, 68, 1);
}
#info {
  line-height: 55px;
  width: 100%;
  height: 55px;
  background: rgba(121, 106, 77, 0.8);
  border-bottom: 2px solid rgba(89, 81, 68, 1);
}
#feet {
  width: 100%;
  height: 35px;
  background: rgba(89, 81, 68, 0.9);
}

.fixed {
    position: fixed;
    top:0;
    width: 100%; }

.fixed th:nth-child(1){
    width: 134px; }
.fixed th:nth-child(2){
    width: 173px; 
}
.fixed th:nth-child(3){
    width: 174px; 
}
.fixed th:nth-child(4){
    width: 100px; 
}

.fixed th:nth-child(5){

    width: 67px;
}
.fixed th:nth-child(6){

    width: 80px;
}
.fixed th:nth-child(7){

    width: 80px;
}
.fixed th:nth-child(8){

    width: 90px;
}
.fixed th:nth-child(9){

    width: 93px;
}
.fixed1 {
    position: fixed;
    top:0;
    width: 100%; }
.fixed1 th:nth-child(1){
    width: 26px; }
.fixed1 th:nth-child(2){
    width: 28px; 
}
.fixed1 th:nth-child(3){
    width: 105px; 
}
.fixed1 th:nth-child(4){
    width: 85px; 
}

.fixed1 th:nth-child(5){

    width: 107px;
}
.fixed1 th:nth-child(6){

    width: 108px;
}
.fixed1 th:nth-child(7){

    width: 109px;
}
.fixed1 th:nth-child(8){

    width: 70px;
}
.fixed1 th:nth-child(9){

    width: 29px;
}
.fixed1 th:nth-child(10){

    width: 42px;
}
.fixed1 th:nth-child(11){

    width: 45px;
}
.fixed1 th:nth-child(12){

    width: 45px;
}
.fixed1 th:nth-child(13){

    width: 81px;
}
.fixed2 {
    position: fixed;
    top:0;
    width: 100%; }
.fixed2 th:nth-child(1){
    width: 26px; }
.fixed2 th:nth-child(2){
    width: 28px; 
}
.fixed2 th:nth-child(3){
    width: 111px; 
}
.fixed2 th:nth-child(4){
    width: 87px; 
}

.fixed2 th:nth-child(5){

    width: 110px;
}
.fixed2 th:nth-child(6){

    width: 115px;
}
.fixed2 th:nth-child(7){

    width: 83px;
}
.fixed2 th:nth-child(8){

    width: 60px;
}
.fixed2 th:nth-child(9){

    width: 29px;
}
.fixed2 th:nth-child(10){

    width: 49px;
}
.fixed2 th:nth-child(11){

    width: 49px;
}
.fixed2 th:nth-child(12){

    width: 48px;
}
.fixed2 th:nth-child(13){

    width: 86px;
}
.fixed3 {
    position: fixed;
    top:0;
    width: 100%; }
.fixed3 th:nth-child(1){
    width: 31px; }
.fixed3 th:nth-child(2){
    width: 33px; 
}
.fixed3 th:nth-child(3){
    width: 118px; 
}
.fixed3 th:nth-child(4){
    width: 92px; 
}

.fixed3 th:nth-child(5){

    width: 111px;
}
.fixed3 th:nth-child(6){

    width: 102px;
}
.fixed3 th:nth-child(7){

    width: 107px;
}
.fixed3 th:nth-child(8){

    width: 60px;
}
.fixed3 th:nth-child(9){

    width: 31px;
}
.fixed3 th:nth-child(10){

    width: 28px;
}
.fixed3 th:nth-child(11){

    width: 38px;
}
.fixed3 th:nth-child(12){

    width: 42px;
}
.fixed3 th:nth-child(13){

    width: 89px;
}
.fixed4 {
    position: fixed;
    top:0;
    width: 100%; }
.fixed4 th:nth-child(1){
    width: 28px; }
.fixed4 th:nth-child(2){
    width: 112px; 
}
.fixed4 th:nth-child(3){
    width: 88px; 
}
.fixed4 th:nth-child(4){
    width: 113px; 
}

.fixed4 th:nth-child(5){

    width: 112px;
}
.fixed4 th:nth-child(6){

    width: 113px;
}
.fixed4 th:nth-child(7){

    width: 39px;
}
.fixed4 th:nth-child(8){

    width: 137px;
}
.fixed4 th:nth-child(9){

    width: 137px;
}
.fixed4 th:nth-child(10){

    width: 84px;
}
.fixed4 th:nth-child(11){

    width: 45px;
}
.fixed4 th:nth-child(12){

    width: 42px;
}
.fixed4 th:nth-child(13){

    width: 89px;
}
</style>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>