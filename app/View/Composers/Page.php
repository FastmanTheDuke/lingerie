<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class Page extends Composer
{
    protected static $views = [

        'page-*',
        'page',
    ];

    public function with()
    {
        return [
            'title' => $this->getTitleLarge(),
            'text' => $this->getText(),
            'surtitle' => $this->getTitle(),
            'blocs_texts' => $this->getBlocsTexts(),
            'background' => $this->getBackground(),
        ];
    }

    public function getTitleLarge()
    {
       
        $title = get_field('title_large', get_the_ID());
 
        return $title;
    }

    public function getText()
    {
        $text = get_field('text', get_the_ID());
 
        return $text;
    }

    public function getBlocsTexts()
    {
        $blocs = get_field('blocs_texts', get_the_ID());
 
        return $blocs;
    }

    public function getBackground()
    {
        $visualField = get_field('visual_background', get_the_ID());
        $visual = $visualField['sizes']['large'] ?? '';
        return $visual;
    }

    public function getTitle()
    {
        //get the title
        $title = get_the_title();

        return $title;
    }

   
}
