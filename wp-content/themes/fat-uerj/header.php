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
          <a class="navbar-brand" href="#"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="Faculdade de Tecnologia UERJ - Resende"></a>
          <div class="pull-right share hidden-xs">
            <span class='st_facebook_large' displayText='Facebook'></span>
            <span class='st_twitter_large' displayText='Tweet'></span>
            <span class='st_googleplus_large' displayText='Google +'></span>
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
        <div class="navbar-collapse collapse">

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

<!--          <ul class="nav navbar-nav">-->
<!--            <li class="active"><a href="#">Home</a></li>-->
<!--            <li class="dropdown">-->
<!--              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Institucional <span class="caret"></span></a>-->
<!--              <ul class="dropdown-menu" role="menu">-->
<!--                <li><a href="#">Quem Somos</a></li>-->
<!--                <li><a href="#">Direção</a></li>-->
<!--                <li><a href="#">Histórico</a></li>-->
<!--                <li><a href="#">Responsabilidade Social</a></li>-->
<!--                <li><a href="#">Parceiros</a></li>-->
<!--                <li><a href="#">Ouvidoria</a></li>-->
<!--              </ul>-->
<!--            </li>-->
<!--            <li class="dropdown">-->
<!--              <a href="#" class="dropdown-toggle" data-toggle="dropdown">CRR <span class="caret"></span></a>-->
<!--              <ul class="dropdown-menu" role="menu">-->
<!--                <li><a href="#">Administração do Campus</a></li>-->
<!--                <li><a href="#">Setor Pedagógico</a></li>-->
<!--                <li><a href="#">Departamentos</a></li>-->
<!--                <li><a href="#">Incubadora de Empresas</a></li>-->
<!--                <li><a href="#">Centro de Energia Renovável</a></li>-->
<!--                <li><a href="#">Centro de Desenvolvimento e Inovação Tecnológica</a></li>-->
<!--                <li><a href="#">Biblioteca CTC-F</a></li>-->
<!--                <li><a href="#">Laboratório</a></li>-->
<!--                <li><a href="#">Centro Acadêmico</a></li>-->
<!--                <li class="divider"></li>-->
<!--                <li><a href="#">Faculdade de Tecnologia</a></li>-->
<!--              </ul>-->
<!--            </li>-->
<!--            <li class="dropdown">-->
<!--              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Ensino <span class="caret"></span></a>-->
<!--              <ul class="dropdown-menu" role="menu">-->
<!--                <li class="dropdown-header">Graduação</li>-->
<!--                <li><a href="#">Engenharia de Produção</a></li>-->
<!--                <li><a href="#">Engenharia Mecânica</a></li>-->
<!--                <li><a href="#">Engenharia Química</a></li>-->
<!--                <li class="divider"></li>-->
<!--                <li class="dropdown-header">Pós-graduação<small>Lato Sensu (Especialização)</small></li>-->
<!--                <li><a href="#">Engenharia de Produção com Ênfase em Gestão Industrial</a></li>-->
<!--                <li><a href="#">Engenharia de Qualidade</a></li>-->
<!--                <li><a href="#">Logística e Supply Chain</a></li>-->
<!--                <li><a href="#">Gestão de Projetos da Engenharia de Produção</a></li>-->
<!--                <li class="divider"></li>-->
<!--                <li class="dropdown-header">Pós-graduação<small>Stricto Sensu (Mestrado)</small></li>-->
<!--                <li><a href="#">Energia e Meio Ambiente</a></li>-->
<!--              </ul>-->
<!--            </li>-->
<!--            <li class="dropdown">-->
<!--              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pesquisa <span class="caret"></span></a>-->
<!--              <ul class="dropdown-menu" role="menu">-->
<!--                <li><a href="#">Grupos de Pesquisa no CNPq</a></li>-->
<!--                <li><a href="#">Pesquisas isoladas</a></li>-->
<!--              </ul>-->
<!--            </li>-->
<!--            <li><a href="#">Extensão</a></li>-->
<!--            <li><a href="#">Instalações</a></li>-->
<!--            <li><a href="#">Notícias</a></li>-->
<!--            <li><a href="#">Vestibular</a></li>-->
<!--            <li><a href="#">Contato</a></li>-->
<!--          </ul>-->
        </div><!--/.nav-collapse -->
      </div>
    </div>
