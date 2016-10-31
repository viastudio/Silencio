<?php

add_filter('upload_mimes', 'custom_mime_types');

function custom_mime_types($existing_mimes = array()) {
    //Add, update, or remove any mime-types you'd like to allow in the media library

    //For example, the following line allows PDF uploads
    //$existing_mimes['pdf'] = 'application/pdf';
    
    return $existing_mimes;
}
