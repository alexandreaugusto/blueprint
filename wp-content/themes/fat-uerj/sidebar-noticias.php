<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/
?>
        <aside class="col-md-3">
          <div>
            <h4 class="text-uppercase">Tópicos</h4>
            <div class="list-group">
              <?php $cats = get_categories(array('child_of' => get_cat_ID('noticias'), 'hide_empty' => 0));foreach($cats as $cat): ?>
              <a href="<?php echo get_category_link($cat->term_id); ?>" class="list-group-item"><?php echo $cat->name; ?> <span class="badge"><?php echo $cat->count; ?></span></a>
              <?php endforeach; ?>
            </div>
          </div>
          <div>
            <h4 class="text-uppercase">Arquivo</h4>
            <select class="form-control" onchange="document.location.href=this.options[this.selectedIndex].value;">
                <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option>
                <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
            </select>
          </div>
        </aside>