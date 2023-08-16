<?php

/*
 * Plugin Name:       My Test Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Care of Best plugin for forever.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            OrangeAP Inc.
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */


 function mtp_slider() {
    $labels = [
        'name' => 'MTP Slider'
    ];

    $args = [
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'supports' => ['title','editor','thumbnail','page-attributes','author','excerpt','trackbacks','custom-fields','comments','revisions','post-formats']
    ];

    register_post_type('mtp-slider',$args);
 }

 add_action('init','mtp_slider');

// Shortcode function added

// function mtp_silder_shortcode() {
//   $args = [
//     'post_type' => 'mtp_slider',
//     'post_per_page' => -1
//   ];

//   $query = new WP_Query($args);

//   $html .= '<div class="mtp_slider">';

//   while($query->have_posts()) : $query->the_post();

//   $html .= '<h2>'.get_the_title().'</h2>';
 
//   endwhile; wp_reset_query();

//     $html .= '</div>';

//     return $html;

// }

// add_shortcode('mtp_slider','mtp_slider_shortcode');

// Try new shortcode as an easy

function year_shortcode() {

    $year = date("d-m-Y");
    return '<h1>'.$year.'</h1>';

}

add_shortcode('year','year_shortcode');


// C T A Button shortcode

function cta_button( $atts ){

    $a = shortcode_atts(array(
        'link' => '#',
        'id' => 'ctabutton',
        'color' => 'blue',
        'size' => '',
        'label' => 'Click Me',
        'target' => '_self'
    ), $atts);
    $show = '<p><a href="'.esc_url($a['link']).'" id="'.esc_attr($a['id']).'" class="button'.esc_attr($a['color']).''. esc_attr($a['size']).'" target="'.esc_attr($a['target']) .'">' .esc_attr($a['label']). '<a/></p>';

    return $show;

}

add_shortcode('cta','cta_button');

// Getting file short code

// <label for="avatar">Choose a profile picture:</label>

// <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />

// File input shortcode for forever


function get_file($atts){
    
    $a = shortcode_atts(array(
        'type' => 'file',
        'id' => 'avatar',
        'name' => 'avatar',
        'accept' => 'image/png, image/jpeg',
        'for' => 'avatar',

    ),$atts);

    // function html_tag(){
    //     $input_tag = '<label for="'.esc_attr($a['for']).'">'."Choose any file :" .'</h2>';
    //     $input_file = 'input type="'.esc_attr($a['type']).'" id="'.esc_attr($a['id']).'" name="'.esc_attr($a['name']).'" accept="'.esc_attr($a['accept']).'"/>';
        
    //     return $input_tag; $input_file;
    // }

    // return html_tag();

    $input_tag = '<label for="'.esc_attr($a['for']).'">'.'Choose any file'.'</label>'.'<br>'.'<input type="'.esc_attr($a['type']).'" id="'.esc_attr($a['id']).'" name="'.esc_attr($a['name']).'" accept="'.esc_attr($a['accept']).'"/>';
   
    return $input_tag; 


}

add_shortcode('file','get_file');



// learn Boxed shortcode with enques style

function box($atts,$content = null, $tag = ''){
    $a = shortcode_atts(array(
        'title' => 'Title',
        'title_color' => 'white',
        'color' => 'blue',
    ),$atts);

    $output = '<div class="boxed" style="border:2px solid'.esc_atts($a['color']). ';">'.'</div class="boxed-title" style="background-color:'.esc_attr($a['color']).';"><h3 stye="color:'.esc_attr($a['title_color']).';">'.esc_attr($a['title']). '</h3><div class="boxed-content"><p>'.esc_attr($content). '</p></div>'.'</div>';


    return $output;

}

add_shortcode('boxed','box');

// Style inquee for forever
function my_enqueue_spripts(){
    // global $post;
    // $has_shortcode = has_shortcode($post->post_content,'cta') || has_shortcode($post->post_content, 'boxed');

    // if(is_a($post, 'WP_Post') && $has_shortcode){
        wp_register_style('my-stylesheet', plugin_dir_url(__FILE__). 'css/style.css');
        wp_enqueue_style('my-stylesheet');
        wp_enqueue_script('my-script', plugin_dir_url(__FILE__). 'js/script.js', 'v1.0.0');
    // }

}

add_action('wp_enqueue_scripts','my_enqueue_spripts');

