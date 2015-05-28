<?php

//tipo cursos
add_action('init', 'create_post_type_curso');

function create_post_type_curso() {
    register_post_type('curso', array(
        'labels' => array(
            'name' => __('Cursos'),
            'singular_name' => __('Curso'),
            'add_new_item' => __('Adicionar novo curso'),
            'edit_item' => __('Editar curso'),
            'new_item' => __('Novo curso'),
            'all_items' => __('Todos cursos'),
            'view_item' => __('Ver curso'),
            'search_items' => __('Procurar cursos'),
            'not_found' => __('Curso não encontrado'),
            'not_found_in_trash' => __('Nao foram encontrados cursos na lixeira'),
            'parent_item_colon' => '',
            'menu_name' => 'Cursos'
        ),
        'description' => 'Cursos da FAT/UERJ',
        'public' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'taxonomies' => array('post_tag')
            )
    );
}

add_action('init', 'custom_init_curso');

function custom_init_curso() {
    add_post_type_support('curso', 'page-attributes');
}

//removing revisions (autosave)
function disable_revisions_curso() {
    remove_post_type_support('curso', 'revisions');
}

add_action('admin_init', 'disable_revisions_curso');

add_post_type_support('curso', array('thumbnail', 'tags'));

function create_taxonomy_curso_category() {
    register_taxonomy('tipo-curso', 'curso', array(
        'hierarchical' => true,
        'label' => __('Categorias dos cursos'),
        'show_ui' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
            )
    );
}

//adicionando categoria especifica dos produtos
add_action('init', 'create_taxonomy_curso_category');

//exibir select das categorias no tipo produto
add_action('restrict_manage_posts', 'restrict_manage_posts_curso');

function restrict_manage_posts_curso() {
    global $typenow;
    $taxonomy = 'tipo-curso';
    if ($typenow == 'curso') {
        $filters = array($taxonomy);
        foreach ($filters as $tax_slug) {
            $tax_obj = get_taxonomy($tax_slug);
            $tax_name = $tax_obj->labels->name;
            $terms = get_terms($tax_slug);
            echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
            echo "<option value=''>Mostrar tudo</option>";
            foreach ($terms as $term) {
                echo '<option value=' . $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '', '>' . $term->name . ' (' . $term->count . ')</option>';
            }
            echo "</select>";
        }
    }
}

//tipo cursos
add_action('init', 'create_post_type_disciplina');

function create_post_type_disciplina() {
    register_post_type('disciplina', array(
        'labels' => array(
            'name' => __('Disciplinas'),
            'singular_name' => __('Disciplina'),
            'add_new_item' => __('Adicionar nova disciplina'),
            'edit_item' => __('Editar disciplina'),
            'new_item' => __('Nova disciplina'),
            'all_items' => __('Todas disciplinas'),
            'view_item' => __('Ver disciplina'),
            'search_items' => __('Procurar disciplinas'),
            'not_found' => __('Disciplina não encontrada'),
            'not_found_in_trash' => __('Nao foram encontradas disciplinas na lixeira'),
            'parent_item_colon' => '',
            'menu_name' => 'Disciplinas'
        ),
        'description' => 'Disciplinas dos cursos da FAT/UERJ',
        'public' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'taxonomies' => array('post_tag')
            )
    );
}

add_action('init', 'custom_init_disciplina');

function custom_init_disciplina() {
    add_post_type_support('disciplina', 'page-attributes');
}

//removing revisions (autosave)
function disable_revisions_disciplina() {
    remove_post_type_support('disciplina', 'revisions');
}

add_action('admin_init', 'disable_revisions_disciplina');

add_post_type_support('disciplina', array('thumbnail', 'tags'));

function create_taxonomy_disciplina_category() {
    register_taxonomy('tipo-disciplina', 'disciplina', array(
        'hierarchical' => true,
        'label' => __('Categorias das disciplinas'),
        'show_ui' => true,
        'show_in_tag_cloud' => true,
        'query_var' => true,
            )
    );
}

//adicionando categoria especifica dos produtos
add_action('init', 'create_taxonomy_disciplina_category');

//exibir select das categorias no tipo produto
add_action('restrict_manage_posts', 'restrict_manage_posts_disciplina');

function restrict_manage_posts_disciplina() {
    global $typenow;
    $taxonomy = 'tipo-disciplina';
    if ($typenow == 'disciplina') {
        $filters = array($taxonomy);
        foreach ($filters as $tax_slug) {
            $tax_obj = get_taxonomy($tax_slug);
            $tax_name = $tax_obj->labels->name;
            $terms = get_terms($tax_slug);
            echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
            echo "<option value=''>Mostrar tudo</option>";
            foreach ($terms as $term) {
                echo '<option value=' . $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '', '>' . $term->name . ' (' . $term->count . ')</option>';
            }
            echo "</select>";
        }
    }
}

function show_files_discipline_in_course_meta_box() {
    global $post;

    echo '<input type="hidden" name="custom_course_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';
    // Begin the field table and loop  
    echo '<table class="form-table">';


    $categorias = get_categories(array('type' => 'disciplina', 'orderby' => 'id', 'order' => 'ASC',
        'taxonomy' => 'tipo-disciplina', 'hide_empty' => 0));
    $cont = 1;
    $idCurso = $post->ID;
    $catCont = 0;
    $duracao = get_field('cso_duracao');

    foreach ($categorias as $categoria) :
        if ($catCont++ >= $duracao)
            break;

        echo "<tr>";
        echo "<th colspan='2'>&raquo; " . $categoria->cat_name . "</th>";
        echo "</tr>";

        $query = new WP_Query(array(
            'tipo-disciplina' => $categoria->slug,
            'post_type' => 'disciplina',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'meta_key' => 'curso_disciplina',
            'meta_value' => $idCurso
        ));
        if ($query->found_posts > 0):

            $i = 1;
            while ($query->have_posts()) :
                $query->the_post();
                echo "<tr><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;&raquo; ";
                echo get_the_title() . "</td></tr>";
                $attachments = get_posts(
                        array('post_type' => 'attachment', 'posts_per_page' => -1,
                            'post_status' => 'any', 'post_parent' => null,
                            'meta_key' => 'arquivo_disciplina', 'meta_value' => get_the_ID()));
                if ($attachments):
                    foreach ($attachments as $attachment):
                        echo "<tr>";
                        echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo "<a href='" . wp_get_attachment_url($attachment->ID) . "'>" . $attachment->post_title . "</a>";
                        echo "</td>";
                        echo "<td>&nbsp;</td>";
                        echo "</tr>";
                    endforeach;
                endif;
            endwhile;
        endif;
        wp_reset_postdata();
        $cont++;
    endforeach;

    echo '</table>'; // end table
}

function add_files_discipline_in_course_meta_box() {
    add_meta_box(
            'files_discipline_in_course', // $id  
            'Arquivos', // $title   
            'show_files_discipline_in_course_meta_box', // $callback  
            'curso', // $page  
            'normal', // $context  
            'low'); // $priority  
}

add_action('add_meta_boxes', 'add_files_discipline_in_course_meta_box');