<?php
add_filter( 'cmb_meta_boxes', 'modeltheme_metaboxes' );
function modeltheme_metaboxes( array $meta_boxes ) {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'smartowl_';


      /**
      ||-> Metaboxes: For CPT - [testimonial]
      */
      $meta_boxes['testimonials_metaboxs'] = array(
            'id'         => 'testimonials_metaboxs',
            'title'      => __( 'Testimonials Custom Options', 'modeltheme' ),
            'pages'      => array( 'testimonial' ), // Post type
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(
                  array(
                        'name'       => __( 'Job Position', 'modeltheme' ),
                        'desc'       => __( 'Enter testimonial author job position', 'modeltheme' ),
                        'id'         => 'job-position',
                        'type'       => 'text',
                  ),
                  array(
                        'name'       => __( 'Company', 'modeltheme' ),
                        'desc'       => __( 'Enter testimonial author company name', 'modeltheme' ),
                        'id'         => 'company',
                        'type'       => 'text',
                  )
            ),
      );

      /**
      ||-> Metaboxes: For CPT - Causes]
      */
      $meta_boxes['causes_metaboxs'] = array(
            'id'         => 'causes_metaboxs',
            'title'      => __( 'Causes Custom Options', 'modeltheme' ),
            'pages'      => array( 'cause' ), // Post type
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(
                  array(
                        'name'       => __( 'Post Tagline', 'modeltheme' ),
                        'desc'       => __( 'Enter Cause Post Tagline', 'modeltheme' ),
                        'id'         => 'cause_tagline',
                        'type'       => 'text',
                  ),
                  array(
                        'name'       => __( 'Target Goal', 'modeltheme' ),
                        'desc'       => __( 'Enter Cause Goal', 'modeltheme' ),
                        'id'         => 'cause_goal',
                        'type'       => 'text',
                  ),
                  array(
                        'name'       => __( 'Campaign End Date&Time', 'modeltheme' ),
                        'desc'       => __( 'Format: YYYY-MM-DD HH:MM', 'modeltheme' ),
                        'id'         => 'mt_variable_end_date',
                        'type'       => 'text',
                       // format: YYYY-MM-DD HH:MM
                  ),
            ),
      );

      /**
      ||-> Metaboxes: For CPT - [member]
      */
      $meta_boxes['members_metaboxs'] = array(
            'id'         => 'members_metaboxs',
            'title'      => __( 'Members Custom Options', 'modeltheme' ),
            'pages'      => array( 'member' ), // Post type
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(
                  array(
                        'name'       => __( 'Job Position', 'modeltheme' ),
                        'id'         => 'av-job-position',
                        'type'       => 'text',
                  ),
                  array(
                        'name'       => __( 'Facebook URL', 'modeltheme' ),
                        'id'         => 'av-facebook-link',
                        'type'       => 'text',
                  ),
                  array(
                        'name'       => __( 'Twitter URL', 'modeltheme' ),
                        'id'         => 'av-twitter-link',
                        'type'       => 'text',
                  ),
                  array(
                        'name'       => __( 'Google Plus URL', 'modeltheme' ),
                        'id'         => 'av-gplus-link',
                        'type'       => 'text',
                  ),
                  array(
                        'name'       => __( 'instagram URL', 'modeltheme' ),
                        'id'         => 'av-instagram-link',
                        'type'       => 'text',
                  ),
            ),
      );


      /**

      ||-> Metaboxes: For - [page]

      */
      // REVSLIDERS
      global $wpdb;
      $limit_small    = 0;
      $limit_high     = 50;
      $tablename      = $wpdb->prefix . "revslider_sliders";
      if($wpdb->get_var("SHOW TABLES LIKE '$tablename'") == $tablename) {
            $sql            = $wpdb->prepare( "SELECT * FROM $tablename LIMIT %d, %d", $limit_small, $limit_high);
            $sliders        = $wpdb->get_results($sql, ARRAY_A);

            $revliders = array(); 
            if ($sliders) {
                  $revliders[] = array(
                        'name'  => 'Please select a slider',
                        'value' => ''
                  );
                  foreach($sliders as $slide){
                        $revliders[] = array(
                              'name'  => $slide['title'],
                              'value' => $slide['alias']
                        );
                  }
            }
      }else{
            $revliders = array(); 
      }


      // SIDEBARS
      $sidebar_options = array();
      $sidebars = $GLOBALS['wp_registered_sidebars'];

      if($sidebars){
            foreach ( $sidebars as $sidebar ){
                  $sidebar_options[] = array(
                        'name'  => $sidebar['name'],
                        'value' => $sidebar['id']
                  );
            }
      }


      $meta_boxes['page_metaboxs'] = array(
            'id'         => 'page_metaboxs',
            'title'      => __( 'Page Custom Options', 'modeltheme' ),
            'pages'      => array( 'page' ), // Post type
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            'fields'     => array(
                  /**
                  HEADER
                  */
                  array(
                        'name' => '<h1>Custom Header Options</h1>',
                        'desc' => 'These options replaces the Theme Options for current page.',
                        'type' => 'title',
                        'id' => $prefix . 'test_title'
                  ),

                  array(
                        'name'    => __( 'Rewrite Header Theme Options?', 'modeltheme' ),
                        'desc'    => __( 'If "Yes" - Page Options will rewrite Theme Options', 'modeltheme' ),
                        'id'      => 'ibid_custom_header_options_status',
                        'type'    => 'select',
                        'options' => array(
                            'yes' => __( 'Yes', 'modeltheme' ),
                            'no' => __( 'No', 'modeltheme' ),
                        ),
                        'default' => 'no',
                  ),
                  array(
                        'name' => __( 'Custom Logo', 'modeltheme' ),
                        'desc' => __( 'Import a custom logo for this page only', 'modeltheme' ),
                        'id'   => 'ibid_metabox_header_logo',
                        'type' => 'file',
                        'save_id' => true,
                        'allow' => array( 'url', 'attachment' )
                  ),
                  array(
                      'name'    => 'Select Header Variant',
                      'id'      => 'ibid_header_custom_variant',
                      'type'    => 'radio',
                      'options' => array(
                          '1'        => 'Header v1 (Default - As Selected from the Theme Panel)',
                          '2'        => 'Header v2',
                          '3'        => 'Header v3',
                          '4'        => 'Header v4',
                          '5'        => 'Header v5',                 
                          '6'        => 'Header v6',                 
                          '7'        => 'Header v7',                 
                          '8'        => 'Header v8',                 
                          '9'        => 'Header v9',                 
                      ),
                      'default' => '1',
                  ),
                  array(
                        'name'    => __( 'Select Revolution Slider', 'modeltheme' ),
                        'desc'    => __( 'Select an option', 'modeltheme' ),
                        'id'      => 'select_revslider_shortcode',
                        'type'    => 'select',
                        'options' => $revliders,
                        'default' => 'default',
                  ),
                  array(
                        'name'    => __( 'Page title-breadcrumbs', 'modeltheme' ),
                        'desc'    => __( 'Select an option', 'modeltheme' ),
                        'id'      => 'breadcrumbs_on_off',
                        'type'    => 'select',
                        'options' => array(
                              'no' => __( 'Off - Hide title-breadcrumbs area', 'modeltheme' ),
                              'yes' => __( 'On - Show title-breadcrumbs area', 'modeltheme' ),
                        ),
                        'default' => 'yes',
                  ),


                  /**
                  General Page Options
                  */
                  array(
                      'name' => '<h1>General Page Options</h1>',
                      'desc' => 'These options replaces the Theme Options for current page.',
                      'type' => 'title',
                      'id' => $prefix . 'test_title'
                  ),
                  array(
                        'name'    => __( 'Page top/bottom spacing', 'modeltheme' ),
                        'desc'    => __( 'Select an option', 'modeltheme' ),
                        'id'      => 'page_spacing',
                        'type'    => 'select',
                        'options' => array(
                              'high-padding' => __( 'High Padding', 'modeltheme' ),
                              'no-padding' => __( 'No Padding', 'modeltheme' ),
                              'no-padding-top' => __( 'No Padding top', 'modeltheme' ),
                              'no-padding-bottom' => __( 'No Padding bottom', 'modeltheme' ),
                        ),
                        'default' => 'high-padding',
                  ),
                  array(
                        'name'    => __( 'Select Sidebar', 'modeltheme' ),
                        'desc'    => __( 'Select an option', 'modeltheme' ),
                        'id'      => 'select_page_sidebar',
                        'type'    => 'select',
                        'options' => $sidebar_options,
                        'default' => 'default',
                  ),
                  array(
                        'name'    => __( 'Rewrite Global Page Skin Color Theme Option?', 'modeltheme' ),
                        'desc'    => __( 'If "Yes" - This Page Option will rewrite Theme Options', 'modeltheme' ),
                        'id'      => 'ibid_custom_page_skin_color_status',
                        'type'    => 'select',
                        'options' => array(
                            'yes' => __( 'Yes', 'modeltheme' ),
                            'no' => __( 'No', 'modeltheme' ),
                        ),
                        'default' => 'no',
                  ),
                  array(
                        'name'    => __( 'Global Page Skin Color', 'modeltheme' ),
                        'desc'    => __( 'Replaces theme options main color', 'modeltheme' ),
                        'id'      => 'ibid_global_page_color',
                        'type'    => 'colorpicker',
                        'default' => '#00AEEF'
                  ),
                  array(
                        'name'    => __( 'Global Page Skin Color - Hover', 'modeltheme' ),
                        'desc'    => __( 'Replaces theme options main color', 'modeltheme' ),
                        'id'      => 'ibid_global_page_color_hover',
                        'type'    => 'colorpicker',
                        'default' => '#0099d1'
                  ),
                  /**
                  FOOTER
                  */
                  array(
                      'name' => '<h1>Custom Footer Options</h1>',
                      'desc' => 'These options replaces the Theme Options for current page.',
                      'type' => 'title',
                      'id' => $prefix . 'test_title'
                  ),
                  array(
                        'name' => __( 'Disable Footer Row #1', 'modeltheme' ),
                        'desc' => __( 'Check to disable footer row 1 (if enabled from Theme Options Panel)', 'modeltheme' ),
                        'id'   => 'mt_footer_row1_status',
                        'type' => 'checkbox',
                  ),
                  array(
                        'name' => __( 'Disable Footer Row #2', 'modeltheme' ),
                        'desc' => __( 'Check to disable footer row 2 (if enabled from Theme Options Panel)', 'modeltheme' ),
                        'id'   => 'mt_footer_row2_status',
                        'type' => 'checkbox',
                  ),
                  array(
                        'name' => __( 'Disable Footer Row #3', 'modeltheme' ),
                        'desc' => __( 'Check to disable footer row 3 (if enabled from Theme Options Panel)', 'modeltheme' ),
                        'id'   => 'mt_footer_row3_status',
                        'type' => 'checkbox',
                  ),
                  array(
                        'name' => __( 'Disable Footer Bottom Bar', 'modeltheme' ),
                        'desc' => __( 'Check to disable footer bottom copyright bar', 'modeltheme' ),
                        'id'   => 'mt_footer_bottom_bar',
                        'type' => 'checkbox',
                  ),
            ),
      );


    // Add other metaboxes as needed
    return $meta_boxes;
}

