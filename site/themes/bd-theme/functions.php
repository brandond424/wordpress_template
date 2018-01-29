<?php

add_theme_support('menus');


add_action( 'wp_enqueue_scripts', 'scripts_and_styles' );
function scripts_and_styles() {
  global $wp_styles;

  if (!is_admin()) {
    $wp_styles->add_data( 'bones-ie-only', 'conditional', 'lt IE 9' );

    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }

    /**
    Register Javascript Files
    **/

    wp_enqueue_script( 'jquery' );

    wp_register_script( 'hoverintent-js', get_stylesheet_directory_uri() . '/bower_components/jquery-hoverintent/jquery.hoverIntent.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'hoverintent-js' );

    wp_register_script( 'bootstrap-min-js', get_stylesheet_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'bootstrap-min-js' );

    wp_register_script( 'slick-js', get_stylesheet_directory_uri() . '/bower_components/slick-carousel/slick/slick.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'slick-js' );

    wp_register_script( 'scripts-js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'scripts-js' );

    /**
    Register Styles
    **/

    wp_register_style( 'stylesheet', get_stylesheet_directory_uri() . '/library/css/styles.css', array(), '', 'all' );
    wp_enqueue_style( 'stylesheet' );

  }
}

add_action('init', 'create_posttypes');
function create_posttypes() {

  // register_post_type('projects', array(
  //   'label' => 'Projects',
  //   'public' => true,
  //   'show_ui' => true,
  //   'capability_type' => 'post',
  //   'hierarchical' => false,
  //   'menu_icon' => 'dashicons-images-alt',
  //   'rewrite' => array('slug' => 'project'),
  //   'query_var' => true,
  //   'supports' => array(
  //   'title',
  //   'author',
  //   'editor',
  //   'revisions',
  //   'thumbnail',
  //   'page-attributes',)
  // ) );

}

add_action('init', 'create_my_taxonomies', 0);
function create_my_taxonomies() {

  // register_taxonomy(
  //   'project_categories',
  //   'projects',
  //     array(
  //       "hierarchical" => true,
  //       "label" => "Project Categories",
  //       "singular_label" => "Project Category",
  //       'update_count_callback' => '_update_post_term_count',
  //       'query_var' => true,
  //       'rewrite' => array(
  //              'slug' => 'project-detail',
  //               'with_front' => true
  //       ),
  //      'public' => true,
  //      'show_ui' => true,
  //      'show_admin_column' => true,
  //      'show_tagcloud' => true,
  //      '_builtin' => false,
  //      'show_in_nav_menus' => false)
  // );

}

add_action('login_head', 'login_logo');
function login_logo() {
  echo '<style type="text/css"> h1 a { background-image:url('.get_bloginfo('template_directory').'/library/images/login-logo.png) !important; }</style>';
}

function debugArray($array) {
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
  show_admin_bar(false);
}

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ){
  $existing_mimes['vcf'] = 'text/x-vcard'; return $existing_mimes;
}


































/* DON'T DELETE THIS CLOSING TAG */ ?>
