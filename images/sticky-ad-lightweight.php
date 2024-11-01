<?php
/**
 *
 * Plugin Name:       Sticky Ad Lightweight
 * Plugin URI: 		  https://wpgtr.com/
 * Description:       Start earning more with Sticky Ad Lightweight! Easily setup your ad code here and enjoy!
 * Version:           2.0.0
 * Author:            Saurabh Guttedar
 * Author URI:        http://wpgtr.com
 * Text Domain:       sticky-ad-lightweight
 * Domain Path		  /languages
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 *
 
Sticky Ad Lightweight is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Sticky Ad Lightweight is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Sticky Ad Lightweight. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/
if ( ! defined( 'ABSPATH' ) ) exit;

include 'css/style.php';


function wpgtr_stickyads_div() { ?>
<div id="wpgtr_stickyads_textcss_container">
	<div id="wpgtr_stickyads_textcss_wrap">
		<div id="wpgtr_stickyads_textcss_ad">
			<?php echo get_option('wpgtr_stickyads_script'); ?>
		</div>
		<div id="wpgtr_stickyads_textcss_close">	
			<a href="#" onclick="document.getElementById('wpgtr_stickyads_textcss_container').style.display='none';return false;" id="wpgtr_stickyads_textcss_x"><img border="none" src="<?php echo plugins_url("images/close.png", __FILE__); ?>" alt="x"></a>	
		</div>
	</div>
</div>
<?php
}


function wpgtr_stickyads_top_div() { ?>
<div id="wpgtr_stickyads_top_textcss_container">
	<div id="wpgtr_stickyads_top_textcss_wrap">
		<div id="wpgtr_stickyads_top_textcss_ad">
			<?php echo get_option('wpgtr_stickyads_script'); ?>
		</div>
		<div id="wpgtr_stickyads_top_textcss_close">	
			<a href="#" onclick="document.getElementById('wpgtr_stickyads_top_textcss_container').style.display='none';return false;" id="wpgtr_stickyads_top_textcss_x"><img border="none" src="<?php echo plugins_url("images/close.png", __FILE__); ?>" alt="x"></a>	
		</div>
	</div>
</div>
<?php
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wpgtr_stickyads_status_link' );
function wpgtr_stickyads_status_link ( $links ) {
	$mylinks = array('<a href="' . admin_url( 'options-general.php?page=sticky-ad-lightweight' ) . '">View Settings</a>');
	return array_merge( $links, $mylinks );
}

// Support links
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wpgtr_support_function');
function wpgtr_support_function($links) {
    $plugin_shortcuts = array(
        '<a rel="noopener" href="https://ko-fi.com/saurabhgtr" target="_blank" style="color: #0F9D58; font-weight: bold;">' . __('Buy me a Coffee', 'wpgtr_support_function') . '</a>'
    );
    return array_merge($links, $plugin_shortcuts);
}



if (is_admin()) add_action('admin_menu', 'wpgtr_stickyads_menu');
else {
	if (get_option('wpgtr_stickyads_status_top') == "2") {
			if (get_option('wpgtr_stickyads_mobile_top') == "2") {
			if (wp_is_mobile()) {
				add_action('wp_head','wpgtr_stickyads_top_css');
				add_action('wp_footer','wpgtr_stickyads_top_div');
			}
		}
		
if (get_option('wpgtr_stickyads_desktop_top') == "2") {
			if (!wp_is_mobile()) {
				add_action('wp_head','wpgtr_stickyads_top_css');
				add_action('wp_footer','wpgtr_stickyads_top_div');
			}
		}
	}}


if (is_admin()) add_action('admin_menu', 'wpgtr_stickyads_menu');
else {
	if (get_option('wpgtr_stickyads_status') == "1") {
		if (get_option('wpgtr_stickyads_desktop') == "1") {
			if (!wp_is_mobile()) {
				add_action('wp_head','wpgtr_stickyads_css');
				add_action('wp_footer','wpgtr_stickyads_div');
			}
		}
		if (get_option('wpgtr_stickyads_mobile') == "1") {
			if (wp_is_mobile()) {
				add_action('wp_head','wpgtr_stickyads_css');
				add_action('wp_footer','wpgtr_stickyads_div');
			}
		}
		

	}}


function wpgtr_stickyads_menu() {
	add_options_page("Sticky Ad Lightweight Page","Sticky Ad Lightweight","manage_options","sticky-ad-lightweight","wpgtr_stickyads_wrap");
	add_action( 'admin_init', 'wpgtr_stickyads_register' );
}

function wpgtr_stickyads_register() {
	register_setting( 'wpgtr_stickyads-qcfd', 'wpgtr_stickyads_script' );
    register_setting( 'wpgtr_stickyads-qcfd', 'wpgtr_stickyads_top_script' );
	register_setting( 'wpgtr_stickyads-qcfd', 'wpgtr_stickyads_status' );
	register_setting( 'wpgtr_stickyads-qcfd', 'wpgtr_stickyads_status_top' );
	register_setting( 'wpgtr_stickyads-qcfd', 'wpgtr_stickyads_mobile' );
	register_setting( 'wpgtr_stickyads-qcfd', 'wpgtr_stickyads_desktop' );
    register_setting( 'wpgtr_stickyads-qcfd', 'wpgtr_stickyads_mobile_top' );
	register_setting( 'wpgtr_stickyads-qcfd', 'wpgtr_stickyads_desktop_top' );
}

function wpgtr_stickyads_wrap() { ?>
<div class="wrap">
	<h1>Sticky Ads</h1>
	<form method="post" action="options.php">
	<?php
		settings_fields( 'wpgtr_stickyads-qcfd' );
		do_settings_sections( 'wpgtr_stickyads-qcfd' );
	?>
		<div id="dashboard-widgets-wrap">
			<div id="dashboard-widgets" class="metabox-holder">
			
				
				
				
				<div id="postbox-container-1" class="postbox-container" style="width: 100%;">
					<div id="aside-sorting" class="custom-sortable-box">
						<div id="dashboard_primary" class="postbox " style="padding: 2%;">
							<h2 class="cus_ad"><span>Ad Visibility</span></h2>
							<div class="inside">
								<div class="rss-widget"><br />
									<input name="wpgtr_stickyads_desktop" type="checkbox" value="1" <?php checked(1, get_option('wpgtr_stickyads_desktop'),true); ?>/> Bottom - Desktop
									<br /><br />
									<input name="wpgtr_stickyads_mobile" type="checkbox" value="1" <?php checked(1, get_option('wpgtr_stickyads_mobile'),true); if(false===get_option('wpgtr_stickyads_mobile')) echo "checked"; ?> /> Bottom - Mobile<br /><br />
									<input name="wpgtr_stickyads_mobile_top" type="checkbox" value="2" <?php checked(2, get_option('wpgtr_stickyads_mobile_top'),true); if(false===get_option('wpgtr_stickyads_mobile_top')) echo "checked"; ?> /> Top - Mobile<br /><br />
									<input name="wpgtr_stickyads_desktop_top" type="checkbox" value="2" <?php checked(2, get_option('wpgtr_stickyads_desktop_top'),true); ?>/> Top - Desktop
									<br /><br />
								</div>
								
							</div>
							<h2 class="cus_ad" style="text-align: center;"><span>Insert your AD Code below</span></h2>
							<div class="inside">
								<div class="rss-widget"><br />											
									<textarea id="wpgtr_stickyads_script" name="wpgtr_stickyads_script" class="large-text code" rows="9"><?php echo esc_textarea(get_option('wpgtr_stickyads_script')); ?></textarea>
									<br /><br />
							<h3 class="cus_ad" style="text-align: left; font-weight: bold;"><span>Bottom Placement</span></h3>
								
									<input type="radio" name="wpgtr_stickyads_status" value="1" <?php checked(1, get_option('wpgtr_stickyads_status'),true); ?>>ON</input>
								
									<input type="radio" name="wpgtr_stickyads_status" value="0" <?php checked(0, get_option('wpgtr_stickyads_status'),true); if(false===get_option('wpgtr_stickyads_status')) echo "checked"; ?>>OFF</input>
							<br /><br />
										<br /><br />
							<h3 class="cus_ad" style="text-align: left; font-weight: bold;"><span>Top Placement</span></h3>
							<input type="radio" name="wpgtr_stickyads_status_top" value="2" <?php checked(2, get_option('wpgtr_stickyads_status_top'),true); ?>>ON</input>
								
									<input type="radio" name="wpgtr_stickyads_status_top" value="0" <?php checked(0, get_option('wpgtr_stickyads_status_top'),true); if(false===get_option('wpgtr_stickyads_status_top')) echo "checked"; ?>>OFF</input>
						
									<?php submit_button(); ?>
								</div>
							</div>								
						</div>
					</div>							
				</div>						
			</div>
		</div>            
	</form>
</div>
<?php } ?>