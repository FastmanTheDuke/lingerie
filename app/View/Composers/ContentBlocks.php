<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ContentBlocks extends Composer
{
  protected static $views = [
    'partials.content-blocks',
    'partials.content-blocks-fiche',
  ];

  public function with()
  {
    return [
      'blocks' => $this->blocks()
    ];
  }

  public function blocks()
  {
    $blocks = get_field('blocs');
  

    return $blocks;
  }
}
