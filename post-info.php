<?php
/*
Plugin Name: Post Info
Plugin URI: http://www.montanabanana.com
Description: Post Info Shortcut is a very simple plugin that allows you to add site info shortcodes into your post/page/plugins that displays information about your post. [thispage get='title'] will display the title and [thispage get='url'] will display the Permalink
Version: 0.1.2
Author: Eric @ Montana Banana
Author URI: http://montanab.com

Copyright (c) 2014 Montana Banana

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.

*/ 



//////////////////////////////////////////////////////


function mb_thispage($vars) {        
    $attr = shortcode_atts( array(
        'get'=>''
    ), $vars );
    
    $post = get_post(get_the_ID());
    
    if($post) {
        switch($attr['get']){
            case "title": return $post->post_title; break;
            case "url": return get_permalink($post->ID); break;
            case "path": return get_template_directory_uri(); break;
            default: return $post->post_title; break;
        }
    }
    else{
        return FALSE;
    }
}
add_shortcode( 'thispage', 'mb_thispage' );
?>