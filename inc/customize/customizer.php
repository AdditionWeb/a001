<?php

// Remove Parent Theme's Customizer
function a001_remove_parent_customizer() {
  remove_action('customize_register', 'ample_customize_register');
}
add_action( 'customize_register', 'a001_remove_parent_customizer', 9 );

function a001_modify_customizer($wp_customize)
{

  // Header Options Area
   $wp_customize->add_panel('ample_header', array(
   	'title' => __('Header', 'ample'),
      'capabitity' => 'edit_theme_options',
      'priority' => 300
   ));

    if ( ! function_exists('the_custom_logo') ) {
	    // Header Logo upload option
		$wp_customize->add_section('ample_header_logo', array(
			'title'     => __( 'Header Logo', 'ample' ),
			'priority'  => 10,
			'panel' => 'ample_header'
		));

		$wp_customize->add_setting('ample[ample_header_logo_image]', array(
			'default' => '',
	      'capability' => 'edit_theme_options',
	      'type' => 'option',
	      'sanitize_callback' => 'ample_sanitize_url',
	      'sanitize_js_callback' => 'ample_sanitize_js_url'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'ample[ample_header_logo_image]', array(
				'label' 		=> __( 'Upload logo for your header.', 'ample' ),
				'section' 	=> 'ample_header_logo',
				'settings' 	=> 'ample[ample_header_logo_image]'
			))
		);
	}
	// Header logo and text display type option
	$wp_customize->add_section('ample_header_logo_text', array(
		'title'     => __( 'Show', 'ample' ),
		'priority'  => 20,
		'panel' => 'ample_header'
	));

	$wp_customize->add_setting('ample[ample_show_header_logo_text]', array(
      'default' => 'text_only',
      'capability' => 'edit_theme_options',
      'type' => 'option',
      'sanitize_callback' => 'ample_radio_sanitize'
   ));
   $wp_customize->add_control('ample[ample_show_header_logo_text]', array(
      'type' => 'radio',
      'label' => __('Choose the option that you want.', 'ample'),
      'section' => 'ample_header_logo_text',
      'choices' => array(
         'logo_only'    => __( 'Header Logo Only', 'ample' ),
	      'text_only'    => __( 'Header Text Only', 'ample' ),
	      'both'         => __( 'Show Both', 'ample' ),
	      'none'         => __( 'Disable', 'ample' )
      )
   ));

   // New Responsive Menu
   $wp_customize->add_section('ample_new_menu', array(
      'priority' => 25,
      'title'    => __('Responsive Menu Style', 'ample'),
      'panel'    => 'ample_header'
   ));

   $wp_customize->add_setting('ample[ample_new_menu_enable]', array(
      'default'           => '1',
      'type'              => 'option',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'ample_sanitize_checkbox'
   ));

   $wp_customize->add_control('ample[ample_new_menu_enable]', array(
      'type'    => 'checkbox',
      'label'   => __('Switch to new responsive menu.', 'ample'),
      'section' => 'ample_new_menu'
   ));

   // Header Title Bar Background Image upload option
	$wp_customize->add_section('ample_header_title_bar', array(
		'title'     => __( 'Header Title Bar Background Image', 'ample' ),
		'priority'  => 30,
		'panel' => 'ample_header'
	));
	$wp_customize->add_setting('ample[ample_header_title_background_image]', array(
		'default' => '',
      'capability' => 'edit_theme_options',
      'type' => 'option',
      'sanitize_callback' => 'ample_sanitize_url',
      'sanitize_js_callback' => 'ample_sanitize_js_url'
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control($wp_customize, 'ample[ample_header_title_background_image]', array(
			'label' 		=> __( 'Upload Background Image for Header Title Bar.', 'ample' ),
			'section' 	=> 'ample_header_title_bar',
			'settings' 	=> 'ample[ample_header_title_background_image]'
		))
	);
	// Header Title Bar Background color option
	$wp_customize->add_setting('ample[ample_title_bar_background_color]', array(
		'default'     	=> '#80abc8',
      'capability' => 'edit_theme_options',
      'type' => 'option',
		'sanitize_callback' => 'ample_sanitize_hex_color',
		'sanitize_js_callback' => 'ample_sanitize_escaping'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'ample[ample_title_bar_background_color]', array(
			'label'      	=> __( 'Choose Background Color for Header Title Bar', 'ample' ),
			'section'    	=> 'ample_header_title_bar',
			'settings'   	=> 'ample[ample_title_bar_background_color]'
		))
	);
	// Header Title Bar Text color option
	$wp_customize->add_setting('ample[ample_header_title_color]', array(
		'default'     	=> '#ffffff',
      'capability' => 'edit_theme_options',
      'type' => 'option',
		'sanitize_callback' => 'ample_sanitize_hex_color',
		'sanitize_js_callback' => 'ample_sanitize_escaping'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'ample[ample_header_title_color]', array(
			'label'      	=> __( 'Choose Text Color for Header Title Bar', 'ample' ),
			'section'    	=> 'ample_header_title_bar',
			'settings'   	=> 'ample[ample_header_title_color]'
		))
	);

	// Header Image Position
	$wp_customize->add_section('ample_header_image_position_setting', array(
		'title'     => __( 'Header Image Position', 'ample' ),
		'priority'  => 40,
		'panel' => 'ample_header'
	));

	$wp_customize->add_setting('ample[ample_header_image_position]', array(
      'default' => 'above',
      'capability' => 'edit_theme_options',
      'type' => 'option',
      'sanitize_callback' => 'ample_radio_sanitize'
   ));
   $wp_customize->add_control('ample[ample_header_image_position]', array(
      'type' => 'radio',
      'label' => __('Choose top header image display position.', 'ample'),
      'section' => 'ample_header_image_position_setting',
      'choices' => array(
         'above' => __( 'Position Above (Default): Display the Header image just above the site title and main menu part.', 'ample' ),
         'below' => __( 'Position Below: Display the Header image just below the site title and main menu part.', 'ample' )
      )
   ));
	// End of the Header Options

 /**************************************************************************************/

 	// Design Options Area
   $wp_customize->add_panel('ample_design_options', array(
   	'title' => __('Design', 'ample'),
      'capabitity' => 'edit_theme_options',
      'priority' => 310
   ));

   // Site Layout
	$wp_customize->add_section('ample_site_layout_setting', array(
		'title'     => __( 'Site Layout', 'ample' ),
		'priority'  => 10,
		'panel' => 'ample_design_options'
	));

	$wp_customize->add_setting('ample[ample_site_layout]', array(
      'default' => 'wide',
      'capability' => 'edit_theme_options',
      'type' => 'option',
      'sanitize_callback' => 'ample_radio_sanitize'
   ));
   $wp_customize->add_control('ample[ample_site_layout]', array(
      'type' => 'radio',
      'label' => __('Choose your site layout. The change is reflected in whole site.', 'ample'),
      'section' => 'ample_site_layout_setting',
      'choices' => array(
         'wide' => __( 'Wide layout', 'ample' ),
         'box' => __( 'Boxed layout', 'ample' )
      )
   ));

   // Radio Image Custom Control
   class AMPLE_Image_Radio_Control extends WP_Customize_Control {

 		public function render_content() {

			if ( empty( $this->choices ) )
				return;

			$name = '_customize-radio-' . $this->id;

			?>
			<style>
				#ample-img-container .ample-radio-img-img {
					border: 3px solid #DEDEDE;
					margin: 0 5px 5px 0;
					cursor: pointer;
					border-radius: 3px;
					-moz-border-radius: 3px;
					-webkit-border-radius: 3px;
				}
				#ample-img-container .ample-radio-img-selected {
					border: 3px solid #AAA;
					border-radius: 3px;
					-moz-border-radius: 3px;
					-webkit-border-radius: 3px;
				}
				input[type=checkbox]:before {
					content: '';
					margin: -3px 0 0 -4px;
				}
			</style>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<ul class="controls" id = 'ample-img-container'>
			<?php
				foreach ( $this->choices as $value => $label ) :
					$class = ($this->value() == $value)?'ample-radio-img-selected ample-radio-img-img':'ample-radio-img-img';
					?>
					<li style="display: inline;">
					<label>
						<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
						<img src = '<?php echo esc_html( $label ); ?>' class = '<?php echo $class; ?>' />
					</label>
					</li>
					<?php
				endforeach;
			?>
			</ul>
			<script type="text/javascript">

				jQuery(document).ready(function($) {
					$('.controls#ample-img-container li img').click(function(){
						$('.controls#ample-img-container li').each(function(){
							$(this).find('img').removeClass ('ample-radio-img-selected') ;
						});
						$(this).addClass ('ample-radio-img-selected') ;
					});
				});

			</script>
			<?php
		}
	}

   // Default layout
	$wp_customize->add_section('ample_default_layout_setting', array(
		'title' => __( 'Default layout', 'ample' ),
		'priority' => 20,
  		'panel' => 'ample_design_options'
	));

	$wp_customize->add_setting('ample[ample_default_layout]', array(
      'default' => 'right_sidebar',
      'capability' => 'edit_theme_options',
      'type' => 'option',
      'sanitize_callback' => 'ample_radio_sanitize'
   ));
   $wp_customize->add_control(
   	new AMPLE_Image_Radio_Control($wp_customize, 'ample[ample_default_layout]', array(
	      'type' => 'radio',
	      'label' => __('Select default layout. This layout will be reflected in whole site archives, search etc. The layout for a single post and page can be controlled from below options.', 'ample'),
	      'section' => 'ample_default_layout_setting',
	      'choices' => array(
				'right_sidebar'	=> get_template_directory_uri() . '/inc/admin/images/right-sidebar.png',
				'left_sidebar'		=> get_template_directory_uri() . '/inc/admin/images/left-sidebar.png',
				'no_sidebar_full_width'		=> get_template_directory_uri() . '/inc/admin/images/no-sidebar-full-width-layout.png',
				'no_sidebar_content_centered'		=> get_template_directory_uri() . '/inc/admin/images/no-sidebar-content-centered-layout.png',
				'both_sidebar' => get_template_directory_uri() . '/inc/admin/images/both-sidebar.png'
			)
		))
   );

   // Default layout for pages only
	$wp_customize->add_section('ample_pages_default_layout_setting', array(
		'title' => __( 'Default layout for pages only', 'ample' ),
		'priority' => 30,
  		'panel' => 'ample_design_options'
	));

	$wp_customize->add_setting('ample[ample_pages_default_layout]', array(
      'default' => 'right_sidebar',
      'capability' => 'edit_theme_options',
      'type' => 'option',
      'sanitize_callback' => 'ample_radio_sanitize'
   ));
   $wp_customize->add_control(
   	new AMPLE_Image_Radio_Control($wp_customize, 'ample[ample_pages_default_layout]', array(
	      'type' => 'radio',
	      'label' => __('Select default layout for pages. This layout will be reflected in all pages unless unique layout is set for specific page.', 'ample'),
	      'section' => 'ample_pages_default_layout_setting',
	      'choices' => array(
				'right_sidebar'	=> get_template_directory_uri() . '/inc/admin/images/right-sidebar.png',
				'left_sidebar'		=> get_template_directory_uri() . '/inc/admin/images/left-sidebar.png',
				'no_sidebar_full_width'		=> get_template_directory_uri() . '/inc/admin/images/no-sidebar-full-width-layout.png',
				'no_sidebar_content_centered'		=> get_template_directory_uri() . '/inc/admin/images/no-sidebar-content-centered-layout.png',
				'both_sidebar' => get_template_directory_uri() . '/inc/admin/images/both-sidebar.png'
			)
		))
   );

	// Default layout for single posts only
	$wp_customize->add_section('ample_single_posts_default_layout_setting', array(
		'title' => __( 'Default layout for single posts only', 'ample' ),
		'priority' => 40,
  		'panel' => 'ample_design_options'
	));

	$wp_customize->add_setting('ample[ample_single_posts_default_layout]', array(
      'default' => 'right_sidebar',
      'capability' => 'edit_theme_options',
      'type' => 'option',
      'sanitize_callback' => 'ample_radio_sanitize'
   ));
   $wp_customize->add_control(
   	new AMPLE_Image_Radio_Control($wp_customize, 'ample[ample_single_posts_default_layout]', array(
	      'type' => 'radio',
	      'label' => __('Select default layout for single posts. This layout will be reflected in all single posts unless unique layout is set for specific post.', 'ample'),
	      'section' => 'ample_single_posts_default_layout_setting',
	      'choices' => array(
				'right_sidebar'	=> get_template_directory_uri() . '/inc/admin/images/right-sidebar.png',
				'left_sidebar'		=> get_template_directory_uri() . '/inc/admin/images/left-sidebar.png',
				'no_sidebar_full_width'		=> get_template_directory_uri() . '/inc/admin/images/no-sidebar-full-width-layout.png',
				'no_sidebar_content_centered'		=> get_template_directory_uri() . '/inc/admin/images/no-sidebar-content-centered-layout.png',
				'both_sidebar' => get_template_directory_uri() . '/inc/admin/images/both-sidebar.png'
			)
		))
   );

   // Site primary color option
   $wp_customize->add_section('ample_primary_color_setting', array(
      'panel' => 'ample_design_options',
      'priority' => 50,
      'title' => __('Primary color option', 'ample')
   ));

   $wp_customize->add_setting('ample[ample_primary_color]', array(
      'default' => '#80abc8',
      'capability' => 'edit_theme_options',
      'type' => 'option',
      'sanitize_callback' => 'ample_sanitize_hex_color',
      'sanitize_js_callback' => 'ample_sanitize_escaping'
   ));
   $wp_customize->add_control(
   	new WP_Customize_Color_Control($wp_customize, 'ample[ample_primary_color]', array(
	      'label' => __('This will reflect in links, buttons and many others. Choose a color to match your site.', 'ample'),
	      'section' => 'ample_primary_color_setting',
	      'settings' => 'ample[ample_primary_color]'
   	))
   );

	if ( ! function_exists( 'wp_update_custom_css_post' ) ) {
		// Custom CSS setting
		class AMPLE_Custom_CSS_Control extends WP_Customize_Control {

		  public $type = 'custom_css';

		  public function render_content() {
		  ?>
		     <label>
		        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		     </label>
		  <?php
		  }
		}

		$wp_customize->add_section('ample_custom_css_setting', array(
		  'priority' => 60,
		  'title' => __('Custom CSS', 'ample'),
		  'panel' => 'ample_design_options'
		));

		$wp_customize->add_setting('ample[ample_custom_css]', array(
		  'default' => '',
		  'capability' => 'edit_theme_options',
		  'type' => 'option',
		  'sanitize_callback' => 'wp_filter_nohtml_kses',
		  'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		));
		$wp_customize->add_control(
			new AMPLE_Custom_CSS_Control($wp_customize, 'ample[ample_custom_css]', array(
		      'label' => __('Write your custom css.', 'ample'),
		      'section' => 'ample_custom_css_setting',
		      'settings' => 'ample[ample_custom_css]'
			))
		);
	}
   // End of the Design Options

 /**************************************************************************************/

	/* Slider Options Area */
   $wp_customize->add_panel('ample_slider_options', array(
      'capabitity' => 'edit_theme_options',
      'priority' => 320,
      'title' => __('Slider', 'ample'),
   ));

   // Slider activate option
	$wp_customize->add_section('ample_activate_slider_setting', array(
		'title'     => __( 'Activate slider', 'ample' ),
		'priority'  => 10,
		'panel' => 'ample_slider_options'
	));

	$wp_customize->add_setting('ample[ample_activate_slider]',	array(
		'default' => 0,
      'capability' => 'edit_theme_options',
      'type' => 'option',
		'sanitize_callback' => 'ample_sanitize_checkbox'
	));
	$wp_customize->add_control('ample[ample_activate_slider]',	array(
		'type' => 'checkbox',
		'label' => __('Check to activate slider.', 'ample' ),
		'section' => 'ample_activate_slider_setting'
	));

	// Slide options
	for( $i=1; $i<=4; $i++) {
		// Slider Image upload
		$wp_customize->add_section('ample_slider_image_setting'.$i, array(
			'title'	=> sprintf( __( 'Slider #%1$s', 'ample' ), $i ),
			'priority'	=> $i+50,
			'panel' => 'ample_slider_options'
		));

		$wp_customize->add_setting('ample[ample_slider_image'.$i.']', array(
			'default' => '',
	      'capability' => 'edit_theme_options',
	      'type' => 'option',
	      'sanitize_callback' => 'ample_sanitize_url',
	      'sanitize_js_callback' => 'ample_sanitize_js_url'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'ample[ample_slider_image'.$i.']', array(
				'label' 		=> __( 'Upload image', 'ample' ),
				'section' 	=> 'ample_slider_image_setting'.$i,
				'settings' 	=> 'ample[ample_slider_image'.$i.']'
			))
		);

		// Slider Title
		$wp_customize->add_setting('ample[ample_slider_title'.$i.']', array(
			'default' => '',
	      'capability' => 'edit_theme_options',
	      'type' => 'option',
	      'sanitize_callback' => 'wp_filter_nohtml_kses'

		));
		$wp_customize->add_control('ample[ample_slider_title'.$i.']', array(
			'label'	=> __( 'Enter title for this slide', 'ample' ),
			'section'	=> 'ample_slider_image_setting'.$i,
			'settings' 	=> 'ample[ample_slider_title'.$i.']'
		));

		// Button Text
		$wp_customize->add_setting('ample[ample_slider_button_text'.$i.']', array(
			'default' => '',
	      'capability' => 'edit_theme_options',
	      'type' => 'option',
	      'sanitize_callback' => 'wp_filter_nohtml_kses'

		));
		$wp_customize->add_control('ample[ample_slider_button_text'.$i.']', array(
			'label'	=> __( 'Enter button text', 'ample' ),
			'section' 	=> 'ample_slider_image_setting'.$i,
			'settings' 	=> 'ample[ample_slider_button_text'.$i.']'
		));

		// Button Link
		$wp_customize->add_setting('ample[ample_slider_link'.$i.']', array(
			'default' => '',
	      'capability' => 'edit_theme_options',
	      'type' => 'option',
			'sanitize_callback' => 'ample_sanitize_url',
	      'sanitize_js_callback' => 'ample_sanitize_js_url'

		));
		$wp_customize->add_control('ample[ample_slider_link'.$i.']', array(
			'label'	=> __( 'Enter link to redirect', 'ample' ),
			'section'	=> 'ample_slider_image_setting'.$i,
			'settings'	=> 'ample[ample_slider_link'.$i.']'
		));
	}
	// End of the Slider Options

 /**************************************************************************************/

	/* Additional Options Area */
   $wp_customize->add_panel('ample_additional_options', array(
      'capabitity' => 'edit_theme_options',
      'priority' => 330,
      'title' => __('Additional', 'ample')
   ));

	if ( ! function_exists( 'has_site_icon' ) ) {

		// Favicon Activate Option
		$wp_customize->add_section('ample_favicon_setting', array(
			'title'     => __( 'Favicon', 'ample' ),
			'priority'  => 10,
	  		'panel' => 'ample_additional_options'
		));

		$wp_customize->add_setting('ample[ample_activate_favicon]',	array(
			'default' => 0,
	      'capability' => 'edit_theme_options',
	      'type' => 'option',
			'sanitize_callback' => 'ample_sanitize_checkbox'
		));
		$wp_customize->add_control('ample[ample_activate_favicon]',	array(
			'type' => 'checkbox',
			'label' => __('Check to activate favicon. Upload fav icon from below option', 'ample' ),
			'section' => 'ample_favicon_setting'
		));

		// Fav icon upload option
		$wp_customize->add_setting('ample[ample_favicon]', array(
			'default' => '',
	      'capability' => 'edit_theme_options',
	      'type' => 'option',
	      'sanitize_callback' => 'ample_sanitize_url',
	      'sanitize_js_callback' => 'ample_sanitize_js_url'
		));
		$wp_customize->add_control(
			new WP_Customize_Image_Control($wp_customize, 'ample[ample_favicon]', array(
				'label' 		=> __( 'Upload favicon for your site.', 'ample' ),
				'section' 	=> 'ample_favicon_setting',
				'settings' 	=> 'ample[ample_favicon]'
			))
		);
	}

	// Multicheck Custom Control
	class AMPLE_Controls_MultiCheck_Control extends WP_Customize_Control {

		public $type = 'multicheck';

		public function render_content() { ?>

			<script type="text/javascript">

				jQuery( document ).ready( function() {
					jQuery( '.customize-control-multicheck input[type="checkbox"]' ).on( 'change', function() {
							checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
								function() { return this.value; }
							).get().join( ',' );
							jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
						}
					);
				} );
			</script>

			<?php if ( empty( $this->choices ) ) {
				return;
			}

			if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>

			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<?php $multi_values = ( ! is_array( $this->value() ) ) ? explode( ',', $this->value() ) : $this->value(); ?>

			<ul>
				<?php foreach ( $this->choices as $value => $label ) : ?>
					<li>
						<label>
							<input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> />
							<?php echo esc_html( $label ); ?>
						</label>
					</li>
				<?php endforeach; ?>
			</ul>

			<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
		<?php }
	}

	// Pull all the categories into an array
   $options_categories = array();
   $options_categories_obj = get_categories();
   foreach ($options_categories_obj as $category) {
      $options_categories[$category->cat_ID] = $category->cat_name;
   }

	// Select category to hide from Post Page
	$wp_customize->add_section('ample_hide_category_setting', array(
		'title'     => __( 'Category to hide from Blog', 'ample' ),
		'priority'  => 20,
  		'panel' => 'ample_additional_options'
	));

	$wp_customize->add_setting('ample[ample_hide_category]',	array(
		'default' => '',
      'capability' => 'edit_theme_options',
      'type' => 'option',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
	));
	$wp_customize->add_control(
		new AMPLE_Controls_MultiCheck_Control($wp_customize, 'ample[ample_hide_category]', array(
			'label' => __('Select a Category or Categories to hide its posts from Blog page.', 'ample' ),
			'section' => 'ample_hide_category_setting',
			'setting' => 'ample[ample_hide_category]',
			'choices' => $options_categories
		))
	);
	// End of the Additional Options

 	// Checkbox sanitization
 	function ample_sanitize_checkbox($input) {
      if ( $input == 1 ) {
         return 1;
      } else {
         return '';
      }
   }
 	// URL sanitization
   function ample_sanitize_url( $input ) {
		$input = esc_url_raw( $input );
		return $input;
	}
	function ample_sanitize_js_url ( $input ) {
		$input = esc_url( $input );
		return $input;
	}
   // Color sanitization
   function ample_sanitize_hex_color($color) {
      if ($unhashed = sanitize_hex_color_no_hash($color))
         return '#' . $unhashed;

      return $color;
   }
   function ample_sanitize_escaping($input) {
      $input = esc_attr($input);
      return $input;
   }
   // Radio/Select sanitization
   function ample_radio_sanitize( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	// Sanitization of links
   function ample_links_sanitize() {
      return false;
   }

    $wp_customize->add_section('a001_icon_section', array(
        'priority' => 325,
        'title' => __('Icon/Features Section', 'a001')
    ));

    $wp_customize->add_setting('a001_icon_section_title', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_icon_section_title', array(
        'label' => __('Icon Section Title', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_icon_section_title',
        'type' => 'text'
    )));

    $wp_customize->add_setting('a001_icon_section_description', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_icon_section_description', array(
        'label' => __('Icon Section Description', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_icon_section_description',
        'type' => 'textarea'
    )));

    // First Icon

    $wp_customize->add_setting('a001_first_icon', array(
        'default' => 'fa-clock-o',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_first_icon', array(
        'label' => __('First Icon', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_first_icon',
        'type' => 'text'
    )));

    $wp_customize->add_setting('a001_first_icon_title', array(
        'default' => 'Services',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_first_icon_title', array(
        'label' => __('First Icon Title', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_first_icon_title',
        'type' => 'text'
    )));

    $wp_customize->add_setting('a001_first_icon_description', array(
        'default' => 'We offer a variety of Worship Opportunities!',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_first_icon_description', array(
        'label' => __('First Icon Description', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_first_icon_description',
        'type' => 'textarea'
    )));

    $wp_customize->add_setting('a001_first_icon_url', array(
        'default' => '#worship',
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_first_icon_url', array(
        'label' => __('First Icon URL', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_first_icon_url',
        'type' => 'text'
    )));

    // Second Icon

    $wp_customize->add_setting('a001_second_icon', array(
        'default' => 'fa-calendar',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_second_icon', array(
        'label' => __('Second Icon', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_second_icon',
        'type' => 'text'
    )));

    $wp_customize->add_setting('a001_second_icon_title', array(
        'default' => 'Events',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_second_icon_title', array(
        'label' => __('Second Icon Title', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_second_icon_title',
        'type' => 'text'
    )));

    $wp_customize->add_setting('a001_second_icon_description', array(
        'default' => 'Wondering what we\'re up to? Take a look at our calendar!',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_second_icon_description', array(
        'label' => __('Second Icon Description', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_second_icon_description',
        'type' => 'textarea'
    )));

    $wp_customize->add_setting('a001_second_icon_url', array(
        'default' => 'events',
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_second_icon_url', array(
        'label' => __('Second Icon URL', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_second_icon_url',
        'type' => 'text'
    )));

    // Third Icon

    $wp_customize->add_setting('a001_third_icon', array(
        'default' => 'fa-map-marker',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_third_icon', array(
        'label' => __('Third Icon', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_third_icon',
        'type' => 'text'
    )));

    $wp_customize->add_setting('a001_third_icon_title', array(
        'default' => 'Find Us',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_third_icon_title', array(
        'label' => __('Third Icon Title', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_third_icon_title',
        'type' => 'text'
    )));

    $wp_customize->add_setting('a001_third_icon_description', array(
        'default' => 'Need help finding us? Check out this map!',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_third_icon_description', array(
        'label' => __('Third Icon Description', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_third_icon_description',
        'type' => 'textarea'
    )));

    $wp_customize->add_setting('a001_third_icon_url', array(
        'default' => '#',
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_third_icon_url', array(
        'label' => __('Third Icon URL', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_third_icon_url',
        'type' => 'text'
    )));

    // Fourth Icon

    $wp_customize->add_setting('a001_fourth_icon', array(
        'default' => 'fa-envelope-o',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_fourth_icon', array(
        'label' => __('Fourth Icon', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_fourth_icon',
        'type' => 'text'
    )));

    $wp_customize->add_setting('a001_fourth_icon_title', array(
        'default' => 'Always In Reach',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_fourth_icon_title', array(
        'label' => __('Fourth Icon Title', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_fourth_icon_title',
        'type' => 'text'
    )));

    $wp_customize->add_setting('a001_fourth_icon_description', array(
        'default' => 'We\'re always one call, email, or form submission away!',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_fourth_icon_description', array(
        'label' => __('Fourth Icon Description', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_fourth_icon_description',
        'type' => 'textarea'
    )));

    $wp_customize->add_setting('a001_fourth_icon_url', array(
        'default' => 'contact',
        'type' => 'option',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_fourth_icon_url', array(
        'label' => __('Fourth Icon URL', 'a001'),
        'section' => 'a001_icon_section',
        'settings' => 'a001_fourth_icon_url',
        'type' => 'text'
    )));

    // Call To Action Section

    $wp_customize->add_section('a001_cta_section', array(
        'priority' => 326,
        'title' => __('Call To Action', 'a001')
    ));

    $wp_customize->add_setting('a001_cta_text', array(
        'default' => 'Still wondering who we are? We\'ve got you covered!',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_cta_text', array(
        'label' => __('Call To Action Text', 'a001'),
        'section' => 'a001_cta_section',
        'settings' => 'a001_cta_text',
        'type' => 'text'
    )));

    $wp_customize->add_setting('a001_cta_btn_text', array(
        'default' => 'About',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_cta_btn_text', array(
        'label' => __('Call To Action Button Text', 'a001'),
        'section' => 'a001_cta_section',
        'settings' => 'a001_cta_btn_text',
        'type' => 'text'
    )));

    $wp_customize->add_setting('a001_cta_btn_url', array(
        'default' => 'about',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_cta_btn_url', array(
        'label' => __('Call To Action Button URL', 'a001'),
        'section' => 'a001_cta_section',
        'settings' => 'a001_cta_btn_url',
        'type' => 'text'
    )));

    // Footer Section

    $wp_customize->add_section('a001_footer_section', array(
        'priority' => 330,
        'title' => __('Footer Section', 'a001')
    ));

    $wp_customize->add_setting('a001_footer_text', array(
        'default' => '✝ Conversion Church',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'a001_footer_text', array(
        'label' => __('Footer Text', 'a001'),
        'section' => 'a001_footer_section',
        'settings' => 'a001_footer_text',
        'type' => 'text'
    )));

}
add_action('customize_register', 'a001_modify_customizer');
?>
