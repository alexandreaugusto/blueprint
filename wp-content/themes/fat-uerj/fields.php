<?php

//tipo cursos
add_action('init', 'create_post_type');

function create_post_type() {
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
        'has_archive' => true,
        'taxonomies' => array('post_tag')
            )
    );
}

//removing revisions (autosave)
function disable_revisions() {
    remove_post_type_support('curso', 'revisions');
}

add_action('admin_init', 'disable_revisions');

add_post_type_support('curso', array('thumbnail', 'tags'));

function create_taxonomy_curso_category() {
    register_taxonomy('tipo_curso', 'curso', array(
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
add_action('restrict_manage_posts', 'my_restrict_manage_posts');

function my_restrict_manage_posts() {
    global $typenow;
    $taxonomy = 'tipo_curso';
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
