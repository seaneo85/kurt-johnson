<?php
if ( !class_exists( "ReduxFramework" ) ) {
	return;
}

if ( !class_exists( "Redux_Framework_automotive_wp_c15fe4af2a5399d84d32be2" ) ) {
	class Redux_Framework_automotive_wp_c15fe4af2a5399d84d32be2 {
		public function __construct( ) {

			// Your base config file for Redux
			add_action( 'after_setup_theme', array($this, 'loadConfig') );
			
			// Data migration
			//add_action("after_switch_theme", array($this, "migrate_old_data"), 10 ,  2);	
			
		}

		public function loadConfig() {			
			global $social_options, $wpdb;
		
			// Get Revolution Sliders			
			/*$rev_sliders['none'] = "No Slideshow";
			$rev_sliders = array();
			
			if($wpdb->get_var("SHOW TABLES LIKE '" . get_table_prefix() . "revslider_sliders'") == get_table_prefix() . "revslider_sliders") {
				$rev_sliders_query = $wpdb->get_results("SELECT title, alias FROM " . get_table_prefix() . "revslider_sliders");
				
				foreach($rev_sliders_query as $slider){
					$rev_sliders[$slider->alias] = stripslashes($slider->title);
				}
			}*/
			
			$sections = array (
		array (
			'title' => __('General Settings', 'automotive'),
			'fields' => array (
				array (
					'desc' => __('Image to display beside the url bar', 'automotive'),
					'id' => 'favicon',
					'type' => 'media',
					'title' => __('Favicon', 'automotive'),
					'url' => true,
				),
				array(
					'title' => __('Body Layout', 'automotive'),
					'desc' => __('Choose which layout the body will have', 'automotive'),
					'type' => 'button_set',
					'id'   => 'body_layout',
					'options' => array(
						'1' => 'Fullwidth',
						'2' => 'Boxed',
						'3' => 'Boxed Margin'
					),
					'default' => 1
				),
				array( 
				    'id'       => 'boxed_background',
				    'type'     => 'background',
				    'title'    => __('Boxed Background', 'automotive'),
				    'desc'     => __('Sets the background image for boxed layouts', 'automotive'),
				    'required' => array('body_layout', '>', 1),
			    ),
				array (
					'desc' => __('Enable or disable the social share buttons at the end of each blog post.', 'automotive'),
					'type' => 'switch',
					'on' => __('Enabled', 'automotive'),
					'off' => __('Disabled', 'automotive'),
					'id' => 'social_share_buttons',
					'title' => __('Social Share Buttons', 'automotive'),
					'default' => '1',
				),
				array (
					'desc' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer or header based on which you select afterwards.', 'automotive'),
					'id' => 'google_analytics',
					'type' => 'ace_editor',
					'title' => __('Tracking Code', 'automotive'),
					'theme' => 'chrome'
				),
				array (
					'desc' => __('Place code before &lt;/head&gt; or &lt;/body&gt;', 'automotive'),
					'id' => 'tracking_code_position',
					'on' => '&lt;/' . __('head', 'automotive') . '&gt;',
					'off' => '&lt;/' . __('body', 'automotive') . '&gt;',
					'type' => 'switch',
				)
			),
			'icon' => 'el-icon-cog',
		),
		array (
			'title' => __('Header Settings', 'automotive'),
			'fields' => array (
				array (
					'title' => __('Logo ', 'automotive'),
					'desc' => __('Main logo text', 'automotive'),
					'type' => 'text',
					'id' => 'logo_text',
					'default' => __('Automotive', 'automotive')
				),
				array (
					'desc' => __('Text displayed under the logo text', 'automotive'),
					'type' => 'text',
					'id' => 'logo_text_secondary',
					'default' => __('Template', 'automotive')
				),
				array (
					'desc' => 'For best results make the image 270px x 65px. This setting <strong>will</strong> take precedence over the above one.',
					'type' => 'media',
					'id' => 'logo_image',
					'url' => true,
				),	
				array (
					'title' => __('Default Header Image', 'automotive'),
					'desc' => __('This image will be shown if no header image is found.', 'automotive'),
					'type' => 'media',
					'id' => 'default_header_image'
				),			
				array (
					'title' => __('Toolbar Text', 'automotive'),
					'type'  => 'section',
					'subtitle' => __('These labels are found on the top bar above the main menu.', 'automotive'),
					'id' => 'section-start',
 				    'indent' => true
				),
				array (
					'id' => 'toolbar_login_show',
					'type' => 'switch',
					'title' => __("Show login", 'automotive'),
					'default' => true,
					'on' => 'Show',
					'off' => 'Hide'
				),
				array (
					'id' => 'toolbar_login',
					'type' => 'text',
					'title' => __("Login", 'automotive'),
					'default' => __('Login', 'automotive'),
					'required' => array('toolbar_login_show', 'equals', 1)
				),
				array (
					'id' => 'toolbar_login_link',
					'type' => 'select',
					'title' => __("Login Link", 'automotive'),
					'data' => 'pages',
					'required' => array('toolbar_login_show', 'equals', 1)
				),
				array (
					'id' => 'toolbar_language_show',
					'type' => 'switch',
					'title' => __("Show languages", 'automotive'),
					'default' => true,
					'on' => 'Show',
					'off' => 'Hide'
				),
				array (
					'id' => 'toolbar_languages',
					'type' => 'text',
					'title' => __("Languages", 'automotive'),
					'default' => __('Languages', 'automotive'),
					'required' => array('toolbar_language_show', 'equals', 1)
				),
				array (
					'id' => 'toolbar_search_show',
					'type' => 'switch',
					'title' => __("Show search", 'automotive'),
					'default' => true,
					'on' => 'Show',
					'off' => 'Hide'
				),
				array (
					'id' => 'toolbar_search',
					'type' => 'text',
					'title' => __("Search", 'automotive'),
					'default' => __('Search', 'automotive'),
					'required' => array('toolbar_search_show', 'equals', 1)
				),
				array (
					'id' => 'toolbar_phone_show',
					'type' => 'switch',
					'title' => __("Show phone", 'automotive'),
					'default' => true,
					'on' => 'Show',
					'off' => 'Hide'
				),
				array (
					'id' => 'toolbar_phone',
					'type' => 'text',
					'title' => __("Phone", 'automotive'),
					'default' => __('Phone', 'automotive'),
					'required' => array('toolbar_phone_show', 'equals', 1)
				),
				array (
					'id' => 'toolbar_address_show',
					'type' => 'switch',
					'title' => __("Show address", 'automotive'),
					'default' => true,
					'on' => 'Show',
					'off' => 'Hide'
				),
				array (
					'id' => 'toolbar_address',
					'type' => 'text',
					'title' => __("Address", 'automotive'),
					'default' => __('Address', 'automotive'),
					'required' => array('toolbar_address_show', 'equals', 1)
				),
				array (
					'id' => 'toolbar_address_link',
					'type' => 'select',
					'title' => __("Address Link", 'automotive'),
					'data' => 'pages',
					'required' => array('toolbar_address_show', 'equals', 1)
				),
				array (
					'type'  => 'section',
					'id' => 'section-end',
 				    'indent' => false
				),
				
				
				array (
					'desc' => __('Show or hide the top header area.', 'automotive'),
					'id' => 'header_top',
					'type' => 'switch',
					'title' => __('Top header display', 'automotive'),
					'default' => true,
					'on' => 'Show',
					'off' => 'Hide'
				),
				array (
					'desc' => __('If on the header will resize after scrolling, or else it will stay the same size.', 'automotive'),
					'id' => 'header_resize',
					'type' => 'switch',
					'title' => __('Header Resize', 'automotive'),
					'default' => 1,
				),
				array (
					'desc' => __('If this is enabled it will display a cart icon beside the Login label', 'automotive'),
					'id' => 'woocommerce_cart',
					'type' => 'switch',
					'title' => __('WooCommerce Cart', 'automotive') . " " . sprintf( __('(WooCommerce is <span style=\'%s\'>%s</span>)', 'automotive'),  'color: ' . (function_exists("is_woocommerce") ? "green" : "red") . '; display: inline-block;', (function_exists("is_woocommerce") ? 'Active' : 'Not Active')),
					'default' => 1,
				),
				array (
					'desc' => __('Display a dropdown of available languages in the header. Only works with WPML', 'automotive'),
					'id' => 'languages_dropdown',
					'type' => 'switch',
					'title' => sprintf( __('Languages (WPML is <span style=\'%s\'>%s</span>)', 'automotive'),  'color: ' . (function_exists("icl_get_home_url") ? "green" : "red") . '; display: inline-block;', (function_exists("icl_get_home_url") ? 'Active' : 'Not Active')),
					'default' => 1,
				),
			),
			'icon' => 'fa fa-header',
		),
		array(
			'title' => __('Footer Settings', 'automotive'),
			'fields' => array(
				array(
					'desc' => __('You can create different footer widget areas for different pages.', 'automotive'),
					'id' => 'footer_widget_spots',
					'type' => 'multi_text',
					'add_text' => __('Add another footer', 'automotive'),
					'title' => __('Multiple Footer areas', 'automotive'),
				),
				array (
					'desc' => __('You can use the following shortcodes in your footer text', 'automotive') . ': {wp-link} {theme-link} {loginout-link} {blog-title} {blog-link} {the-year}',
					'id' => 'footer_text',
					'type' => 'editor',
					'title' => __('Footer Text', 'automotive'),
					'default' => 'Powered by {wp-link}. Built with {theme-link}.',
				),
				/*array(
					'id' => 'footer_columns',
					'type' => 'radio',
					'title' => __('Footer Columns', 'automotive'),
					'options' => array(
						'1' => '1 ' . __('Column', 'automotive'),
						'2' => '2 ' . __('Columns', 'automotive'),
						'3' => '3 ' . __('Columns', 'automotive'),
						'4' => '4 ' . __('Columns', 'automotive')
					),
					'default' => '3'
				)*/
			),
			'icon' => 'fa fa-list-alt'
		),
		array (
			'title' => __('Social Settings', 'automotive'),
			'fields' => array (
				array (
					'id' => 'social_network_links',
					'type' => 'sorter',
					'title' => __('Footer Social Icons', 'automotive'),
					'desc'    => __('Choose which social networks are displayed and edit where they link to.', 'automotive'),
					'options' => array(
						'enabled'  => $social_options,
						'disabled' => array(
						)
					)
				),
			),
			'icon' => 'fa fa-share-alt',
		),
		array (
			'title' => __('Contact Settings', 'automotive'),
			'fields' => array (
				array (
					'desc' => __('This email will be used to forward the contact form mail to it.', 'automotive'),
					'id' => 'contact_email',
					'type' => 'text',
					'title' => __('Contact Email', 'automotive'),
					'default' => get_option('admin_email'),
					'validate' => 'email'
				)/*,
				array (
					'desc' => __('Create a form using <a href=\'http://dev.themesuite.com/brand/wp-admin/plugin-install.php?tab=plugin-information&plugin=contact-form-7&TB_iframe=true&width=640&height=855\' class=\'thickbox\'>Contact Form 7</a> and paste the shortcode here to replace the default form.', 'automotive'),
					'id' => 'contact_form_shortcode',
					'type' => 'text',
					'title' => __('Contact Form', 'automotive'),
				),
				/*array (
					'desc' => __('The title found above the google map', 'automotive'),
					'id' => 'contact_map_title',
					'type' => 'text',
					'title' => __('Map title', 'automotive'),
					'default' => __('FIND US ON THE MAP', 'automotive')
				),
				array (
					'desc' => __('The title found above the contact form', 'automotive'),
					'id' => 'contact_form_title',
					'type' => 'text',
					'title' => __('Contact Form Title', 'automotive'),
					'default' => __('CONTACT FORM', 'automotive')
				),
				array (
					'title' => __('Google Map', 'automotive'),
					'type'  => 'section',
					'id' => 'section-start',
 				    'indent' => true,
 				    'subtitle' => __('Simply enter in the Google Map Coordinates and zoom level to adjust the map on the contact page template.', 'automotive')
				),
				array (
					'title' => __('Latitude', 'automotive'),
					'id'   => 'contact_map_latitude',
					'type' => 'text'
				),
				array (
					'title' => __('Longitude', 'automotive'),
					'id'   => 'contact_map_longitude',
					'type' => 'text'
				),
				array ( 
					'id' => 'contact_map_zoom',
					'type' => 'slider',
					'title' => __('Zoom', 'automotive'),
					'default' => 10,
					'min' => 1,
					'max' => 19,
					'display_value' => 'label'
				),
				array (
					'type'  => 'section',
					'id' => 'section-end',
 				    'indent' => false
				)*/
			),
			'icon' => 'fa fa-envelope',
		),
		array (
			'title' => __('Custom Styling', 'automotive'),
			'fields' => array (
				array (
					'desc' => __('Pick a primary color for the theme (default: #c7081b).', 'automotive'),
					'id' => 'primary_color',
					'type' => 'color',
					'title' => __('Primary Color', 'automotive'),
					'default' => '#c7081b',
				),
				array(
					'id' => 'css_link_color',
					'type' => 'link_color',
					'title' => __('Link Color', 'automotive'),
					'default' => array(
						'regular' => '#c7081b',
						'hover'   => '#c7081b',
						'active'  => '#c7081b',
						'visited' => '#c7081b'
					)
				),
				array(
					'id' => 'css_footer_link_color',
					'type' => 'link_color',
					'title' => __('Footer Link Color', 'automotive'),
					'default' => array(
						'regular' => '#BEBEBE',
						'hover'   => '#999',
						'active'  => '#999',
						'visited' => '#BEBEBE'
					)
				),
				array (
					'id' => 'body_font',
					'type' => 'typography',
					'desc' => __('Set the body font using googles web font service.', 'automotive'),
					'title' => __('Body Font', 'automotive'),
					'fonts' => array (),
					'default' => array(
						'font-family' => 'Open Sans',
						'font-weight' => '400',
						'font-size'   => '14px',
						'line-height' => '24px',
						'color'		  => '#2D2D2D'
					),
					'all_styles' => true,
					'subsets' => false,
					'text-align' => false
				),
				array (
					'id' => 'logo_top_font',
					'type' => 'typography',
					'desc' => __('Set the top logo font using googles web font service.', 'automotive'),
					'title' => __('Top Logo Font', 'automotive'),
					'default' => array (
						'font-family' => 'Yellowtail',
						'font-weight' => '400',
						'font-size'   => '40px',
						'line-height' => '20',
						'color'		  => '#FFF'
					),
					'subsets' => false
				),
				array (
					'id' => 'logo_bottom_font',
					'type' => 'typography',
					'desc' => __('Set the bottom logo font using googles web font service.', 'automotive'),
					'title' => __('Bottom Logo Font', 'automotive'),
					'default' => array (
						'font-family' => 'Open Sans',
						'font-weight' => '400',
						'font-size'   => '12px',
						'line-height' => '20',
						'color'		  => '#FFF'
					),
					'subsets' => false
				),
				array (
					'desc' => __('Quickly add some custom CSS to your theme.', 'automotive'),
					'id' => 'custom_css',
					'type' => 'ace_editor',
					'title' => __('Custom CSS', 'automotive'),
					'mode' => 'css',
					'theme' => 'chrome'
				),
				array (
					'desc' => __('Quickly add some custom JS to your theme.', 'automotive'),
					'id' => 'custom_js',
					'type' => 'ace_editor',
					'title' => __('Custom JS', 'automotive'),
					'mode' => 'javascript',
					'theme' => 'chrome'
				),
			),
			'icon' => 'fa fa-pencil-square-o',
		),
		array ( 
			'title' => __('Page Settings', 'automotive'),
			'fields' => array (
				array (
					'title' => __('Blog Post', 'automotive'),
					'type'  => 'section',
					'id' => 'section-start',
 				    'indent' => true
				),
				array (
					'id' => 'blog_primary_title',
					'type' => 'text',
					'desc' => __('This title shows up in the header section on all blog postings and the blog page.', 'automotive'),
					'title' => __('Blog Listing Titles', 'automotive'),
				),
				array (
					'id' => 'blog_secondary_title',
					'type' => 'text',
					'desc' => __('This secondary title displays under the previous title in the header on blog pages.', 'automotive'),
				),
				array (
					'type'  => 'section',
					'id' => 'section-end',
 				    'indent' => false
				),

				array (
					'title' => __('404 Page', 'automotive'),
					'type'  => 'section',
					'id' => 'section-start',
 				    'indent' => true
				),
				array (
					'id' => 'fourohfour_page_image',
					'type' => 'media',
					'title' => __("Header Image", 'automotive')
				),
				array (
					'id' => 'fourohfour_page_title',
					'type' => 'text',
					'title' => __("Main Title", 'automotive'),
					'default' => __('Error 404: File not found.', 'automotive')
				),
				array (
					'id' => 'fourohfour_page_secondary_title',
					'type' => 'text',
					'title' => __("Secondary Title", 'automotive'),
					'default' => __('That being said, we will give you an amazing deal for the trouble.', 'automotive')
				),
				array (
					'id' => 'fourohfour_page_breadcrumb',
					'type' => 'text',
					'title' => __("Breadcrumb", 'automotive'),
					'default' => '404'
				),
				array (
					'type'  => 'section',
					'id' => 'section-end',
 				    'indent' => false
				),
				
				array (
					'title' => __('Search Page', 'automotive'),
					'type'  => 'section',
					'id' => 'section-start',
 				    'indent' => true
				),
				array (
					'id' => 'search_page_image',
					'type' => 'media',
					'title' => __("Header Image", 'automotive')
				),
				array (
					'id' => 'search_page_title',
					'type' => 'text',
					'title' => __("Main Title", 'automotive'),
					'desc' => __('You are able to use {query} in place the of search term', 'automotive'),
					'default' => __('Search', 'automotive')
				),
				array (
					'id' => 'search_page_secondary_title',
					'type' => 'text',
					'title' => __("Secondary Title", 'automotive'),
					'desc' => __('You are able to use {query} in place the of search term', 'automotive'),
					'default' => 'Search results for: {query}'
				),
				array (
					'id' => 'search_page_breadcrumb',
					'type' => 'text',
					'title' => __("Breadcrumb", 'automotive'),
					'desc' => __('You are able to use {query} in place the of search term', 'automotive'),
					'default' => 'Search results: {query}'
				),
				array (
					'type'  => 'section',
					'id' => 'section-end',
 				    'indent' => false
				),
				
				
				array (
					'title' => __('Category Page', 'automotive'),
					'type'  => 'section',
					'id' => 'section-start',
 				    'indent' => true
				),
				array (
					'id' => 'category_page_image',
					'type' => 'media',
					'title' => __("Header Image", 'automotive')
				),
				array (
					'id' => 'category_page_title',
					'type' => 'text',
					'title' => __("Main Title", 'automotive'),
					'desc' => __('You are able to use {query} in place the of category term', 'automotive'),
					'default' => 'Category: {query}'
				),
				array (
					'id' => 'category_page_secondary_title',
					'type' => 'text',
					'title' => __("Secondary Title", 'automotive'),
					'desc' => __('You are able to use {query} in place the of category term', 'automotive'),
					'default' => 'Posts related to {query}'
				),
				array (
					'id' => 'category_page_breadcrumb',
					'type' => 'text',
					'title' => __("Breadcrumb", 'automotive'),
					'desc' => __('You are able to use {query} in place the of category term', 'automotive'),
					'default' => 'Category: {query}'
				),
				array (
					'type'  => 'section',
					'id' => 'section-end',
 				    'indent' => false
				),
				
				
				array (
					'title' => __('Tag Page', 'automotive'),
					'type'  => 'section',
					'id' => 'section-start',
 				    'indent' => true
				),
				array (
					'id' => 'tag_page_image',
					'type' => 'media',
					'title' => __("Header Image", 'automotive')
				),
				array (
					'id' => 'tag_page_title',
					'type' => 'text',
					'title' => __("Main Title", 'automotive'),
					'desc' => __('You are able to use {query} in place the of tag term', 'automotive'),
					'default' => 'Tag: {query}'
				),
				array (
					'id' => 'tag_page_secondary_title',
					'type' => 'text',
					'title' => __("Secondary Title", 'automotive'),
					'desc' => __('You are able to use {query} in place the of tag term', 'automotive'),
					'default' => 'Posts related to {query}'
				),
				array (
					'id' => 'tag_page_breadcrumb',
					'type' => 'text',
					'title' => __("Breadcrumb", 'automotive'),
					'desc' => 'You are able to use {query} in place the of tag term',
					'default' => 'Tag: {query}'
				),
				array (
					'type'  => 'section',
					'id' => 'section-end',
 				    'indent' => false
				),
			),
			'icon' => 'fa fa-file-text-o'
		),
		array (
			'title' => __('Update Settings', 'automotive'),
			'fields' => array (
				array (
					'id' => 'themeforest_name',
					'type' => 'text',
					'desc' => __('Enter in your themeforest username in order to download theme updates directly on your website.', 'automotive'),
					'title' => __('ThemeForest Automatic Updates', 'automotive'),
				),
				array (
					'id' => 'themeforest_api',
					'type' => 'text',
					'desc' => __('Themeforest API key', 'automotive')// . '<br><br><span class=\'button verify-themeforest\'>' . __('Verify ThemeForest Details', 'automotive') . '</span>',
				),
			),
		),
		array(
			'title' => __("Import / Export", "listings"),
			'class' => 'custom_import',
			'fields'    => array(
			    array(
			        'id'            => 'opt-import-export',
			        'type'          => 'import_export',
			        'title'         => __('Import Export', 'listings'),
			        'subtitle'      => __('Save and restore your Redux options', 'listings'),
			        'full_width'    => true,
			    ),
			),
			'icon' => 'el-icon-refresh'
		)
	);		
	
			if(is_writable(get_stylesheet_directory() . "/style.css")){
				$sections[5]['fields'][] = array(
				    'id'       => 'disable_embed',
				    'type'     => 'switch', 
				    'title'    => __('Disable embedded CSS', 'automotive'),
				    'subtitle' => __('This is only visible if your server can write files', 'automotive'),
				    'default'  => true,
				);
			}
			
			// add social network urls
			foreach($social_options as $label){
				$sections[3]['fields'][] = array (
					'id'    => strtolower($label) . '_url',
					'type'  => 'text',
					'title' => ucwords($label) . ' URL',
				);
			}

			// Change your opt_name to match where you want the data saved.
			$args = array(
				"opt_name"=>"automotive_wp", // Where your data is stored. Use a different name or use the same name as your current theme. Must match the $database_newName variable in the converter code.
				"menu_title" => __("Theme Options", 'automotive'), // Title for your menu item
				"page_slug" => "automotive_wp", // Make this the same as your opt_name unless you care otherwise
				//"global_variable" => "", // By default Redux sets your global variable to be the opt_name you set above. This is what the newest SMOF uses as it's variable name. You can change, but you may need to update your files.
				//"intro_text" => "<p>This theme is now using Redux</p>" // Extra header info
				//"google_api_key" => "", // You must acquire a Google Web Fonts API key if you want Google Fonts to work
			);
			// Use this section if this is for a theme. Replace with plugin specific data if it is for a plugin.
			$theme = wp_get_theme();
			$args["display_name"] = $theme->get("Name");
			$args["display_version"] = $theme->get("Version");

			$ReduxFramework = new ReduxFramework($sections, $args);
						
		}

		function migrate_old_data($oldname, $oldtheme=false) {
			$database_newName = "automotive_wp"; // Where your data will now be saved. Must match your opt_name in the ReduxFramework $args array.
			$this->convertDataClass = new SMOF2Redux_Data();
			$this->convertDataClass->init();
			update_option($database_newName, $this->convertDataClass->converted_data); // Update the database				
		}
				
	}
	new Redux_Framework_automotive_wp_c15fe4af2a5399d84d32be2();
}




