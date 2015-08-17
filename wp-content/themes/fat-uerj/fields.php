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

function rem_editor_from_post_type() {
    remove_post_type_support('disciplina', 'editor');
}

add_action('init', 'rem_editor_from_post_type');

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
            $termo = isset($_GET[$tax_slug])?$_GET[$tax_slug]:"";
            foreach ($terms as $term) {
                echo '<option value=' . $term->slug, $termo == $term->slug ? ' selected="selected"' : '', '>' . $term->name . ' (' . $term->count . ')</option>';
            }
            echo "</select>";
        }
    }
}

add_action( 'restrict_manage_posts', 'cursos_disciplinas_admin_posts_filter_restrict_manage_posts' );
/**
 * First create the dropdown
 * make sure to change POST_TYPE to the name of your custom post type
 * 
 * @author Ohad Raz
 * 
 * @return void
 */
function cursos_disciplinas_admin_posts_filter_restrict_manage_posts(){
    $type = 'disciplina';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }

    //only add filter to post type you want
    if ('disciplina' == $type) {
        //change this to the list of values you want to show
        //in 'label' => 'value' format

        echo "<select name='ADMIN_FILTER_FIELD_VALUE'>";
        echo "<option value=''>Todos os cursos</option>";
            $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
            $consurta = new WP_Query(array(
                            'post_type' => 'curso',
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'posts_per_page' => -1
                        ));

            while ($consurta->have_posts()) :
                $consurta->the_post();
                printf
                    (
                        '<option value="%s"%s>%s</option>',
                        get_the_ID(),
                        get_the_ID() == $current_v? ' selected="selected"':'',
                        get_the_title()
                    );
            endwhile;

            wp_reset_postdata();

        echo "</select>";
    }
}

add_filter( 'parse_query', 'disciplinas_posts_filter' );
/**
 * if submitted filter by post meta
 * 
 * make sure to change META_KEY to the actual meta key
 * and POST_TYPE to the name of your custom post type
 * @author Ohad Raz
 * @param  (wp_query object) $query
 * 
 * @return Void
 */
function disciplinas_posts_filter( $query ){
    global $pagenow;
    $type = 'disciplina';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ('disciplina' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != '') {
        $query->query_vars['meta_key'] = 'curso_disciplina';
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
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
                echo "<tr><td colspan='2' style='padding-left:25px'>&raquo; ";
                echo "<a href='" . get_edit_post_link(get_the_ID()) . "'>" . get_the_title() . "</a></td></tr>";
                $attachments = new Attachments('discipline_attachments', get_the_ID());
                if ($attachments->exist()):
                    while ($attachments->get()):
                        echo "<tr>";
                        echo "<td style='padding-left:60px' colspan='2'>";
                        echo "&raquo; <a href='" . wp_get_attachment_url($attachments->id()) . "' target='_blank'>" . $attachments->field( 'title' ) . "</a>";
                        echo "</td>";
                        echo "</tr>";
                    endwhile;
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

function discipline_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'Arquivos da disciplina' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'Arquivos da disciplina',

    // all post types to utilize (string|array)
    'post_type'     => array( 'disciplina' ),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Adicione arquivos aqui!',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Adicionar arquivos', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Anexo', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // whether Attachments should set 'Uploaded to' (if not already set)
    'post_parent'   => false,

    // fields array
    'fields'        => $fields,

  );

  $attachments->register( 'discipline_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'discipline_attachments' );