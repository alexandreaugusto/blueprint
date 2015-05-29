<?php
/**
 * Template Name: Extensão
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
                        <h3 class="text-uppercase"><?php echo $titulo[0]; ?></h3>
                        <ul class="breadcrumb">
                            <li><a href="<?php bloginfo("url") ?>">Home</a></li>
                            <li class="active"><?php the_title() ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container main internal abas">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase page-header"><?php the_title() ?></h2>
                            <p><?php echo preg_replace('/class=".*?"/', 'class="img-rounded"', get_the_post_thumbnail(get_the_ID(), 'large', array('alt' => trim(strip_tags(get_the_title()))))); ?></p>
                            <?php
                            the_content();
                            $coordenador = get_field('coordenador');
                        ?>
                        <div class="well col-md-12">
                            <div class="col-md-4 coll-md-offset-8">
                                <h4 class="text-uppercase">Coordenador</h4>
                                <img src="<?php echo (empty(get_the_author_meta('foto', $coordenador['ID'])))?get_template_directory_uri() . "/img/noone.jpg":wp_get_attachment_url(get_the_author_meta('foto', $coordenador['ID'])); ?>" width="96" height="96">
                                <h4><?php echo $coordenador['user_firstname'] . " " . $coordenador['user_lastname']; ?></h4>
                                <p><?php echo $coordenador['user_firstname'] . " " . $coordenador['user_description']; ?></p>
                                <a href="<?php echo get_the_author_meta('usr_lattes', $coordenador['ID']); ?>">Currículo Lattes</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php get_footer(); ?>