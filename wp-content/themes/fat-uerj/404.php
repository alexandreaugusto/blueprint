<?php get_header() ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron internal">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-uppercase">404 - Página não encontrada</h3>
                <ul class="breadcrumb">
                    <li><a href="<?php bloginfo("url") ?>">Home</a></li>
                    <li class="active">404 - Página não encontrada</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container main internal news search-page">
    <div class="row">
        <div class="col-md-9">
            <h2>OPS! A URL solicitada não foi encontrada</h2>
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
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer() ?>
