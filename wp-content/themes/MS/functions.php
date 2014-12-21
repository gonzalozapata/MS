<?php

// Menús con Bootstrap

add_action( 'after_setup_theme', 'bootstrap_setup' );

if ( ! function_exists( 'bootstrap_setup' ) ):

	function bootstrap_setup(){

		add_action( 'init', 'register_menu' );
			
		function register_menu(){
			register_nav_menu('principal', 'Principal'); 
		}

// WALKER PARA BOOTSTRAP 2
		class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {

			
			function start_lvl( &$output, $depth ) {

				$indent = str_repeat( "\t", $depth );
				$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";
				
			}

			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
				
				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$li_attributes = '';
				$class_names = $value = '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = ($args->has_children) ? 'dropdown' : '';
				$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
				$classes[] = 'menu-item-' . $item->ID;


				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$class_names = ' class="' . esc_attr( $class_names ) . '"';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
				$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}

			function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
				
				if ( !$element )
					return;
				
				$id_field = $this->db_fields['id'];

				//display this element
				if ( is_array( $args[0] ) ) 
					$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
				else if ( is_object( $args[0] ) ) 
					$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'start_el'), $cb_args);

				$id = $element->$id_field;

				// descend only when the depth is right and there are childrens for this element
				if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

					foreach( $children_elements[ $id ] as $child ){

						if ( !isset($newlevel) ) {
							$newlevel = true;
							//start the child delimiter
							$cb_args = array_merge( array(&$output, $depth), $args);
							call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
						}
						$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
					}
						unset( $children_elements[ $id ] );
				}

				if ( isset($newlevel) && $newlevel ){
					//end the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
				}

				//end this element
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'end_el'), $cb_args);
				
			}
			
		}

	}

endif;

// Registra sidebars
if (function_exists('register_sidebar'))
{
    // Define Sidebar de blog
    register_sidebar(array(
        'name' => __('Barra de blog', 'MS'),
        'description' => __('Barra que muestra widgets en las páginas del blog.', 'MS'),
        'id' => 'sidebar-blog-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Barra de portada 1', 'MS'),
        'description' => __('Barra que muestra widgets en la portada, lado izquierdo.', 'MS'),
        'id' => 'sidebar-portada-1',
        'before_widget' => '<div id="%1$s" class="%2$s textodeportada">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><hr class="portada">'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Barra de portada 2', 'MS'),
        'description' => __('Barra que muestra widgets en la portada, al centro.', 'MS'),
        'id' => 'sidebar-portada-2',
        'before_widget' => '<div id="%1$s" class="%2$s textodeportada">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><hr class="portada">'
    ));

    // Define Sidebar Widget Area 3
    register_sidebar(array(
        'name' => __('Barra de portada 3', 'MS'),
        'description' => __('Barra que muestra widgets en la portada, lado derecho.', 'MS'),
        'id' => 'sidebar-portada-3',
        'before_widget' => '<div id="%1$s" class="%2$s textodeportada">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><hr class="portada">'
    ));
	
    // Define Sidebar Widget Area 3
    register_sidebar(array(
        'name' => __('Barra de footer 1', 'MS'),
        'description' => __('Barra que muestra widgets en el footer, lado izquierdo.', 'MS'),
        'id' => 'sidebar-footer-1',
        'before_widget' => '<div id="%1$s" class="%2$s textodeportada">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
	
    // Define Sidebar Widget Area 3
    register_sidebar(array(
        'name' => __('Barra de footer 2', 'MS'),
        'description' => __('Barra que muestra widgets en el footer, al centro.', 'MS'),
        'id' => 'sidebar-footer-2',
        'before_widget' => '<div id="%1$s" class="%2$s textodeportada">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 3
    register_sidebar(array(
        'name' => __('Barra de footer 3', 'MS'),
        'description' => __('Barra que muestra widgets en el footer, lado derecho.', 'MS'),
        'id' => 'sidebar-footer-3',
        'before_widget' => '<div id="%1$s" class="%2$s textodeportada">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

}

if (function_exists('add_theme_support'))
{
$defaults1 = array(
	'default-color'          => 'FFFFFF',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults1 );

$defaults2 = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 1170,
	'height'                 => 400,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '000000',
	'header-text'            => true,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults2 );

}

// Post Type de videos

/* add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'viajes',
		array(
			'labels' => array(
				'name' => __( 'Viajes' ),
				'singular_name' => __( 'Viaje' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'revisions', 'excerpt', 'thumbnail', 'post-formats', 'comments'),
		'taxonomies' => array('category'/*, 'post_tag' */ /*)
		)
	);

	register_post_type( 'otros',
		array(
			'labels' => array(
				'name' => __( 'Otros' ),
				'singular_name' => __( 'Otros' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'revisions', 'excerpt', 'thumbnail', 'post-formats', 'comments'),
		'taxonomies' => array('category'/*, 'post_tag' */ /*)
		)
	);

	register_post_type( 'porvenir',
		array(
			'labels' => array(
				'name' => __( 'Por venir' ),
				'singular_name' => __( 'Por venir' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'revisions', 'excerpt', 'thumbnail', 'post-formats', 'comments'),
		'taxonomies' => array('category'/*, 'post_tag' */ /*)
		)
	);

	register_post_type( 'fonola',
		array(
			'labels' => array(
				'name' => __( 'Fonola' ),
				'singular_name' => __( 'Fonola' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title', 'editor', 'revisions', 'excerpt', 'thumbnail', 'post-formats', 'comments'),
		// 'taxonomies' => array('category', 'post_tag')
		)
	);


} */



// Tamaños de thumbnail personalizados

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('gigante', 1170, 300, true); // Grande Thumbnail
    add_image_size('grande', 750, 300, true); // Medium Thumbnail
    add_image_size('mediana', 500, 375, true); // Small Thumbnail
    add_image_size('chica', 220, 220, true); // Small Thumbnail
    add_image_size('punto', 150, 150, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
	
	
// TAXONOMIAS PARA LOS POST TYPE ESCONDIDOS
/* add_action( 'init', 'tiratagdeviajes' );
function tiratagdeviajes() {
register_taxonomy( 'tagsdeviajes', 'viajes', array( 'labels' => array( 'name' => 'Etiquetas de Viajes', 'singular name' => 'Etiqueta de viajes'), 'public' => true,  ) ); }

register_taxonomy_for_object_type( 'tagsdeviajes', 'viajes' ); 

add_action( 'init', 'tiratagdefonola' );
function tiratagdefonola() {
register_taxonomy( 'tagsdefonola', 'fonola', array( 'labels' => array( 'name' => 'Etiquetas de fonola', 'singular name' => 'Etiqueta de fonola'), 'public' => true,  ) ); }

register_taxonomy_for_object_type( 'tagsdefonola', 'fonola' ); 


add_action( 'init', 'tiratagdeotros' );
function tiratagdeotros() {
register_taxonomy( 'tagsdeotros', 'otros', array( 'labels' => array( 'name' => 'Etiquetas de otros', 'singular name' => 'Etiqueta de otros'), 'public' => true,  ) ); }

register_taxonomy_for_object_type( 'tagsdeotros', 'otros' ); */


?>