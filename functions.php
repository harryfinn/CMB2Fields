<?php

define('LOAD_ON_INIT', 1);

function autoload_classes($name) {
  $class_name = strtolower(
    implode(
      '-',
      preg_split('/(?=[A-Z])/', $name, -1, PREG_SPLIT_NO_EMPTY)
    )
  );

  $class_path = get_template_directory() . '/includes/class.'
                . $class_name . '.php';

  if(file_exists($class_path)) require_once $class_path;
}
spl_autoload_register('autoload_classes');

function autoload_lib_classes($name) {
  $lib_class_name = get_template_directory() . '/includes/class.'
                    . strtolower($name) . '.php';

  if(file_exists($lib_class_name)) require_once($lib_class_name);
}
spl_autoload_register('autoload_lib_classes');

if(function_exists('__autoload')) {
  spl_autoload_register('__autoload');
}

function include_additional_files() {
  $template_url = get_template_directory();

  if(is_admin()) {
    new CustomMetaboxes();
  }
}
add_action('init', 'include_additional_files', LOAD_ON_INIT);
