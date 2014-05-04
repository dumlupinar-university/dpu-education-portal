<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <meta name="robots" content="all,follow" />

    <meta name="author" lang="en" content="All: Your name [www.url.com]; e-mail: info@url.com" />
    <meta name="copyright" lang="en" content="Webdesign: Nuvio [www.nuvio.cz]; e-mail: ahoj@nuvio.cz" />

    <meta name="description" content="..." />
    <meta name="keywords" content="..." />
	
	<link rel="stylesheet" media="screen,projection" type="text/css" href="http://127.0.0.1/CIEducationPortal/assets/css/reset.css" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="http://127.0.0.1/CIEducationPortal/assets/css/main.css" />
	<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="css/main-msie.css" /><![endif]-->
    <link rel="stylesheet" media="screen,projection" type="text/css" href="http://127.0.0.1/CIEducationPortal/assets/css/style.css" />
    <link rel="stylesheet" media="print" type="text/css" href="http://127.0.0.1/CIEducationPortal/assets/css/print.css" />

	<title>DPU - Education Portal</title>
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript">
		$(function() {
		if ($.browser.msie && $.browser.version.substr(0,1)<7)
		{
			$('li').has('ul').mouseover(function(){
				$(this).children('ul').show();
				}).mouseout(function(){
				$(this).children('ul').hide();
				})
		}
		});        
	</script>
</head>

<body>
	<div id="main">
		<div id="header">
			<div id="logo"><h1 id="logo"><a href="./" title="[Go to homepage]"><img src="http://127.0.0.1/CIEducationPortal/assets/tmp/logo.gif" alt="" /></a></h1>
			<hr class="noscreen" />
        
			<div id="nav">
				<ul class="style1">
					<a id="nav-active" href="<?php echo site_url('home');?>">Home</a><span>|</span>
					<a href="<?php echo site_url('home/aboutus');?>">About Us</a><span>|</span>
					<a href="<?php echo site_url('home/support');?>">Support</a><span>|</span>
					<a href="<?php echo site_url('home/contact');?>">Contact</a>
				</ul>
			</div>

		</div>
