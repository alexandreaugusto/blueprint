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
            <ul class="breadcrumb"><?php $terms = get_the_terms( $post->ID, 'tipo_curso' );$categories = $terms;echo $terms[1]->slug;if(count($terms) > 1 && $terms[1]->slug == "pos-graduacao"){echo $categories = array_reverse($terms);} ?>
              <li><a href="#">Home</a></li>
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
            <?php $corpo_docente = get_field('cso_corpodocente'); ?>
            <div class="col-md-8 corpo-docente">
              <h4 class="text-uppercase">Corpo docente</h4>
              <table class="table table-striped">
                <tbody>
                  <?php foreach($corpo_docente as $professor): ?>
                  <tr>
                    <td><?php echo $professor['user_firstname'] . " " . $professor['user_lastname']; ?></td>
                    <td><a href="<?php echo get_the_author_meta('usr_lattes', $professor['ID']); ?>">Currículo Lattes</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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

<?php get_footer(); ?>