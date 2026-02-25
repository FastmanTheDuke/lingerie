<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Marquee extends Composer
{
  protected static $views = [
    'components.marquee',
  ];

  public function with()
  {
    return [
      'logos' => $this->getLogos()
    ];
  }

  public function getLogos()
  {
    $blocks = get_field('logo-marquee', 'option');
    if (!empty($blocks)) {
      $logos = [];
      foreach ($blocks as $block) {

        $logoField = get_field('visual_logo', $block['brand']->ID);
        $logos[] = [
          'url' => $logoField['url'],
          'alt' => $logoField['alt'],
          'permalink' => get_permalink($block['brand']->ID),
        ];

      }
      return $logos;
    }
  

    return [];
  }
}
