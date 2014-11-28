<?php
/**
* Template Name: Página 
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/
get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron internal">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <?php $titulo = get_field("tipo_pagina");$titulo = explode("|", $titulo); ?>
              <h3 class="text-uppercase"><?php echo $titulo[0]; ?></h3>
            <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#"><?php echo $titulo[0]; ?></a></li>
              <li class="active"><?php the_title() ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container main internal">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <h2 class="text-uppercase page-header"><?php the_title() ?></h2>
              <p><?php echo get_the_post_thumbnail(get_the_ID(), 'featured-blog-thumb', array('class'=>'thumbnail')); ?></p>
              <?php the_content() ?>
            </div>
          </div>
        </div>
        <aside class="col-md-3">
          <ul class="list-group">
            <a href="#" class="list-group-item active">Sala de aula</a>
            <a href="#" class="list-group-item">Laboratórios de física</a>
            <a href="#" class="list-group-item">Laboratórios de informática</a>
            <a href="#" class="list-group-item">Secretarias</a>
            <a href="#" class="list-group-item">Sala de multimídia</a>
            <a href="#" class="list-group-item">Espaço Kodak</a>
            <a href="#" class="list-group-item">Refeitório</a>
            <a href="#" class="list-group-item">Sala de Reprografia</a>
            <a href="#" class="list-group-item">Administração</a>
          </ul>
        </aside>
      </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>