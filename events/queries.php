<?php /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
function mpevents_get_events_array() {
  $args = array(
    'post_type' => 'events',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'meta_value_num',
    'meta_key' => 'mpevents_event_date',
    'order' => 'ASC'
  );
  $my_query = null;
  $my_query = new WP_Query($args); 

  if($my_query->posts) {
    return $my_query->posts;
  }
  return [];
}

function mpevents_get_events_query() {
  $args = array(
    'post_type' => 'events',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'meta_value_num',
    'meta_key' => 'mpevents_event_date',
    'order' => 'ASC'
  );
  $my_query = null;
  $my_query = new WP_Query($args); 

  wp_reset_query();

  return $my_query;

}
?>
