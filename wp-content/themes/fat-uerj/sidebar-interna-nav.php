<?php
/** 
 * @package WordPress
 * @subpackage fat-uerj
 * @since FAT-UERJ 1.0
 */
    $args = array('post_type' => 'page', 'meta_key' => 'tipo_pagina', 'meta_key' => 'tipo_pagina');
    $related = new WP_Query($args);
?>
                <aside class="col-md-3">
                    <ul class="list-group">
                        <?php while($related->have_posts()):$related->the_post(); ?>
                        <a href="<?php the_permalink() ?>" class="list-group-item"><?php the_title() ?></a>
                        <?php endwhile; ?>
                    </ul>
                </aside>