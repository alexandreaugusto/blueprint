<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/
get_header(); ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <!-- Carousel -->
        <div id="carousel-featured" class="carousel slide" data-ride="carousel">
            <?php $informativo = new WP_Query(array('order'=>'DESC', 'posts_per_page'=>4, 'orderby'=>'date', 'category_name'=>'noticias')); ?>
            <!-- Wrapper for slides -->
            <div class="carousel-inner row">
              <?php $cont=0;while($informativo->have_posts()):$informativo->the_post(); ?>
              <div class="<?php echo ($cont++ == 0)?"item active":"item"; ?>">
                <span class="bg col-md-4">
                  <?php echo get_the_post_thumbnail(get_the_ID(), '', array('class'=>'thumb-featured')); ?>
                  <span class="featured-shapes-before hidden-xs hidden-sm"></span>
                  <span class="featured-shapes-after hidden-xs hidden-sm"></span>
                </span>
                <div class="box col-md-7">
                  <div class="text text-uppercase"><span class="glyphicon glyphicon-calendar"></span> <?php the_date('j F, Y'); ?></div>
                  <h1 class="text"><?php the_title() ?></h1>
                  <p class="text"><?php echo get_the_excerpt() ?></p>
                  <p><a class="btn btn-default btn-lg" href="<?php the_permalink() ?>" role="button">Ler mais</a></p>
                </div>
              </div>
              <?php endwhile; ?>
            </div>
            <!-- Controls 
            <a class="left carousel-control" href="#carousel-featured" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-featured" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
            </a>-->
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php for($i=0;$i<$informativo->found_posts;$i++): ?>
              <li data-target="#carousel-featured" data-slide-to="<?php echo $i; ?>"<?php if($i==0): ?> class="active"<?php endif?>></li>
                <?php endfor; ?>
            </ol>
        </div>
    </div>

    <div class="container main">
      <div class="row">
        <div class="col-md-12 carousel-cursos">
          <div class="row">
            <h2 class="text-center text-uppercase page-header">Conheça nossos cursos</h2>
            <div class="col-md-4">
                  <h4 class="text-uppercase">Graduação</h4>
                  <?php $graduacao = new WP_Query(array('post_type' => 'curso', 'tipo-curso' => 'graduacao')); ?>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-graduacao" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-graduacao" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                  <!-- Carousel -->
                  <div id="carousel-graduacao" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <?php $cont=0;while($graduacao->have_posts()):$graduacao->the_post(); ?>
                      <div class="<?php echo ($cont++ == 0)?"item active":"item"; ?>">
                        <h4><?php echo get_the_title() ?></h4>
                        <p><?php the_excerpt() ?></p>
                        <p><a class="btn btn-primary" href="<?php the_permalink() ?>" role="button">Saiba mais</a></p>
                      </div>
                      <?php endwhile;$cont=0; ?>
                    </div>
                  </div>
              </div>
            <div class="col-md-4">
                <h4 class="text-uppercase">Pós-Graduação</h4>
                <?php
                
                $args = array(
                    'post_type' => 'curso',
                    'tax_query' => array(
                    'relation' => 'AND',
                    array(
                            'taxonomy' => 'tipo-curso',
                            'field'    => 'slug',
                            'terms'    => array( 'stricto-sensu', 'lato-sensu' ),
                        ),
                    ),
                );
                $posgrad = new WP_Query($args);
                
                ?>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-pos" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-pos" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                <!-- Carousel -->
                <div id="carousel-pos" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php while($posgrad->have_posts()):$posgrad->the_post(); ?>
                        <div class="<?php echo ($cont++ == 0)?"item active":"item"; ?>">
                            <h4><?php echo get_the_title();$terms = get_the_terms(get_the_ID(), 'tipo-curso');echo ' '.  count($terms); ?> <small><?php echo $terms[0]->name; ?></small></h4>
                            <p><?php the_excerpt() ?></p>
                            <p><a class="btn btn-primary" href="<?php the_permalink() ?>" role="button">Saiba mais</a></p>
                        </div>
                        <?php endwhile;$cont = 0; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                  <h4 class="text-uppercase">Extensão</h4>
                    <!-- Controls
                    <a class="left carousel-control" href="#carousel-extensao" role="button" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-extensao" role="button" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                    </a> -->
                  <!-- Carousel -->
                  <div id="carousel-extensao" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <div class="item active">
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork irony iphone skateboard locavore before they sold out mcsweeney bag gentrify.</p>
                        <p><a class="btn btn-primary" role="button">Saiba mais</a></p>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="row box-departamentos">
          <h2 class="text-center text-uppercase page-header">Veja nossos departamentos</h2>
          <div class="col-md-3 col-xs-6">
            <a href="#">
              <img class="img-rounded" src="<?php bloginfo('template_url') ?>/img/test.jpg">
              <span class="img-rounded"></span>
              <div>
                <h4>Departamento de Matemática, Física e Computação</h4>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-xs-6">
            <a href="#">
              <img class="img-rounded" src="<?php bloginfo('template_url') ?>/img/test.jpg">
              <span class="img-rounded"></span>
              <div>
                <h4>Departamento de Engenharia de Produção</h4>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-xs-6">
            <a href="#">
              <img class="img-rounded" src="<?php bloginfo('template_url') ?>/img/test.jpg">
              <span class="img-rounded"></span>
              <div>
                <h4>Departamento de Mecânica e Energia</h4>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-xs-6">
            <a href="#">
                <img class="img-rounded" src="<?php bloginfo('template_url') ?>/img/test.jpg">
              <span class="img-rounded"></span>
              <div>
                <h4>Departamento de Química e Ambiental</h4>
              </div>
            </a>
          </div>
        </div>
    </div>

<?php get_footer(); ?>