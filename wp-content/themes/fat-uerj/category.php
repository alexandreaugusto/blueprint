<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/
get_header(); ?>
<?php if (have_posts()) : ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron internal">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-uppercase"><?php echo single_cat_title('', false); ?></h3>
            <ul class="breadcrumb">
              <li><a href="<?php bloginfo("url") ?>">Home</a></li>
              <li class="active"><?php echo single_cat_title('', false); ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
<?php endif; ?>
    
    <div class="container main internal categoria">
      <div class="row">
        <div class="col-md-12">
          <?php
            if ( have_posts() ) : $cont = 0; ?>
          <?php if($cont%4 == 0): ?><div class="row"><?php endif; ?>
          <?php
            while ( have_posts() ) : the_post(); ?>
            <div class="col-md-3">
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt() ?></p>
              <a class="btn btn-primary" href="<?php the_permalink(); ?>" role="button">Saiba mais</a>
            </div>
          <?php
            endwhile; // End Loop
          ?>
          <?php if($cont++%4 == 0): ?></div><?php endif; ?>
          <?php            
            global $wp_query;
            if($wp_query->found_posts > 8):
          ?>
          <div class="paginacao">
            <ul class="pagination pagination-lg">
              <li class="disabled"><?php previous_posts_link('&laquo;', 0); ?></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><?php next_posts_link('&raquo;', 0); ?></li>
            </ul>
          </div>
            <?php endif; ?>
          <?php else: ?>
          <h2>Não há posts na categoria &quot;<?php echo single_cat_title('', false); ?>&quot; por enquanto...</h2>
          <p>Tente utilizar o sistema de busca.</p>
          <div class="row">
            <form class="navbar-form" role="search">
              <div class="col-md-10 col-sm-10 col-xs-9">
                <input type="text" class="form-control" placeholder="O que você procura?">
              </div>
              <div class="col-md-2 col-sm-2 col-xs-3">
                <button type="submit" class="btn btn-default btn-block">Buscar</button>
              </div>
            </form>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

<?php get_footer(); ?>