<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});
/*add_action('wp_ajax_send_magic_link', function () {
    $email = sanitize_email($_POST['email']);
    if (is_email($email)) {
        $token = bin2hex(random_bytes(16));
        $link = add_query_arg('login_token', $token, home_url('/mode-lingerie/'));

        $message = "Voici votre lien d'accès : " . $link;
        wp_mail($email, "Accès à l'espace Privé", $message);
        wp_send_json_success();
    }
    wp_send_json_error();
});*/