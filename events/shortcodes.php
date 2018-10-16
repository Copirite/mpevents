<?php
// $args = shortcode_atts(
//   array('header' => 'false', 'class' => 'mplinks__links'),
//   $atts
// );

//[mpevents-list month='08'][/mpevents-list]
function shortcode_mpevents_list($atts, $content) {
  global $post;
  $args = shortcode_atts(array(
    'month' => date('m'),
    'year' => date('y')
  ), $atts);
  $display = "";
  $current_events = mpevents_get_events_query($args['month'], $args['year']);
  $recurring_events = mpevents_get_recurring_events_query();

  $events = join_events($current_events, $recurring_events, $args['month'], $args['year']);

  if(count($events)) {
    foreach($events as $event) {
      $post = $event["event"];

      set_query_var('day', $event['day']);

      $display .= do_shortcode($content);
    }
  } else {
    $display .= "<h5>No events scheduled this month</h5>";
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
  return get_post_field('post_content', get_the_ID());
}

//[mpevent-poster]
function shortcode_mpevents_event_poster() {
  return mpevents_presenter_event_poster(get_the_ID());
}

//[mpevent-date format='%d-%m-%Y']
function shortcode_mpevents_event_date($atts) {
  $args = shortcode_atts(array('format' => false), $atts);
  $date = new DateTime(get_field('mpevents_event_date'));

  if(get_query_var('day')) {
    $day = get_query_var('day');
    $date->setDate($date->format('Y'), $date->format('m'), $day);
  }

  if($args['format']) {
    $format = $args['format'];
  } else {
    $format = "d F Y";
  }

  return $date->format($format);
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

function join_events($current, $recurring, $month, $year) {
  $joined_events = [];

  $d = new DateTime("1-$month-$year");
  $days_in_month = $d->format('t');

  for($i = 1; $i <= $days_in_month; $i++) {
    $current_date = new DateTime("$year-$month-$i");

    foreach($current as $event) {
      $date =  new DateTime(get_field('mpevents_event_date', $event));

      if($date > $current_date) break;

      $day = intval($date->format('d'));
      $current_day = intval($current_date->format('d'));


      if($day == $current_day) {
        array_push($joined_events, array('day' => $i, 'event' => $event));
      }
    }

    foreach($recurring as $event) {
      $occurrence = get_field('mpevents_recurring_occurrence', $event);

      switch($occurrence) {
        case 'daily':
          array_push($joined_events, array('day' => $i, 'event' => $event));
          break;
        case 'weekly':
          $date =  new DateTime(get_field('mpevents_event_date', $event));

          if($date > $current_date) break; // recurring event hasn't started yet

          $day = intval($date->format('d'));

          if((($i - $day) % 7) == 0) {
            array_push($joined_events, array('day' => $i, 'event' => $event));
          }

          break;
        case 'fortnightly':
          $date =  new DateTime(get_field('mpevents_event_date', $event));

          if($date > $current_date) break; // recurring event hasn't started yet

          $day = intval($date->format('d'));

          if((($i - $day) % 14) == 0) {
            array_push($joined_events, array('day' => $i, 'event' => $event));
          }

          break;
        case 'monthly':
          $date =  new DateTime(get_field('mpevents_event_date', $event));

          if($date > $current_date) break; // recurring event hasn't started yet

          $day = intval($date->format('d'));
          $current_day = intval($current_date->format('d'));

          if($day == $current_day) {
            array_push($joined_events, array('day' => $i, 'event' => $event));
          }

          break;
        case 'yearly':
          $date =  new DateTime(get_field('mpevents_event_date', $event));

          if($date > $current_date) break; // recurring event hasn't started yet

          $day_month = $date->format('d-M');
          $current_day_month = $current_date->format('d-M');

          if($day_month == $current_day_month) {
            array_push($joined_events, array('day' => $i, 'event' => $event));
          }

          break;
      }
    }
  }



  return $joined_events;
}

add_action('init', 'initialise_mpevents_shortcodes');

