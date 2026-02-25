<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;

class PageHeritage extends Composer
{
    protected static $views = [

        'page-heritage',
    ];

    public function with()
    {
        $data = parent::with();
        $data['blocs_heritage'] = $this->getBlocsHeritage(); 

        return $data;
    }

    public function getBlocsHeritage()
    {
        $blocs = get_field('blocs_heritage', get_the_ID());
 
        return $blocs;
    }

}
