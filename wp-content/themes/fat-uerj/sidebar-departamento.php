<?php
/** 
 * @package WordPress
 * @subpackage fat-uerj
 * @since FAT-UERJ 1.0
 */
?>
            <aside class="col-md-3">
                <ul class="list-group">
                    <?php $departamentos = new WP_Query(array('post_type' => 'page', 'category_name' => 'departamentos', 'orderby' => 'ID', 'order' => 'ASC')); ?>
                    <?php while ($departamentos->have_posts()):$departamentos->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>" class="list-group-item active"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </aside>