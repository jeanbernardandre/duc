<?php

function add_theme_menu_item()
{
    add_submenu_page('themes.php', 'Règlages du thème Huttopia Corporate', 'Theme Huttopia Corporate', 'manage_options', 'theme-hek', 'theme_settings_page');
}
add_action('admin_menu', 'add_theme_menu_item');

function logo_admin_js() {
   wp_enqueue_script('logo_add', get_template_directory_uri() . '/admin/js/logo_script.js', [], '1.0');
}
add_action('admin_enqueue_scripts', 'logo_admin_js');

function theme_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Règlages généraux</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields('section');
                do_settings_sections('theme-options');
                submit_button();
            ?>
        </form>
    </div>
    <?php
}

function display_seo_google_id_element()
{
    ?>
        <input type="text" name="seo_google_id" id="seo_google_id" value="<?php echo get_option('seo_google_id'); ?>" />
    <?php
}

function display_twitter_element()
{
    ?>
        <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}

function display_linkedin_element()
{
    ?>
        <input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" />
    <?php
}

function display_facebook_element()
{
    ?>
        <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_instagram_element()
{
    ?>
        <input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" />
    <?php
}

function display_youtube_element()
{
    ?>
        <input type="text" name="youtube_url" id="youtube_url" value="<?php echo get_option('youtube_url'); ?>" />
    <?php
}

function display_logo_element()
{
    ?>
    <div>
        <div id="hekipia_logo">
            <img src="<?php echo get_option('logo_url'); ?>" alt="" width="120">
        </div>
        <input type="text" name="logo_url" id="logo_url" class="regular-text" value="<?php echo get_option('logo_url'); ?>">
        <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
    </div>
    <?php
}

function display_logo_alt_element()
{
    ?>
    <input type="text" name="logo_alt" id="logo_alt" value="<?php echo get_option('logo_alt'); ?>" />
    <?php
}

function display_conbtact_page_url()
{
    ?>
    <input type="text" name="link_to_contact" id="link_to_contact" value="<?php echo get_option('link_to_contact'); ?>" />
    <?php
}

function display_theme_panel_fields()
{
    add_settings_section('section', 'Règlages du thème	', null, 'theme-options');
    add_settings_field('seo_google_id', 'ID Google Analytics', 'display_seo_google_id_element', 'theme-options', 'section');
    add_settings_field('twitter_url', 'Twitter Profil Url', 'display_twitter_element', 'theme-options', 'section');
    add_settings_field('facebook_url', 'Facebook Profil Url', 'display_facebook_element', 'theme-options', 'section');
    add_settings_field('linkedin_url', 'Linkedin Profil Url', 'display_linkedin_element', 'theme-options', 'section');
    add_settings_field('instagram_url', 'Instagram Profil Url', 'display_instagram_element', 'theme-options', 'section');
    add_settings_field('youtube_url', 'YouTube Profil Url', 'display_youtube_element', 'theme-options', 'section');
    add_settings_field('display_logo', 'Logo Huttopia Corporate', 'display_logo_element', 'theme-options', 'section');
    add_settings_field('logo_alt', 'Texte alternatif du logo', 'display_logo_alt_element', 'theme-options', 'section');
    add_settings_field('link_to_contact', 'URL de la page contact', 'display_conbtact_page_url', 'theme-options', 'section');
    register_setting('section', 'seo_google_id');
    register_setting('section', 'twitter_url');
    register_setting('section', 'facebook_url');
    register_setting('section', 'instagram_url');
    register_setting('section', 'linkedin_url');
    register_setting('section', 'youtube_url');
    register_setting('section', 'logo_url');
    register_setting('section', 'logo_alt');
    register_setting('section', 'link_to_contact');
}
add_action('admin_init', 'display_theme_panel_fields');
