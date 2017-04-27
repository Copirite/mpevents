### MPEVENTS PLUGIN

#### Author: [Matt Patterson](http://mattpatterson.xyz)
This plugin was created to make it easy to handle events on your wordpress sites.

#### How it works
This plugin uses a local copy of [Advanced Custom Fields PRO](https://wordpress.org/plugins/advanced-custom-fields/) in order to create an events custom post type for any wordpress site this plugin is activated on. Is a lot cleaner and easier to use than registering your own custom post types.

This plugin is made for custom styling of events. In the future I may provide default style, but in the mean time this is how to display events. 
Example use of a list of events:
##### mpevents-list
```
[mpevents-list]
<div class="row">
  <div class="small-12 medium-4 columns">
    [mpevent-poster]
  </div>
  <div class="small-12 medium-7 medium-offset-1 columns">
    <h4>[mpevent-title]</h4>
    <h6>[mpevent-date] | [mpevent-time]</h6>
    [mpevent-content]
  </div>
</div>
[/mpevents-list]
```

#### Current Shortcodes
There are shortcodes available via this plugin that can be used in the theme.

##### Display a list of event posters 
`[mpevents-posters][/mpevents-posters]` 

##### Display a list of events
`[mpevents-list][/mpevents-list]` 


##### Display the title of an event in a `[mpevents-list]` loop
`[mpevent-title]` 

##### Display the description of an event in a `[mpevents-list]` loop
`[mpevent-description]` 

##### Display the poster of an event in a `[mpevents-list]` loop
`[mpevent-poster]` 

##### Display the content of an event in a `[mpevents-list]` loop
`[mpevent-content]` 

##### Display the date of an event in a `[mpevents-list]` loop
`[mpevent-date format="%d-%m-%Y"]` 

This shortcode allows for a custom format (optional). There is a default which returns "28th Aug 2017". 
To change the format, use the format codes listed (here)[http://php.net/manual/en/function.strftime.php]

##### Display the time of an event in a `[mpevents-list]` loop
`[mpevent-time]` 