if( !class_exists( 'SMOF2Redux_Data' ) ) {
	class SMOF2Redux_Data {

		protected $converter;
		public $version;
		public $database;
		public $data;
		public $converted_data;
		public $sections = array();
		public $framework = "SMOF";

		public function __construct() {

			//add_action('init', array( $this, 'init' ), 0 );

		}

		public function init() {
			// Find the version
			if (defined('SMOF_VERSION')) {
				$this->version = SMOF_VERSION;
			} else {
				$this->version = '1.3';
			}
			
			echo "<!-- " . $this->version . " -->";
			
			// Get the saved data
			if ( $this->version <= "1.5" ) {
				// Get the old data values
				global $data;
				$this->data = $data;

				if ( defined( 'OPTIONS' ) ) {
					$this->database = OPTIONS;	
				}
			} else {
				global $smof_data;
				$this->data = $smof_data;
			}			

			$this->getSections();
			
			if (!empty($this->sections)) {
				foreach($this->sections as $section) {
					if (isset($section['fields']) && !empty($section['fields'])) {
						foreach($section['fields'] as $field) {
							if (isset($this->data[$field['id']])) {
								$this->converted_data[$field['id']] = $this->convertValue($this->data[$field['id']], $field['type']);
							}
						}
					}
				}
			}

		}

		public function getSections($withWarnings = true) {
			global $of_options;

			$sections = array();
			$section = array();
			$fields = array();	
			
			if(!empty($of_options)){
				foreach($of_options as $key=>$value) {
					foreach ($value as $k=>$v) {
						if (empty($v)) {
							unset($value[$k]);
						}
					}
					
				    if (isset($value['name'])) {
				        $value['title'] = $value['name'];
				        unset($value['name']); 
				    }

				    if (isset($value['std'])) {
				        $value['default'] = $value['std'];
				        unset($value['std']);
				    }

				    if (isset($value['fold'])) {
				    	$value['required'] = array($value['fold'], '=' , 1);
				    	unset($value['fold']);
				    }
				    if (isset($value['folds'])) {
				    	unset($value['folds']);
				    }	    
				    if (!isset($value['type'])) {
				    	continue;
				    }
				    switch ($value['type']) {
				    	case 'heading':
							if (isset($value['icon']) && !empty($value['icon']) ) {
								//$value['icon_type'] = "image";
							}
				    		if (isset($fields) && !empty($fields)) {
				    			$section['fields'] = $fields;
				    			$fields = array();
				    		}
				    		if (!empty($section)) {
				    			$section['icon'] = "el-icon-cog";
				    			$sections[] = $section;
				    			$section = array();
				    		} 
				    		unset($value['type']);
				    		$section = $value;
				    		unset($value);
				    		break;
						case "text":
							if(isset($value['mod'])) {
			    				unset($value['mod']);
			    			}
				    		break;
				    	case "select":
			    			if(isset($value['mod'])) {
			    				unset($value['mod']);
			    			}
				    		break;
				    	case "textarea":
				    		if(isset($value['cols'])) {
			    				unset($value['cols']);
			    			}
				    		break;
				    	case "radio":
				    		break;
				    	case "checkbox":
				    		break;
				    	case "multicheck":
				    		$value['type'] = "checkbox";
				    		break;
				    	case "color":
				    		break;
						case "select_google_font":	
							if (isset($value['preview'])) {
				    			unset($value['preview']);
				    		}
				    		if (isset($value['options'])) {
				    			$value['fonts'] = $value['options'];

				    			unset($value['options']);
				    		}
				    		if (isset($value['default'])) {
				    			unset($value['default']);
				    		}
				    		$value['type'] = "typography";
							break;
				    	case "typography":
				    		if (isset($value['preview'])) {
				    			unset($value['preview']);
				    		}
				    		if (isset($value['options'])) {
				    			$value['fonts'] = $value['options'];
				    			unset($value['options']);
				    		}
				    		break;
				    	case "border":    			    		
				    		break;
				    	case "info":
				    		if (isset($value['title'])) {
				    			unset($value['title']);
				    		}
				    		if (isset($value['default'])) {
				    			$value['raw'] = $value['default'];
				    			unset($value['default']);
				    		}
				    		break;
				    	case "switch":
				    		break;
				    	case "images":
				    		$value['type'] = "image_select";
				    		if (strpos(strtolower($value['title']),'pattern') !== false) {
				    			$value['tiles'] = true;
				    		}
				    		break;
				    	case "image":
				    		$value['type'] = "info";
				    		$value['raw_html'] = true;
				    		break;
				    	case "slider":
				    		$value['type'] = "slides";
				    		break;
				    	case "sorter":
				    		if (isset($value['default'])) {
				    			$value['options'] = $value['default'];
				    			unset($value['default']);
				    		}
				    		break;
				    	case "tiles":
				    		$value['type'] = "image_select";
				    		$value['tiles'] = true;
				    		break;
				    	case "backup":
				    	case "transfer":
				    		unset($value);
				    		if ($of_options[($key-1)]['type'] == "heading") {
				    			if (strpos(strtolower($of_options[($key-1)]['name']),'backup') !== false) {
				    				$section = array();	
				    			}
				    		}
				    		break;
				    	case "sliderui":
				    		$value['type'] = "slider";
				    		break;	    			    			    			    			    		
				    	case "upload":
						case "media":
				    		$value['type'] = "media";
				    		if (isset($value['mod']) && $value['mod'] == "min") {
				    			unset($value['mod']);
				    		} else {
				    			$value['url'] = true;
				    		}
				    		break;

				    	default:
				    		if ($withWarnings) {
								$content = "<h3 style='color: red;'>Found a field with an unknown type!</h3> <p>Perhaps this was a custom field and will need to be remade for use within Redux. This was the field's configuration:</p>";
					    		$content .= "<pre style='overflow:auto;border: 2px dashed #eee;padding: 2px 5px; width: 100%;'>";
					    		ob_start();
								var_dump($value);
								$content .= ob_get_clean();
					    		$content .= "</pre>";
					    		$value['desc'] = $content;
					    		$value['type'] = "info";
					    		$value['raw_html'] = true;			    			
				    		}
				    		
						//unset($value); // Can't do custom types. Must be fixed manually.
				    		# code...
				    		break;
				    }
					if (isset($value['default']) && !empty($value['default'])) {
						$value['default'] = $this->convertValue($value['default'], $value['type']);
					}

				    if (!empty($value)) {
				    	$fields[] = $value;	
				    }
				    
				}
			}
			if (!empty($fields)) {
				$section['fields'] = $fields;
				$fields = array();
			}
			if (!empty($section)) {

				$sections[] = $section;
				$section = array();
			}		
			$this->sections = $sections;

		}

		function get_attachment_id_by_url( $url ) {
			// Split the $url into two parts with the wp-content directory as the separator.
			$parse_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );
		 	
			// Get the host of the current site and the host of the $url, ignoring www.
			$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
			$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );
		 
			// Return nothing if there aren't any $url parts or if the current host and $url host do not match.
			if ( ! isset( $parse_url[1] ) || empty( $parse_url[1] ) || ( $this_host != $file_host ) )
				return;
		 
			// Now we're going to quickly search the DB for any attachment GUID with a partial path match.
			// Example: /uploads/2013/05/test-image.jpg
			global $wpdb;
		 
			$prefix     = $wpdb->prefix;
			$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM " . $prefix . "posts WHERE guid RLIKE %s;", $parse_url[1] ) );
		 
			// Returns null if no attachment is found.
			return $attachment[0];
		}		

		function convertValue($value, $type) {
		    switch ($type) {
				case "text":
					if (!is_array($value)) {
						$value = stripcslashes($value); // Not sure why this happens. Huh.
					}
		    		break;
		    	case "typography":
					$default = array();
					if (isset($value['size'])) {
						$default['font-size'] = $value['size'];
						$px = filter_var($default['font-size'], FILTER_SANITIZE_NUMBER_INT);
						$default['units'] = str_replace($px, "", $default['font-size']);
					}
					if (isset($value['color'])) {
						$default['color'] = $value['color'];
					}
					if (isset($value['face'])) {
						$fonts = array(
							"Arial, Helvetica, sans-serif",
							"'Arial Black', Gadget, sans-serif",
							"'Bookman Old Style', serif",
							"'Comic Sans MS', cursive",
							"Courier, monospace",
							"Garamond, serif",
							"Georgia, serif",
							"Impact, Charcoal, sans-serif",
							"'Lucida Console', Monaco, monospace",
							"'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
							"'MS Sans Serif', Geneva, sans-serif",
							"'MS Serif', 'New York', sans-serif",
							"'Palatino Linotype', 'Book Antiqua', Palatino, serif",
							"Tahoma, Geneva, sans-serif",
							"'Times New Roman', Times, serif",
							"'Trebuchet MS', Helvetica, sans-serif",
							"Verdana, Geneva, sans-serif",
		                );
		                foreach($fonts as $font) {
		                	if (strpos(strtolower($font),strtolower($value['face'])) !== false) {
								$default['font-family'] = $font;
							}
		                }
					}
					if (isset($value['style'])) {
						if (strpos(strtolower($value['style']),'bold') !== false) {
							$default['font-weight'] = "bold";
						}
						if (strpos(strtolower($value['style']),'italic') !== false) {
							$default['font-style'] = "italic";
						}
					} 			
					$value = $default;
		    		break;
		    	case "border":
		    		if (isset($value['width'])) {
		    			$value['border-width'] = $value['width']."px";
		    			$value['units'] = "px";
		    			unset($value['width']);
		    		}
					if (isset($value['color'])) {
		    			$value['border-color'] = $value['color'];
		    			unset($value['color']);
		    		}
					if (isset($value['style'])) {
		    			$value['border-style'] = $value['style'];
		    			unset($value['style']);
		    		}
		    		break;			    			    			    			    		
		    	case "upload":
		    	case "image":
				case "media":
					if ( isset( $value ) && !empty( $value ) ) {
						$value = array('url'=>$value);	
					}
		    		break;    	
		    	default:
		    		break;
		    }
			return $value;			
		}	
	}

}

/*
1.5
	SMOF_VERSION
	define( 'OPTIONS', $theme_name.'_options' );
	$data = of_get_options();
	$smof_data = of_get_options();


1.4.3
	define( 'OPTIONS', $theme_name.'_options' );

        if( is_child_theme() ) {
                $temp_obj = wp_get_theme();
                $theme_obj = wp_get_theme( $temp_obj->get('Template') );
        } else {
                $theme_obj = wp_get_theme();    
        }

        define( 'OPTIONS', $theme_name.'_options' );

        SMOF_VERSION -> Version

1.4
	SMOF_VERSION -> Version
	DEFINE: OPTIONS
	$data => values
	$data = get_option(OPTIONS);	

1.3
	DEFINE: OPTIONS
	$of_options => Options
	$data => values
	$data = get_option(OPTIONS);

v1.2


v1.1 13/11/11
	DEFINE: OPTIONS
	$of_options => Options
	$data => values
	$data = get_option(OPTIONS);
 */
