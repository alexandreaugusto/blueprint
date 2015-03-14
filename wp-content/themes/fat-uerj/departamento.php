<?php
/**
 * Template Name: Departamento
 * @package WordPress
 * @subpackage fat-uerj
 * @since FAT-UERJ 1.0
 */
get_header();
?>
<?php if (have_posts()) while (have_posts()) : the_post(); ?>
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron internal">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h3 class="text-uppercase">Departamentos</h3>
                <ul class="breadcrumb">
                  <li><a href="<?php bloginfo('url'); ?>">Home</a></li>
                  <li><a href="#">CRR</a></li>
                  <li><a href="<?php echo esc_url(get_category_link(get_cat_ID('Departamentos'))); ?>">Departamentos</a></li>
                  <li class="active"><?php the_title(); ?></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        
        <div class="container main internal abas departamentos">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-uppercase page-header"><?php the_title(); ?></h2>
                        <p><?php echo preg_replace('/class=".*?"/', '', get_the_post_thumbnail(get_the_ID(), 'medium')); ?></p>
                        <?php the_content(); ?>
                        <div class="well col-md-12">
                            <div class="col-md-4">
                                <h4 class="text-uppercase">Chefe</h4>
                                    <img class="img-rounded" src="http://placehold.it/150x150">
                                    <h4>Dr. Nelson Matias</h4>
                                    <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosbysweater eu banh mi, qui irure terry richardson ex squid.</p>
                                    <a href="#">Currículo Lattes</a>
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-uppercase">Subchefe</h4>
                                <img class="img-rounded" src="http://placehold.it/150x150">
                                <h4>Dr. Nelson Matias</h4>
                                <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosbysweater eu banh mi, qui irure terry richardson ex squid.</p>
                                <a href="#">Currículo Lattes</a>
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-uppercase">Coordenador</h4>
                                <img class="img-rounded" src="http://placehold.it/150x150">
                                <h4>Dr. Nelson Matias</h4>
                                <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Cosbysweater eu banh mi, qui irure terry richardson ex squid.</p>
                                <a href="#">Currículo Lattes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_sidebar('departamento'); ?>
        </div>
    </div>
    <?php endwhile; ?>
<?php get_footer(); ?>