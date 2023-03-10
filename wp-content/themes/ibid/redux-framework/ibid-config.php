<?php
/**
  ReduxFramework ibid Theme Config File
  For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
 * */



if (!class_exists("Redux_Framework_ibid_config")) {

    class Redux_Framework_ibid_config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }
            
            // This is needed. Bah WordPress bugs.  ;)
            if ( get_template_directory() && strpos( Redux_Helpers::cleanFilePath( __FILE__ ), Redux_Helpers::cleanFilePath( get_template_directory() ) ) !== false) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);    
            }
        }

        public function initSettings() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }       
            
            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

       

        

        public function setSections() {

            include_once(get_template_directory() . '/redux-framework/modeltheme-config.arrays.php');

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $ibid_patterns_path = ReduxFramework::$_dir . '../polygon/patterns/';
            $ibid_patterns_url = ReduxFramework::$_url . '../polygon/patterns/';
            $ibid_patterns = array();

            if (is_dir($ibid_patterns_path)) :

                if ($ibid_patterns_dir = opendir($ibid_patterns_path)) :
                    $ibid_patterns = array();

                    while (( $ibid_patterns_file = readdir($ibid_patterns_dir) ) !== false) {

                        if (stristr($ibid_patterns_file, '.png') !== false || stristr($ibid_patterns_file, '.jpg') !== false) {
                            $name = explode(".", $ibid_patterns_file);
                            $name = str_replace('.' . end($name), '', $ibid_patterns_file);
                            $ibid_patterns[] = array('alt' => $name, 'img' => $ibid_patterns_url . $ibid_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'ibid'), $this->theme->display('Name'));
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                    <a href="<?php echo esc_url(wp_customize_url()); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                        <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview','ibid'); ?>" />
                    </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview','ibid'); ?>" />
            <?php endif; ?>

                <h4>
            <?php echo esc_html($this->theme->display('Name')); ?>
                </h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'ibid'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'ibid'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'ibid') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo esc_html($this->theme->display('Description')); ?></p>
                <?php
                if ($this->theme->parent()) {
                    printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.', 'ibid') . '</p>', __('http://codex.WordPress.org/Child_Themes', 'ibid'), $this->theme->parent()->display('Name'));
                }
                ?>

                </div>

            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();


            /*
             *
             * ---> START SECTIONS
             *
             */
            include_once(get_template_directory(). '/redux-framework/modeltheme-config.responsive.php');


            # General Settings
            $this->sections[] = array(
                'icon' => 'el-icon-wrench',
                'title' => __('General Settings', 'ibid'),
            );
            # General
            $this->sections[] = array(
                'icon' => 'el el-chevron-right',
                'subsection' => true,
                'title' => __('Breadcrumbs', 'ibid'),
                'fields' => array(
                    array(
                        'id'   => 'ibid_general_breadcrumbs',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Breadcrumbs</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid-enable-breadcrumbs',
                        'type'     => 'switch', 
                        'title'    => __('Breadcrumbs', 'ibid'),
                        'subtitle' => __('Enable or disable breadcrumbs', 'ibid'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'breadcrumbs-delimitator',
                        'type'     => 'text',
                        'title'    => __('Breadcrumbs delimitator', 'ibid'),
                        'subtitle' => __('This is a little space under the Field Title in the Options table, additional info is good in here.', 'ibid'),
                        'desc'     => __('This is the description field, again good for additional info.', 'ibid'),
                        'default'  => '/',
                        'required' => array( 'ibid-enable-breadcrumbs', '=', true ),
                    ),
                    array(
                        'id'    => 'ibid_breadcrumbs_navxt',
                        'type'  => 'info',
                        'style' => 'success',
                        'title' => __('Note', 'ibid'),
                        'icon'  => 'el-icon-info-sign',
                        'desc'  => __( 'iBid is also compatible with <a target="_blank" href="https://wordpress.org/plugins/breadcrumb-navxt/"><strong>Breadcrumb NavXT</strong></a> plugin, for an enhanced Breadcrumbs / SEO Ready Breadcrumbs feature. Install it and it will automatically replace the default breadcrumbs feature.', 'ibid'),
                        'required' => array( 'ibid-enable-breadcrumbs', '=', true ),
                    ),
                )
            );
            # General -> Sidebars
            $this->sections[] = array(
                'icon' => 'el-icon-website',
                'title' => __('Sidebars (Widgetized Ares)', 'ibid'),
                'subsection' => true,
                'fields' => array(
                    array(
                        'id'   => 'ibid_sidebars_generator',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Generate Unlimited Sidebars</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'dynamic_sidebars',
                        'type'     => 'multi_text',
                        'title'    => __( 'Sidebars', 'ibid' ),
                        'subtitle' => __( 'Use the "Add More" button to create unlimited sidebars.', 'ibid' ),
                        'desc'     => __( 'All the widgetized areas will be automatically generated and listed under Appearance - Widgets.', 'ibid' ),
                        'add_text' => __( 'Add one more Sidebar', 'ibid' )
                    )
                )
            );



            # Section #2: Styling Settings
            $this->sections[] = array(
                'icon' => 'el-icon-magic',
                'title' => __('Styling Settings', 'ibid'),
            );
            // Colors
            $this->sections[] = array(
                'icon' => 'el-icon-magic',
                'subsection' => true,
                'title' => __('Colors', 'ibid'),
                'fields' => array(
                    array(
                        'id'   => 'ibid_divider_links',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Links Colors(Regular, Hover, Active/Visited)</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_global_link_styling',
                        'type'     => 'link_color',
                        'title'    => esc_html__('Links Color Option', 'ibid'),
                        'subtitle' => esc_html__('Only color validation can be done on this field type(Default Regular: #2695ff; Default Hover: #2695ff; Default Active: #484848;)', 'ibid'),
                        'default'  => array(
                            'regular'  => '#2695ff', // blue
                            'hover'    => '#2695ff', // blue-x3
                            'active'   => '#484848',  // blue-x3
                            'visited'  => '#484848',  // blue-x3
                        )
                    ),
                    array(
                        'id'   => 'ibid_divider_main_colors',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Main Colors & Backgrounds</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_style_main_texts_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Main texts color', 'ibid'), 
                        'subtitle' => esc_html__('Default: #2695ff', 'ibid'),
                        'default'  => '#2695ff',
                        'validate' => 'color',
                    ),
                    array(
                        'id'       => 'ibid_style_main_backgrounds_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Main background color', 'ibid'), 
                        'subtitle' => esc_html__('Default: #2695ff', 'ibid'),
                        'default'  => '#2695ff',
                        'validate' => 'color',
                    ),
                    array(
                        'id'       => 'ibid_style_main_backgrounds_color_hover',
                        'type'     => 'color',
                        'title'    => esc_html__('Main background color (hover)', 'ibid'), 
                        'subtitle' => esc_html__('Default: #ffffff', 'ibid'),
                        'default'  => '#ffffff',
                        'validate' => 'color',
                    ),
                    array(
                        'id'       => 'ibid_style_semi_opacity_backgrounds',
                        'type'     => 'color_rgba',
                        'title'    => esc_html__( 'Semitransparent blocks background', 'ibid' ),
                        'default'  => array(
                            'color' => '#f02222',
                            'alpha' => '.95'
                        ),
                        'output' => array(
                            'background-color' => '.fixed-sidebar-menu',
                        ),
                        'mode'     => 'background'
                    ),
                    array(
                        'id'   => 'ibid_divider_text_selection',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Text Selection Color & Background</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_text_selection_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Text selection color', 'ibid'), 
                        'subtitle' => esc_html__('Default: #ffffff', 'ibid'),
                        'default'  => '#ffffff',
                        'validate' => 'color',
                    ),
                    array(
                        'id'       => 'ibid_text_selection_background_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Text selection background color', 'ibid'), 
                        'subtitle' => esc_html__('Default: #2695ff', 'ibid'),
                        'default'  => '#2695ff',
                        'validate' => 'color',
                    ),


                    array(
                        'id'   => 'ibid_divider_nav_menu',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Menus Styling</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_nav_menu_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Nav Menu Text Color', 'ibid'), 
                        'subtitle' => esc_html__('Default: #ffffff', 'ibid'),
                        'default'  => '#ffffff',
                        'validate' => 'color',
                        'output' => array(
                            'color' => '#navbar .menu-item > a,
                                        .navbar-nav .search_products a,
                                        .navbar-default .navbar-nav > li > a,
                                        li.nav-menu-account,
                                        .my-account-navbar a',
                        )
                    ),
                    array(
                        'id'       => 'ibid_nav_menu_color_hover',
                        'type'     => 'color',
                        'title'    => esc_html__('Nav Menu Text Color on hover', 'ibid'), 
                        'subtitle' => esc_html__('Default: #fff', 'ibid'),
                        'default'  => '#fff',
                        'validate' => 'color',
                        'output' => array(
                            'color' => '#navbar .menu-item > a:hover, 
                                        #navbar .menu-item > a:focus,
                                        .navbar-nav .search_products a:hover, 
                                        .navbar-nav .search_products a:focus,
                                        .navbar-default .navbar-nav > li > a:hover, 
                                        .navbar-default .navbar-nav > li > a:focus',
                        )
                    ),
                    array(
                        'id'   => 'ibid_divider_nav_submenu',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Submenus Styling</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_nav_submenu_background',
                        'type'     => 'color',
                        'title'    => esc_html__('Nav Submenu Background Color', 'ibid'), 
                        'subtitle' => esc_html__('Default: #FFF', 'ibid'),
                        'default'  => '#FFF',
                        'validate' => 'color',
                        'output' => array(
                            'background-color' => '#navbar .sub-menu, .navbar ul li ul.sub-menu',
                        )
                    ),
                    array(
                        'id'       => 'ibid_nav_submenu_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Nav Submenu Text Color', 'ibid'), 
                        'subtitle' => esc_html__('Default: #484848', 'ibid'),
                        'default'  => '#484848',
                        'validate' => 'color',
                        'output' => array(
                            'color' => '#navbar ul.sub-menu li a,.bot_nav_cat_wrap li a:hover',
                        )
                    ),
                    array(
                        'id'       => 'ibid_nav_submenu_hover_background_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Nav Submenu Hover Background Color', 'ibid'), 
                        'subtitle' => esc_html__('Default: #FFF', 'ibid'),
                        'default'  => '#FFF',
                        'validate' => 'color',
                        'output' => array(
                            'background-color' => '#navbar ul.sub-menu li a:hover',
                        )
                    ),
                    array(
                        'id'       => 'ibid_nav_submenu_hover_text_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Nav Submenu Hover Background Color', 'ibid'), 
                        'subtitle' => esc_html__('Default: #2695ff', 'ibid'),
                        'default'  => '#2695ff',
                        'validate' => 'color',
                        'output' => array(
                            'color' => '#navbar ul.sub-menu li a:hover',
                        )
                    ),
                )
            );
            // Fonts
            $this->sections[] = array(
                'icon' => 'el-icon-fontsize',
                'subsection' => true,
                'title' => __('Typography', 'ibid'),
                'fields' => array(
                    array(
                        'id'   => 'ibid_styling_gfonts',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Import Google Fonts</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_google_fonts_select',
                        'type'     => 'select',
                        'multi'    => true,
                        'title'    => esc_attr__('Import Google Font Globally', 'ibid'), 
                        'subtitle' => esc_attr__('Select one or multiple fonts', 'ibid'),
                        'desc'     => esc_attr__('Importing fonts made easy', 'ibid'),
                        'options'  => $google_fonts_list,
                        'default'  => array(
                            'Montserrat:regular,500,600,700,800,900,latin',
                            'Poppins:300,regular,500,600,700,latin-ext,latin,devanagari'
                        ),
                    ),
                    array(
                        'id'   => 'ibid_styling_fonts',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Set the main site font</h3>', 'ibid' )
                    ),
                    array(
                        'id'          => 'ibid-body-typography',
                        'type'        => 'typography', 
                        'title'       => __('Body Font family', 'ibid'),
                        'google'      => true, 
                        'font-backup' => true,
                        'color'       => false,
                        'text-align'  => false,
                        'letter-spacing'  => false,
                        'line-height'  => false,
                        'font-weight'  => false,
                        'font-size'   => false,
                        'font-style'  => false,
                        'subsets'     => false,
                        'output'      => array('body'),
                        'units'       =>'px',
                        'default'     => array(
                            'font-family' => 'Montserrat', 
                            'google'      => true
                        ),
                    ),
                    array(
                        'id'   => 'ibid_divider_5',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Headings</h3>', 'ibid' )
                    ),
                    array(
                        'id'          => 'ibid_heading_h1',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Heading H1 Font family', 'ibid'),
                        'google'      => true, 
                        'font-backup' => true,
                        'color'       => true,
                        'text-align'  => false,
                        'letter-spacing'  => true,
                        'line-height'  => true,
                        'font-weight'  => false,
                        'font-size'   => true,
                        'font-style'  => false,
                        'subsets'     => false,
                        'output'      => array('h1', 'h1 span'),
                        'units'       =>'px',
                        'default'     => array(
                            'font-family' => 'Montserrat', 
                            'font-size' => '36px', 
                            'color' => '#242424', 
                            'google'      => true
                        ),
                    ),
                    array(
                        'id'          => 'ibid_heading_h2',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Heading H2 Font family', 'ibid'),
                        'google'      => true, 
                        'font-backup' => true,
                        'color'       => true,
                        'text-align'  => false,
                        'letter-spacing'  => true,
                        'line-height'  => true,
                        'font-weight'  => false,
                        'font-size'   => true,
                        'font-style'  => false,
                        'subsets'     => false,
                        'output'      => array('h2'),
                        'units'       =>'px',
                        'default'     => array(
                            'font-family' => 'Montserrat', 
                            'font-size' => '30px', 
                            'color' => '#242424', 
                            'google'      => true
                        ),
                    ),
                    array(
                        'id'          => 'ibid_heading_h3',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Heading H3 Font family', 'ibid'),
                        'google'      => true, 
                        'font-backup' => true,
                        'color'       => true,
                        'text-align'  => false,
                        'letter-spacing'  => true,
                        'line-height'  => true,
                        'font-weight'  => false,
                        'font-size'   => true,
                        'font-style'  => false,
                        'subsets'     => false,
                        'output'      => array('h3', '.post-name'),
                        'units'       =>'px',
                        'default'     => array(
                            'font-family' => 'Montserrat', 
                            'font-size' => '24px', 
                            'color' => '#242424', 
                            'google'      => true
                        ),
                    ),
                    array(
                        'id'          => 'ibid_heading_h4',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Heading H4 Font family', 'ibid'),
                        'google'      => true, 
                        'font-backup' => true,
                        'color'       => true,
                        'text-align'  => false,
                        'letter-spacing'  => true,
                        'line-height'  => true,
                        'font-weight'  => false,
                        'font-size'   => true,
                        'font-style'  => false,
                        'subsets'     => false,
                        'output'      => array('h4'),
                        'units'       =>'px',
                        'default'     => array(
                            'font-family' => 'Montserrat', 
                            'font-size' => '18px', 
                            'color' => '#242424', 
                            'google'      => true
                        ),
                    ),
                    array(
                        'id'          => 'ibid_heading_h5',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Heading H5 Font family', 'ibid'),
                        'google'      => true, 
                        'font-backup' => true,
                        'color'       => true,
                        'text-align'  => false,
                        'letter-spacing'  => true,
                        'line-height'  => true,
                        'font-weight'  => false,
                        'font-size'   => true,
                        'font-style'  => false,
                        'subsets'     => false,
                        'output'      => array('h5'),
                        'units'       =>'px',
                        'default'     => array(
                            'font-family' => 'Montserrat', 
                            'font-size' => '14px', 
                            'color' => '#242424', 
                            'google'      => true
                        ),
                    ),
                    array(
                        'id'          => 'ibid_heading_h6',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Heading H6 Font family', 'ibid'),
                        'google'      => true, 
                        'font-backup' => true,
                        'color'       => true,
                        'text-align'  => false,
                        'letter-spacing'  => true,
                        'line-height'  => true,
                        'font-weight'  => false,
                        'font-size'   => true,
                        'font-style'  => false,
                        'subsets'     => false,
                        'output'      => array('h6'),
                        'units'       =>'px',
                        'default'     => array(
                            'font-family' => 'Montserrat', 
                            'font-size' => '12px', 
                            'color' => '#242424', 
                            'google'      => true
                        ),
                    ),
                    array(
                        'id'   => 'ibid_divider_6',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Inputs & Textareas Font family</h3>', 'ibid' )
                    ),
                    array(
                        'id'                => 'ibid_inputs_typography',
                        'type'              => 'typography', 
                        'title'             => esc_html__('Inputs Font family', 'ibid'),
                        'google'            => true, 
                        'font-backup'       => true,
                        'color'             => false,
                        'text-align'        => false,
                        'letter-spacing'    => false,
                        'line-height'       => false,
                        'font-weight'       => false,
                        'font-size'         => false,
                        'font-style'        => false,
                        'subsets'           => false,
                        'output'            => array('input', 'textarea'),
                        'units'             =>'px',
                        'subtitle'          => esc_html__('Font family for inputs and textareas', 'ibid'),
                        'default'           => array(
                            'font-family'       => 'Montserrat', 
                            'google'            => true
                        ),
                    ),
                    array(
                        'id'   => 'ibid_divider_7',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Buttons Font family</h3>', 'ibid' )
                    ),
                    array(
                        'id'                => 'ibid_buttons_typography',
                        'type'              => 'typography', 
                        'title'             => esc_html__('Buttons Font family', 'ibid'),
                        'google'            => true, 
                        'font-backup'       => true,
                        'color'             => false,
                        'text-align'        => false,
                        'letter-spacing'    => false,
                        'line-height'       => false,
                        'font-weight'       => false,
                        'font-size'         => false,
                        'font-style'        => false,
                        'subsets'           => false,
                        'output'            => array(
                            'input[type="submit"]'
                        ),
                        'units'             =>'px',
                        'subtitle'          => esc_html__('Font family for buttons', 'ibid'),
                        'default'           => array(
                            'font-family'       => 'Montserrat', 
                            'google'            => true
                        ),
                    ),
                )
            );
            // Fonts (mobile)
            $this->sections[] = $responsive_headings;
            // Custom CSS
            $this->sections[] = array(
                'icon' => 'el-icon-css',
                'subsection' => true,
                'title' => __('Custom CSS', 'ibid'),
                'fields' => array(
                    array(
                        'id'   => 'ibid_styling_custom_css',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Custom CSS</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_css_editor',
                        'type'     => 'ace_editor',
                        'title'    => __('CSS Code', 'ibid'),
                        'subtitle' => __('Paste your CSS code here.', 'ibid'),
                        'mode'     => 'css',
                        'theme'    => 'monokai',
                        'desc'     => 'Add your own custom styling (CSS rules only)',
                        'default'     => '#header{margin: 0 auto;}',
                    )
                )
            );
            // Form Fields
            $this->sections[] = array(
                'icon' => 'el el-list-alt',
                'subsection' => true,
                'title' => __('Form Fields', 'ibid'),
                'fields' => array(
                    array(
                        'id'        => 'ibid_fields_styling_radius',
                        'type'      => 'radio',
                        'title'     => __('Fields Shape:', 'ibid'),
                        'subtitle'  => __('Form fields & buttons radius', 'ibid'),
                        'options'   => array(
                            '30'   => 'Rounded',
                            '0'   => 'Square',
                            '5'   => 'Round',
                        ),
                        'default'   => '30',
                        'desc' => esc_html__( 'Rounded: 30px radius | Square: 0px radius | Round: 5px radius', 'ibid' ),
                        //30 -> border radius
                    ),
                )
            );


            # Section #2: Header Settings

            $this->sections[] = array(
                'icon' => 'el-icon-arrow-up',
                'title' => __('Header Settings', 'ibid'),
                'fields' => array(
                    array(
                        'id'   => 'ibid_header_variant',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Header Variant</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'header_layout',
                        'type'     => 'image_select',
                        'title'    => __( 'Select Header layout', 'ibid' ),
                        'options'  => array(
                            'first_header' => array(
                                'alt' => 'Header #1',
                                'img' => get_template_directory_uri().'/redux-framework/assets/headers/header_1.jpg'
                            ),
                            'second_header' => array(
                                'alt' => 'Header #2',
                                'img' => get_template_directory_uri().'/redux-framework/assets/headers/header_2.jpg'
                            ),
                            'third_header' => array(
                                'alt' => 'Header #3',
                                'img' => get_template_directory_uri().'/redux-framework/assets/headers/header_3.jpg'
                            ),
                            'fourth_header' => array(
                                'alt' => 'Header #4',
                                'img' => get_template_directory_uri().'/redux-framework/assets/headers/header_4.jpg'
                            ),
                            'fifth_header' => array(
                                'alt' => 'Header #5',
                                'img' => get_template_directory_uri().'/redux-framework/assets/headers/header_5.jpg'
                            ),
                            'sixth_header' => array(
                                'alt' => 'Header #6',
                                'img' => get_template_directory_uri().'/redux-framework/assets/headers/header_6.jpg'
                            ),
                            'seventh_header' => array(
                                'alt' => 'Header #7',
                                'img' => get_template_directory_uri().'/redux-framework/assets/headers/header_7.jpg'
                            ),
                            'eighth_header' => array(
                                'alt' => 'Header #8',
                                'img' => get_template_directory_uri().'/redux-framework/assets/headers/header_8.jpg'
                            ),
                            'ninth_header' => array(
                                'alt' => 'Header #9',
                                'img' => get_template_directory_uri().'/redux-framework/assets/headers/header_9.jpg'
                            )
                        ),
                        'default'  => 'first_header'
                    ),
                    array(
                        'id'   => 'mt_divider_first_header',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => '<h3>'.esc_html__( 'Header 1 Custom Background (Menu bar)', 'ibid' ).'</h3>',
                        'required' => array( 'header_layout', '=', 'first_header' ),
                    ),
                    array(         
                        'id'       => 'nav_main_background',
                        'type'     => 'background',
                        'title'    => __('Navigation background', 'ibid'),
                        'subtitle' => __('Override the Navigation background with color.', 'ibid'),
                        'required' => array( 'header_layout', '=', 'first_header' ),
                        'output'      => array('.header-v1 .navbar.bottom-navbar-default')
                    ),
                    array(
                        'id'   => 'mt_divider_second_header',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => '<h3>'.esc_html__( 'Header 2 Custom Top & Bottom Header Background', 'ibid' ).'</h3>',
                        'required' => array( 'header_layout', '=', 'second_header' ),
                    ),
                    array(
                        'id'       => 'mt_style_top_header2_color',
                        'type'     => 'background',
                        'title'    => esc_html__('Top Header - background color', 'ibid'), 
                        'subtitle' => esc_html__('This color is only available when using Header 2', 'ibid'),
                        'default'  => '#ce6723',
                        'required' => array( 'header_layout', '=', 'second_header' ),
                        'default'  => array(
                            'background-color' => '#ce6723',
                        ),
                    ),
                    array(
                        'id'       => 'mt_style_bottom_header2_color',
                        'type'     => 'background',
                        'title'    => esc_html__('Main Header - background color', 'ibid'), 
                        'subtitle' => esc_html__('This color is only available when using Header 2', 'ibid'),
                        'default'  => '#F27928',
                        'required' => array( 'header_layout', '=', 'second_header' ),
                        'default'  => array(
                            'background-color' => '#F27928',
                        ),
                    ),

                    array(
                        'id'   => 'mt_divider_third_header',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => '<h3>'.esc_html__( 'Header 3 Custom Top & Bottom Header Background', 'ibid' ).'</h3>',
                        'required' => array( 'header_layout', '=', 'third_header' ),
                    ),
                    array(
                        'id'       => 'mt_style_top_header3_color',
                        'type'     => 'background',
                        'title'    => esc_html__('Main Header - background color', 'ibid'), 
                        'subtitle' => esc_html__('This color is only available when using Header 3', 'ibid'),
                        'default'  => '#1C1F26',
                        'required' => array( 'header_layout', '=', 'third_header' ),
                        'default'  => array(
                            'background-color' => '#1C1F26',
                        ),
                    ),
                    array(
                        'id'       => 'mt_style_bottom_header3_color',
                        'type'     => 'color',
                        'title'    => esc_html__('Color Links (not navigation)', 'ibid'), 
                        'subtitle' => esc_html__('This color is only available when using Header 3', 'ibid'),
                        'required' => array( 'header_layout', '=', 'third_header' ),
                        'default'  =>  '#fff',
                        'validate' => 'color'
                    ),
                    array(
                        'id'   => 'mt_divider_seventh_header',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => '<h3>'.esc_html__( 'Header 7 Custom Settings', 'ibid' ).'</h3>',
                        'required' => array( 'header_layout', '=', 'seventh_header' ),
                    ),
                    array(         
                        'id'       => 'inquiry_button_background',
                        'type'     => 'background',
                        'title'    => __('Inquiry Button background', 'ibid'),
                        'subtitle' => __('Set Inquiry Button background', 'ibid'),
                        'required' => array( 'header_layout', '=', 'seventh_header' ),
                        'default'  =>  '#2695FF',
                        'output'      => array('.header-v7 .menu-inquiry .button')
                    ),
                    array(
                        'id' => 'inquiry_button_text',
                        'required' => array( 'header_layout', '=', 'seventh_header' ),
                        'type' => 'text',
                        'title' => __('Inquiry Button Text', 'ibid'),
                        'subtitle' => __('Set Inquiry Button Text', 'ibid'),
                        'default' => 'Post Project'
                    ),
                    array(
                        'id' => 'inquiry_button_link',
                        'required' => array( 'header_layout', '=', 'seventh_header' ),
                        'type' => 'text',
                        'title' => __('Inquiry Button Link', 'ibid'),
                        'subtitle' => __('Set Inquiry Button Link', 'ibid'),
                        'default' => '#'
                    ),
                    array(
                        'id'   => 'mt_divider_eighth_header',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => '<h3>'.esc_html__( 'Header 8 Custom Settings', 'ibid' ).'</h3>',
                        'required' => array( 'header_layout', '=', 'eighth_header' ),
                    ),
                    array(         
                        'id'       => 'inquiry_button_background_8',
                        'type'     => 'background',
                        'title'    => __('Inquiry Button background', 'ibid'),
                        'subtitle' => __('Set Inquiry Button background', 'ibid'),
                        'required' => array( 'header_layout', '=', 'eighth_header' ),
                        'default'  =>  '#2695FF',
                        'output'      => array('.header-v8 .menu-inquiry .button')
                    ),
                    array(
                        'id' => 'inquiry_button_text_8',
                        'required' => array( 'header_layout', '=', 'eighth_header' ),
                        'type' => 'text',
                        'title' => __('Inquiry Button Text', 'ibid'),
                        'subtitle' => __('Set Inquiry Button Text', 'ibid'),
                        'default' => 'Inquiry'
                    ),
                    array(
                        'id' => 'inquiry_button_link_8',
                        'required' => array( 'header_layout', '=', 'eighth_header' ),
                        'type' => 'text',
                        'title' => __('Inquiry Button Link', 'ibid'),
                        'subtitle' => __('Set Inquiry Button Link', 'ibid'),
                        'default' => '#'
                    ),
                    array(
                        'id'   => 'mt_divider_ninth_header',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => '<h3>'.esc_html__( 'Header 9 Custom Settings', 'ibid' ).'</h3>',
                        'required' => array( 'header_layout', '=', 'ninth_header' ),
                    ),
                    array(         
                        'id'       => 'inquiry_button_background_9',
                        'type'     => 'background',
                        'title'    => __('Inquiry Button background', 'ibid'),
                        'subtitle' => __('Set Inquiry Button background', 'ibid'),
                        'required' => array( 'header_layout', '=', 'ninth_header' ),
                        'default'  =>  '#2695FF',
                        'output'      => array('.header-v9 .menu-inquiry .button')
                    ),
                    array(
                        'id' => 'inquiry_button_text_9',
                        'required' => array( 'header_layout', '=', 'ninth_header' ),
                        'type' => 'text',
                        'title' => __('Inquiry Button Text', 'ibid'),
                        'subtitle' => __('Set Inquiry Button Text', 'ibid'),
                        'default' => 'Inquiry'
                    ),
                    array(
                        'id' => 'inquiry_button_link_9',
                        'required' => array( 'header_layout', '=', 'ninth_header' ),
                        'type' => 'text',
                        'title' => __('Inquiry Button Link', 'ibid'),
                        'subtitle' => __('Set Inquiry Button Link', 'ibid'),
                        'default' => '#'
                    ),
                    array(
                        'id'       => 'is_nav_sticky',
                        'type'     => 'switch', 
                        'title'    => __('Fixed Navigation menu?', 'ibid'),
                        'subtitle' => __('Enable or disable "fixed positioned navigation menu".', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'is_popup_enabled',
                        'type'     => 'switch', 
                        'title'    => __('Disable Login/Register pop-up?', 'ibid'),
                        'subtitle' => __('If disabled, will redirect to "My Account" generated by WooCommerce.', 'ibid'),
                        'on' => __('Login/Register Popup', 'ibid'),
                        'off' => __('My Account link', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'is_search_enabled',
                        'type'     => 'switch', 
                        'title'    => __('Disable Search Bar', 'ibid'),
                        'subtitle' => __('Enable or disable Search Bar on header (if the variant has it).', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id' => 'ibid_top_header_order_tracking_link',
                        'type' => 'text',
                        'title' => __('Order Traking Url', 'ibid'),
                        'subtitle' => __('A link to a page where the shortcode "[woocommerce_order_tracking]" is added. It will show the order tracking form.', 'ibid'),
                        'default' => ''
                    ),
                    array(
                        'id'       => 'ibid_header_category_menu',
                        'type'     => 'switch', 
                        'title'    => __('Category menu enabled?', 'ibid'),
                        'subtitle' => __('Enable or disable "category navigation menu".', 'ibid'),
                        'default'  => false,
                    ),
                    
                    array(
                        'id'       => 'ibid_header_language_switcher',
                        'type'     => 'switch', 
                        'title'    => __('Language Switcher Dropdown', 'ibid'),
                        'subtitle' => __('Enable or disable "Language Switcher Dropdown".', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'ibid_header_currency_switcher',
                        'type'     => 'switch', 
                        'title'    => __('Currency Switcher Dropdown', 'ibid'),
                        'subtitle' => __('Enable or disable "Currency Switcher Dropdown".', 'ibid'),
                        'default'  => false,
                    ),
                    
                    array(
                        'id'   => 'ibid_header_search_settings',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Search Settings</h3>', 'ibid' )
                    ),
                    array(
                        'id'        => 'search_for',
                        'type'      => 'select',
                        'title'     => __('Search form for:', 'ibid'),
                        'subtitle'  => __('Select the scope of the header search form(Search for PRODUCTS or POSTS).', 'ibid'),
                        'options'   => array(
                                'products'   => 'Products',
                                'posts'   => 'Posts'
                            ),
                        'default'   => 'products',
                    ),
                    array(
                        'id'   => 'ibid_header_logo_settings',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Logo & Favicon Settings</h3>', 'ibid' )
                    ),
                    array(
                        'id' => 'ibid_logo',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo as image', 'ibid'),
                        'compiler' => 'true',
                        'default' => array('url' => get_template_directory_uri().'/images/logo-ibid.png'),
                    ),
                    array(
                        'id'        => 'logo_max_width',
                        'type'      => 'slider',
                        'title'     => __('Logo Max Width', 'ibid'),
                        'subtitle'  => __('Use the slider to increase/decrease max size of the logo.', 'ibid'),
                        'desc'      => __('Min: 1px, max: 500px, step: 1px, default value: 140px', 'ibid'),
                        "default"   => 85,
                        "min"       => 1,
                        "step"      => 1,
                        "max"       => 500,
                        'display_value' => 'label'
                    ),
                    array(
                        'id' => 'ibid_favicon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Favicon url', 'ibid'),
                        'compiler' => 'true',
                        'subtitle' => __('Use the upload button to import media.', 'ibid'),
                        'default' => array('url' => get_template_directory_uri().'/images/favicon-ibid.png'),
                    ),
                    array(
                        'id'   => 'ibid_header_styling_settings',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Header Styling Settings</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_category_background',
                        'type'     => 'color',
                        'title'    => esc_html__('Category 2 Background color', 'ibid'), 
                        'subtitle' => esc_html__('Default: #FFF', 'ibid'),
                        'default'  => '#FFF',
                        'validate' => 'background',
                        'output' => array(
                            'background-color' => '.bot_nav_cat .bot_nav_cat_wrap',
                        )
                    ),
                    array(         
                        'id'       => 'header_top_bar_background',
                        'type'     => 'background',
                        'title'    => __('Header (top small bar) - background', 'ibid'),
                        'subtitle' => __('Header background with image or color.', 'ibid'),
                        'output'      => array('.top-header'),
                        'default'  => array(
                            'background-color' => '#ffffff',
                        )
                    ),
                    array(         
                        'id'       => 'header_main_background',
                        'type'     => 'background',
                        'title'    => __('Header (main-header) - background', 'ibid'),
                        'subtitle' => __('Header background with image or color.', 'ibid'),
                        'output'      => array('.navbar-default'),
                        'default'  => array(
                            'background-color' => '#ffffff',
                        )
                    ),
                    array(
                        'id'   => 'ibid_header_styling_settings',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Top Header Information Settings</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_top_header_info_switcher',
                        'type'     => 'switch', 
                        'title'    => __('Header Discount Block', 'ibid'),
                        'subtitle' => __('Enable or disable the Header Discount Block.', 'ibid'),
                        'default'  => false,
                    ),
                    array(         
                        'id'       => 'discout_header_background',
                        'type'     => 'background',
                        'title'    => __('Header Discount Background', 'ibid'),
                        'subtitle' => __('Header background with image or color.', 'ibid'),
                        'output'      => array('.ibid-top-banner'),
                        'required' => array( 'ibid_top_header_info_switcher', '=', true ),
                        'default'  => array(
                            'background-color' => '#f5f5f5',
                        )
                    ),
                    array(
                        'id' => 'discout_header_text',
                        'type' => 'text',
                        'required' => array( 'ibid_top_header_info_switcher', '=', true ),
                        'title' => __('Header Discount Text', 'ibid'),
                        'default' => 'New Student Deal..'
                    ),
                    array(
                        'id' => 'discout_header_date',
                        'type' => 'date',
                        'required' => array( 'ibid_top_header_info_switcher', '=', true ),
                        'title' => __('Header Discount Expiration Date', 'ibid'),
                        'default' => '22/02/2022'
                    ),
                    array(
                        'id' => 'discout_header_btn_text',
                        'type' => 'text',
                        'required' => array( 'ibid_top_header_info_switcher', '=', true ),
                        'title' => __('Button Text', 'ibid'),
                        'default' => 'Join Now'
                    ),
                    array(
                        'id' => 'discout_header_btn_link',
                        'type' => 'text',
                        'required' => array( 'ibid_top_header_info_switcher', '=', true ),
                        'title' => __('Button Link', 'ibid'),
                        'default' => '#'
                    ),
                    array(
                        'id'       => 'discout_header_btn_color',
                        'type'     => 'color',
                        'required' => array( 'ibid_top_header_info_switcher', '=', true ),
                        'title'    => esc_html__('Button Background', 'ibid'), 
                        'default'  => '#ef6f31',
                        'validate' => 'background',
                        'output' => array(
                            'background-color' => '.ibid-top-banner .button',
                        )
                    )
                )
            );
            $this->sections[] = array(
                'icon' => 'el-icon-circle-arrow-up',
                'subsection' => true,
                'title' => __('Mobile Settings', 'ibid'),
                'fields' => array(
                    array(
                        'id'   => 'ibid_header_mobile_settings',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Mobile Header Settings</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_mobile_burger_select',
                        'type'     => 'select', 
                        'title'    => __('Mobile Burger version', 'ibid'),
                        'subtitle' => __('Choose variant for mobile menu display.', 'ibid'),
                        'options'   => array(
                            'dropdown'   => __( 'Dropdown Menu', 'ibid' ),
                            'sidebar'   => __( 'Sidebar Menu', 'ibid' ),
                        ),
                        'default'   => 'dropdown',
                    ),
                    array(
                        'id'       => 'ibid_header_category_menu_mobile',
                        'type'     => 'switch', 
                        'title'    => __('Category menu on mobile enabled?', 'ibid'),
                        'subtitle' => __('Enable or disable "category navigation menu on mobile".', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'ibid_header_mobile_switcher_top',
                        'type'     => 'switch', 
                        'title'    => __('Icon Groups on Top Header (Mobile only)', 'ibid'),
                        'subtitle' => __('Enable or disable the Icon Group on Top Header.', 'ibid'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'ibid_header_mobile_switcher_top_search',
                        'type'     => 'switch', 
                        'title'    => __('Search Icon Groups on Top Header (Mobile only)', 'ibid'),
                        'subtitle' => __('Enable or disable the Search Icon Group on Top Header.', 'ibid'),
                        'required' => array( 'ibid_header_mobile_switcher_top', '=', true ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'ibid_header_mobile_switcher_top_cart',
                        'type'     => 'switch', 
                        'title'    => __('Cart Icon Groups on Top Header (Mobile only)', 'ibid'),
                        'subtitle' => __('Enable or disable the Cart Icon Group on Top Header.', 'ibid'),
                        'required' => array( 'ibid_header_mobile_switcher_top', '=', true ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'ibid_header_mobile_switcher_top_wishlist',
                        'type'     => 'switch', 
                        'title'    => __('Wishlist Icon Groups on Top Header (Mobile only)', 'ibid'),
                        'subtitle' => __('Enable or disable the Wishlist Icon Group on Top Header.', 'ibid'),
                        'required' => array( 'ibid_header_mobile_switcher_top', '=', true ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'ibid_header_mobile_switcher_top_account',
                        'type'     => 'switch', 
                        'title'    => __('Account Icon Groups on Top Header (Mobile only)', 'ibid'),
                        'subtitle' => __('Enable or disable the My Account Icon Group on Top Header.', 'ibid'),
                        'required' => array( 'ibid_header_mobile_switcher_top', '=', true ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'ibid_header_mobile_switcher_footer',
                        'type'     => 'switch', 
                        'title'    => __('Icon Groups on Sticky Footer (Mobile only)', 'ibid'),
                        'subtitle' => __('Enable or disable the Icon Group on Sticky Footer.', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'ibid_header_mobile_switcher_footer_search',
                        'type'     => 'switch', 
                        'title'    => __('Search Icon Groups on Sticky Footer (Mobile only)', 'ibid'),
                        'subtitle' => __('Enable or disable the Search Icon Group on Sticky Footer.', 'ibid'),
                        'required' => array( 'ibid_header_mobile_switcher_footer', '=', true ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'ibid_header_mobile_switcher_footer_cart',
                        'type'     => 'switch', 
                        'title'    => __('Cart Icon Groups on Sticky Footer (Mobile only)', 'ibid'),
                        'subtitle' => __('Enable or disable the Cart Icon Group on Sticky Footer.', 'ibid'),
                        'required' => array( 'ibid_header_mobile_switcher_footer', '=', true ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'ibid_header_mobile_switcher_footer_wishlist',
                        'type'     => 'switch', 
                        'title'    => __('Wishlist Icon Groups on Sticky Footer (Mobile only)', 'ibid'),
                        'subtitle' => __('Enable or disable the Wishlist Icon Group on Sticky Footer.', 'ibid'),
                        'required' => array( 'ibid_header_mobile_switcher_footer', '=', true ),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'ibid_header_mobile_switcher_footer_account',
                        'type'     => 'switch', 
                        'title'    => __('Account Icon Groups on Sticky Footer (Mobile only)', 'ibid'),
                        'subtitle' => __('Enable or disable the Account Icon Group on Sticky Footer.', 'ibid'),
                        'required' => array( 'ibid_header_mobile_switcher_footer', '=', true ),
                        'default'  => true,
                    ),
                ),
            );
            # General Settings
            $this->sections[] = array(
                'icon' => 'el-icon-arrow-down',
                'title' => __('Footer Settings', 'ibid'),
            );
            $this->sections[] = array(
                'icon' => 'el-icon-circle-arrow-up',
                'subsection' => true,
                'title' => __('Footer Top', 'ibid'),
                'fields' => array(
                    array(
                        'id'       => 'ibid-enable-footer-top',
                        'type'     => 'switch', 
                        'title'    => __('Footer Top', 'ibid'),
                        'subtitle' => __('Enable or disable footer top', 'ibid'),
                        'default'  => false,
                    ),
                    array(         
                        'id'       => 'footer_top_background',
                        'type'     => 'background',
                        'title'    => __('Footer (top) - background', 'ibid'),
                        'subtitle' => __('Footer background with image or color.', 'ibid'),
                        'output'      => array('footer,.widget_ibid_social_icons a'),
                        'default'  => array(
                            'background-color' => '#fff',
                        ),
                        'required' => array( 'ibid-enable-footer-top', '=', 'true' ),
                    ),
                    array(         
                        'id'       => 'footer_top_color_text',
                        'type'     => 'color',
                        'title'    => __('Footer (top) - color text', 'ibid'),
                        'subtitle' => __('Footer text color.', 'ibid'),
                        'default'  =>  '#fff',
                        'validate' => 'color',
                        'required' => array( 'ibid-enable-footer-top', '=', 'true' ),

                    ),
                    array(
                        'id'   => 'ibid_footer_row1',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Footer Widgets (Row #1)</h3>', 'ibid' ),
                        
                    ),
                    array(
                        'id'       => 'ibid-enable-footer-widgets',
                        'type'     => 'switch', 
                        'title'    => __('Status', 'ibid'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'ibid_number_of_footer_columns',
                        'type'     => 'select',
                        'title'    => __('Footer Widgets Row #1 - Number of columns', 'ibid'), 
                        'options'  => array(
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6'
                        ),
                        'default'  => '4',
                        'required' => array('ibid-enable-footer-widgets','equals',true),
                    ),
                    array(
                        'id'             => 'footer_row_1_spacing',
                        'type'           => 'spacing',
                        'output'         => array('.container.footer-top, .prefooter .container'),
                        'mode'           => 'padding',
                        'units'          => array('px'),
                        'units_extended' => 'false',
                        'title'          => esc_html__('Footer Widgets Row #1 - Padding', 'ibid'),
                        'default'            => array(
                            'padding-top'     => '0px', 
                            'padding-bottom'  => '0px', 
                            'units'          => 'px', 
                        ),
                        'required' => array('ibid-enable-footer-widgets','equals',true),
                    ),
                    array(
                        'id'   => 'ibid_footer_row2',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Footer Widgets (Row #2)</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid-enable-footer-widgets-row2',
                        'type'     => 'switch', 
                        'title'    => __('Status', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'ibid_number_of_footer_columns_row2',
                        'type'     => 'select',
                        'title'    => __('Footer Widgets Row #2 - Number of columns', 'ibid'), 
                        'options'  => array(
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6'
                        ),
                        'default'  => '4',
                        'required' => array('ibid-enable-footer-widgets-row2','equals',true),
                    ),
                    array(
                        'id'             => 'footer_row_2_spacing',
                        'type'           => 'spacing',
                        'output'         => array('.footer-top .footer-row-2'),
                        'mode'           => 'padding',
                        'units'          => array('px'),
                        'units_extended' => 'false',
                        'title'          => esc_html__('Footer Widgets Row #2 - Padding', 'ibid'),
                        'default'            => array(
                            'padding-top'     => '0px', 
                            'padding-bottom'  => '0px', 
                            'units'          => 'px', 
                        ),
                        'required' => array('ibid-enable-footer-widgets-row2','equals',true),
                    ),

                    array(
                        'id'   => 'ibid_footer_row3',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Footer Widgets (Row #3)</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid-enable-footer-widgets-row3',
                        'type'     => 'switch', 
                        'title'    => __('Status', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'ibid_number_of_footer_columns_row3',
                        'type'     => 'select',
                        'title'    => __('Footer Widgets Row #3 - Number of columns', 'ibid'), 
                        'options'  => array(
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6'
                        ),
                        'default'  => '4',
                        'required' => array('ibid-enable-footer-widgets-row3','equals',true),
                    ),
                    array(
                        'id'             => 'footer_row_3_spacing',
                        'type'           => 'spacing',
                        'output'         => array('.footer-top .footer-row-3'),
                        'mode'           => 'padding',
                        'units'          => array('px'),
                        'units_extended' => 'false',
                        'title'          => esc_html__('Footer Widgets Row #3 - Padding', 'ibid'),
                        'default'            => array(
                            'padding-top'     => '0px', 
                            'padding-bottom'  => '0px', 
                            'units'          => 'px', 
                        ),
                        'required' => array('ibid-enable-footer-widgets-row3','equals',true),
                    ),
                )
            );

            $this->sections[] = array(
                'icon' => 'el-icon-circle-arrow-down',
                'subsection' => true,
                'title' => __('Footer Bottom (Copyright)', 'ibid'),
                'fields' => array(
                    array(
                        'id' => 'ibid_footer_text_left',
                        'type' => 'editor',
                        'title' => __('Footer Text Left', 'ibid'),
                        'default' => 'Copyright by ModelTheme. All Rights Reserved.',
                    ),
                    array(
                        'id' => 'ibid_footer_text_right',
                        'type' => 'editor',
                        'title' => __('Footer Text Right', 'ibid'),
                        'default' => 'Elite Author on ThemeForest.',
                    ),
                    array(
                        'id' => 'ibid_card_icons1',
                        'type' => 'background',
                        'title' => __('Footer card icons', 'ibid'),
                        'compiler' => 'true',
                        'background-color' => 'false',
                        'background-repeat' => 'false',
                        'background-size' => 'false',
                        'background-attachment' => 'false',
                        'background-position' => 'false',
                        'output'      => array('.card-icons1'),
                        'default' => '',
                    ),
                    array(         
                        'id'       => 'footer_bottom_background',
                        'type'     => 'background',
                        'title'    => __('Footer (bottom) - background', 'ibid'),
                        'subtitle' => __('Footer background with image or color.', 'ibid'),
                        'output'      => array('footer .footer'),
                        'default'  => array(
                            'background-color' => '#f8f8f8',
                        )
                    ),
                    array(         
                        'id'       => 'footer_bottom_color_text',
                        'type'     => 'color',
                        'title'    => __('Footer (bottom) - texts color', 'ibid'),
                        'subtitle' => __('Footer text color.', 'ibid'),
                        'default'  =>  '#343E47',
                        'validate' => 'color'
                    ),
                    array(         
                        'id'       => 'footer_bottom_color_links',
                        'type'     => 'color',
                        'title'    => __('Footer (bottom) - links color', 'ibid'),
                        'subtitle' => __('Footer links color.', 'ibid'),
                        'default'  =>  '#666666',
                        'validate' => 'color'
                    ),

                )
            );

            $this->sections[] = array(
                'icon' => 'el-icon-caret-up',
                'subsection' => true,
                'title' => __('Back to Top', 'ibid'),
                'fields' => array(
                    array(
                        'id'   => 'ibid_back_to_top',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Back to Top Settings</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_backtotop_status',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Back to Top Button Status', 'ibid'),
                        'subtitle' => esc_html__('Enable or disable "Back to Top Button"', 'ibid'),
                        'default'  => true,
                    ),
                    array(         
                        'id'       => 'ibid_backtotop_bg_color',
                        'type'     => 'background',
                        'title'    => esc_html__('Back to Top Button Status Backgrond', 'ibid'), 
                        'subtitle' => esc_html__('Default: #2695FF', 'ibid'),
                        'default'  => array(
                            'background-color' => '#2695FF',
                            'background-repeat' => 'no-repeat',
                            'background-position' => 'center center',
                            'background-image' => get_template_directory_uri().'/images/mt-to-top-arrow.svg',
                        ),
                        'required' => array( 'ibid_backtotop_status', '=', 'true' ),
                    ),

                )
            );


            # Section #4: Contact Settings

            $this->sections[] = array(
                'icon' => 'el-icon-map-marker-alt',
                'title' => __('Contact Settings', 'ibid'),
                'fields' => array(
                    array(
                        'id' => 'ibid_contact_phone',
                        'type' => 'text',
                        'title' => __('Phone Number', 'ibid'),
                        'subtitle' => __('Contact phone number displayed on the contact us page.', 'ibid'),
                        'validate_callback' => 'redux_validate_callback_function',
                        'default' => ''
                    ),
                    array(
                        'id' => 'ibid_contact_email',
                        'type' => 'text',
                        'title' => __('Email', 'ibid'),
                        'subtitle' => __('Contact email displayed on the contact us page., additional info is good in here.', 'ibid'),
                        'validate' => 'email',
                        'msg' => 'custom error message',
                        'default' => ''
                    ),
                    array(
                        'id' => 'ibid_work_program',
                        'type' => 'text',
                        'title' => __('Program', 'ibid'),
                        'subtitle' => __('Enter your work program', 'ibid'),
                        'default' => ''
                    ),
                    array(
                        'id' => 'ibid_contact_address',
                        'type' => 'text',
                        'title' => __('Address', 'ibid'),
                        'subtitle' => __('Enter your contact address', 'ibid'),
                        'default' => ''
                    ),
                )
            );


            $this->sections[] = array(
                'icon' => 'el-icon-comment',
                'title' => __('Blog Settings', 'ibid'),
                'fields' => array(
                    array(
                        'id'   => 'ibid_divider_blog_archive_layout',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Blog Archive Layout</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_blog_layout',
                        'type'     => 'image_select',
                        'title'    => __( 'Blog List Layout', 'ibid' ),
                        'subtitle' => __( 'Select Blog List layout.', 'ibid' ),
                        'options'  => array(
                            'ibid_blog_left_sidebar' => array(
                                'alt' => '2 Columns - Left sidebar',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                            ),
                            'ibid_blog_fullwidth' => array(
                                'alt' => '1 Column - Full width',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                            ),
                            'ibid_blog_right_sidebar' => array(
                                'alt' => '2 Columns - Right sidebar',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                            )
                        ),
                        'default'  => 'ibid_blog_right_sidebar'
                    ),
                    array(
                        'id'       => 'ibid_blog_layout_sidebar',
                        'type'     => 'select',
                        'data'     => 'sidebars',
                        'title'    => __( 'Blog List Sidebar', 'ibid' ),
                        'subtitle' => __( 'Select Blog List Sidebar.', 'ibid' ),
                        'default'   => 'sidebar-1',
                        'required' => array('ibid_blog_layout', '!=', 'ibid_blog_fullwidth'),
                    ),
                    array(
                        'id'   => 'ibid_divider_blog_single_layout',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Blog Single Article Layout</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_single_blog_layout',
                        'type'     => 'image_select',
                        'title'    => __( 'Single Blog Layout', 'ibid' ),
                        'subtitle' => __( 'Select Single Blog Layout.', 'ibid' ),
                        'options'  => array(
                            'ibid_blog_left_sidebar' => array(
                                'alt' => '2 Columns - Left sidebar',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                            ),
                            'ibid_blog_fullwidth' => array(
                                'alt' => '1 Column - Full width',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                            ),
                            'ibid_blog_right_sidebar' => array(
                                'alt' => '2 Columns - Right sidebar',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                            )
                        ),
                        'default'  => 'ibid_blog_right_sidebar',
                        ),
                    array(
                        'id'       => 'ibid_single_blog_sidebar',
                        'type'     => 'select',
                        'data'     => 'sidebars',
                        'title'    => __( 'Single Blog Sidebar', 'ibid' ),
                        'subtitle' => __( 'Select Single Blog Sidebar.', 'ibid' ),
                        'default'   => 'sidebar-1',
                        'required' => array('ibid_single_blog_layout', '!=', 'ibid_blog_fullwidth'),
                    ),

                    array(
                        'id'   => 'ibid_divider_blog_single_tyography',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Blog Single Article Typography</h3>', 'ibid' )
                    ),
                    array(
                        'id'          => 'ibid-blog-post-typography',
                        'type'        => 'typography', 
                        'title'       => esc_html__('Blog Post Font family', 'ibid'),
                        'google'      => true, 
                        'font-backup' => true,
                        'color'       => true,
                        'text-align'  => false,
                        'letter-spacing'  => false,
                        'line-height'  => true,
                        'font-weight'  => true,
                        'font-size'   => true,
                        'font-style'  => false,
                        'subsets'     => false,
                        'output'      => array('p'),
                        'units'       =>'px',
                        'default'     => array(
                            'font-family' => 'Montserrat', 
                            'font-size' => '16px', 
                            'line-height' => '24px', 
                            'font-weight' => '300', 
                            'color' => '#606060', 
                            'google'      => true
                        ),
                    ),
                    array(
                        'id'       => 'post_featured_image',
                        'type'     => 'switch', 
                        'title'    => __('Enable/disable featured image for single post.', 'ibid'),
                        'subtitle' => __('Show or Hide the featured image from blog post page.".', 'ibid'),
                        'default'  => true,
                    ),
                )
            );


            # Tab: Shop Settings
            $this->sections[] = array(
                'icon' => 'el-icon-shopping-cart-sign',
                'title' => __('Shop & Auctions Settings', 'ibid'),
            );
            // Subtab: Shop Archives
            $this->sections[] = array(
                'subsection' => true,
                'icon' => 'el-icon-th',
                'title' => __('Shop Archives', 'ibid'),
                'fields' => array(
                    array(
                        'id'   => 'ibid_shop_archive',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Shop Archives</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_shop_layout',
                        'type'     => 'image_select',
                        'title'    => __( 'Shop List Products Layout', 'ibid' ),
                        'subtitle' => __( 'Select Shop List Products layout.', 'ibid' ),
                        'options'  => array(
                            'ibid_shop_left_sidebar' => array(
                                'alt' => '2 Columns - Left sidebar',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                            ),
                            'ibid_shop_fullwidth' => array(
                                'alt' => '1 Column - Full width',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                            ),
                            'ibid_shop_right_sidebar' => array(
                                'alt' => '2 Columns - Right sidebar',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                            )
                        ),
                        'default'  => 'ibid_shop_left_sidebar'
                    ),

                    array(
                        'id'       => 'ibid_shop_grid_list_switcher',
                        'type'     => 'select', 
                        'title'    => __('Grid / List default', 'ibid'),
                        'subtitle' => __('Choose which format products should display in by default.', 'ibid'),
                        'options'   => array(
                            'grid'   => __( 'Grid', 'ibid' ),
                            'list'   => __( 'List', 'ibid' ),
                        ),
                        'default'   => 'grid',
                    ),

                    array(
                        'id'       => 'ibid_shop_layout_sidebar',
                        'type'     => 'select',
                        'data'     => 'sidebars',
                        'title'    => __( 'Shop List Sidebar', 'ibid' ),
                        'subtitle' => __( 'Select Shop List Sidebar.', 'ibid' ),
                        'default'   => 'woocommerce',
                        'required' => array('ibid_shop_layout', '!=', 'ibid_shop_fullwidth'),
                    ),
                    array(
                        'id'        => 'ibid-shop-columns',
                        'type'      => 'select',
                        'title'     => __('Number of shop columns', 'ibid'),
                        'subtitle'  => __('Number of products per column to show on shop list template.', 'ibid'),
                        'options'   => array(
                            '2'   => '2 columns',
                            '3'   => '3 columns',
                            '4'   => '4 columns'
                        ),
                        'default'   => '3',
                    ),
                    array(
                        'id'       => 'ibid-archive-secondary-image-on-hover',
                        'type'     => 'switch', 
                        'title'    => __('Secondary Image on Hover', 'ibid'),
                        'subtitle' => __('Enable or disable the Secondary Image on Hover(The 2nd image is actually the first image from the media gallery of the product)', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'ibid_archive_background',
                        'type'     => 'background',
                        'title'    => esc_html__('Archive Page Background', 'ibid'), 
                        'subtitle' => esc_html__('Default: #ffffff', 'ibid'),
                        'default'  => '#ffffff',
                        'validate' => 'background',
                        'output' => array(
                            'color' => 'body.archive.woocommerce',
                        )
                    ),
                    array(
                        'id'       => 'ibid-countdown-status',
                        'type'     => 'switch', 
                        'title'    => __('Countdown date Status', 'ibid'),
                        'subtitle' => __('Enable the Countdown date format', 'ibid'),
                        'default'  => true,
                    ),
                    array(
                        'id'        => 'ibid-archive-countdown-date-format',
                        'type'      => 'radio',
                        'title'     => __('Products Grid - Countdown date format', 'ibid'),
                        'subtitle'  => __('Set the Countdown date format for grids only', 'ibid'),
                        'options'   => array(
                            'YOWDHMS'   => 'Years|Months|Weeks|Days|Hours|Minutes|Seconds',
                            'OWDHMS'   => 'Months|Weeks|Days|Hours|Minutes|Seconds',
                            'WDHMS'   => 'Weeks|Days|Hours|Minutes|Seconds',
                            'DHMS'   => 'Days|Hours|Minutes|Seconds',
                            'HMS'   => 'Hours|Minutes|Seconds',
                            'MS'   => 'Minutes|Seconds',
                        ),
                        'default'   => 'DHMS',
                    ),

                    array(
                        'id'   => 'ibid_shop_archive_mobile',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Mobile Settings</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_shop_quickview_mobile',
                        'type'     => 'switch', 
                        'title'    => __('Quick View button on mobile', 'ibid'),
                        'subtitle' => __('Enable or disable Quick View button on mobile', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'ibid_shop_wishlist_mobile',
                        'type'     => 'switch', 
                        'title'    => __('Wishlist button on mobile', 'ibid'),
                        'subtitle' => __('Enable or disable Wishlist button on mobile', 'ibid'),
                        'default'  => false,
                    ),
                )
            );

            // Subtab: Product Single
            $this->sections[] = array(
                'subsection' => true,
                'icon' => 'el-icon-shopping-cart-sign',
                'title' => __('Product Single', 'ibid'),
                'fields' => array(
                    array(
                        'id'   => 'ibid_shop_single_product',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Product Page</h3>', 'ibid' )
                    ),
                    array(
                        'id'        => 'ibid_layout_version',
                        'type'      => 'select',
                        'title'     => __('Select Single Product layout', 'ibid'),
                        'subtitle'  => __('Unique layout to show on single product template.', 'ibid'),
                        'options'   => array(
                            ''   => 'Override default',
                            'main'      => 'Style 1',
                            'second'    => 'Style 2',
                            'third'     => 'Style 3',
                            'project'   => 'Single Project Page'
                        ),
                        'default'   => 'main'
                    ),
                    array(
                        'id'       => 'ibid-enable-general-info',
                        'type'     => 'switch', 
                        'title'    => __('General Information', 'ibid'),
                        'subtitle' => __('Enable or disable General Information on single product', 'ibid'),
                        'required' => array('ibid_layout_version', '=', 'third'),
                        'default'  => false,
                    ),
                    array(
                        'id' => 'ibid-enable-general-img1',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('First Icon', 'ibid') ,
                        'compiler' => 'true',
                        'required' => array('ibid-enable-general-info', '=', true),
                    ),
                    array(
                        'id' => 'ibid-enable-general-desc1',
                        'type' => 'editor',
                        'title' => esc_html__('First Block', 'ibid') ,
                        'default' => '<span>'.esc_html__('Lorem ipsum dolor sit amet, consectetur adipisc elit. Duis sollicitudin diam in diamui varius, sed anim.', 'ibid').'</span>',
                        'required' => array('ibid-enable-general-info', '=', true),
                    ),
                    array(
                        'id' => 'ibid-enable-general-img2',
                        'type' => 'media',
                        'url' => true,
                        'title' => esc_html__('Second Icon', 'ibid') ,
                        'compiler' => 'true',
                        'required' => array('ibid-enable-general-info', '=', true),
                    ),
                    array(
                        'id' => 'ibid-enable-general-desc2',
                        'type' => 'editor',
                        'title' => esc_html__('Second Block', 'ibid') ,
                        'default' => '<span>'.esc_html__('Lorem ipsum dolor sit amet, consectetur adipisc elit. Duis sollicitudin diam in diamui varius, sed anim.', 'ibid').'</span>',
                        'required' => array('ibid-enable-general-info', '=', true),
                    ),
                    array(
                        'id'       => 'ibid_project_color',
                        'type'     => 'background',
                        'title'    => esc_html__('Project Breadcrumbs background', 'ibid'), 
                        'subtitle' => esc_html__('Available only for Single Project Page', 'ibid'),
                        'default'  => '#171E2C',
                        'validate' => 'background',
                        'required' => array( 'ibid_layout_version', '=', 'project' ),
                        'output' => array(
                            'color' => '.single-project .ibid-breadcrumbs,
                                        .single-project .ibid-breadcrumbs-b',
                        )
                    ),
                    array(
                        'id'       => 'ibid_project_color_text',
                        'type'     => 'color',
                        'title'    => esc_html__('Project Breadcrumbs color text', 'ibid'), 
                        'subtitle' => esc_html__('Available only for Single Project Page', 'ibid'),
                        'default'  => '#fff',
                        'validate' => 'color',
                        'required' => array( 'ibid_layout_version', '=', 'project' ),
                        'output' => array(
                            'color' => '.single-project .ibid-breadcrumbs h1, 
                                        .single-project .ibid-breadcrumbs .mt-view-count,
                                        .single-project .description p,
                                        .single-project .project-tabs li a',
                        )
                    ),
                    array(
                        'id'       => 'ibid_project_image',
                        'type'     => 'switch', 
                        'title'    => __('Enable Featured Image?', 'ibid'),
                        'subtitle' => __('Enable or disable Featured Image on single product', 'ibid'),
                        'required' => array( 'ibid_layout_version', '=', 'project' ),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'ibid_view_counter',
                        'type'     => 'switch', 
                        'title'    => __('Enable Views Counter?', 'ibid'),
                        'subtitle' => __('Enable or disable Views Counter on single product', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'ibid_single_product_layout',
                        'type'     => 'image_select',
                        'title'    => __( 'Single Product Layout', 'ibid' ),
                        'subtitle' => __( 'Select Single Product Layout.', 'ibid' ),
                        'options'  => array(
                            'ibid_shop_left_sidebar' => array(
                                'alt' => '2 Columns - Left sidebar',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                            ),
                            'ibid_shop_fullwidth' => array(
                                'alt' => '1 Column - Full width',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                            ),
                            'ibid_shop_right_sidebar' => array(
                                'alt' => '2 Columns - Right sidebar',
                                'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                            )
                        ),
                        'default'  => 'ibid_shop_fullwidth'
                    ),
                    array(
                        'id'       => 'ibid_single_shop_sidebar',
                        'type'     => 'select',
                        'data'     => 'sidebars',
                        'title'    => __( 'Shop Single Product Sidebar', 'ibid' ),
                        'subtitle' => __( 'Select Shop List Sidebar.', 'ibid' ),
                        'default'   => 'sidebar-1',
                        'required' => array('ibid_single_product_layout', '!=', 'ibid_shop_fullwidth'),
                    ),
                    array(
                        'id'       => 'ibid-enable-related-products',
                        'type'     => 'switch', 
                        'title'    => __('Related Products', 'ibid'),
                        'subtitle' => __('Enable or disable related products on single product', 'ibid'),
                        'default'  => true,
                    ),
                    array(
                        'id'        => 'ibid-related-products-number',
                        'type'      => 'select',
                        'title'     => __('Number of related products', 'ibid'),
                        'subtitle'  => __('Number of related products to show on single product template.', 'ibid'),
                        'options'   => array(
                            '4'   => '4',
                            '8'   => '8',
                            '12'   => '12'
                        ),
                        'default'   => '4',
                        'required' => array('ibid-enable-related-products', '=', true),
                    ),
                    array(
                        'id'        => 'ibid_single_product_add_to_cart_btn_style',
                        'type'      => 'radio',
                        'title'     => __('Add To Cart - Button Style', 'ibid'),
                        'subtitle'  => __('Set the style of Add to cart Button (Not for auctions - only for the ther product types)', 'ibid'),
                        'options'   => array(
                            'style_icon'   => __('Bid/Purchase Icon', 'ibid'),
                            'style_text'   => __('Button with Text (Bid/Purchase)', 'ibid')
                        ),
                        'default'   => 'style_text',
                    ),
                    array(
                        'id'       => 'ibid_auction_attachment_link',
                        'type'     => 'switch', 
                        'title'    => __('Attachment field (link)', 'ibid'),
                        'subtitle' => __('Enable or disable the Attachment field (link) - only for auctions', 'ibid'),
                        'default'  => false,
                    ),

                    array(
                        'id'   => 'ibid_single_auction',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Auction Product Type - "WooCommerce Simple Auctions"</h3>', 'ibid' ),
                        'subtitle'  => __('Set the style of Add to cart Button (Not for auctions - only for the ther product types)', 'ibid'),
                    ),
                    array(
                        'id'       => 'ibid_bid_message',
                        'type'     => 'switch', 
                        'title'    => __('Enable Bid Message?', 'ibid'),
                        'subtitle' => __('NOTE: If MT Freelancer plugin is enabled, it will overwrite this option and always be enabled.', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'ibid_extend_bid_time',
                        'type'     => 'switch', 
                        'title'    => __('Extend bidding end time', 'ibid'),
                        'subtitle' => __('Enable or disable extend bidding end time on auction', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'       => 'ibid_extend_bid_time_nr',
                        'type'     => 'spinner',
                        'min'      => '1',
                        'step'     => '1',
                        'max'      => '6000', 
                        'default'   => '5',
                        'title'    => __('Extend with', 'ibid'),
                        'required' => array('ibid_extend_bid_time', '=', true),
                    ),
                    array(
                        'id'        => 'ibid_extend_bid_time_type',
                        'type'      => 'radio',
                        'required' => array('ibid_extend_bid_time', '=', true),
                        'title'     => __('What', 'ibid'),
                        'options'   => array(
                            'S'   => __('Seconds', 'ibid'),
                            'M'   => __('Minutes', 'ibid'),
                            'H'   => __('Hours', 'ibid'),
                        ),
                        'default'   => 'M',
                    ),
                    array(
                        'id'       => 'ibid_extend_bid_in_last_time',
                        'type'     => 'spinner',
                        'min'      => '1',
                        'step'     => '1',
                        'max'      => '6000', 
                        'default'   => '5',
                        'title'    => __('If the auction has less than', 'ibid'),
                        'required' => array('ibid_extend_bid_time', '=', true),
                    ),
                    array(
                        'id'        => 'ibid_extend_bid_in_last_time_type',
                        'type'      => 'radio',
                        'required' => array('ibid_extend_bid_time', '=', true),
                        'title'     => __('What', 'ibid'),
                        'options'   => array(
                            'seconds'   => __('Seconds', 'ibid'),
                            'minutes'   => __('Minutes', 'ibid'),
                            'hours'   => __('Hours', 'ibid'),
                        ),
                        'default'   => 'minutes',
                    ),
                    array(
                        'id'        => 'ibid_auction_qty_box_width',
                        'type'      => 'slider',
                        'title'     => __('Quantity Box Width (single auction)', 'ibid'),
                        'subtitle'  => __('Use the slider to increase/decrease max size of the logo.', 'ibid'),
                        'desc'      => __('Min: 1px, max: 500px, step: 1px, default value: 80px', 'ibid'),
                        "default"   => 80,
                        "min"       => 1,
                        "step"      => 1,
                        "max"       => 500,
                        'display_value' => 'label'
                    ),
                    array(
                        'id'        => 'ibid_single_product_auction_history_username_format',
                        'type'      => 'radio',
                        'title'     => __('Auction History tab - Username format', 'ibid'),
                        'subtitle'  => __('Set the user/bidder format in the Auction History tab', 'ibid'),
                        'options'   => array(
                            'original'   => __('Original - "username"', 'ibid'),
                            'hide_username'   => __('Hide Username - "u**********e"', 'ibid'),
                            'show_message'   => __('Show "Bidder Name Hidden" instead of username', 'ibid'),
                            'user_id'   => __('Show Bidding User ID "#USER_ID" instead of username', 'ibid'),
                            'hidden'   => __('Completely Hidden (Nothing will be shown)', 'ibid'),
                        ),
                        'default'   => 'original',
                    ),
                )
            );

            // Subtab: Vendor Options
            $this->sections[] = array(
                'subsection' => true,
                'icon' => 'el-icon-group-alt',
                'title' => __('Vendor Options', 'ibid'),
                'fields' => array(
                    array(
                        'id'    => 'ibid_vendor_auction_types',
                        'type'  => 'info',
                        'style' => 'success',
                        'title' => __('Note:', 'ibid'),
                        'icon'  => 'el-icon-info-sign',
                        'desc'  => __( 'The following options will only be applied to the <a target="_blank" href="https://i.imgur.com/6JZGI3C.png">Blue Box auction settings</a> (not WCFM Tab (when using WCFM Ultimate), Dokan PRO options)', 'ibid'),
                    ),
                    array(
                        'id'       => 'ibid_vendor_auction_normal',
                        'type'     => 'switch', 
                        'title'    => __('Auction type "Normal"', 'ibid'),
                        'subtitle' => __('Enable or disable Auction type "Normal"', 'ibid'),
                        'default'  => true,
                    ),
                    array(
                        'id'       => 'ibid_vendor_auction_reverse',
                        'type'     => 'switch', 
                        'title'    => __('Auction type "Reverse"', 'ibid'),
                        'subtitle' => __('Enable or disable Auction type "Reverse"', 'ibid'),
                        'default'  => true,
                    ),
                )
            );

            // Subtab: Fundraising Mode
            $this->sections[] = array(
                'subsection' => true,
                'icon' => 'el-icon-heart-empty',
                'title' => __('Fundraising Mode', 'ibid'),
                'fields' => array(
                    array(
                        'id'   => 'ibid_fundraising',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Fundraising Mode</h3>', 'ibid' )
                    ),
                    array(
                        'id'       => 'ibid_enable_fundraising',
                        'type'     => 'select', 
                        'title'    => __('Enable Fundraising Mode', 'ibid'),
                        'subtitle' => __('Enable or disable to use the Fundraising functionalities on your website', 'ibid'),
                        'options'   => array(
                            'enable'   => 'Enable',
                            'disable'   => 'Disable'
                        ),
                        'default'   => 'disable',
                    ),
                    array(
                        'id'    => 'ibid_info_fundraising',
                        'type'  => 'info',
                        'style' => 'success',
                        'title' => __('Note:', 'ibid'),
                        'icon'  => 'el-icon-info-sign',
                        'desc'  => __( 'This dropdown will enable of disable the <strong>Fundraising Causes</strong> Custom post type in order to be used for crowdfunding on auctions or shop.', 'ibid'),
                    ),
                    array(
                        'id'       => 'ibid_fundraising_in_archives',
                        'type'     => 'switch', 
                        'title'    => __('Show Supporting: "Cause-Name" Below product title in product archives list', 'ibid'),
                        'subtitle' => __('This option will list a notice in all product grids (when the fundraising feature is enabled).', 'ibid'),
                        'default'  => false,
                        'required' => array( 'ibid_enable_fundraising', '=', 'enable' ),
                    ),
                    array(
                        'id'   => 'ibid_divider_nav_submenu',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Fundraising progress bar</h3>', 'ibid' ),
                        'required' => array( 'ibid_enable_fundraising', '=', 'enable' ),
                    ),
                    array(
                        'id'       => 'ibid_progress-bar',
                        'type'     => 'color',
                        'title'    => esc_html__('Fundraising Progress Bar Background Color', 'ibid'), 
                        'subtitle' => esc_html__('Default: #2c3e50', 'ibid'),
                        'default'  => '#2c3e50',
                        'validate' => 'color',
                        'output' => array(
                            'color' => '.progress-bar',
                        ),
                        'required' => array( 'ibid_enable_fundraising', '=', 'enable' ),
                    ),
                    array(
                        'id'       => 'ibid_progress-bar-success',
                        'type'     => 'color',
                        'title'    => esc_html__('Fundraising Progress Bar Background Color - Success', 'ibid'), 
                        'subtitle' => esc_html__('Default: #2ecc71', 'ibid'),
                        'default'  => '#2ecc71',
                        'validate' => 'color',
                        'output' => array(
                            'color' => '.progress-bar-success',
                        ),
                        'required' => array( 'ibid_enable_fundraising', '=', 'enable' ),
                    ),
                    array(
                        'id'       => 'ibid_progress-bar-info',
                        'type'     => 'color',
                        'title'    => esc_html__('Fundraising Progress Bar Background Color - Info', 'ibid'), 
                        'subtitle' => esc_html__('Default: #3498db', 'ibid'),
                        'default'  => '#3498db',
                        'validate' => 'color',
                        'output' => array(
                            'color' => '.progress-bar-info',
                        ),
                        'required' => array( 'ibid_enable_fundraising', '=', 'enable' ),
                    ),
                    array(
                        'id'       => 'ibid_progress-bar-warning',
                        'type'     => 'color',
                        'title'    => esc_html__('Fundraising Progress Bar Background Color - Warning', 'ibid'), 
                        'subtitle' => esc_html__('Default: #f39c12', 'ibid'),
                        'default'  => '#f39c12',
                        'validate' => 'color',
                        'output' => array(
                            'color' => '.progress-bar-warning',
                        ),
                        'required' => array( 'ibid_enable_fundraising', '=', 'enable' ),
                    ),
                    array(
                        'id'       => 'ibid_progress-bar-danger',
                        'type'     => 'color',
                        'title'    => esc_html__('Fundraising Progress Bar Background Color - Danger', 'ibid'), 
                        'subtitle' => esc_html__('Default: #f02222', 'ibid'),
                        'default'  => '#f02222',
                        'validate' => 'color',
                        'output' => array(
                            'color' => '.progress-bar-danger',
                        ),
                        'required' => array( 'ibid_enable_fundraising', '=', 'enable' ),
                    ),
                )
            );

            # Section: 404 Page Settings
            $this->sections[] = array(
                'icon' => 'el-icon-error',
                'title' => __('404 Page Settings', 'ibid'),
                'fields' => array(
                    array(
                        'id' => 'img_404',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Image for 404 Not found page', 'ibid'),
                        'compiler' => 'true',
                        'default' => array('url' => get_template_directory_uri().'/images/404.png'),
                    )
                )
            );

            # Section: Popup Settings
            $this->sections[] = array(
                'icon' => 'el-fullscreen',
                'title' => __('Popup Settings', 'ibid'),
                'fields' => array(
                    array(
                        'id'       => 'ibid-enable-popup',
                        'type'     => 'switch', 
                        'title'    => __('Popup', 'ibid'),
                        'subtitle' => __('Enable or disable popup', 'ibid'),
                        'default'  => false,
                    ),
                    array(
                        'id'   => 'ibid_popup_design',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Popup Design</h3>', 'ibid' ),
                        'required' => array( 'ibid-enable-popup', '=', true ),
                    ),
                    array(
                        'id' => 'ibid-enable-popup-img',
                        'type' => 'media',
                        'url' => true,
                        'title'    => __('Popup Image', 'ibid'),
                        'subtitle' => __('Set your popup image', 'ibid'),
                        'compiler' => 'true',
                        'required' => array( 'ibid-enable-popup', '=', true ),
                    ),
                    array(
                        'id' => 'ibid-enable-popup-company',
                        'type' => 'media',
                        'url' => true,
                        'title'    => __('Your Company Logo', 'ibid'),
                        'subtitle' => __('Set your company logo', 'ibid'),
                        'compiler' => 'true',
                        'default' => array('url' => get_template_directory_uri().'/images/logo-ibid.png'),
                        'required' => array( 'ibid-enable-popup', '=', true ),
                    ),
                    array(
                        'id' => 'ibid-enable-popup-desc',
                        'type' => 'text',
                        'title' => __('Subtitle Description', 'ibid'),
                        'subtitle' => __('Write a few words as description', 'ibid'),
                        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet sagittis sem, at sollicitudin lectus.',
                        'required' => array( 'ibid-enable-popup', '=', true ),
                    ),
                    array(
                        'id' => 'ibid-enable-popup-form',
                        'type' => 'editor',
                        'title' => __('Custom Form Shortcode', 'ibid'),
                        'subtitle' => __('Write a few words as description', 'ibid'),
                         'args'   => array(
                            'teeny'            => true,
                            'textarea_rows'    => 10
                        ),
                        'required' => array( 'ibid-enable-popup', '=', true ),
                    ),
                    array(
                        'id'       => 'ibid-enable-popup-additional',
                        'type'     => 'switch', 
                        'title'    => __('Disable Login message?', 'ibid'),
                        'subtitle' => __('Enable or disable Login message.', 'ibid'),
                        'default'  => false,
                        'required' => array( 'ibid-enable-popup', '=', true ),
                    ),
                    array(
                        'id'   => 'ibid_popup_settings',
                        'type' => 'info',
                        'class' => 'ibid_divider',
                        'desc' => __( '<h3>Popup Settings</h3>', 'ibid' ),
                        'required' => array( 'ibid-enable-popup', '=', true ),
                    ),
                    array(
                        'id'        => 'ibid-enable-popup-expire-date',
                        'type'      => 'select',
                        'title'     => __('Expiring Cookie', 'ibid'),
                        'subtitle'  => __('Select the days for when the cookies to expire.', 'ibid'),
                        'options'   => array(
                                '1'    => 'One day',
                                '3'    => 'Three days',
                                '7'    => 'Seven days',
                                '30'   => 'One Month',
                                '3000' => 'Be Remembered'
                            ),
                        'default'   => '1',
                        'required' => array( 'ibid-enable-popup', '=', true ),
                    ),
                    array(
                        'id'        => 'ibid-enable-popup-show-time',
                        'type'      => 'select',
                        'title'     => __('Show Popup', 'ibid'),
                        'subtitle'  => __('Select a specific time to show the popup.', 'ibid'),
                        'options'   => array(
                                '5000'     => '5 seconds',
                                '10000'    => '10 seconds',
                                '20000'    => '20 seconds'
                            ),
                        'default'   => '5000',
                        'required' => array( 'ibid-enable-popup', '=', true ),
                    ),
                )
            );


            # Tab: Shop Settings
            $this->sections[] = array(
                'icon' => 'el-icon-myspace',
                'title' => __('Social Media', 'ibid'),
            );
            # Section: Social Profiles
            $this->sections[] = array(
                'subsection' => true,
                'icon' => 'el-icon-share-alt',
                'title' => __('Social Profiles', 'ibid'),
                'fields' => array(
                    array(
                        'id' => 'ibid_social_fb',
                        'type' => 'text',
                        'title' => __('Facebook URL', 'ibid'),
                        'subtitle' => __('Type your Facebook url.', 'ibid'),
                        'validate' => 'url',
                        'default' => 'http://facebook.com'
                    ),
                    array(
                        'id' => 'ibid_social_tw',
                        'type' => 'text',
                        'title' => __('Twitter username', 'ibid'),
                        'subtitle' => __('Type your Twitter username.', 'ibid'),
                        'default' => 'google'
                    ),
                    array(
                        'id' => 'ibid_social_pinterest',
                        'type' => 'text',
                        'title' => __('Pinterest URL', 'ibid'),
                        'subtitle' => __('Type your Pinterest url.', 'ibid'),
                        'validate' => 'url',
                        'default' => ''
                    ),
                    array(
                        'id' => 'ibid_social_skype',
                        'type' => 'text',
                        'title' => __('Skype Name', 'ibid'),
                        'subtitle' => __('Type your Skype username.', 'ibid'),
                        'default' => ''
                    ),
                    array(
                        'id' => 'ibid_social_instagram',
                        'type' => 'text',
                        'title' => __('Instagram URL', 'ibid'),
                        'subtitle' => __('Type your Instagram url.', 'ibid'),
                        'validate' => 'url',
                        'default' => 'http://instagram.com'
                    ),
                    array(
                        'id' => 'ibid_social_youtube',
                        'type' => 'text',
                        'title' => __('YouTube URL', 'ibid'),
                        'subtitle' => __('Type your YouTube url.', 'ibid'),
                        'validate' => 'url',
                        'default' => ''
                    ),
                    array(
                        'id' => 'ibid_social_dribbble',
                        'type' => 'text',
                        'title' => __('Dribbble URL', 'ibid'),
                        'subtitle' => __('Type your Dribbble url.', 'ibid'),
                        'validate' => 'url',
                        'default' => ''
                    ),
                    array(
                        'id' => 'ibid_social_linkedin',
                        'type' => 'text',
                        'title' => __('LinkedIn URL', 'ibid'),
                        'subtitle' => __('Type your LinkedIn url.', 'ibid'),
                        'validate' => 'url',
                        'default' => 'http://linkedin.com'
                    ),
                    array(
                        'id' => 'ibid_social_deviantart',
                        'type' => 'text',
                        'title' => __('Deviant Art URL', 'ibid'),
                        'subtitle' => __('Type your Deviant Art url.', 'ibid'),
                        'validate' => 'url',
                        'default' => 'http://deviantart.com'
                    ),
                    array(
                        'id' => 'ibid_social_digg',
                        'type' => 'text',
                        'title' => __('Digg URL', 'ibid'),
                        'subtitle' => __('Type your Digg url.', 'ibid'),
                        'validate' => 'url'
                    ),
                    array(
                        'id' => 'ibid_social_flickr',
                        'type' => 'text',
                        'title' => __('Flickr URL', 'ibid'),
                        'subtitle' => __('Type your Flickr url.', 'ibid'),
                        'validate' => 'url'
                    ),
                    array(
                        'id' => 'ibid_social_stumbleupon',
                        'type' => 'text',
                        'title' => __('Stumbleupon URL', 'ibid'),
                        'subtitle' => __('Type your Stumbleupon url.', 'ibid'),
                        'validate' => 'url'
                    ),
                    array(
                        'id' => 'ibid_social_tumblr',
                        'type' => 'text',
                        'title' => __('Tumblr URL', 'ibid'),
                        'subtitle' => __('Type your Tumblr url.', 'ibid'),
                        'validate' => 'url'
                    ),
                    array(
                        'id' => 'ibid_social_vimeo',
                        'type' => 'text',
                        'title' => __('Vimeo URL', 'ibid'),
                        'subtitle' => __('Type your Vimeo url.', 'ibid'),
                        'validate' => 'url'
                    ),
                )
            );
            # Section: Social Shares
            $this->sections[] = array(
                'subsection' => true,
                'icon' => 'el-icon-share',
                'title' => __('Social Shares', 'ibid'),
                'fields' => array(
                    array(
                        'id'       => 'ibid_social_share_links',
                        'type'     => 'checkbox', 
                        'title'    => __('Social Shares', 'ibid'),
                        'subtitle' => __('Choose what social share links to be listed (product pages & posts)', 'ibid'),
                        'options'   => array(
                            'twitter'   => __( 'Twitter', 'ibid' ),
                            'facebook'   => __( 'Facebook', 'ibid' ),
                            'whatsapp'   => __( 'Whatsapp', 'ibid' ),
                            'pinterest'   => __( 'Pinterest', 'ibid' ),
                            'linkedin'   => __( 'LinkedIn', 'ibid' ),
                            'telegram'   => __( 'Telegram', 'ibid' ),
                            'email'   => __( 'Email', 'ibid' ),
                        ),
                        'default' => array(
                            'twitter' => '1', 
                            'facebook' => '1', 
                            'whatsapp' => '1',
                            'pinterest' => '1',
                            'linkedin' => '1',
                            'telegram' => '1',
                            'email' => '1',
                        )
                    ),
                    array(
                        'id'       => 'ibid_social_share_locations',
                        'type'     => 'checkbox', 
                        'title'    => __('Social Shares Locations', 'ibid'),
                        'subtitle' => __('Enable or disable social share links on product pages or posts', 'ibid'),
                        'options'   => array(
                            'product'   => __( 'Product Single', 'ibid' ),
                            'post'   => __( 'Post Single', 'ibid' ),
                        ),
                        'default' => array(
                            'product' => '1', 
                            'post' => '1',
                        )
                    ),
                )
            );


            $theme_info = '<div class="redux-framework-section-desc">';
            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'ibid') . '<a href="' . esc_url($this->theme->get('ThemeURI')) . '" target="_blank">' . esc_html($this->theme->get('ThemeURI')) . '</a></p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'ibid') . esc_html($this->theme->get('Author')) . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'ibid') . esc_html($this->theme->get('Version')) . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . esc_html($this->theme->get('Description')) . '</p>';
            $tabs = $this->theme->get('Tags');
            if (!empty($tabs)) {
                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'ibid') . implode(', ', $tabs) . '</p>';
            }
            $theme_info .= '</div>';

        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => __('', 'ibid'),
                'content' => __('', 'ibid')
            );

            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-2',
                'title' => __('', 'ibid'),
                'content' => __('', 'ibid')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('', 'ibid');
        }

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'redux_demo', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not
                'menu_title' => __('Theme Panel', 'ibid'),
                'page' => __('Theme Panel', 'ibid'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'menu_icon' => get_template_directory_uri().'/images/svg/theme-panel-menu-icon.svg', // Specify a custom URL to an icon
                'google_api_key' => '', // Must be defined to add google fonts to the typography module
                'admin_bar' => true, // Show the panel pages on the admin bar
                'global_variable' => 'ibid_redux', // Set a different name for your global variable other than the opt_name
                'dev_mode' => false, // Show the time the page took to load, etc
                'customizer' => true, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority'        => 2,
                'page_parent' => 'themes.php', // For a full list of options
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                'domain'              => 'ibid', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '',      
                'show_options_object' => false,   
            );

            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace("-", "_", $this->args['opt_name']);
                }
                $this->args['intro_text'] = sprintf(__('', 'ibid'), $v);
            } else {
                $this->args['intro_text'] = __('', 'ibid');
            }

            // Add content after the form.
            $this->args['footer_text'] = __('', 'ibid');
        }

    }

    new Redux_Framework_ibid_config();
}