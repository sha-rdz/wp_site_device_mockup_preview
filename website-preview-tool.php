<?php
/*
Plugin Name: Website Preview Tool
Description: Adds a shortcode to display a website preview tool on your WordPress site with device mockups.
Version: 1.0
Author: Your Name
*/

define('GITHUB_RAW_URL', 'https://raw.githubusercontent.com/sha-rdz/wp_site_device_mockup_preview/main/');

function website_preview_tool_enqueue_scripts() {
    $version = filemtime(__FILE__);
    wp_enqueue_style('website-preview-tool-style', GITHUB_RAW_URL . 'style.css', array(), $version);
    wp_enqueue_script('website-preview-tool-script', GITHUB_RAW_URL . 'script.js', array('jquery'), $version, true);
}
add_action('wp_enqueue_scripts', 'website_preview_tool_enqueue_scripts');

function website_preview_tool_shortcode() {
    ob_start();
    ?>
    <div class="website-preview-tool">
        <form id="url-form">
            <input type="text" id="url-input" placeholder="Enter website URL (e.g., example.com)" required>
            <button type="submit">Preview</button>
        </form>
        <div class="device-buttons">
            <button id="desktop-button" class="active">Desktop</button>
            <button id="mobile-button">Mobile</button>
        </div>
        <div id="preview-container">
            <div id="desktop-mockup" class="device-mockup">
                <div class="screen">
                    <iframe id="preview-iframe" src="about:blank"></iframe>
                </div>
            </div>
            <div id="mobile-mockup" class="device-mockup">
                <div class="screen">
                    <iframe id="preview-iframe-mobile" src="about:blank"></iframe>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('website_preview_tool', 'website_preview_tool_shortcode');
