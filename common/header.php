<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduScope Network</title>
    <link rel="shortcut icon" href="assets/images/logo/eduscope-48.png" />
    <meta name="description" content="">
    <meta name="author" content="Ideas and Solutions">
    <!-- Bootstrap core CSS -->
    
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/app/app.v1.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- JQuery -->
   
   <!-- Chosen Select  -->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap-chosen/chosen.css" />
    
    <!-- Custom JQuery -->
    <script src="assets/js/app/var.js" type="text/javascript"></script>
    
    <!-- Crypto -->
	<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/sha1.js"></script>
</head>

<body>
    <!-- Preloader -->
    <div class="loading-container">
        <div class="loading">
            <div class="l1">
                <div></div>
            </div>
            <div class="l2">
                <div></div>
            </div>
            <div class="l3">
                <div></div>
            </div>
            <div class="l4">
                <div></div>
            </div>
        </div>
    </div>
    <!-- Preloader -->
    
    <!-- User left panel -->
    <?php include "common/drawer.php"; ?>
    
    <section class="content some-class">
        <header class="top-head container-fluid">
            <button type="button" class="navbar-toggle pull-left">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">EduScope</a>
            <a href="?action=step" class="btn btn-primary navbar-btn pull-right"><i class="fa fa-image"></i></a>
        </header>