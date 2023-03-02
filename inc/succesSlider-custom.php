<?php

/**
 * Elementor posttype-search-elementor
 *
 * @package           Elementor succes-slider-elementor
 * @author            Zain Hassan
 *
 */
   


/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class succesSlider_widget_elementore  extends \Elementor\Widget_Base {

    public function get_script_depends() {

        
        wp_register_script( 'countryEr-script', plugins_url( 'assets/js/countrySelect.min.js', __FILE__ ), ['jquery'] );
        wp_register_script( 'owlEr-script', plugins_url( 'assets/js/owl.carousel.min.js', __FILE__ ), ['jquery'] );
        wp_register_script( 'modernEr-script', plugins_url( 'assets/js/modernizr-webp.js', __FILE__ ), ['jquery'] );
        wp_register_script( 'popperEr-script', plugins_url( 'assets/js/popper.min.js', __FILE__ ), ['jquery'] );
        wp_register_script( 'boostrapEr-script', plugins_url( 'assets/js/bootstrap.min.js', __FILE__ ), ['jquery'] );
		wp_register_script( 'sliderEr-script', plugins_url( 'assets/js/slider.js', __FILE__ ), ['jquery'] );
		return [ 
            
            'countryEr-script',
            'owlEr-script',
            'modernEr-script',
            'popperEr-script',
            'boostrapEr-script',
			'sliderEr-script',
     	];
	}
	

	public function get_style_depends() {

		wp_register_style( 'bootstrap-style', plugins_url( 'assets/css/bootstrap.min.css', __FILE__ ) );
		wp_register_style( 'sliderCustom-style', plugins_url( 'assets/css/slider.css', __FILE__ ) );
		wp_register_style( 'countryCustom-style', plugins_url( 'assets/css/countrySlect.css', __FILE__ ) );
		wp_register_style( 'owlCustom-style', plugins_url( 'assets/css/owl.carousel.min.css', __FILE__ ) );
		wp_register_style( 'themeCustom-style', plugins_url( 'assets/css/owl.theme.default.min.css', __FILE__ ) );

		return [
			'bootstrap-style',
			'sliderCustom-style',
            'countryCustom-style',
            'owlCustom-style',
            'themeCustom-style',
		];

	}
	

	/**
	 * Get widget name.
	 *
	 * Retrieve company widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'SuccesSlider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve company widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'succesSlider', 'posttype-search-elementor ' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve company widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-wordpress';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the company of categories the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'el-postypeSearch' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the company of keywords the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'succesSlider', 'widgets', 'Succes', 'succesSlider widgets' ];
	}

	public function get_all_custom_post_type(){
		// this is all custom post types
		$args       = array(
			'public' => true,
		);
		$post_types = get_post_types( $args, 'objects' );
		$posts = array();
		foreach ($post_types as $post_type) {
			$posts[$post_type->name] = $post_type->labels->singular_name;
		}

		return $posts;
		// this is all custom post types
	}

	public function get_object_taxonomies_custom_post($program='program'){
		$taxonomies = get_object_taxonomies($program);
		$taxonomiesarray = [];
		foreach($taxonomies as $tax){
			$taxonomiesarray[$tax] = $tax;
		}
		return $taxonomiesarray;
	}


	public function get_all_terms(){
		// get a list of available taxonomies for a post type
		$terms = [];
		foreach(get_terms() as $term){
			$terms[$term->slug] =  $term->name;
		}
		return $terms;
	}


	/**
	 * Register company widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'postTypeSearch', 'posttype-search-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control(
			'select_postType',
			[
				'label' => esc_html__( 'Select Post Type', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'life_is_success',
				'options' => [
					'life_is_success' => 'Life is Success',
					'life_is_success_sp' => 'Life is Success SP'
				],
			]
		);

		$this->add_control(
			'posts_limit',
			[
				'label'     => esc_html__('Item Limit', 'posttype-search-elementor'),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 1,
				'default'       => 4,
				'step'      => 1,
			]
		);
		
		$this->end_controls_section();

	}

	/**
	 * Render company widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		// echo "<pre>";
		// var_dump($settings['posts_include_terms']);
		$args = array(
			'post_type'        => $settings['select_postType'],
			'posts_per_page'   => $settings['posts_limit'],
		);
		$the_query = new WP_Query( $args );


        ?>
            <section id="slider">
                <div id="carouselControls" class="carousel slide" data-ride="carousel" data-interval="10000">
                    <div class="carousel-inner">
						<?php
						$counter = 1;
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							?>
							<div class="container-fluid carousel-item <?php echo $counter === 1 ? 'active' : ''; ?>">
								<div style="background-image: url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>)"  class="row no-gutters b24">
									<div class="offset-1 col-10 col-xl-4 order-2 order-xl-1 slider-r1">
										<h2 class="d-none d-xl-block"><?php echo get_the_title(); ?></h2>
										<h3><?php 
										$excerpt = get_the_excerpt();

										$excerpt = substr($excerpt, 0, 150);
										$result = substr($excerpt, 0, strrpos($excerpt, ' '));
										echo $excerpt;
										 ?></h3>
										<div class="slider-vid">
										<iframe height="253" class="vid" src="<?php echo get_field('video_url_youtube'); ?>&autoplay=0" title="you tube video embeded" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											<div>
												<h4><?php echo get_field('video_title'); ?></h4>
												<h5><?php echo get_field('location'); ?></h5>
											</div>
										</div>
										<p>
											<?php echo get_field('video_description'); ?>
											<a class="d-none c" href="#" data-toggle="modal" data-target="#target<?php echo get_the_ID(); ?>">Read More</a>
										</p>
										<div class="d-flex flex-column flex-sm-row">
											<a class="btn btn-primary a" href="#" data-toggle="modal" data-target="#target<?php echo get_the_ID(); ?>">Discover Story</a>
										</div>
									</div>
									<div class="title offset-1 offset-xl-0 col-10 col-xl-6 order-1 order-xl-2 slider-r2">
										<div>
											<h1><?php echo get_the_title(); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<?php
							$counter++;
						}
						wp_reset_postdata();
						?>
                    </div>
                    <a class="carousel-control-prev" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </section>
			<?php
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				?>
				<div class="modal fade discover" id="target<?php echo get_the_ID(); ?>" tabindex="-1" aria-labelledby="goalsLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<div class="modal-hr1">
									<h2><?php echo get_the_title(); ?></h2>
									<div class="d-flex">
										<img style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden; object-fit: cover;" src="<?php echo get_field('author_image'); ?>" class="img-fluid profile" alt="" />
										<div>
											<h4><?php echo get_field('video_title'); ?></h4>
											<h5><?php echo get_field('location'); ?></h5>
										</div>
									</div>
								</div>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body container-fluid">
								<?php echo get_the_content(); ?>
							</div>
       
						</div>
					</div>
				</div>
				<?php
			}
			wp_reset_postdata();
		
			// <script>
			// // Get a reference to all of the iframe elements
			// var iframes = document.querySelectorAll('iframe');

			// // Loop through the iframe elements
			// iframes.forEach(function(iframe) {

			// 	// Add an event listener to the iframe element to detect when the cursor enters the element
			// 	iframe.addEventListener('mouseenter', function() {
			// 	// Use the YouTube Player API to play the video
			// 	iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
			// 	});

			// 	// Add an event listener to the iframe element to detect when the cursor leaves the element
			// 	iframe.addEventListener('mouseleave', function() {
			// 	// Use the YouTube Player API to pause the video
			// 	iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
			// 	});
			// });
			// </script>
        
	}

}