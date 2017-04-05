<?php /*

**************************************************************************

Plugin Name:  MPEvents
Description:  Adds an Events post type.
Version:      0.0.9
Author:       Matt Patterson
Author URI:   http://mattpatterson.xyz
Text Domain:  mp-events

**************************************************************************

Copyright (C) 2017 Matt Patterson

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

**************************************************************************/
require_once(plugin_dir_path( __FILE__ ) . 'events/events.php');

class MPEvents {
  public $menu_id;

  // Plugin initialization
  public function __construct() {
    add_image_size( 'mpevents-poster', 275, 390, true );
  }
}

// Start up this plugin
add_action('init', 'MPEvents');

function MPEvents() {
  global $MPEvents;
  $MPEvents = new MPEvents();
}

?>
