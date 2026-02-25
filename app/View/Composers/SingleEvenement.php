<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;
use DateTime;

class SingleEvenement extends Single
{
    protected static $views = [
        'single-evenement',
    ];

    public function with()
    {
        return array_merge(parent::with(), [
            'previousEvents' => $this->getPreviousEvents(), 
            'isComingSoon' => $this->isComingSoon(), 
        ]);
    }

    public function isComingSoon()
    {
        $date = get_field('date', get_the_ID());
       
        if ($date) {
            $eventDate = DateTime::createFromFormat('d/m/Y', $date);

            if ($eventDate && $eventDate > new DateTime()) {
                return true;
            }
        }
        return false;
    }

    public function getPreviousEvents()
    {
        $args = [
            'post_type' => 'evenement',
            'posts_per_page' => 3,
            'post__not_in' => [get_the_ID()],
            'meta_query' => [
                [
                    'key' => 'date',
                    'value' => date('Ymd'),
                    'compare' => '<',
                    'type' => 'DATE',
                ],
            ],
            
        ];

        $posts = new WP_Query($args);
        $postsList = [];

        if ($posts->have_posts()) {
            while ($posts->have_posts()) {
                $posts->the_post();

                $visual = get_field('visual_list', get_the_ID());
                $alt = $visual['alt'] ?? '';
                $src = $visual['sizes']['large'] ?? '';

                $date = get_field('date', get_the_ID());
                if ($date) {
                    $date = str_replace('/', '.', $date);
                }

                $tag = '';
                $terms = get_the_terms(get_the_ID(), 'tag_evenement');
                if ($terms && !is_wp_error($terms)) {
                    $tag = $terms[0]->name;
                }

                $post = [
                    'title' => get_the_title(),
                    'permalink' => get_permalink(),
                    'visual' => $src,
                    'alt' => $alt,
                    'date' => $date,
                    'dateCustom' => get_field('date_custom', get_the_ID()),
                    'tag' => $tag,
                    'place' => get_field('place', get_the_ID()) ?? '',
                    'isComingSoon' => false,
                    'isPast' => true,
                ];
                $postsList[] = $post;
            }
            wp_reset_postdata();
        }

        // No posts found
        wp_reset_postdata();

        return $postsList;
    }
}
