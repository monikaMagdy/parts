<?php include"menu.php";?>
<head>
<style>
</style>
<!--connecting ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
type="text/javascript"></script>
<!---function to get the result by ajax--> 
<script>

function getResult()
{
  //perform ajax request
	jQuery.ajax(
	{
		url:"searchbackend.php",
		data:"term="+$("#term").val(),
		type:"POST",
		success:function(data2)
		{
			$("#result").html(data2);
		}
	});
}
</script>
<!--template -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Auto spare parts</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">
</head>
 <!--img container called form js file  -->
<body id="page-top">
<section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">find spare part</h2>
          <h3 class="section-subheading text-muted"> </h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
        <!--term button which is called in the searchbackend.php file by post method -->
<input name="term" class="col-lg-12 text-center"  type="text" id="term" onKeyup="getResult()" placeholder="Search Term..."/>
</div>
</div>
</div>
</section>
<div id="result"></div>
</div>
      </div>
</body>
