<?php /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
function mpevents_register_events() {
  register_post_type( 'events',
    array(
      'labels' => array(
        'name' => 'Events',
        'singular_name' => 'Event',
        'all_items' => 'All Events',
        'search_items' => 'Search Events',
        'add_new_item' => 'Add a new Event'
      ),
      'description' => 'A list of events that happen at your business',
      'public' => true,
      'exclude_from_search' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 20,
      'menu_icon' => 'dashicons-calendar',
      'rewrite' => array( 'slug' => 'events', 'with_front' => false ),
      'has_archive' => false,
      'capability_type' => 'post',
      'hierarchical' => false,
      'supports' => array( 'title', 'editor', 'thumbnail', 'revisions', 'sticky')
    )
  );
}
add_action('init', 'mpevents_register_events');
?>
