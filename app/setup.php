<?php

/**
 * Theme setup.
 */

namespace App;

use Illuminate\Support\Facades\Vite;

/**
 * Inject styles into the block editor.
 *
 * @return array
 */
add_filter('block_editor_settings_all', function ($settings) {
    $style = Vite::asset('resources/css/editor.css');

    $settings['styles'][] = [
        'css' => "@import url('{$style}')",
    ];

    return $settings;
});

/**
 * Inject scripts into the block editor.
 *
 * @return void
 */
add_filter('admin_head', function () {
    if (!get_current_screen()?->is_block_editor()) {
        return;
    }

    $dependencies = json_decode(Vite::content('editor.deps.json'));

    foreach ($dependencies as $dependency) {
        if (!wp_script_is($dependency)) {
            wp_enqueue_script($dependency);
        }
    }

    echo Vite::withEntryPoints([
        'resources/js/editor.js',
    ])->toHtml();
});

/**
 * Use the generated theme.json file.
 *
 * @return string
 */
add_filter('theme_file_path', function ($path, $file) {
    return $file === 'theme.json'
        ? public_path('build/assets/theme.json')
        : $path;
}, 10, 2);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'header-menu' => __('Header Menu'),
        'header-menu-right' => __('Header Menu Right'),
        'footer-menu-1' => __('Footer Menu 1'),
        'footer-menu-2' => __('Footer Menu 2'),
        'footer-menu-3' => __('Footer Menu 3'),
        'language' => __('Language'),
        'social' => __('Social')
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});
/**
 * Gestion de l'accès privé pour le CPT "mode"
 */
add_action('wp_ajax_send_magic_link', function () {
    $email = sanitize_email($_POST['email'] ?? '');

    if (!is_email($email)) {
        wp_send_json_error(['message' => 'Email invalide.']);
    }

    // Génération d'un token temporaire (simple pour l'exemple)
    $token = wp_hash($email . time());
    set_transient('auth_token_' . $token, $email, DAY_IN_SECONDS);

    $link = add_query_arg('access_token', $token, home_url('/mode-lingerie/'));
    $subject = "Votre accès à l'espace Privé - Lingerie Française";
    $message = "Cliquez ici pour accéder aux contenus privés : " . $link;

    if (wp_mail($email, $subject, $message)) {
        wp_send_json_success(['message' => 'Email envoyé ! Vérifiez votre boîte de réception.']);
    }
    wp_send_json_error(['message' => 'Erreur lors de l\'envoi.']);
});

// Action pour intercepter le token dans l'URL et poser le cookie
add_action('init', function () {
    if (isset($_GET['access_token'])) {
        $token = sanitize_text_field($_GET['access_token']);
        if (get_transient('auth_token_' . $token)) {
            // Cookie valide 1 semaine
            setcookie('mode_access', 'active', time() + (7 * 24 * 60 * 60), '/');
            wp_redirect(remove_query_arg('access_token'));
            exit;
        }
    }
});