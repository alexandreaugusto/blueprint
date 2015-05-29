    <?php
/**
* @package WordPress
* @subpackage fat-uerj
* @since FAT-UERJ 1.0
*/
get_header(); ?>

    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron internal">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-uppercase">Notícias</h3>
            <ul class="breadcrumb">
              <li><a href="<?php bloginfo("url") ?>">Home</a></li>
              <li><a href="<?php echo esc_url(get_category_link(get_cat_ID('Notícias'))); ?>">Notícias</a></li>
              <li class="active"><?php the_title(); ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container main internal news">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-2 hidden-xs hidden-sm">
              <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class'=>'img-rounded thumb-post'));  ?>
              <hr>
              <div class="share">
                <strong class="text-uppercase center-block text-center">Compartilhe</strong>
                <a href="javascript:void(0);" onclick="popup('https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=fat-uerj', '<?php the_title(); ?>');" class="btn btn-info"><span class="iconshare-twitter"></span>Tweet</a>
                  <a href="javascript:void(0);" onclick="popup('http://www.facebook.com/sharer.php?s=100&p[url]=<?php the_permalink(); ?><?php if ( '' != get_the_post_thumbnail() )?>&p[images][0]=<?php {echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ?>&p[title]=<?php the_title(); ?>&p[summary]=<?php if(has_excerpt()) { echo get_the_excerpt(); } else { echo custom_excerpt_length(30); } ?>', '<?php the_title(); ?>');" class="btn btn-primary"><span class="iconshare-facebook"></span>Share</a>
                  <a href="javascript:void(0);" onclick="popup('https://plus.google.com/share?url=<?php the_permalink(); ?>', '<?php the_title(); ?>');" class="btn btn-danger"><span class="iconshare-gplus"></span>Share</a>
              </div>
            </div>
            <div class="col-md-10">
              <time class="text-uppercase"><span class="glyphicon glyphicon-calendar"></span> <?php the_date('j F, Y'); ?></time>
              <h2><?php the_title(); ?></h2>
              <div class="entry-content"><?php echo get_the_content(); ?></div>
              <hr class="hidden-md hidden-lg">
              <div class="hidden-md hidden-lg">
                <strong class="text-uppercase center-block text-center">Compartilhe</strong>
                <div class="shared">
                  <a href="javascript:void(0);" onclick="popup('https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>&via=fat-uerj', '<?php the_title(); ?>');" class="btn btn-info"><span class="iconshare-twitter"></span>Tweet</a>
                  <a href="javascript:void(0);" onclick="popup('http://www.facebook.com/sharer.php?s=100&p[url]=<?php the_permalink(); ?><?php if ( '' != get_the_post_thumbnail() )?>&p[images][0]=<?php {echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ?>&p[title]=<?php the_title(); ?>&p[summary]=<?php if(has_excerpt()) { echo get_the_excerpt(); } else { echo custom_excerpt_length(30); } ?>', '<?php the_title(); ?>');" class="btn btn-primary"><span class="iconshare-facebook"></span>Share</a>
                  <a href="javascript:void(0);" onclick="popup('https://plus.google.com/share?url=<?php the_permalink(); ?>', '<?php the_title(); ?>');" class="btn btn-danger"><span class="iconshare-gplus"></span>Share</a>
                </div>
              </div>
              <div id="disqus_thread"></div>
            </div>
          </div>
        </div>
        <?php get_sidebar('noticias'); ?>
        </div>
    </div>
    <?php endwhile; ?>
    <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'rhianmolinari'; // Required - Replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
    </script>
<?php get_footer(); ?>