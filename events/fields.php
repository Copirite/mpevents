<?php

function register_events_fields() {
  if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array (
      'key' => 'group_57e347c4e2780',
      'title' => 'Event Time',
      'fields' => array (
        array (
          'key' => 'field_58afbbe0e5619',
          'label' => 'Date',
          'name' => 'mpevents_event_date',
          'type' => 'date_picker',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '$19 pp',
            'id' => '',
          ),
          'display_format' => 'd/m/Y',
          'return_format' => 'jS F Y',
          'first_day' => 1,
        ),
        array (
          'key' => 'field_58d0738c31515',
          'label' => 'Reccuring Event?',
          'name' => 'mpevents_recurring',
          'type' => 'true_false',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'message' => '',
          'default_value' => 0,
        ),
        array (
          'key' => 'field_58d072f331512',
          'label' => 'Occurrence',
          'name' => 'mpevents_recurring_occurrence',
          'type' => 'select',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => array (
            array (
              array (
                'field' => 'field_58d0738c31515',
                'operator' => '==',
                'value' => 1,
              ),
            ),
          ),
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'choices' => array (
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'fortnightly' => 'Fortnightly',
            'monthly' => 'Monthly',
            'yearly' => 'Yearly',
          ),
          'default_value' => array (
            'weekly'
          ),
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 0,
          'ajax' => 0,
          'return_format' => 'value',
          'placeholder' => '',
        ),
        array (
          'key' => 'field_58b518b1bd019',
          'label' => 'Time',
          'name' => 'mpevents_event_time',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '10AM - 4PM',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
      ),
      'location' => array (
        array (
          array (
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'events',
          ),
        )
      ),
      'menu_order' => 0,
      'position' => 'side',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => 1,
      'description' => '',
    ));
    acf_add_local_field_group(array (
      'key' => 'group_57e347c4e2789',
      'title' => 'Event Fields',
      'fields' => array (
        array (
          'key' => 'field_58afbbe0e5620',
          'label' => 'Description',
          'name' => 'mpevents_event_description',
          'type' => 'textarea',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'maxlength' => '',
          'rows' => '',
          'formatting' => 'none',
        ),
      ),
      'location' => array (
        array (
          array (
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'events',
          ),
        )
      ),
      'menu_order' => 0,
      'position' => 'normal',
      'style' => 'default',
      'label_placement' => 'top',
      'instruction_placement' => 'label',
      'hide_on_screen' => '',
      'active' => 1,
      'description' => '',
    ));
  }
}
add_action('init', 'register_events_fields');
?>
