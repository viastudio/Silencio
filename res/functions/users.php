<?php
/*
 * Custom Role for Client User
 * The role has all of the capabilities of an editor, plus the ability to manage theme options.
 * Theme options inculde widgets, menus, theme options (if theme supports), custom backbground (if theme supports), custom header (if theme supports).
 * Optionally, the role can have the capability of creating new users by uncommenting  create_users and list_users
 *
 * For more capability options, see http://codex.wordpress.org/Roles_and_Capabilities#Capability_vs._Role_Table
 *
 */
add_action('admin_init', 'silencio_custom_role');
function silencio_custom_role() {

    if (!get_role('client_user')) {
        // let's use the editor as the base  capabilities
        $caps = get_role('editor')->capabilities;

        // add our new capabilities
        $caps = array_merge(
            $caps,
            array(
                'edit_theme_options' => true,
                'create_users' => true,
                'edit_users' => true,
                'delete_users' => true,
                'list_users' => true,
                'remove_users' => true,
                'promote_users' => true
            )
        );
        add_role('client_user', 'Client User', $caps);
    }

    // Gravity Forms Permissions
    if (!get_role('forms_user')) {
        // let's use the subscriber as the base capabilities
        $caps = get_role('subscriber')->capabilities;

        // add our new capabilities
        $caps = array_merge(
            $caps,
            array(
                'gravityforms_view_entries' => true,
                'gravityforms_export_entries' => true,
                'gravityforms_delete_entries' => true
            )
        );
        add_role('forms_user', 'Forms User', $caps);
    }
}

function add_grav_forms() {
    $role = get_role('client_user');
    $role->add_cap('gform_full_access');
}

add_action('admin_init', 'add_grav_forms');
