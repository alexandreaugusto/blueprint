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
                        <?php
                            the_content();
                            $chefe = get_field('chefe');
                            $subchefe = get_field('subchefe');
                            $coordenador = get_field('coordenador');
                        ?>
                        <div class="well col-md-12">
                            <div class="col-md-4">
                                <h4 class="text-uppercase">Chefe</h4>
                                    <?php echo $chefe['user_avatar']; ?>
                                    <h4><?php echo $chefe['user_firstname'] . " " . $chefe['user_lastname']; ?></h4>
                                    <p><?php echo $chefe['user_firstname'] . " " . $chefe['user_description']; ?></p>
                                    <a href="<?php echo get_the_author_meta('usr_lattes', $chefe['ID']); ?>">Currículo Lattes</a>
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-uppercase">Subchefe</h4>
                                <?php echo $subchefe['user_avatar']; ?>
                                <h4><?php echo $subchefe['user_firstname'] . " " . $subchefe['user_lastname']; ?></h4>
                                <p><?php echo $subchefe['user_firstname'] . " " . $subchefe['user_description']; ?></p>
                                <a href="<?php echo get_the_author_meta('usr_lattes', $subchefe['ID']); ?>">Currículo Lattes</a>
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-uppercase">Coordenador <?php echo __FILE__; ?></h4>
                                <?php echo $coordenador['user_avatar']; ?>
                                <h4><?php echo $coordenador['user_firstname'] . " " . $coordenador['user_lastname']; ?></h4>
                                <p><?php echo $coordenador['user_firstname'] . " " . $coordenador['user_description']; ?></p>
                                <a href="<?php echo get_the_author_meta('usr_lattes', $coordenador['ID']); ?>">Currículo Lattes</a>
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