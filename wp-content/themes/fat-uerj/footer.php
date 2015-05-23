<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/
?>

<?php
$menuitems = wp_get_nav_menu_items( 'footer_navigation', array( 'order' => 'DESC' ) );
?>

<footer>
    <div class="sitemap">
        <div class="container">
            <div class="row">

            <?php
            $count = 0;
            $submenu = false;
            ?>

            <?php foreach( $menuitems as $item ): ?>
                <?php
                $link = $item->url;
                ?>

                <?php if ( !$item->menu_item_parent ): ?>
                    <?php
                    $parent_id = $item->ID;
                    ?>

                    <div class="col-md-3 col-xs-6">
                        <h5>
                            <a href="<?php echo $link; ?>" class="title">
                                <?php echo $item->title; ?>
                            </a>
                        </h5>

                <?php endif; ?>

                <?php if ( $parent_id == $item->menu_item_parent ): ?>

                    <?php if ( !$submenu ): $submenu = true; ?>
                        <ul class="list-unstyled">
                    <?php endif; ?>

                    <?php if ($item->attr_title == 'sitemap-header') : ?>
                        <li class="sitemap-header">
                        <?php echo $item->title; ?>
                    <?php elseif ($item->attr_title == 'sitemap-header-small') : ?>
                        <li class="sitemap-header-small">
                        <small><?php echo $item->title; ?></small>
                    <?php else : ?>
                        <li>
                            <a href="<?php echo $link; ?>">
                                <?php echo $item->title; ?>
                            </a>
                    <?php endif; ?>

                        </li>

                    <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ): ?>
                        </ul>
                        <?php $submenu = false; ?>
                    <?php endif; ?>

                <?php endif; ?>

                <?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ): ?>
                    </div>
                    <?php $submenu = false; ?>
                <?php endif; ?>

                <?php $count++; ?>
            <?php endforeach; ?>

            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-4">
                    <a href="<?php bloginfo('url'); ?>">
                        <img src="<?php bloginfo('template_url'); ?>/img/logo-uerj.png">
                    </a>
                </div>
                <div class="col-md-5 col-sm-4 col-xs-8">
                    <h4>Faculdade de Tecnologia <small>Campus Regional de Resende</small></h4>
                    <address>Rodovia Presidente Dutra km 298 (sentido RJ-SP) - Pólo Industrial Resende/RJ <br>Cep: 27.537-000 <br>Tel: (24) 3354-7851 / (24) 3354-7875</address>
                    <a href="<?php bloginfo('url'); ?>/contato/" class="btn btn-default" role="button">Fale conosco</a>
                </div>
                <div class="col-md-5 col-sm-5 hidden-xs">
                    <div class="pull-right share-default">
                        <a href="#" class="btn btn-info"><span class="iconshare-twitter"></span></a>
                        <a href="#" class="btn btn-primary"><span class="iconshare-facebook"></span></a>
                        <a href="#" class="btn btn-danger"><span class="iconshare-gplus"></span></a>
                    </div>
                    <form class="navbar-form navbar-right input-group" role="search">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="O que você procura?">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">Buscar</button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>

  <?php wp_footer(); ?>
  </body>
</html>