?>
<?php 
// Charity Cause meta
if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
      add_action( 'woocommerce_product_options_advanced', 'ibid_adv_product_options');
      function ibid_adv_product_options(){
            global $ibid_redux;
            if ($ibid_redux['ibid_enable_fundraising'] == 'enable') {

              global $current_user;
              wp_get_current_user(); 
              $cause = array();
              $cause_posts = get_posts( array( 'post_type' => 'cause', 'posts_per_page' => -1) );

              $cause[''] = __('Select a Charity Cause', 'modeltheme');
              foreach ($cause_posts as $cause_post) {
                    $cause[$cause_post->ID] = $cause_post->post_title;
              }
              echo '<div class="options_group">';
                    woocommerce_wp_select( array(
                          'id'      => 'product_cause',
                          'label'   => __('Charity Cause', 'modeltheme'),
                          'desc_tip' => true,
                          'description' => __('If this auction will be charity auction you can select a cause to support, from the dropdown. Otherwise, leave it unselected.', 'modeltheme'),
                          'options'     => $cause
                    ));
              echo '</div>';
            }
      }
}

add_action( 'woocommerce_process_product_meta', 'ibid_save_fields', 10, 2 );
function ibid_save_fields( $id, $post ){
      update_post_meta( $id, 'product_cause', $_POST['product_cause'] );
}

//PDF attachment meta
add_action( 'woocommerce_product_options_advanced', 'ibid_pdf_product_options');
function ibid_pdf_product_options(){
      global $ibid_redux;
      echo '<div class="options_group">';
            woocommerce_wp_text_input( array(
                  'id'          => 'ibid_pdf_attach', 
                  'label'       => __( 'Input PDF attachment', 'woocommerce' ), 
                  'placeholder' => '',
                  'desc_tip'    => 'true',
                  'description' => __( 'Add your link to your PDF attachment. This can be downloaded from the single page.', 'woocommerce' ) 
            ));
      echo '</div>';
} 
add_action( 'woocommerce_process_product_meta', 'ibid_save_fields_pdf', 10, 2 );
function ibid_save_fields_pdf( $id, $post ){
      update_post_meta( $id, 'ibid_pdf_attach', $_POST['ibid_pdf_attach'] );
}