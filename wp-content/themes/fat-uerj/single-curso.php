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
            <h3 class="text-uppercase"><?php the_title(); ?></h3>
            <ul class="breadcrumb">
              <?php
                $terms = get_the_terms( $post->ID, 'tipo_curso' );
                $categories = $terms;
                $cont = 0;
                foreach($terms as $categ):
                    if($cont++ == 1 && $categ->slug == "pos-graduacao")
                        $categories = array_reverse ($terms);
                endforeach;
              ?>
              <li><a href="<?php bloginfo("url") ?>">Home</a></li>
              <li><a href="#">Ensino</a></li>
              <?php foreach($categories as $cat): ?>
              <li><a href="#"><?php echo $cat->name; ?></a></li>
              <?php endforeach; ?>
              <li class="active"><?php the_title(); ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container main internal">
      <div class="row">
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
                <h2 class="text-uppercase page-header">O curso</h2>
              <?php the_content(); ?>
            </div>
            <div class="col-md-12">
              <h2 class="text-uppercase page-header">O profissional</h2>
              <p><?php the_field('cso_profissional'); ?></p>
            </div>
            <?php $coordenador = get_field('cso_coordenacao'); ?>
            <div class="professor col-md-4">
              <h4 class="text-uppercase">Coordenação</h4>
              <?php echo $coordenador['user_avatar']; ?>
              <h4><?php echo $coordenador['user_firstname'] . " " . $coordenador['user_lastname']; ?></h4>
              <p><?php echo $coordenador['user_description']; ?></p>
              <a href="<?php echo get_the_author_meta('usr_lattes', $coordenador['ID']); ?>">Currículo Lattes</a>
            </div>
            <div class="col-md-8 corpo-docente">
              <h4 class="text-uppercase">Disciplinas</h4>
              <div id="disciplinas">
                <ul>
                  <?php 
                    $categorias = get_categories(array('type' => 'disciplina', 'order' => 'ASC',
                        'taxonomy' => 'tipo-disciplina', 'hide_empty' => 0));
                    $cont = 1;
                    $idCurso = get_the_ID();
                    $opa = "";
                    
                    foreach ($categorias as $categoria) :
                  ?>
                    <li><?php echo $categoria->cat_name; ?></li>
                  <?php
                        $query = new WP_Query(array(
                            'tipo-disciplina' => $categoria->slug,
                            'post_type' => 'disciplina',
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'posts_per_page' => -1,
                            'meta_key' => 'curso_disciplina',
                            'meta_value' => $idCurso
                        ));
                        if($query->found_posts > 0):
                  ?>
                    <li>
                        <ul>
                  <?php          
                        $i = 1;
                        while ($query->have_posts()) :
                            $query->the_post();
                  ?>    
                            <li>
                                <?php
                                    echo get_the_title();
                                    $attachments = get_posts(
                                            array('post_type' => 'attachment', 'posts_per_page' => -1,
                                                'post_status' => 'any', 'post_parent' => null,
                                                'meta_key' => 'arquivo_disciplina', 'meta_value' => get_the_ID()));
                                    if ($attachments):
                                ?>
                                <ul>
                                <?php
                                        foreach ( $attachments as $attachment ):
                                ?>
                                    <li><a href="<?php echo wp_get_attachment_url($attachment->ID); ?>" download><?php echo $attachment->post_title; ?></a></li>
                                <?php
                                        endforeach;
                                ?>
                                </ul>
                                <?php
                                    endif;
                                ?>
                            </li>
                  <?php
                        endwhile;
                  ?>
                        </ul>
                    </li>
                  <?php
                        endif;
                        wp_reset_postdata();
                        $cont++;
                    endforeach;
                  ?>
                </ul>
              </div>
            </div>
            <div class="col-md-12">
              <h4 class="text-uppercase">Material didático para download</h4>
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>Aula-17-eletronica.ppt</td>
                    <td><a href="#">https://dropbox.com/user/294664/aula-17.ppt</a></td>
                  </tr>
                  <tr>
                    <td>quimica8.pdf</td>
                    <td><a href="#">https://dropbox.com/user/294664/quim8.pdf</a></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <aside class="col-md-3">
            <a href="http://www.vestibular.uerj.br" target="_blank" class="btn btn-primary btn-lg">Inscreva-se</a>
          
          <ul class="list-group">
            <li class="list-group-item">
              <strong>Duração:</strong> <?php the_field('cso_duracao'); ?> semestres
            </li>
            <li class="list-group-item">
              <strong>Periodo:</strong> <?php the_field('cso_periodo'); ?>
            </li>
            <li class="list-group-item">
              <strong>Grade curricular:</strong> <a href="<?php the_field('cso_gradecurricular'); ?>">Download</a>
            </li>
            <li class="list-group-item">
              <strong>Projeto pedagógico:</strong> <a href="<?php the_field('cso_projetopedagogico'); ?>">Download</a>
            </li>
          </ul>
        </aside>
      </div>
    </div>
    <?php endwhile; ?>
    <script type="text/javascript">
        jQuery('#disciplinas').jstree();
    </script>
<?php get_footer(); ?>