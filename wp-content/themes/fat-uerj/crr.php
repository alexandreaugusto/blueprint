<?php
/**
 * Template Name: CRR
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
                            <li><a href="<?php echo esc_url(get_category_link(get_cat_ID('CRR'))); ?>">CRR</a></li>
                            <li class="active"><?php the_title() ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container main internal abas">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase page-header"><?php the_title() ?></h2>
                            <p><?php echo preg_replace('/class=".*?"/', 'class="img-rounded"', get_the_post_thumbnail(get_the_ID(), 'large', array('alt' => trim(strip_tags(get_the_title()))))); ?></p>
                            <?php the_content() ?>
                        </div>
                    </div>
                </div>
                <?php get_sidebar('pesquisa'); ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php get_footer(); ?>