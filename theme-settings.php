<?php

/**
 * @author Semyon Dragunov <sam.dragunov@gmail.com>
 * https://github.com/SemyonDragunov
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function strata_form_system_theme_settings_alter(&$form, $form_state, $form_id = NULL) {
  if (isset($form_id)) {
    return;
  }

  $form['header_background'] = array(
    '#type' => 'managed_file',
    '#title' => 'Фоновая картинка для боковой панели',
    '#required' => FALSE,
    '#description' => "Картинка для бокового фона. Если оставить пустым, то будет стандартная.",
    '#default_value' => theme_get_setting('header_background'),
    '#upload_location' => 'public://strata',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
      'file_validate_size' => array(1024*1024),
    ),
  );

  // We move default theme settings to new fieldset.
  $form['theme_settings_fieldset'] = array(
    '#type' => 'fieldset',
    '#title' => 'Базовые настройки',
    '#weight' => 10,
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['theme_settings_fieldset']['theme_settings'] = $form['theme_settings'];
  unset($form['theme_settings']);
  $form['theme_settings_fieldset']['logo'] = $form['logo'];
  unset($form['logo']);
  $form['theme_settings_fieldset']['favicon'] = $form['favicon'];
  unset($form['favicon']);

  $image_custom_index = theme_get_setting('header_background');
  if ($image_custom_index) {
    SL7ApiFile::setPermanent($image_custom_index, 'strata', 'bg', $image_custom_index);
  }
}