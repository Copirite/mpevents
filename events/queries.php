<?php /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
function mpevents_get_events_array() {
  $date = date('Y-m-d');

  $args = array(
    'post_type' => 'events',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'meta_value_num',
    'meta_key' => 'mpevents_event_date',
    'meta_query' => array(
        array(
            'key' => 'mpevents_event_date',
            'value' => $date,
            'compare' => '>=',
            'type' => 'DATE'
        )
    ),
    'order' => 'ASC'
  );
  $my_query = null;
  $my_query = new WP_Query($args);

  if($my_query->posts) {
    return $my_query->posts;
  }
  return [];
}

function mpevents_get_events_query($month, $year) {
  $current_month = date('Y-m-d', strtotime($year . '-' . $month . '-' . '01'));
  $next_month = date('Y-m-d', strtotime('+1 month', strtotime($current_month)));

  $args = array(
    'post_type' => 'events',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'meta_value_num',
    'meta_key' => 'mpevents_event_date',
    'meta_query' => array(
        array(
            'key' => 'mpevents_event_date',
            'value' => array($current_month, $next_month),
            'compare' => 'BETWEEN',
            'type' => 'DATE'
        )
    ),
    'order' => 'ASC'
  );
  $my_query = null;
  $my_query = new WP_Query($args);

  wp_reset_query();

  return $my_query;

}
?>
