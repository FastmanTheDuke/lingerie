<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;


class Single extends Composer
{
    public $maxPage = 0;
    protected static $views = [
        'single',
        'single-*',
    ];

    public function with()
    {
        return [
            'title' => $this->getTitle(),
            'visual_herozone' => $this->getVisual(),
            'video_herozone' => $this->getVideo(),
            'logo_herozone' => $this->getLogo(),
            'parentPostType' => $this->getPostType(),
            'tags' => $this->getTags(),
            'date' => $this->getDate(),
            'dateCustom' => $this->getDateCustom(),
            'place' => $this->getPlace(),
            'author' => $this->getAuthor(),
            'parentUrl' => $this->getParentUrl(),
            'files' => $this->getFiles(),
            'links' => $this->getLinks(),
            'hasSidebar' => $this->hasSidebar(),
        ];
    }

    public function getTitle()
    {
        $title = get_the_title();

        return $title;
    }

    public function getAuthor()
    {
        $author = get_field('author', get_the_ID());

        return $author;
    }

    public function getPlace()
    {
        $place = get_field('place', get_the_ID());

        return $place;
    }

    public function getFiles()
    {
        $files = get_field('files', get_the_ID());

        return $files;
    }

    public function getLinks()
    {
        $links = get_field('links', get_the_ID());

        return $links;
    }

    public function hasSidebar()
    {
        $hasSidebar = false;

        if (get_post_type() === 'actualite' || get_post_type() === 'mode') {
            $hasSidebar = true;
        }

        return $hasSidebar;
    }

    public function getParentUrl()
    {

        $parentUrl = dirname(get_permalink(get_the_ID()));

        return $parentUrl;
    }

    public function getDate()
    {
        $dateField = get_field('date', get_the_ID());
        $date = '';
        if ($dateField) {
            $date = str_replace('/', '.', $dateField);
        }

        return $date;
    }

    public function getDateCustom()
    {
        $dateField = get_field('date_custom', get_the_ID());

        return $dateField;
    }

    public function getVisual()
    {
        $visualField = get_field('visual_herozone', get_the_ID());
        $visual = $visualField['sizes']['large'] ?? '';

        return $visual;
    }

    public function getVideo()
    {
        $videoField = get_field('video_herozone', get_the_ID());
        $video = $videoField['url'] ?? '';

        return $video;
    }

    public function getLogo()
    {
        $logoField = get_field('visual_logo_white', get_the_ID());
        $logo = $logoField['sizes']['large'] ?? '';

        return $logo;
    }

    public function getPostType()
    {
        $postType = get_post_type();

        $postTypeLabel = get_post_type_object($postType)->name;

        return $postTypeLabel;
    }

    public function getTags()
    {

        //get all taxonomies of this cpt
        $postType = get_post_type(get_the_ID());

        $taxonomies = get_object_taxonomies($postType);
        $taxonomies = array_filter($taxonomies, function ($taxonomy) {
            return !in_array($taxonomy, ['post_tag', 'category']);
        });

        $tags = [];
        foreach ($taxonomies as $taxonomy) {
            $terms = wp_get_post_terms(get_the_ID(), $taxonomy, ['hide_empty' => true]);
            if (!is_wp_error($terms) && !empty($terms)) {
                foreach ($terms as $term) {
                    $tags[$taxonomy] = [
                        'name' => $term->name,
                        'slug' => $term->slug,
                        'taxonomy' => $taxonomy,
                        'id' => $term->term_id,
                    ];
                }
            }
        }

        return $tags;
    }



}
