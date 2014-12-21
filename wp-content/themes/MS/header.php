<!DOCTYPE HTML>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.png" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <!-- Typekit -->
	<script type="text/javascript" src="//use.typekit.net/sbz3kxw.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <!-- Fin Typekit -->
    
	<?php wp_head(); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
<body <?php body_class(); ?>>
  <div class="container">
	<div class="row">
		<div class="col-md-5">
			<img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/img/logo_300.png" />
  		</div>
		<div class="col-md-2 col-md-offset-5">
			<img src="<?php bloginfo('template_directory'); ?>/img/redes.png" usemap="#Map" class="img-responsive" style="margin:20px auto" />
            <map name="Map">
              <area shape="rect" coords="1,1,49,49" href="http://www.facebook.com/matiassantiagocoaching" target="_blank">
              <area shape="rect" coords="70,1,119,49" href="http://twitter.com/MatiasGSantiago" target="_blank">
            </map>
  		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
  	<span class="navbar-brand visible-xs">Menú de navegación</span>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
        	<?php
$args = array(
'theme_location' => 'principal',
'depth'	=> 2,
'container'	=> false,
'menu_class'	=> 'nav navbar-nav',
'walker'	=> new Bootstrap_Walker_Nav_Menu()
);
 
wp_nav_menu($args);
?>
  </div>
  <!-- /.navbar-collapse -->
</nav>
		</div>
	</div>
