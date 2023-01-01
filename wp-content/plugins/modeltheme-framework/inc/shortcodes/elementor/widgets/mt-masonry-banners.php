<?php
namespace Elementor;

class ibid_shop_masonry_banners_widget extends Widget_Base {
	
	public function get_name() {
		return 'masonry-banner';
	}
	
	public function get_title() {
		return 'iBid - Masonry Banner';
	}
	
	public function get_icon() {
		return 'fab fa-elementor';
	}
	
	public function get_categories() {
		return [ 'ibid-widgets' ];
	}
	
	

	protected function register_controls() {

		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Content', 'modeltheme' ),
			]
		);
		
		$this->add_control(
			'banner_img',
			[
				'label' => __( 'Banner Image', 'modeltheme' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				]
			]
		);

		$this->add_control( 
			'banner_title',
			[
				'label' => __( 'Banner Title', 'modeltheme' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your title', 'modeltheme' ),
			]
		);

		$this->add_control(
			'banner_count',
			[
				'label' => __( 'Banner Subtitle', 'modeltheme' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your subtitle', 'modeltheme' ),
			]
		);

		$this->add_control(
			'banner_url',
			[
				'label' => __( 'Banner Link', 'modeltheme' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( '#', 'modeltheme' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->add_control(
			'title_text_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => __( 'Title Text Color', 'modeltheme' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle_text_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => __( 'Subtitle Text Color', 'modeltheme' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button_text_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => __( 'Button text Color ', 'modeltheme' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'border_color',
			[
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => __( 'Border Color ', 'modeltheme' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

	}
	
	protected function render() {
		global $ibid_redux;
        $settings 		= $this->get_settings_for_display();
        $banner_title 	= $settings['banner_title'];
        $banner_img 	= $settings['banner_img'];
        $banner_count 	= $settings['banner_count'];
        $banner_url 	= $settings['banner_url']['url'];
        $title_text_color 	= $settings['title_text_color'];
        $subtitle_text_color 	= $settings['subtitle_text_color'];
        $button_text_color 	= $settings['button_text_color'];
        $border_color 	= $settings['border_color'];

        $shortcode_content = '';
    	$shortcode_content .= '<div class="masonry_banners banners_column">';

                $shortcode_content .= '<div class="masonry_banner default-skin">';
                    $shortcode_content .= '<a href="'.$banner_url.'" class="relative">';
                        $shortcode_content .= '<img src="'. $settings['banner_img']['url'] .'" alt="'.$banner_title.'" />';
                        $shortcode_content .= '<div class="masonry_holder">';
                            $shortcode_content .= '<h3 class="category_name" style="color: '.$title_text_color.'!important;">'.$banner_title.'</h3>';
                             $shortcode_content .= '<p class="category_count" style="color: '.$subtitle_text_color.'!important;">'.$banner_count.'</p>';
                            $shortcode_content .= '<span class="read-more" style="color: '.$button_text_color.'!important; border:1px solid '.$border_color.';">'.esc_html__('VIEW MORE', 'modeltheme').'</span>';
                        $shortcode_content .= '</div>';
                    $shortcode_content .= '</a>';
                $shortcode_content .= '</div>';

        $shortcode_content .= '</div>';
        echo  $shortcode_content;
	}
	
	protected function _content_template() {

    }
	
	
}