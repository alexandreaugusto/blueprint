<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/
get_header(); ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <!-- Carousel -->
        <div id="carousel-featured" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner row">
              <div class="item active">
                <span class="bg col-md-4">
                  <img class="before-mask" src="<?php bloginfo('template_url'); ?>/img/before-mask.png">
                  <img class="thumb-featured" src="<?php bloginfo('template_url'); ?>/img/test.jpg">
                  <img class="after-mask" src="<?php bloginfo('template_url'); ?>/img/after-mask.png">
                </span>
                <div class="box col-md-7">
                  <div class="text"><span class="glyphicon glyphicon-calendar"></span> 7 de Agosto</div>
                  <h1 class="text">Hello, world!</h1>
                  <p class="text">This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three...</p>
                  <p><a class="btn btn-default btn-lg" role="button">Ler mais</a></p>
                </div>
              </div>
              <div class="item">
                <span class="bg col-md-4">
                  <img class="before-mask" src="<?php bloginfo('template_url'); ?>/img/before-mask.png">
                  <img class="thumb-featured" src="<?php bloginfo('template_url'); ?>/img/test.jpg">
                  <img class="after-mask" src="<?php bloginfo('template_url'); ?>/img/after-mask.png">
                </span>
                <div class="box col-md-7">
                  <div class="text"><span class="glyphicon glyphicon-calendar"></span> 7 de Agosto</div>
                  <h1 class="text">Hello, world!</h1>
                  <p class="text">This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three...</p>
                  <p><a class="btn btn-default btn-lg" role="button">Ler mais</a></p>
                </div>
              </div>
            </div>
            <!-- Controls 
            <a class="left carousel-control" href="#carousel-featured" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-featured" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>-->
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-featured" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-featured" data-slide-to="1"></li>
            </ol>
        </div>
    </div>

    <div class="container main">
      <div class="row">
        <div class="col-md-12 carousel-cursos">
          <div class="row">
            <h2 class="text-center text-uppercase page-header">Conheça nossos cursos</h2>
            <div class="col-md-4">
                  <h4 class="text-uppercase">Graduação</h4>
                  <?php $graduacao = new WP_Query(array('post_type' => 'curso', 'tipo_curso' => 'graduacao')); ?>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-graduacao" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-graduacao" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                  <!-- Carousel -->
                  <div id="carousel-graduacao" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <?php while($graduacao->have_posts()):$graduacao->the_post(); ?>
                      <div class="item">
                        <h4><?php the_title() ?></h4>
                        <p><?php the_excerpt() ?></p>
                        <p><a class="btn btn-primary" href="<?php the_permalink() ?>" role="button">Saiba mais</a></p>
                      </div>
                      <?php endwhile; ?>
                    </div>
                  </div>
              </div>
            <div class="col-md-4">
                  <h4 class="text-uppercase">Pós-Graduação <small>Lato Sensu (Especialização)</small></h4>
                  <?php $latoSensu = new WP_Query(array('post_type' => 'curso', 'tipo_curso' => 'lato-sensu')); ?>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-pos" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-pos" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                  <!-- Carousel -->
                  <div id="carousel-pos" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <?php while($latoSensu->have_posts()):$latoSensu->the_post(); ?>
                      <div class="item">
                        <h4><?php the_title() ?></h4>
                        <p><?php the_excerpt() ?></p>
                        <p><a class="btn btn-primary" href="<?php the_permalink() ?>" role="button">Saiba mais</a></p>
                      </div>
                      <?php endwhile; ?>
                    </div>
                  </div>
              </div>
            <div class="col-md-4">
                  <h4 class="text-uppercase">Pós-Graduação <small>Stricto Sensu (Mestrado)</small></h4>
                  <?php $strictoSensu = new WP_Query(array('post_type' => 'curso', 'tipo_curso' => 'stricto-sensu')); ?>
                    <!-- Controls
                    <a class="left carousel-control" href="#carousel-mestrado" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-mestrado" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                    </a> -->
                  <!-- Carousel -->
                  <div id="carousel-mestrado" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <?php while($strictoSensu->have_posts()):$strictoSensu->the_post(); ?>
                      <div class="item">
                        <h4><?php the_title() ?></h4>
                        <p><?php the_excerpt() ?></p>
                        <p><a class="btn btn-primary" href="<?php the_permalink() ?>" role="button">Saiba mais</a></p>
                      </div>
                      <?php endwhile; ?>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row departamentos">
          <h2 class="text-center text-uppercase page-header">Veja nossos departamentos</h2>
          <div class="col-md-3 col-xs-6">
            <a href="#">
              <img src="<?php bloginfo('template_url'); ?>/img/test.jpg">
              <span></span>
              <div>
                <h4>Departamento de Matemática, Física e Computação</h4>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-xs-6">
            <a href="#">
              <img src="<?php bloginfo('template_url'); ?>/img/test.jpg">
              <span></span>
              <div>
                <h4>Departamento de Engenharia de Produção</h4>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-xs-6">
            <a href="#">
              <img src="<?php bloginfo('template_url'); ?>/img/test.jpg">
              <span></span>
              <div>
                <h4>Departamento de Mecânica e Energia</h4>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-xs-6">
            <a href="#">
              <img src="<?php bloginfo('template_url'); ?>/img/test.jpg">
              <span></span>
              <div>
                <h4>Departamento de Química e Ambiental</h4>
              </div>
            </a>
          </div>
        </div>
    </div>

<?php get_footer(); ?>