<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Menu extends Composer
{
  protected static $views = [
    'sections.header',
    'sections.footer',
  ];

  public function with()
  {
    return [
      'menu' => $this->getMenuHeader(), 
      'menuright' => $this->getMenuHeaderRight(), 
      'footermenu1' => $this->getMenuFooter('footer-menu-1'), 
      'footermenu2' => $this->getMenuFooter('footer-menu-2'), 
      'footermenu3' => $this->getMenuFooter('footer-menu-3'), 
      'language' => $this->getLanguage(),
      'social' => $this->getSocial()
    ];
  }

  public function getMenuHeaderRight()
  {
    global $wp;
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations['header-menu-right']);
    $menuItems = wp_get_menu_array($menu->term_id);

    return $menuItems;
  }

  public function getMenuHeader()
  {
    global $wp;
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations['header-menu']);
    $menuItems = wp_get_menu_array($menu->term_id);
    
    $current_url = home_url(add_query_arg(array(), $wp->request));

    foreach ($menuItems as &$item) {
      $item['active'] = false;
      if(trim( $item['url'],'/') == trim( $current_url,'/') || (strpos(trim( $current_url,'/'), trim( $item['url'],'/')) !== false)){
        $item['active'] = true;
      }
    }

    return $menuItems;
  }

  public function getMenuFooter($label)
  {
    global $wp;
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations[$label]);
    $menuItems = wp_get_menu_array($menu->term_id);
    

    return $menuItems;
  }

  public function getSocial()
  {
    global $wp;
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations['social']);
    $menuItems = wp_get_menu_array($menu->term_id);
    
    foreach ($menuItems as $k => $item) {
      $menuItems[$k]['label'] = get_field('label', $item['ID']);
    }

    return $menuItems;
  }


  public function getLanguage()
  {
    $locations = get_nav_menu_locations();
    $current_menu = wp_get_nav_menu_object($locations['language']);
    

    $array_menu = wp_get_nav_menu_items($current_menu->term_id);
        $menuItems = array();
    
        foreach ($array_menu as $m) {
          if (empty($m->menu_item_parent)) {
             
            $menuItems[$m->ID] = array();
            $menuItems[$m->ID]['ID']      =   $m->ID;
            $menuItems[$m->ID]['title']       =   $m->title;
            $menuItems[$m->ID]['url']         =   $m->url;
            $menuItems[$m->ID]['lang']    =   $m->lang;
          }
        }
    
        

    foreach ($menuItems as $k => $item) {
      
      $menuItems[$k]['active'] = false;
      $menuItems[$k]['title'] = substr($item['title'], 0, 2);
      if(pll_current_language() == substr($item['lang'], 0, 2)){
        $menuItems[$k]['active'] = true;
      }
    }
   
    return $menuItems;
  }
}
