<?php
  #Redux global variable
  global $ibid_redux;
  #WooCommerce global variable
  global $woocommerce;
  $cart_url = "#";
  if ( class_exists( 'WooCommerce' ) ) {
    $cart_url = wc_get_cart_url();
  }
  #YITH Wishlist rul
  if( function_exists( 'YITH_WCWL' ) ){
      $wishlist_url = YITH_WCWL()->get_wishlist_url();
  }else{
      $wishlist_url = '#';
  }
?>
<?php  
if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
  if ( ibid_redux('ibid_top_header_info_switcher') == true) {
      echo ibid_my_banner_header();
  }
} ?>
<?php do_action('ibid_after_mobile_navigation_burger'); ?>

<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
  <?php if ( ibid_redux('ibid_header_language_switcher') != '0' || ibid_redux('ibid_header_currency_switcher') != '0' || ibid_redux('ibid_contact_phone') != '' || ibid_redux('ibid_contact_email') != '' || ibid_redux('ibid_work_program') != '' || ibid_redux('ibid_top_header_order_tracking_link') != '') { ?>
  <div class="top-header">
    <div class="container">
      <div class="row">
        <!-- LEFT SIDE LINKS -->
        <div class="col-md-7 col-sm-12 contact-header">
          <ul class="currency-language list-inline-block menu-list">
          <?php if(ibid_redux('ibid_header_language_switcher') != '' && ibid_redux('ibid_header_language_switcher') == '1'){ ?>
            <li>
              <div class="language-box dropdown-box">
                <a class="language-current" href="<?php echo esc_url('#'); ?>"><?php esc_html_e('EN', 'ibid'); ?></a>
                <ul class="language-list list-none dropdown-list">
                  <li><a href="<?php echo esc_url('#'); ?>"><?php esc_html_e('EN', 'ibid'); ?></a></li>
                  <li><a href="<?php echo esc_url('#'); ?>"><?php esc_html_e('FR', 'ibid'); ?></a></li>
                  <li><a href="<?php echo esc_url('#'); ?>"><?php esc_html_e('GE', 'ibid'); ?></a></li>
                </ul>
              </div>
            </li>
          <?php } ?>
          <?php if(ibid_redux('ibid_header_currency_switcher') != '' && ibid_redux('ibid_header_currency_switcher') == '1'){ ?>
            <li>
              <div class="currency-box dropdown-box">
                <a class="currency-current" href="<?php echo esc_url('#'); ?>"><?php esc_html_e('USD', 'ibid'); ?></a>
                <ul class="currency-list list-none dropdown-list">
                  <li><a href="<?php echo esc_url('#'); ?>"><?php esc_html_e('USD', 'ibid'); ?></a></li>
                  <li><a href="<?php echo esc_url('#'); ?>"><?php esc_html_e('EUR', 'ibid'); ?></a></li>
                  <li><a href="<?php echo esc_url('#'); ?>"><?php esc_html_e('JPY', 'ibid'); ?></a></li>
                </ul>
              </div>
            </li>
          <?php } ?>
          </ul>

          <?php if($ibid_redux['ibid_contact_phone']) { ?>
            <!-- Call Us -->
            <div class="header-top-contact-method">
              <span><?php esc_html_e('Call us toll free: ', 'ibid'); ?></span>
              <a target="_blank" href="<?php echo esc_url('tel:'.$ibid_redux['ibid_contact_phone']); ?>">
                <i class="fas fa-phone hide-on-desktops"></i>
                <span><?php echo esc_html($ibid_redux['ibid_contact_phone']); ?></span>
              </a>
            </div>
          <?php } ?>

          <?php if($ibid_redux['ibid_contact_email']) { ?>
            <!-- Mail Us -->
            <div class="header-top-contact-method">
              <span><?php esc_html_e('Send us an email: ', 'ibid'); ?></span>
              <a target="_blank" href="<?php echo esc_url('mailto:'.$ibid_redux['ibid_contact_email']); ?>">
                <i class="far fa-envelope hide-on-desktops"></i>
                <span><?php echo esc_html($ibid_redux['ibid_contact_email']); ?></span>
              </a>
            </div>
          <?php } ?>

          <?php if($ibid_redux['ibid_work_program']) { ?>
            <!-- Work Program -->
            <div class="header-top-contact-method">
              <i class="far fa-clock" aria-hidden="true"></i>
              <?php echo esc_html($ibid_redux['ibid_work_program']); ?>
            </div>
          <?php } ?>
          <div class="clearfix"></div>
        </div>
        <!-- RIGHT SIDE LINKS -->
        <div class="col-md-5 col-sm-12 account-urls">
          <?php if (isset($ibid_redux['ibid_top_header_order_tracking_link']) && $ibid_redux['ibid_top_header_order_tracking_link'] != '') { ?>
            <a class="top-order" href="<?php echo esc_url($ibid_redux['ibid_top_header_order_tracking_link']); ?>">
              <i class="fas fa-truck"></i>
              <?php esc_html_e('Order Tracking', 'ibid'); ?>
            </a>
          <?php } ?>
          <?php if( function_exists( 'YITH_WCWL' ) ){ ?>
            <a class="top-payment" href="<?php echo esc_url($wishlist_url); ?>">
              <i class="far fa-heart"></i>
              <?php esc_html_e('Wishlist', 'ibid'); ?>
            </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
<?php } ?>

<header class="header-v6">
  <div class="navbar navbar-default" id="ibid-main-head">
      <div class="container">
        <div class="row">
          <?php if (class_exists('WooCommerce')) : ?>
            <div class="col-md-3 search-form-product">

              <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
              if ($ibid_redux['is_search_enabled'] == false) { ?>
              <div class="ibid-header-searchform">
                <form name="header-search-form" method="GET" autocomplete="off" class="woocommerce-product-search menu-search" action="<?php echo esc_url(home_url('/')); ?>">
                  
                  <?php do_action('ibid_header6_search_form_before'); ?>

                  <input type="text"  name="s" class="search-field search-keyword" onkeyup="ibid_fetch_products()" maxlength="128" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search products...', 'ibid'); ?>">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-search" aria-hidden="true"></i></button>
                  <input type="hidden" name="post_type" value="product" />
                </form>
                <div class="data_fetch"></div> 
              </div>
              <?php }
            } ?>
            </div>
          <?php endif; ?>
          
              
             
          <div class="first-part col-md-9 col-sm-12">
            <div class="navbar-header col-md-8 col-sm-12">

              <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
                <?php if ($ibid_redux['ibid_mobile_burger_select'] == 'dropdown' || $ibid_redux['ibid_mobile_burger_select'] == '') { ?>
                    <?php do_action('ibid_burger_dropdown_button'); ?>
                <?php } ?> 
              <?php } else {?>
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
              <?php } ?>

              <?php do_action('ibid_before_mobile_navigation_burger'); ?>

              <?php echo ibid_logo(); ?>
              
            </div>
            <div class="col-md-3 my-account-navbar">
            <ul>
            <?php if ( class_exists('woocommerce')) { ?>
              <?php if (is_user_logged_in()) { ?>
                <div id="dropdown-user-profile" class="ddmenu">
                  <li id="nav-menu-register" class="nav-menu-account"><?php echo esc_html__('My Account','ibid'); ?></li>
                  <ul>

                    <?php if(class_exists('Mtsub')) {
                       do_action( 'mt_after_my_account' ); ?>
                    <?php } ?>
                    
                    <li><a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>"><i class="fas fa-layer-group"></i> <?php echo esc_html__('My Dashboard','ibid'); ?></a></li>
                    
                    <?php if(class_exists('Mt_Freelancer_Mode')) {
                      do_action( 'mt_before_dashboard' ); ?>
                    <?php } ?>
                      
                    <?php if (class_exists('Dokan_Vendor') && dokan_is_user_seller( dokan_get_current_user_id() )) {  ?>            
                      <li><a href="<?php echo esc_url( home_url().'/dashboard' ); ?>"><i class="fas fa-store"></i> <?php echo esc_html__('Vendor Dashboard','ibid'); ?></a></li>
                    <?php } ?>
                    
                    <?php if (class_exists('WCFM') && wcfm_is_vendor()) { ?>
                      <li><a href="<?php echo apply_filters( 'wcfm_dashboard_home', get_wcfm_page() ); ?>"><i class="fas fa-store"></i> <?php echo esc_html__('Vendor Dashboard','ibid'); ?></a></li>
                    <?php } ?>
                    
                    <?php if (class_exists('WCMp')) { 
                      $current_user = wp_get_current_user();
                      if (is_user_wcmp_vendor($current_user)) {
                          $dashboard_page_link = wcmp_vendor_dashboard_page_id() ? get_permalink(wcmp_vendor_dashboard_page_id()) : '#';
                          echo apply_filters('wcmp_vendor_goto_dashboard', '<li><a href="' . esc_url($dashboard_page_link) . '"><i class="fas fa-store"></i> ' . esc_html__('Vendor Dashboard','ibid') . '</a></li>');
                      }
                    } ?>
                    
                    <?php if (class_exists('WC_Vendors')) { ?>
                      <?php if (get_option('wcvendors_vendor_dashboard_page_id') != '') { ?>
                        <li><a href="<?php echo esc_url( get_permalink(get_option('wcvendors_vendor_dashboard_page_id')) ); ?>"><i class="fas fa-store"></i> <?php echo esc_html__('Vendor Dashboard','ibid'); ?></a></li>
                      <?php } ?>
                    <?php } ?>
                    
                    <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')).'orders'); ?>"><i class="fas fa-shopping-basket"></i> <?php echo esc_html__('My Orders','ibid'); ?></a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id')).'edit-account'); ?>"><i class="far fa-user"></i> <?php echo esc_html__('Account Details','ibid'); ?></a></li>
                    <div class="dropdown-divider"></div>
                    <li><a href="<?php echo esc_url(wp_logout_url( home_url() )); ?>"><i class="fas fa-sign-out-alt"></i> <?php echo esc_html__('Log Out','ibid'); ?></a></li>
                  </ul>
                </div>
              <?php } else { ?> <!-- logged out -->
                <li id="nav-menu-login" class="ibid-logoin">
                  <?php do_action('ibid_login_link_a'); ?>
                </li>
              <?php } ?>
            <?php } ?>
            </ul>
          </div>
           <?php if (class_exists('WooCommerce')) { ?>
              <div class="col-md-1 menu-products">
            <?php } else { ?>
              <div class="col-md-12 menu-products">
              <?php } ?>
                <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                  <a  class="shop_cart" href="<?php echo esc_url($cart_url); ?>">
                    <?php esc_html_e('My Cart', 'ibid'); ?>
                  </a>
                  <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'ibid'); ?>">
                    <?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'ibid' ), WC()->cart->get_cart_contents_count() ); ?> , <?php echo WC()->cart->get_cart_total(); ?>
                  </a>
                  <!-- Shop Minicart -->
                  <div class="header_mini_cart">
                    <?php the_widget( 'WC_Widget_Cart' ); ?>
                  </div>
                <?php } ?>
            </div>
        </div>
      </div>
  </div>

  <!-- BOTTOM BAR -->
    <nav class="navbar bottom-navbar-default" id="modeltheme-main-head">
      <div class="container">
        <div class="row row-0">
          <!-- NAV MENU -->
          <div id="navbar" class="navbar-collapse collapse col-md-12">
          <?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
            <?php if (ibid_redux('ibid_header_category_menu') != '') { ?>
              <?php if (ibid_redux('ibid_header_category_menu') == true) { ?>
                <div class="bot_nav_cat_inner">
                  <div class="bot_nav_cat">
                    <button class="bot_cat_button">
                      <span class="cat_ico_block"><?php esc_html_e('Categories', 'ibid'); ?></span></button>
                      <ul class="bot_nav_cat_wrap">
                        <?php
                        if ( has_nav_menu( 'category' ) ) {
                          $defaults = array(
                            'menu'            => '',
                            'container'       => false,
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => 'menu',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => false,
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '%3$s',
                            'depth'           => 0,
                            'walker'          => ''
                          );
                          $defaults['theme_location'] = 'category';
                          wp_nav_menu( $defaults );
                        }else{
                          echo '<p class="no-menu text-right">';
                            echo esc_html__('Category navigation menu is missing.', 'ibid');
                          echo '</p>';
                        } ?>
                      </ul>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
          <?php } ?>
            
            <div class="bot_nav_wrap">
              <ul class="menu nav navbar-nav nav-effect nav-menu">
              <?php
                if ( has_nav_menu( 'primary' ) ) {
                  $defaults = array(
                    'menu'            => '',
                    'container'       => false,
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'menu',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => false,
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '%3$s',
                    'depth'           => 0,
                    'walker'          => ''
                  );
                  $defaults['theme_location'] = 'primary';
                  wp_nav_menu( $defaults );
                }else{
                  echo '<p class="no-menu text-right">';
                    echo esc_html__('Primary navigation menu is missing.', 'ibid');
                  echo '</p>';
                }
              ?>
            </ul>
           </div>
          </div>
          
        </div>
      </div>
    </nav>
  </div>
</header>