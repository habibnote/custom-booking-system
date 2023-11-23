<?php
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
	'key' => 'group_654bc11754f64',
	'title' => 'Slot Meta Data',
	'fields' => array(
		array(
			'key' => 'field_654bc1179d789',
			'label' => 'Slot/Date',
			'name' => 'slot_date',
			'aria-label' => '',
			'type' => 'date_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y',
			'return_format' => 'd/m/Y',
			'first_day' => 6,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );
} );

add_action( 'init', function() {
	register_taxonomy( 'slot_hour', array(
	0 => 'product',
), array(
	'labels' => array(
		'name' => 'Slot Hours',
		'singular_name' => 'Slot Hour',
		'menu_name' => 'Slot Hours',
		'all_items' => 'All Slot Hours',
		'edit_item' => 'Edit Slot Hour',
		'view_item' => 'View Slot Hour',
		'update_item' => 'Update Slot Hour',
		'add_new_item' => 'Add New Slot Hour',
		'new_item_name' => 'New Slot Hour Name',
		'parent_item' => 'Parent Slot Hour',
		'parent_item_colon' => 'Parent Slot Hour:',
		'search_items' => 'Search Slot Hours',
		'not_found' => 'No slot hours found',
		'no_terms' => 'No slot hours',
		'filter_by_item' => 'Filter by slot hour',
		'items_list_navigation' => 'Slot Hours list navigation',
		'items_list' => 'Slot Hours list',
		'back_to_items' => '← Go to slot hours',
		'item_link' => 'Slot Hour Link',
		'item_link_description' => 'A link to a slot hour',
	),
	'public' => true,
	'hierarchical' => true,
	'show_in_menu' => true,
	'show_in_rest' => true,
) );
} );

