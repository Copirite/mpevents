<?php 
  function mpevents_presenter_event_poster($id) {
    $display = get_the_post_thumbnail($id, 'mpevents-poster');
    return $display;
  }
?>