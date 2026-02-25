<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;
use DateTime;

class ArchiveMarque extends Archive
{
    protected static $views = [
        'archive-marque',
    ];

    public function with()
    {
        $data = parent::with();
        $data['posts'] = $this->getPosts(); 

        return $data;
    }

     
    public function getPosts()
    {
        $post_type = get_post_type() ?: get_query_var('post_type') ?: 'post';

        $args = [
            'post_type' => $post_type,
        ];

        
        $posts = new WP_Query($args); 
        $postsList = [];

        if ($posts->have_posts()) {
            while ($posts->have_posts()) {
                $posts->the_post();

                $visual = get_field('visual_9-16', get_the_ID());
                $alt = $visual['alt'] ?? '';
                $src = $visual['sizes']['large'] ?? '';

                $visualLogo = get_field('visual_logo', get_the_ID());
                $altLogo = $visualLogo['alt'] ?? '';
                $srcLogo = $visualLogo['sizes']['medium'] ?? '';

                $date = get_field('date', get_the_ID());
                if ($date) {
                    $date = str_replace('/', '.', $date);
                }

                $tag = '';
                $terms = get_the_terms(get_the_ID(), 'tag_' . parent::getPostTypeLabel());
                if ($terms && !is_wp_error($terms)) {
                    $tag = $terms[0]->name;
                }

                $post = [
                    'title' => get_the_title(),
                    'permalink' => get_permalink(),
                    'visualLogo' => $srcLogo,
                    'visual' => $src,
                    'alt' => $alt,
                ];
                $postsList[] = $post;
            }
            wp_reset_postdata();
        }

        // No posts found
        wp_reset_postdata();

        return ['list' => $postsList];
    }

    
}
