<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>

    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- ShareThis -->
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "ur-a9642a8-c8e2-13c0-f3c2-77643cdbed44", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Faculdade de Tecnologia UERJ - Resende"></a>
          <div class="pull-right share-default hidden-xs">
            <a href="#" class="btn btn-info"><span class="iconshare-twitter"></span></a>
            <a href="#" class="btn btn-primary"><span class="iconshare-facebook"></span></a>
            <a href="#" class="btn btn-danger"><span class="iconshare-gplus"></span></a>
          </div>

          <form class="navbar-form navbar-right input-group hidden-xs" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="O que você procura?">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-default">Buscar</button>
              </span>
            </div>
          </form>
        </div>

            <?php
            wp_nav_menu( array(
                    'menu'              => 'navigation',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'navbar-collapse collapse',
                    'container_id'      => 'bs-example-navbar-collapse-1',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
            );
            ?>

      </div>
    </div>
