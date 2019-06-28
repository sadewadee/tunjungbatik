<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- SITE META -->
<title><?php bloginfo('name'); ?> <?php wp_title(' | ', true, 'left'); ?></title>
<?php if(get_option('reedwan_feedburner')): ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo get_option('reedwan_feedburner'); ?>" /> 
<?php endif; ?>
<?php if(get_option('reedwan_favicon')): ?>
<link rel="shortcut icon" href="<?php echo get_option('reedwan_favicon'); ?>" />
<?php endif; ?>  
<?php wp_head(); ?>  
        <!-- Google Webfont -->
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,300italic,700,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>        
         <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_url"); ?>/css/bs_leftnavi.css">         
        <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/css/bootstrap.css">              
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css">
        <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/style.css">  
             <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/plugin/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/plugin/owl-carousel/owl.theme.css">  
        <script src="<?php bloginfo("template_url"); ?>/js/jquery.js"></script>              
</head>
    <body <?php body_class(); ?>>
<!-- PRELOADER -->
<!-- <div id="loader"></div> -->
<div class="body">
        
<!-- TOPBAR -->
<div class="top_bar">
<div class="container">  
        <div class="col-md-12 col-sm-12">
        <div class="row">
            <div class="tb_right pull-right ">
            <?php get_product_search_form();  ?>
            </div>
            <div class="tb_left pull-left"> 
            <div id="menu-top">  
            <nav class="navbar navbar-default">  
                        <?php
                        wp_nav_menu( array(
                          'menu'              => 'secondary',
                    'theme_location'    => 'secondary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_id'      => 'navbarNavDropdown',
                        'container_class'   => '',
                        'container_id'      => '',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new ultrabootsrap_wp_bootstrap_navwalker())
                        );
                        ?>
                                               
                    </nav> 
             </div>                        
            </div>
        </div>
    </div>
</div>
</div>
<!-- HEADER -->
<header id="header2">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 cnt">
                <p class="no-margin top-welcome"><i class="fa fa-phone"></i> Hotline: <a href="#">(+800) 2307 2509 8988</a></p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 cnt">                  
            <?php if(get_option('reedwan_logo')) { $logo = get_option('reedwan_logo');} else { $logo = get_template_directory_uri() . '/images/logo-tunjung-batik.png';} ?>
            <a href='<?php echo home_url(); ?>' class="navbar-brand"><img  class="img-responsive" src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" /></a>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="topcart pull-right">
                 <nav class="navbar navbar-default"> 
              
                
                   <?php
                        wp_nav_menu( array(
                        'menu'              => 'shop',
                    'theme_location'    => 'shop',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_id'      => 'navbarNavDropdown',
                        'container_class'   => '',
                        'container_id'      => '',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new ultrabootsrap_wp_bootstrap_navwalker())
                        );
                        ?>
                </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="menu">                   
        <div class="container">
            <div class="row">
                    <nav class="navbar navbar-default sembunyi-destop">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>         
                        <?php
                        wp_nav_menu( array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_id'      => 'navbarNavDropdown',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new ultrabootsrap_wp_bootstrap_navwalker())
                        );
                        ?>                   
                    </nav> 
                    
                      <nav class="navbar navbar-default sembunyi-mobile">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>         
                        <?php
                        wp_nav_menu( array(
                        'menu'              => 'mobile',
                        'theme_location'    => 'mobile',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_id'      => 'navbarNavDropdown',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new ultrabootsrap_wp_bootstrap_navwalker())
                        );
                        ?>                   
                    </nav> 
                    
            </div>
        </div>
    </div>       
</header>