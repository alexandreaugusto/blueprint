<?php
/** 
 * @package WordPress
 * @subpackage fat-uerj
 * @since FAT-UERJ 1.0
 */
?>
            <aside class="col-md-3">
                <ul class="list-group">
                    <?php $departamentos = new WP_Query(array('post_type' => 'page', 'category_name' => 'departamentos', 'orderby' => 'ID', 'order' => 'ASC', 'posts_per_page' => -1)); ?>
                    <?php while ($departamentos->have_posts()):$departamentos->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="list-group-item<?php echo (get_permalink()=='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'])?" active":""; ?>"><?php the_title(); ?></a>
                    <?php endwhile; ?>
                </ul>
            </aside>