<?php global $awp_options, $post; 
$header_image = get_post_meta(get_current_id(), "header_image", true); 
$header_image = (!empty($header_image) ? wp_get_attachment_image_src($header_image, "full") : "");
$header_image = (!empty($header_image) ? $header_image[0] : "");  

$no_header    = get_post_meta(get_current_id(), "no_header", true); ?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js"><head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php if(is_home()) { echo bloginfo("name"); echo " | "; echo bloginfo("description"); } else { echo wp_title(" | ", false, 'right'); echo bloginfo("name"); } ?></title>
		
        <?php if(!empty($awp_options['favicon']['url'])){ ?>
        <link href="<?php echo $awp_options['favicon']['url']; ?>" rel="shortcut icon">
		<?php } ?>
    	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
        <?php automotive_google_analytics_code("head"); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php
		if(isset($awp_options['body_layout']) && !empty($awp_options['body_layout']) && $awp_options['body_layout'] != 1){
			echo "<div class='boxed_layout" . ($awp_options['body_layout'] == 3 ? " margin" : "") . "'>";
		} ?>

		<!--Header Start-->
        <header<?php echo (isset($awp_options['header_resize']) && $awp_options['header_resize'] == 1 ? ' data-spy="affix" data-offset-top="1" class="clearfix"' : ' class="no_resize"'); ?>>
            <?php if(isset($awp_options['header_top']) && $awp_options['header_top'] == 1){ ?>
            <section class="toolbar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 left_bar">
                            <ul class="left-none">
                                <?php if(isset($awp_options['toolbar_login_show']) && $awp_options['toolbar_login_show'] == 1){ ?>
                                <li><a href="#" data-toggle="modal" data-target="#login_modal"><i class="fa fa-user"></i> <?php echo (isset($awp_options['toolbar_login']) && !empty($awp_options['toolbar_login']) ? $awp_options['toolbar_login'] : __("Login", "automotive")) ?></a></li>
                                <?php } ?>

                                <?php if(isset($awp_options['woocommerce_cart']) && $awp_options['woocommerce_cart'] == 1){ ?>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i> <?php _e("Cart", "automotive"); ?></a>
                                	<?php woocommerce_shopping_cart(); ?>
                                </li>
                                <?php } ?>

                                <?php if(isset($awp_options['toolbar_language_show']) && $awp_options['toolbar_language_show'] == 1){ ?>
                                <li><a href="#"><i class="fa fa-globe"></i> <?php echo (isset($awp_options['toolbar_languages']) && !empty($awp_options['toolbar_languages']) ? $awp_options['toolbar_languages'] : __("Languages", "automotive")) ?></a>
									<?php languages_dropdown_menu(); ?>
                                </li>
                                <?php } ?>

                                <?php if(isset($awp_options['toolbar_search_show']) && $awp_options['toolbar_search_show'] == 1){ ?>
                                <li> 
                                    <form role="search" method="GET" action="<?php echo home_url('/'); ?>" id="searchform">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                        <input type="search" placeholder="<?php echo (isset($awp_options['toolbar_search']) && !empty($awp_options['toolbar_search']) ? $awp_options['toolbar_search'] : __("Search", "automotive")) ?>" class="search_box" name="s" value="<?php echo get_search_query(); ?>"> 
                                    </form>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-lg-6 "> 
                            <ul class="right-none pull-right company_info">
                                <?php if(isset($awp_options['toolbar_phone_show']) && $awp_options['toolbar_phone_show'] == 1){ ?>
                                <li><a href="tel:<?php echo (isset($awp_options['toolbar_phone']) && !empty($awp_options['toolbar_phone']) ? $awp_options['toolbar_phone'] : "1-800-567-0123") ?>"><i class="fa fa-phone"></i> <?php echo (isset($awp_options['toolbar_phone']) && !empty($awp_options['toolbar_phone']) ? $awp_options['toolbar_phone'] : "1-800-567-0123") ?></a></li>
                                <?php } ?>

                                <?php if(isset($awp_options['toolbar_address_show']) && $awp_options['toolbar_address_show'] == 1){ ?>
                                <li class="address"><a href="<?php echo (isset($awp_options['toolbar_address_link']) && !empty($awp_options['toolbar_address_link']) ? get_permalink($awp_options['toolbar_address_link']) : "#"); ?>"><i class="fa fa-map-marker"></i> <?php echo (isset($awp_options['toolbar_address']) && !empty($awp_options['toolbar_address']) ? $awp_options['toolbar_address'] : "107 Sunset Blvd., Beverly Hills, CA  90210") ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="toolbar_shadow"></div>
            </section>
            <?php } ?>
            
            <div class="bottom-header" >
                <div class="container">
                    <nav class="navbar navbar-default" role="navigation">
                        <div class="container-fluid"> 
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                <a class="navbar-brand" href="<?php echo home_url(); ?>">
                                	<span class="logo">
                                		<?php if(isset($awp_options['logo_image']['url']) && !empty($awp_options['logo_image']['url'])){ ?>
                                		<img src='<?php echo $awp_options['logo_image']['url']; ?>' alt='logo'>
                                		<?php } else { ?>
                                		<span class="primary_text"><?php echo (isset($awp_options['logo_text']) && !empty($awp_options['logo_text']) ? $awp_options['logo_text'] : ""); ?></span> 
                                		<span class="secondary_text"><?php echo (isset($awp_options['logo_text_secondary']) && !empty($awp_options['logo_text_secondary']) ? $awp_options['logo_text_secondary'] : ""); ?></span>
                                		<?php } ?>
                                	</span>
                                </a> 
                            </div>
                            
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">       
								<?php 
                                // bootstrap 3 menu
								if( has_nav_menu( "header-menu" )) {                                                               
                                    wp_nav_menu( 
                                        array('theme_location' => 'header-menu',        
                                              'fallback_cb'    => 'wp_bootstrap_navwalker::fallback',
                                              'walker'         => new wp_bootstrap_navwalker(),
                                              'menu_class'     => 'nav navbar-nav pull-right fullsize_menu'
                                             )  
                                    );     

                                    // mobile menu                                                          
                                    wp_nav_menu( 
                                        array('theme_location' => 'header-menu',        
                                              'fallback_cb'    => 'wp_bootstrap_navwalker_mobile::fallback',
                                              'walker'         => new wp_bootstrap_navwalker_mobile(),
                                              'menu_class'     => 'nav navbar-nav pull-right mobile_dropdown_menu'
                                             )  
                                    );
								} else {
									echo "<ul class=\"nav navbar-nav pull-right\"><li class=\"active\"><a href=\"index.html\">" . __("Home", "automotive") . "</a></li></ul>";
								}  ?>
                            </div>
                            <!-- /.navbar-collapse --> 
                        </div>
                        <!-- /.container-fluid --> 
                    </nav>
                </div>
                
                <div class="header_shadow"></div>
            </div>
        </header>
        <!--Header End-->

        <div class="clearfix"></div>
        
        <?php 
		// if slideshow on homepage
		$action 		= (is_404() || (function_exists("is_shop") && is_shop() || is_search()) ? "" : get_post_meta($post->ID, "action_toggle", true));
		$page_slideshow = (is_404() || (function_exists("is_shop") && is_shop() || is_search()) ? "" : get_post_meta($post->ID, "page_slideshow", true));

		if(isset($page_slideshow) && !empty($page_slideshow) && $page_slideshow != "none" && function_exists("putRevSlider")){
			putRevSlider($page_slideshow);
		} else { 
		
			// if is search page
			if(is_search()){
				$header_image = (isset($awp_options['search_page_image']) && !empty($awp_options['search_page_image']) ? $awp_options['search_page_image']['url'] : "");
			} elseif(is_category()){
				$header_image = (isset($awp_options['category_page_image']) && !empty($awp_options['category_page_image']) ? $awp_options['category_page_image']['url'] : "");				
			} elseif(is_tag()){
				$header_image = (isset($awp_options['tag_page_image']) && !empty($awp_options['tag_page_image']) ? $awp_options['tag_page_image']['url'] : "");				
			} elseif(is_404()){
				$header_image = (isset($awp_options['fourohfour_page_image']) && !empty($awp_options['fourohfour_page_image']) ? $awp_options['fourohfour_page_image']['url'] : "");	
			}
			
			// if no header image grab the default
			if(empty($header_image) && isset($awp_options['default_header_image']) && !empty($awp_options['default_header_image'])){
				$header_image = $awp_options['default_header_image']['url'];
			}
			
            // no header
            if(isset($no_header) && $no_header != "no_header"){ ?>

        <section id="secondary-banner" class="<?php echo ($action == "on" ? "action_on" : ""); ?>"<?php echo (isset($header_image) && !empty($header_image) ? " style='background-image: url(" . $header_image . ");'" : ""); ?>>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    	<?php 
						if(is_search() || is_tag() || is_category() || is_404()){
							// determine handle
							if(is_search()){
								$handle = "search";
							} elseif(is_tag()){
								$handle = "tag";
							} elseif(is_category()){
								$handle = "category";
							} elseif(is_404()){
								$handle = "fourohfour";
							}
							
							$title      = (isset($awp_options[$handle . '_page_title']) && !empty($awp_options[$handle . '_page_title']) ? $awp_options[$handle . '_page_title'] : "");
							$desc       = (isset($awp_options[$handle . '_page_secondary_title']) && !empty($awp_options[$handle . '_page_secondary_title']) ? $awp_options[$handle . '_page_secondary_title'] : "");
							$breadcrumb = (isset($awp_options[$handle . '_page_breadcrumb']) && !empty($awp_options[$handle . '_page_breadcrumb']) ? $awp_options[$handle . '_page_breadcrumb'] : "");
							
							// determine if variable
							$query = "{query}";
							if(is_search()){
								$title      = (strstr($title, $query) ? str_replace($query, get_search_query(), $title) : $title);
								$desc       = (strstr($desc, $query) ? str_replace($query, get_search_query(), $desc) : $desc);
								$breadcrumb = (strstr($breadcrumb, $query) ? str_replace($query, get_search_query(), $breadcrumb) : $breadcrumb);
							} elseif(is_tag()){
								$tag        = single_tag_title("", false);
								$title      = (strstr($title, $query) ? str_replace($query, $tag, $title) : $title);
								$desc       = (strstr($desc, $query) ? str_replace($query, $tag, $desc) : $desc);
								$breadcrumb = (strstr($breadcrumb, $query) ? str_replace($query, $tag, $breadcrumb) : $breadcrumb);
							} elseif(is_category()){
								$categories = get_the_category();
								$title      = (strstr($title, $query) ? str_replace($query, $categories[0]->name, $title) : $title);
								$desc       = (strstr($desc, $query) ? str_replace($query, $categories[0]->name, $desc) : $desc);
								$breadcrumb = (strstr($breadcrumb, $query) ? str_replace($query, $categories[0]->name, $breadcrumb) : $breadcrumb);
							}
						} else {						
							$titles = get_page_title_and_desc();						
							$title  = $titles[0];
							$desc   = $titles[1]; 
						}
						?>
                        <h2><?php echo $title; ?></h2>
                        <h4><?php echo $desc; ?></h4>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                        <?php echo the_breadcrumb((isset($breadcrumb) && !empty($breadcrumb) ? $breadcrumb : "")); ?>
                    </div>
                </div>
            </div>
        </section>
        <!--#secondary-banner ends-->
            <?php } ?>
        
        <?php } 
		
		if(isset($action) && $action != "on"){
			echo '<div class="message-shadow"></div>';
		}
		
		action_area($action);
		
		?>
        
        <section class="content<?php echo (isset($no_header) && $no_header == "no_header" && isset($page_slideshow) && !empty($page_slideshow) && $page_slideshow != "none" ? " push_down" : ""); ?>">
        	
			<div class="container">