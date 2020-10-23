<?php
/**
 * For more information about how to create Custom Post Types, please visit:
 * https://generatewp.com/post-type/
 * 
*/

if(!defined('ABSPATH')) die();

if ( ! function_exists('custom_products_post_type') ) {

	// Register Custom Post Type
	function custom_products_post_type() {
	
		$labels = array(
			'name'                  => _x( 'Products', 'Post Type General Name', 'carolina-spa' ),
			'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'carolina-spa' ),
			'menu_name'             => __( 'Productos', 'carolina-spa' ),
			'name_admin_bar'        => __( 'Producto', 'carolina-spa' ),
			'archives'              => __( 'Archivo Producto', 'carolina-spa' ),
			'attributes'            => __( 'Atributos Producto', 'carolina-spa' ),
			'parent_item_colon'     => __( 'Padre Producto', 'carolina-spa' ),
			'all_items'             => __( 'Todos los Productos', 'carolina-spa' ),
			'add_new_item'          => __( 'Agregar Producto', 'carolina-spa' ),
			'add_new'               => __( 'Agregar Producto', 'carolina-spa' ),
			'new_item'              => __( 'Nuevo Producto', 'carolina-spa' ),
			'edit_item'             => __( 'Editar Producto', 'carolina-spa' ),
			'update_item'           => __( 'Actualizar Producto', 'carolina-spa' ),
			'view_item'             => __( 'Ver Producto', 'carolina-spa' ),
			'view_items'            => __( 'Ver Productos', 'carolina-spa' ),
			'search_items'          => __( 'Buscar Producto', 'carolina-spa' ),
			'not_found'             => __( 'Producto no encontrado', 'carolina-spa' ),
			'not_found_in_trash'    => __( 'Producto no encontrado en basura', 'carolina-spa' ),
			'featured_image'        => __( 'Imagen destacada Producto', 'carolina-spa' ),
			'set_featured_image'    => __( 'Agregar Imagen Destacada al Producto', 'carolina-spa' ),
			'remove_featured_image' => __( 'Eliminar Imagen Destacada al Producto', 'carolina-spa' ),
			'use_featured_image'    => __( 'Usar Producto como Imagen Destacada', 'carolina-spa' ),
			'insert_into_item'      => __( 'Insertar en Producto', 'carolina-spa' ),
			'uploaded_to_this_item' => __( 'Actualizar Producto', 'carolina-spa' ),
			'items_list'            => __( 'Lista de Productos', 'carolina-spa' ),
			'items_list_navigation' => __( 'Navegación de Productos', 'carolina-spa' ),
			'filter_items_list'     => __( 'Filtrar Producto', 'carolina-spa' ),
		);
		$args = array(
			'label'                 => __( 'Product', 'carolina-spa' ),
			'description'           => __( 'Carolina Spa Products', 'carolina-spa' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-cart',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'products_post_type', $args );
	
	}
	add_action( 'init', 'custom_products_post_type', 0 );
	
}