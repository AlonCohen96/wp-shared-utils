<?php
function add_xp($user_id = null, $xp_to_add = 0) {
    /*
    if (!$user_id) {
        // If no user ID is passed, use the current logged-in user (for AJAX call)
        if (!is_user_logged_in()) {
            wp_send_json_error('You must be logged in to earn XP.');
        }
        $user_id = get_current_user_id();
        $xp_to_add = isset($_POST['xp_amount']) ? intval($_POST['xp_amount']) : 0;
    }*/

    // Get the current XP of the user
    $current_xp = get_user_meta($user_id, 'xp', true);
    $new_xp = intval($current_xp) + $xp_to_add;

    // Update the user's XP in the database
    update_user_meta($user_id, 'xp', $new_xp);

    /*

    // If it's an AJAX request, send the new XP value back
    if (defined('DOING_AJAX') && DOING_AJAX) {
        wp_send_json_success($new_xp);
    }

    return $new_xp;
    */
}
add_action('wp_ajax_add_xp', 'add_xp');