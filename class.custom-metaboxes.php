<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category Your theme
 * @package  CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

Class CustomMetaboxes {
  public function __construct() {
    if(file_exists(__DIR__ . '/CMB2/init.php')) {
      require_once __DIR__ . '/CMB2/init.php';
    }

    add_action('cmb2_init', [$this, 'cmb2_theme_prefix_metaboxes']);
  }

  public function cmb2_theme_prefix_metaboxes() {
    $prefix = '_theme_prefix_cmb2_';

    $cmb2_field_files = new DirectoryIterator(__DIR__ . '/custom-metaboxes');

    foreach($cmb2_field_files as $file) {
      if($file->isFile()) require_once($file->getPathname());
    }
  }
}
