<?php

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('title-tag'); 

function includeStyles () {
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css');
  wp_enqueue_style('fontAwesome2', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_script('jQuery', 'https://code.jquery.com/jquery-3.4.1.js');
  wp_enqueue_script('modalScript', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js');
  wp_enqueue_style('modalCSS', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css');
  wp_enqueue_script('javaScript', get_template_directory_uri().'/js/script.js', [], false, true); /* De extra stegen gör att js-filen laddas i slutet av body-taggen //Putte */
}

/* Skapar posttypen Bands. //David */
function bands () {
  $labels = array(
    'name' => 'Bands',
    'singular_name' => 'Band',
    'menu_name' => 'Bands',
    'add_new_item' => 'Add new band',
    'add_new' => 'Add',
    'edit_item' => 'Edit',
    'update_item' => 'Update',
  );
  $args = array(
    'label' => 'bands',
    'labels' => $labels,
    'supports' => array(
      'title', 'author', 'editor', 'thumbnail', 'revisions', 'custom-fields'
    ),
    'public' => true,
    'has_archive' => true,
  );
  register_post_type('bands', $args);
}

/* Skapar posttypen Albums */
function albums () {
  $labels = array(
    'name' => 'Albums',
    'singular_name' => 'Album',
    'menu_name' => 'Albums',
    'add_new_item' => 'Add new album',
    'add_new' => 'Add',
    'edit_item' => 'Edit',
    'update_item' => ' Update',
  );
  $args = array(
    'label' => 'albums',
    'labels' => $labels,
    'supports' => array(
      'title', 'author', 'editor', 'thumbnail', 'revisions', 'custom-fields'
    ),
    'public' => true,
    'has_archive' => true,
  );
  register_post_type('albums', $args);
}

/* Skapar taxonomier. //David */
function tax () {
  $args = array(
    'label' => 'Year',
    'public' => true,
    'has_archive' => true,
  );
  register_taxonomy('year', 'albums', $args);
  $args['label'] = 'Genre';
  register_taxonomy('genre', 'albums', $args);
  $args['label'] = 'Record Label';
  register_taxonomy('record_label', 'albums', $args);
}

/* Skapar inställningssida för ACF //Putte */
if (function_exists ('acf_add_options_page')) {
  $parent = acf_add_options_page(array(
    'page_title' => 'Temainställningar',
    'menu_title' => 'Temainställningar'
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'Footerinställningar',
    'menu_title' => 'Footerinställingar',
    'parent_slug' 	=> $parent['menu_slug']
  ));
}


/* Registrerar alla funktioner och sådant. //David */
register_nav_menu('navbar', ('Navbar'));
add_action('init', 'bands');
add_action('init', 'albums');
add_action('init', 'tax');
add_action('wp_enqueue_scripts', 'includeStyles');