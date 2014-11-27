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
                    <a href="">
                        <img src="<?php bloginfo('template_url'); ?>/img/logo-uerj.png">
                    </a>
                </div>
                <div class="col-md-5 col-sm-4 col-xs-8">
                    <h4>Faculdade de Tecnologia <small>Campus Regional de Resende</small></h4>
                    <address>Rodovia Presidente Dutra km 298 (sentido RJ-SP) - Pólo Industrial Resende - RJ <br>Cep: 27.537-000 <br>Tel: (24) 3354-7851 / (24) 3354-7875</address>
                    <a class="btn btn-default" role="button">Fale conosco</a>
                </div>
                <div class="col-md-5 col-sm-5 hidden-xs">
                    <div class="pull-right share">
                        <span class='st_facebook_large' displayText='Facebook'></span>
                        <span class='st_twitter_large' displayText='Tweet'></span>
                        <span class='st_googleplus_large' displayText='Google +'></span>
                    </div>
                    <form class="navbar-form navbar-right input-group" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="O que você procura?">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">Buscar</button>
                      </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--      <footer>-->
<!--        <div class="sitemap">-->
<!--          <div class="container">-->
<!--              <div class="row">-->
<!--                <div class="col-md-3 col-xs-6">-->
<!--                  <h5>Institucional</h5>-->
<!--                  <ul class="list-unstyled">-->
<!--                    <li><a href="#">Quem Somos</a></li>-->
<!--                    <li><a href="#">Direção</a></li>-->
<!--                    <li><a href="#">Histórico</a></li>-->
<!--                    <li><a href="#">Responsabilidade Social</a></li>-->
<!--                    <li><a href="#">Parceiros</a></li>-->
<!--                    <li><a href="#">Ouvidoria</a></li>-->
<!--                  </ul>-->
<!--                </div>-->
<!--                <div class="col-md-3 col-xs-6">-->
<!--                  <h5>CRR</h5>-->
<!--                  <ul class="list-unstyled">-->
<!--                    <li><a href="#">Administração do Campus</a></li>-->
<!--                    <li><a href="#">Setor Pedagógico</a></li>-->
<!--                    <li><a href="#">Departamentos</a></li>-->
<!--                    <li><a href="#">Incubadora de Empresas</a></li>-->
<!--                    <li><a href="#">Centro de Energia Renovável</a></li>-->
<!--                    <li><a href="#">Centro de Desenvolvimento e Inovação Tecnológica</a></li>-->
<!--                    <li><a href="#">Biblioteca CTC-F</a></li>-->
<!--                    <li><a href="#">Laboratório</a></li>-->
<!--                    <li><a href="#">Centro Acadêmico</a></li>-->
<!--                    <li><a href="#">Faculdade de Tecnologia</a></li>-->
<!--                  </ul>-->
<!--                </div>-->
<!--                <div class="col-md-3 col-xs-6">-->
<!--                  <h5>Ensino</h5>-->
<!--                  <ul class="list-unstyled">-->
<!--                    <li class="sitemap-header">Graduação</li>-->
<!--                    <li><a href="#">Engenharia de Produção</a></li>-->
<!--                    <li><a href="#">Engenharia Mecânica</a></li>-->
<!--                    <li><a href="#">Engenharia Química</a></li>-->
<!--                    <li class="sitemap-header">Pós-graduação<small>Lato Sensu (Especialização)</small></li>-->
<!--                    <li><a href="#">Engenharia de Produção com Ênfase em Gestão Industrial</a></li>-->
<!--                    <li><a href="#">Engenharia de Qualidade</a></li>-->
<!--                    <li><a href="#">Logística e Supply Chain</a></li>-->
<!--                    <li><a href="#">Gestão de Projetos da Engenharia de Produção</a></li>-->
<!--                    <li class="sitemap-header">Pós-graduação<small>Stricto Sensu (Mestrado)</small></li>-->
<!--                    <li><a href="#">Energia e Meio Ambiente</a></li>-->
<!--                  </ul>-->
<!--                </div>-->
<!--                <div class="col-md-3 col-xs-6">-->
<!--                  <h5>Pesquisa</h5>-->
<!--                  <ul class="list-unstyled">-->
<!--                    <li><a href="#">Grupos de Pesquisa no CNPq</a></li>-->
<!--                    <li><a href="#">Pesquisas isoladas</a></li>-->
<!--                  </ul>-->
<!--                </div>-->
<!--                <div class="col-md-3 col-xs-6">-->
<!--                  <h5>Outros</h5>-->
<!--                  <ul class="list-unstyled">-->
<!--                    <li><a href="#">Extensão</a></li>-->
<!--                    <li><a href="#">Instalações</a></li>-->
<!--                    <li><a href="#">Notícias</a></li>-->
<!--                    <li><a href="#">Vestibular</a></li>-->
<!--                    <li><a href="#">Contato</a></li>-->
<!--                  </ul>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="copyright">-->
<!--            <div class="container">-->
<!--              <div class="row">-->
<!--                <div class="col-md-2 col-sm-3 col-xs-4">-->
<!--                  <a href="">-->
<!--                    <img src="--><?php //bloginfo('template_url'); ?><!--/img/logo-uerj.png">-->
<!--                  </a>-->
<!--                </div>-->
<!--                <div class="col-md-5 col-sm-4 col-xs-8">-->
<!--                  <h4>Faculdade de Tecnologia <small>Campus Regional de Resende</small></h4>-->
<!--                  <address>Rodovia Presidente Dutra km 298 (sentido RJ-SP) - Pólo Industrial Resende - RJ <br>Cep: 27.537-000 <br>Tel: (24) 3354-7851 / (24) 3354-7875</address>-->
<!--                  <a class="btn btn-default" role="button">Fale conosco</a>-->
<!--                </div>-->
<!--                <div class="col-md-5 col-sm-5 hidden-xs">-->
<!--                  <div class="pull-right share">-->
<!--                    <span class='st_facebook_large' displayText='Facebook'></span>-->
<!--                    <span class='st_twitter_large' displayText='Tweet'></span>-->
<!--                    <span class='st_googleplus_large' displayText='Google +'></span>-->
<!--                  </div>-->
<!--                  <form class="navbar-form navbar-right input-group" role="search">-->
<!--                    <div class="form-group">-->
<!--                      <input type="text" class="form-control" placeholder="O que você procura?">-->
<!--                      <span class="input-group-btn">-->
<!--                        <button type="submit" class="btn btn-default">Buscar</button>-->
<!--                      </span>-->
<!--                    </div>-->
<!--                  </form>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </footer>-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>

  <?php wp_footer(); ?>
  </body>
</html>