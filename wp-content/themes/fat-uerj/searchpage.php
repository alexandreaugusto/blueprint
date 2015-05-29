<?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
* Template Name: Busca
*/
get_header(); ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron internal">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-uppercase">Busca</h3>
            <ul class="breadcrumb">
              <li><a href="<?php bloginfo("url") ?>">Home</a></li>
              <li class="active">Busca</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container main internal news search-page">
      <div class="row">
        <div class="col-md-9">
			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$s = filter_input(INPUT_GET, 'cs', FILTER_SANITIZE_STRING);
				$search = &new WP_Query("s=$s&showposts=5&paged=" . $paged);
			?>
			
			<?php if ($s == '') : ?>
				<h2>Sua pesquisa não encontrou nenhum resultado</h2>
				<p>Tente novamente com outro termo.</p>
				
				<div class="row">
					<form class="navbar-form" action="<?php echo esc_url( get_permalink(749) ); ?>" method="get" role="search">
						<div class="col-md-10 col-sm-10 col-xs-9">
							<input type="text" class="form-control" name="cs" value="<?php echo $s ?>" placeholder="O que você procura?">
						</div>
						<div class="col-md-2 col-sm-2 col-xs-3">
							<button type="submit" class="btn btn-default btn-block">Buscar</button>
						</div>
					</form>
				</div>
			<?php else : ?>

				
				
				<?php 
					if ( $search->have_posts() ) :
					?>
									<div class="row">
					<form class="navbar-form" action="<?php echo esc_url( get_permalink(749) ); ?>" method="get" role="search">
						<div class="col-md-10 col-sm-10 col-xs-9">
							<input type="text" class="form-control" name="cs" value="<?php echo $s ?>" placeholder="O que você procura?">
						</div>
						<div class="col-md-2 col-sm-2 col-xs-3">
							<button type="submit" class="btn btn-default btn-block">Buscar</button>
						</div>
					</form>
				</div>
					<?php
					while ( $search->have_posts() ) : $search->the_post();
				?>
				
				<div class="row">
					<div class="col-md-4">
						<a href="<?php the_permalink(); ?>">
							<?php echo get_the_post_thumbnail(get_the_ID(), 'medium', array('class'=>'img-rounded'));  ?>
						</a>
					</div>
					<div class="col-md-8">
						<time class="text-uppercase"><span class="glyphicon glyphicon-calendar"></span> <?php the_date('j F, Y'); ?></time>
						<h2><?php the_title(); ?></h2>
						<p><?php the_excerpt() ?></p>
						<a class="btn btn-primary" href="<?php the_permalink(); ?>" role="button">Ler mais</a>
					</div>
				</div>
				
				<?php
					endwhile; // End Loop
					if($search->max_num_pages > 1):
				?>
				
				<div class="paginacao">
					<ul class="pagination pagination-lg">
					  <?php if ($paged > 1) : ?>
						<li><a href="<?php echo esc_url( get_permalink(749) ); ?>?cs=<?php echo $s ?>&paged=<?php echo($paged - 1) ?>">&laquo;</a></li>
					  <?php else : ?>
						<li class="disabled"><a href="#">&laquo;</a></li>
					  <?php endif; ?>
					  
					  <?php for($i=1;$i<=$search->max_num_pages;$i++) : ?>
						<li <?php echo ($paged==$i)? 'class="active"':'';?>><a href="<?php echo esc_url( get_permalink(749) ); ?>?cs=<?php echo $s ?>&paged=<?php echo $i ?>"><?php echo $i ?></a></li>
					  <?php endfor; ?>
					  
					  <?php if($paged < $search->max_num_pages) : ?>
						<li><a href="<?php echo esc_url( get_permalink(749) ); ?>?cs=<?php echo $s ?>&paged=<?php echo($paged + 1) ?>">&raquo;</a></li>
					  <?php else : ?>
						<li class="disabled"><a href="#">&raquo;</a></li>
					  <?php endif; ?>
					</ul>
				</div>
				
				<?php endif; ?>
				<?php else: ?>
				<div class="row">
					<div class="col-md-12">
						<h2>Sua pesquisa não encontrou nenhum resultado</h2>
						<p>Tente novamente com outro termo.</p>
						
						<div class="row">
							<form class="navbar-form" action="<?php echo esc_url( get_permalink(749) ); ?>" method="get" role="search">
								<div class="col-md-10 col-sm-10 col-xs-9">
									<input type="text" class="form-control" name="cs" value="<?php echo $s ?>" placeholder="O que você procura?">
								</div>
								<div class="col-md-2 col-sm-2 col-xs-3">
									<button type="submit" class="btn btn-default btn-block">Buscar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php endif; ?>
			<?php endif; ?>
		
        </div>
        <?php get_sidebar('noticias'); ?>
      </div>
    </div>

<?php get_footer(); ?>