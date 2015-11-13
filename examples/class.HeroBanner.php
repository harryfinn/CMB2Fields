<?php

Class HeroBanner extends CMB2Fields {
  public $field_prefix = 'hero_banner_';

  public function __construct($post_id, $ignore_parent = false) {
    $parent_post_id = $this->parent_post_id($post_id);
    $hero_banner_id = $ignore_parent === true ?
                      $post_id :
                      $parent_post_id;

    parent::__construct($hero_banner_id);
  }

  public function render_video($field) {
    if(!empty($this->field($field))) {
      include(locate_template('templates/hero/vimeo-video-tpl.php'));
    }
  }

  public function vimeo_url($field) {
    $vimeo_url = $this->field($field);

    return !empty($vimeo_url) ? $this->vimeo_url_formatter($vimeo_url) : '';
  }

  private function vimeo_url_formatter($vimeo_url) {
    $vimeo_id = (int) substr(parse_url($vimeo_url, PHP_URL_PATH), 1);

    return 'https://player.vimeo.com/video/' . $vimeo_id;
  }
}
