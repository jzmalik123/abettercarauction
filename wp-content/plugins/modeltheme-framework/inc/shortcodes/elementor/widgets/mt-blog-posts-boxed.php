<?php
namespace Elementor;

class ibid_show_blog_post_boxed_widget extends Widget_Base {
	
	public function get_name() {
		return 'blog-posts-boxed';
	}
	
	public function get_title() {
		return 'iBid - Blog Posts Boxed';
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
			'number',
			[
				'label' => __( 'Number', 'modeltheme' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'default' => '3',
			]
		);

		$post_category_tax = get_terms('category');
        $post_category = array();
        if ($post_category_tax) {
          foreach ( $post_category_tax as $term ) {
             $post_category[$term->name] = $term->slug;
          }
        }

		$this->add_control(
			'category',
			[
				'label' => __( 'Select Blog Category', 'modeltheme' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => 'gadgets',
				'options' => $post_category,
			]
		);
		$this->add_control(
			'overlay_color',
			[
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => __( 'Choose overlay color', 'modeltheme' ),

			]
		);
		$this->add_control(
			'text_color',
			[
				'label_block' => true,
				'type' => \Elementor\Controls_Manager::COLOR,
				'label' => __( 'Choose text color', 'modeltheme' ),
			]
		);
		

		$this->add_control(
			'columns',
			[
				'label' => __( 'Columns', 'modeltheme' ),
				'label_block' => true,
				'type' => Controls_Manager::SELECT,
				'default' => '3 columns',
				'options' => [
					'vc_col-md-6' => __( '2 columns', 'modeltheme' ),
					'vc_col-md-4' => __( '3 columns', 'modeltheme' ),
					'vc_col-md-3' => __( '4 columns', 'modeltheme' ),
				]
			]
		);
		$this->end_controls_section();

	}
	
	protected function render() {
		global $ibid_redux;
        $settings 		= $this->get_settings_for_display();
        $number 		= $settings['number'];
        $category 		= $settings['category'];
        $overlay_color 	= $settings['overlay_color'];
        $text_color 	= $settings['text_color'];
        $columns 		= $settings['columns'];

    $args_posts = array(
            'posts_per_page'        => $number,
            'post_type'             => 'post',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $category
                )
            ),
            'post_status'           => 'publish' 
        );
    $posts = get_posts($args_posts);

   $shortcode_content = '';
    $shortcode_content .= '<div class="ibid_shortcode_blog boxed vc_row sticky-posts">';
    foreach ($posts as $post) { 
        $excerpt = get_post_field('post_content', $post->ID);
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'ibid_portfolio_230x350' );
        $author_id = $post->post_author;
        $url = get_permalink($post->ID); 
        $shortcode_content .= '<div class="'.$columns.' post">';
             $shortcode_content .= '<div class="col-md-12 post-wrapper">';
                $shortcode_content .= '<div class="col-md-4 blog-thumbnail">';
                    $shortcode_content .= '<a href="'.$url.'" class="relative">';
                        if($thumbnail_src) { 
                            $shortcode_content .= '<img src="'. $thumbnail_src[0] . '" alt="'. $post->post_title .'" />';
                        }else{ 
                            $shortcode_content .= '<img src="http://placehold.it/700x450" alt="'. $post->post_title .'" />'; 
                        }
                        $shortcode_content .= '<div class="thumbnail-overlay absolute" style="background: '.$overlay_color.'!important;">';
                            $shortcode_content .= '<i class="fas fa-plus absolute"></i>';
                        $shortcode_content .= '</div>';
                    $shortcode_content .= '</a>';
                $shortcode_content .= '</div>';

                $shortcode_content .= '<div class="col-md-8 blog-content">';
                    $shortcode_content .= '<div class="head-content">';
                        $shortcode_content .= '<h3 class="post-name"><a href="'.$url.'" style="color: '.$text_color.'">'.$post->post_title.'</a></h3>';
                    $shortcode_content .= '</div>';
                    $shortcode_content .= '<div class="post-excerpt">'.wp_trim_words($excerpt,9).'</div>';
                    $shortcode_content .= '<div class="post-button">
                                        <a href="'.$url.'" class="more-link">
                                            '. esc_html__( 'Read more', 'modeltheme' ).'
                                        </a>
                                    </div>';
                $shortcode_content .= '</div>';
            $shortcode_content .= '</div>';
        $shortcode_content .= '</div>';
    } 
    $shortcode_content .= '</div>';
    echo $shortcode_content;
}
	protected function _content_template() {

    }
	
	
}