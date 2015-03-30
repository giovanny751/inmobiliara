<!DOCTYPE>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js ie9">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title><?php echo SITENAME ?></title>
<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>favicon.png" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=1024, maximum-scale=2">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<meta http-equiv="content-language" content="es" />
<meta http-equiv="pragma" content="No-Cache" />
<meta name="Keywords" lang="es" content="" />
<meta name="Description" lang="es" content="" />
<meta name="copyright" content="cogroupsas.com" />
<meta name="date" content="2013" />
<meta name="author" content="desarrollo web: cogroupsas.com" />
<meta name="robots" content="All" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/mundial.css") ?>">
</head>
<body>
<div id="loader"><div id="progress"></div></div>  
<header>
    Este es el header
</header>
<?php echo $template['body']; ?>

<footer>Este es el footer</footer>
<script type="text/javascript" src="<?php echo base_url("assets/js/lib/jquery.min.js"); ?>"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.ancla').click(function(){
        var link = $(this);
        var anchor  = link.attr('href');
        $('html, body').stop().animate({
            scrollTop: jQuery(anchor).offset().top - 84
        }, 2000);
    $("header nav ul li a").removeClass("active");
    $(this).addClass("active");
        return false;
    });
});
</script>
</body>
</html>