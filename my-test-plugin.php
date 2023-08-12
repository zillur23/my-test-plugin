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