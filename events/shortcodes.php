<?php
// $args = shortcode_atts(
//   array('header' => 'false', 'class' => 'mplinks__links'),
//   $atts
// );

//[mpevents-list][/mpevents-list]
function shortcode_mpevents_list($atts, $content) {
  $display = "";
  $events = mpevents_get_events_query();

  if($events->have_posts()) {
    while($events->have_posts()) {
      $events->the_post();
      $display .= do_shortcode($content);
    }
  }

  $display .= "";
  wp_reset_query();
  return $display;
}

//[mpevents-posters]
function shortcode_mpevents_posters($atts) {
  $display = "<div class='mpevents__posters' data-event-posters>";
  $events = mpevents_get_events_array();

  foreach($events as $event) {
    $display .= "<div>";
    $display .= mpevents_presenter_event_poster($event->ID);
    $display .= "</div>";
  }

  $display .= "</div>";

  return $display;
}

//[mpevent-title]
function shortcode_mpevents_event_title() {
  return get_the_title();
}

//[mpevent-description]
function shortcode_mpevents_event_description() {
  return get_field('mpevents_event_description');
}


//[mpevent-content]
function shortcode_mpevents_event_content() {
  return get_the_content();
}

//[mpevent-poster]
function shortcode_mpevents_event_poster() {
  return mpevents_presenter_event_poster(get_the_ID());
}

//[mpevent-date]
function shortcode_mpevents_event_date() {
  return get_field('mpevents_event_date');
}

//[mpevent-time]
function shortcode_mpevents_event_time() {
  return get_field('mpevents_event_time');
}

function initialise_mpevents_shortcodes() {
  add_shortcode('mpevents-list', 'shortcode_mpevents_list');
  add_shortcode('mpevents-posters', 'shortcode_mpevents_posters');
  add_shortcode('mpevent-poster', 'shortcode_mpevents_event_poster');
  add_shortcode('mpevent-title', 'shortcode_mpevents_event_title');
  add_shortcode('mpevent-content', 'shortcode_mpevents_event_content');
  add_shortcode('mpevent-description', 'shortcode_mpevents_event_description');
  add_shortcode('mpevent-date', 'shortcode_mpevents_event_date');
  add_shortcode('mpevent-time', 'shortcode_mpevents_event_time');
}

add_action('init', 'initialise_mpevents_shortcodes');

