<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use WP_Query;
use DateTime;

class Archive extends Composer
{
    public $maxPage = 0;
    protected static $views = [
        'archive-*',
    ];

    public function with()
    {
        return [
            'title' => $this->getTitle(),
            'text' => $this->getText(),
            'surtitle' => $this->getPostType(),
            'pushedCards' => $this->getPushedCards(),
            'posts' => $this->getPosts(),
            'tags' => $this->getTags(),
            'is_private' => has_term('pro', 'post_tag', $this->post->ID),
            'has_access' => isset($_COOKIE['mode_access']),
        ];
    }

    public function getTitle()
    {

        $title = get_field('title_large_' . $this->getPostTypeLabel(), 'option');

        return $title;
    }

    public function getMaxPage()
    {
        return $this->maxPage;
    }

    public function getText()
    {
        $text = get_field('text_' . $this->getPostTypeLabel(), 'option');

        return $text;
    }

    public function getPostType()
    {
        $postType = get_post_type();

        $postTypeName = get_post_type_object($postType)->labels->name;

        return $postTypeName;
    }

    public function getPostTypeLabel()
    {
        $postType = get_post_type();

        $postTypeName = get_post_type_object($postType)->name;

        return $postTypeName;
    }

    public function isComingSoon($id)
    {
        $date = get_field('date', $id);
        if ($date) {
            $eventDate = DateTime::createFromFormat('d/m/Y', $date);
            if ($eventDate && $eventDate > new DateTime()) {
                return true;
            }
        }
        return false;
    }

    public function getPushedCards()
    {
        $pushedCards = get_field('pushed_cards_' . $this->getPostTypeLabel(), 'option');

        $cards = [];
        if ($pushedCards) {
            foreach ($pushedCards as $card) {
                if ($card['card']) {
                    $tag = '';

                    $terms = get_the_terms($card['card']->ID, 'tag_' . $this->getPostTypeLabel());
                    if ($terms && !is_wp_error($terms)) {
                        $tag = $terms[0]->name;
                    }

                    $visualField = get_field('visual_herozone', $card['card']->ID);
                    $visual = '';
                    if ($visualField) {
                        $visual = $visualField['sizes']['large'] ?? '';
                    }

                    $dateField = get_field('date', $card['card']->ID);
                    $date = "";
                    if ($dateField) {
                        $timestamp = strtotime(str_replace('/', '-', $dateField));
                        setlocale(LC_TIME, 'fr_FR.UTF-8');
                        $date = strftime('%d %B %Y', $timestamp);
                    }
                    $tag = mb_convert_encoding($tag, 'UTF-8', 'UTF-8');
                    $cards[] = [
                        'visual' => $visual,
                        'tag' => $tag,
                        'permalink' => get_permalink($card['card']->ID),
                        'title' => get_the_title($card['card']->ID),
                        'date' => $date,
                        'dateCustom' => get_field('date_custom', $card['card']->ID),
                        'place' => get_field('place', $card['card']->ID),
                        'isComingSoon' => $this->isComingSoon($card['card']->ID),
                        'is_private' => has_term('pro', 'post_tag', $card['card']->ID),
                        'has_access' => isset($_COOKIE['mode_access']),
                    ];
                }
            }
            return $cards;
        }

        return [];
    }

    public function getPosts()
    {
        $post_type = get_post_type() ?: get_query_var('post_type') ?: 'post';

        $args = [
            'post_type' => $post_type,
            'posts_per_page' => $post_type == 'actualite' ? 8 : 6,
            'paged' => get_query_var('page') ?: 1,
            'meta_key' => 'date',
            'orderby' => 'meta_value',
            'order' => 'DESC',
        ];

        $tax_slug = sanitize_text_field($_GET['tax'] ?? '');

        if ($tax_slug) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'tag_' . $this->getPostTypeLabel(),
                    'field' => 'slug',
                    'terms' => $tax_slug,
                ],
            ];
        }

        $posts = new WP_Query($args);
        $maxPage = $posts->max_num_pages;
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
                $terms = get_the_terms(get_the_ID(), 'tag_' . $this->getPostTypeLabel());
                if ($terms && !is_wp_error($terms)) {
                    $tag = $terms[0]->name;
                }
                $tag = mb_convert_encoding($tag, 'UTF-8', 'UTF-8');
                $post = [
                    'title' => get_the_title(),
                    'permalink' => get_permalink(),
                    'visual' => $src,
                    'alt' => $alt,
                    'date' => $date,
                    'dateCustom' => get_field('date_custom', get_the_ID()),
                    'tag' => $tag,
                    'place' => get_field('place', get_the_ID()) ?? '',
                    'isComingSoon' => $this->isComingSoon(get_the_ID()),
                    'isPast' => false,
                    'is_private' => has_term('pro', 'post_tag', get_the_ID()),
                    'has_access' => isset($_COOKIE['mode_access']),
                ];
                $postsList[] = $post;
            }
            wp_reset_postdata();
        }

        // No posts found
        wp_reset_postdata();

        return ['list' => $postsList, 'maxPage' => $maxPage];
    }

    public function getTags()
    {

        $postType = get_post_type();
        $taxonomy = 'tag_' . $postType;

        $tags = [];
        $terms = get_terms($taxonomy, ['hide_empty' => true]);
        if (!is_wp_error($terms) && !empty($terms)) {
            foreach ($terms as $term) {
                $tags[] = [
                    'name' => $term->name,
                    'slug' => $term->slug,
                    'taxonomy' => $taxonomy,
                    'id' => $term->term_id,
                ];
            }
        }

        return $tags;


    }
}
