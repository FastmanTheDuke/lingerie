<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

     /**
  * Data to be passed to view before rendering.
  *
  * @return array
  */
  public function with()
  {
    return [
      'siteName' => $this->siteName(),
      'logo' => $this->logo(),
      'logoMini' => $this->logoMini(),
      'headerLarge' => $this->headerLarge(),
    ];
  }

    /**
     * Retrieve the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }

    public function logo(): string
    {
        $logo = get_field('logo', 'option');
        $logoSrc = '';
        if ($logo) {
            $logoSrc = $logo['url'];
        }

        return $logoSrc;
    }


    public function logoMini(): string
    {
        $logo = get_field('logo-mini', 'option');
        $logoSrc = '';
        if ($logo) {
            $logoSrc = $logo['url'];
        }

        return $logoSrc;
    }

    public function headerLarge(): bool
    {
        if (is_front_page() || is_singular('evenement') || is_singular('marque')) {
            return true;
        }
    
        return false;
    }

    
}
