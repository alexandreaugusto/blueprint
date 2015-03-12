<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/
get_header(); ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron internal">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-uppercase">Notícias</h3>
            <ul class="breadcrumb">
              <li><a href="<?php bloginfo("url") ?>">Home</a></li>
              <li class="active">Notícias</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container main internal news">
      <div class="row">
        <div class="col-md-9">
          <?php
            // Check if there are any posts to display
            if ( have_posts() ) : ?>
          <?php
            while ( have_posts() ) : the_post(); ?>
          <div class="row">
            <div class="col-md-4">
              <a href="<?php the_permalink(); ?>">
                <img class="img-rounded" src="<?php bloginfo('template_url'); ?>/img/test.jpg">
              </a>
            </div>
            <div class="col-md-8">
              <time class="text-uppercase"><span class="glyphicon glyphicon-calendar"></span> <?php the_date('j F, Y'); ?></time>
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt() ?></p>
              <a class="btn btn-primary" href="<?php the_permalink(); ?>" role="button">Ler mais</a>
            </div>
          </div>
          <?php endwhile; // End Loop ?>
          <div class="paginacao">
            <ul class="pagination pagination-lg">
              <li class="disabled"><?php previous_posts_link('&laquo;', 0); ?></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><?php next_posts_link('&raquo;', 0); ?></li>
            </ul>
          </div>
          <?php else: ?>
          <div class="row">
            <div class="col-md-4">
              <a href="#">
                <img class="img-rounded" src="<?php bloginfo('template_url'); ?>/img/test.jpg">
              </a>
            </div>
            <div class="col-md-8">
              <time class="text-uppercase"><span class="glyphicon glyphicon-calendar"></span> 12 Novembro, 2014</time>
              <h2>Prova do ENEM</h2>
              <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit aliquip quis cardigan american apparel, butcher voluptate nisi qui...</p>
              <a class="btn btn-primary" role="button">Ler mais</a>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </div>

<?php get_footer(); ?>