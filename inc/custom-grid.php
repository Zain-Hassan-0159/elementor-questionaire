<?php

/**
 * Elementor posttype-search-elementor
 *
 * @package           Elementor posttype-search-elementor
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
class customGrid_widget_elementore  extends \Elementor\Widget_Base {
	
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
		return 'Grid-Custom';
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
		return esc_html__( 'Grid-Custom', 'posttype-search-elementor' );
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
		return [ 'grid-custom', 'grid', 'custom', 'grid-Custom widgets' ];
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
			'content_section_box1',
			[
				'label' => esc_html__( 'Box One', 'posttype-search-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'box1_title',
			[
				'label' => esc_html__( 'Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Lorem, ipsum dolor', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);

        $this->add_control(
			'box1_description',
			[
				'label' => esc_html__( 'Description', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur ipsam eveniet facilis totam ullam ex nam distinctio! In eum officiis quisquam cum, at, aliquid reiciendis ipsum totam eaque delectus dignissimos! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum perferendis non quam sapiente quis perspiciatis esse corrupti, error totam in aut repellendus, dignissimos eligendi quas sequi commodi dolores, voluptas neque assumenda ullam corporis? Perspiciatis itaque modi id rem, aspernatur cupiditate mollitia corrupti. Explicabo assumenda sequi deserunt voluptatem vitae labore velit.', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your description here', 'posttype-search-elementor' ),
			]
		);

        $this->add_control(
			'readmore1_title',
			[
				'label' => esc_html__( 'Box Button Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);


        $this->add_control(
			'readmore1_model_title',
			[
				'label' => esc_html__( 'POPUP Button Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);

		$this->add_control(
			'readmore1_model_link',
			[
				'label' => esc_html__( 'Popup Link', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'posttype-search-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'image1_video1',
			[
				'label' => esc_html__( 'Image/Video', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'video',
				'options' => [
					'image'  => esc_html__( 'Show Image', 'posttype-search-elementor' ),
					'video' => esc_html__( 'Show Video', 'posttype-search-elementor' ),
				]
			]
		);

		$this->add_control(
			'image1_modal',
			[
				'label' => esc_html__( 'Choose Image', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'image1_video1' => 'image',
				],
			]
		);

		$this->add_control(
			'video1_id',
			[
				'label' => esc_html__( 'Vimeo Video ID', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( '747752214', 'posttype-search-elementor' ),
				'condition' => [
					'image1_video1' => 'video',
				],
			]
		);



		$this->end_controls_section();

		$this->start_controls_section(
			'content_section_box2',
			[
				'label' => esc_html__( 'Box Two', 'posttype-search-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'box2_title',
			[
				'label' => esc_html__( 'Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Lorem, ipsum dolor', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);

        $this->add_control(
			'box2_description',
			[
				'label' => esc_html__( 'Description', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur ipsam eveniet facilis totam ullam ex nam distinctio! In eum officiis quisquam cum, at, aliquid reiciendis ipsum totam eaque delectus dignissimos! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum perferendis non quam sapiente quis perspiciatis esse corrupti, error totam in aut repellendus, dignissimos eligendi quas sequi commodi dolores, voluptas neque assumenda ullam corporis? Perspiciatis itaque modi id rem, aspernatur cupiditate mollitia corrupti. Explicabo assumenda sequi deserunt voluptatem vitae labore velit.', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your description here', 'posttype-search-elementor' ),
			]
		);

        $this->add_control(
			'readmore2_title',
			[
				'label' => esc_html__( 'Box Button Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);


        $this->add_control(
			'readmore2_model_title',
			[
				'label' => esc_html__( 'POPUP Button Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);

		$this->add_control(
			'readmore2_model_link',
			[
				'label' => esc_html__( 'Popup Link', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'posttype-search-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'image2_video2',
			[
				'label' => esc_html__( 'Image/Video', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'video',
				'options' => [
					'image'  => esc_html__( 'Show Image', 'posttype-search-elementor' ),
					'video' => esc_html__( 'Show Video', 'posttype-search-elementor' ),
				]
			]
		);

		$this->add_control(
			'image2_modal',
			[
				'label' => esc_html__( 'Choose Image', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'image2_video2' => 'image',
				],
			]
		);

		$this->add_control(
			'video2_id',
			[
				'label' => esc_html__( 'Vimeo Video ID', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( '747752214', 'posttype-search-elementor' ),
				'condition' => [
					'image2_video2' => 'video',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'content_section_box3',
			[
				'label' => esc_html__( 'Box Three', 'posttype-search-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'box3_title',
			[
				'label' => esc_html__( 'Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Lorem, ipsum dolor', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);

        $this->add_control(
			'box3_description',
			[
				'label' => esc_html__( 'Description', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur ipsam eveniet facilis totam ullam ex nam distinctio! In eum officiis quisquam cum, at, aliquid reiciendis ipsum totam eaque delectus dignissimos! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum perferendis non quam sapiente quis perspiciatis esse corrupti, error totam in aut repellendus, dignissimos eligendi quas sequi commodi dolores, voluptas neque assumenda ullam corporis? Perspiciatis itaque modi id rem, aspernatur cupiditate mollitia corrupti. Explicabo assumenda sequi deserunt voluptatem vitae labore velit.', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your description here', 'posttype-search-elementor' ),
			]
		);

        $this->add_control(
			'readmore3_title',
			[
				'label' => esc_html__( 'Box Button Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);


        $this->add_control(
			'readmore3_model_title',
			[
				'label' => esc_html__( 'POPUP Button Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);

		$this->add_control(
			'readmore3_model_link',
			[
				'label' => esc_html__( 'Popup Link', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'posttype-search-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'image3_video3',
			[
				'label' => esc_html__( 'Image/Video', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'video',
				'options' => [
					'image'  => esc_html__( 'Show Image', 'posttype-search-elementor' ),
					'video' => esc_html__( 'Show Video', 'posttype-search-elementor' ),
				]
			]
		);

		$this->add_control(
			'image3_modal',
			[
				'label' => esc_html__( 'Choose Image', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'image3_video3' => 'image',
				],
			]
		);

		$this->add_control(
			'video3_id',
			[
				'label' => esc_html__( 'Vimeo Video ID', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( '747752214', 'posttype-search-elementor' ),
				'condition' => [
					'image3_video3' => 'video',
				],
			]
		);



		$this->end_controls_section();


		$this->start_controls_section(
			'content_section_box4',
			[
				'label' => esc_html__( 'Box Four', 'posttype-search-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'box4_title',
			[
				'label' => esc_html__( 'Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Lorem, ipsum dolor', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);

        $this->add_control(
			'box4_description',
			[
				'label' => esc_html__( 'Description', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur ipsam eveniet facilis totam ullam ex nam distinctio! In eum officiis quisquam cum, at, aliquid reiciendis ipsum totam eaque delectus dignissimos! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum perferendis non quam sapiente quis perspiciatis esse corrupti, error totam in aut repellendus, dignissimos eligendi quas sequi commodi dolores, voluptas neque assumenda ullam corporis? Perspiciatis itaque modi id rem, aspernatur cupiditate mollitia corrupti. Explicabo assumenda sequi deserunt voluptatem vitae labore velit.', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your description here', 'posttype-search-elementor' ),
			]
		);

        $this->add_control(
			'readmore4_title',
			[
				'label' => esc_html__( 'Box Button Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);


        $this->add_control(
			'readmore4_model_title',
			[
				'label' => esc_html__( 'POPUP Button Title', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'posttype-search-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'posttype-search-elementor' ),
			]
		);

		$this->add_control(
			'readmore4_model_link',
			[
				'label' => esc_html__( 'Popup Link', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'posttype-search-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'image4_video4',
			[
				'label' => esc_html__( 'Image/Video', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'video',
				'options' => [
					'image'  => esc_html__( 'Show Image', 'posttype-search-elementor' ),
					'video' => esc_html__( 'Show Video', 'posttype-search-elementor' ),
				]
			]
		);

		$this->add_control(
			'image4_modal',
			[
				'label' => esc_html__( 'Choose Image', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'condition' => [
					'image4_video4' => 'image',
				],
			]
		);

		$this->add_control(
			'video4_id',
			[
				'label' => esc_html__( 'Vimeo Video ID', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( '747752214', 'posttype-search-elementor' ),
				'condition' => [
					'image4_video4' => 'video',
				],
			]
		);



		$this->end_controls_section();


		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style Section', 'posttype-search-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'posttype-search-elementor' ),
				'selector' => '{{WRAPPER}} .main .box h2, {{WRAPPER}} .modal-content h2',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Content Typography', 'posttype-search-elementor' ),
				'selector' => '{{WRAPPER}} .main .box p, {{WRAPPER}} .modal-content .content',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'readmore_typography',
				'label' => esc_html__( 'Button Typography', 'posttype-search-elementor' ),
				'selector' => '{{WRAPPER}} .main .box .btn',
			]
		);

		$this->add_control(
			'Title_color',
			[
				'label' => esc_html__( 'Title Color of Boxes', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main .box h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'Title_color_block',
			[
				'label' => esc_html__( 'Title Color of Modal', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .modal-content h2' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'contetn_color',
			[
				'label' => esc_html__( 'Content Color of Boxes', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main .box p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'contetn_color_modal',
			[
				'label' => esc_html__( 'Content Color of Modal', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .modal-content .content' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'contetn_link_modal',
			[
				'label' => esc_html__( 'Read More Btn Color of Modal', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .modal-content .read-btn' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'readmore_color',
			[
				'label' => esc_html__( 'Button Color', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main .box .btn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'modal_color',
			[
				'label' => esc_html__( 'Modal Background Color', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .modal-content' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'boxes_bg_color',
			[
				'label' => esc_html__( 'Boxes Background Color', 'posttype-search-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main .bx' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'posttype-search-elementor' ),
				'selector' => '{{WRAPPER}} .main .bx',
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
		if ( ! empty( $settings['readmore1_model_link']['url'] ) ) {
			$this->add_link_attributes( 'readmore1_model_link', $settings['readmore1_model_link'] );
		}
		if ( ! empty( $settings['readmore2_model_link']['url'] ) ) {
			$this->add_link_attributes( 'readmore2_model_link', $settings['readmore2_model_link'] );
		}
		if ( ! empty( $settings['readmore3_model_link']['url'] ) ) {
			$this->add_link_attributes( 'readmore3_model_link', $settings['readmore3_model_link'] );
		}
		if ( ! empty( $settings['readmore4_model_link']['url'] ) ) {
			$this->add_link_attributes( 'readmore4_model_link', $settings['readmore4_model_link'] );
		}
        ?>
        <style>
            .main{
                max-width: 1440px;
                margin: auto;
                display: flex;
            }

			.main .d-none{
				display: none;
			}

            .main .box P{
                padding: 0 50px;
            }

            .main .box h2{
                color: #3183e9;
                margin: 0;
            }

            .main .box span{
                color: white;
            }

            .main .container-1{
                max-width: 40%;
                margin: 5px 10px 0px 5px;
                display: flex;
                flex-direction: column;
            }

            .main .container-1 .box-1, .box-2{
                border: 2px solid;
                text-align: center;
            }

            .main .container-1 .box-1{
                margin-bottom: 11px;
                flex: 3;
            }

            .main .container-1 .box-1 .btn{
                padding: 10px 15px;
                background: #3183e9;
                border-radius: 20px;
                cursor: pointer;
            }

            .main .container-1 .box-2{
                flex: 2;
            }

            .main .container-1 .box-2 .btn{
                padding: 10px 15px;
                background: #3183e9;
                border-radius: 20px;
                cursor: pointer;
            }

            .main .container-2{
                display: flex;
                flex-direction: column;
            }

            .main .container-2 .cont{
                flex: 1;
                display: flex;
                margin: 5px 2px 10px 0px;
            }

            .main .container-2 .cont .box-3, .box-4{
                border: 2px solid;
                text-align: center;
            }

            .main .container-2 .cont .box-3{
                margin-right: 10px;
            }
            .main .container-2 .box-5{
                flex: 2;
                position: relative;
				display: flex;
				justify-content: center;
				align-items: center;
            }

            .main .container-2 .cont .box-3 .btn{
                background: #3183e9;
                padding: 10px 20px;
                border-radius: 20px;
                cursor: pointer;
            }

            .main .container-2 .cont .box-4 .btn{
                background: #3183e9;
                padding: 10px 20px;
                border-radius: 20px;
                cursor: pointer; 
            }

            .main .box{
                padding: 15px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .main .box .btn{
                width: fit-content;
                padding: 15px;
            }

            .main .modal{
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                opacity: 0;
                visibility: hidden;
                transform: scale(1.1);
                transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
            }

            .main .show-modal{
                opacity: 1;
                visibility: visible;
                transform: scale(1.0);
                transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
            }

            .close-button {
                float: right;
                width: 1.5rem;
                line-height: 1.5rem;
                text-align: center;
                cursor: pointer;
                border-radius: 0.25rem;
                background-color: lightgray;
                margin-left: 30px;
            }
            .close-button:hover {
                background-color: darkgray;
            }
            .show-modal {
                opacity: 1;
                visibility: visible;
                transform: scale(1.0);
                transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
            }
            .close-model{
            display: flex;
            align-items: center;
            position: absolute;
            bottom: 20px;
            right: 20px;
            }

            .modal-content {
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				background-color: #ddac7c;
				padding: 15px 0 60px 15px;
				width: 100%;
				border-radius: 0.5rem;
				height: 100%;
				display: flex;
				align-items: center;
				justify-content: center;
				color: #fff;
				border-radius: 0;
            }

			.modal-content .read-btn{
				font-weight: 500;
				cursor: pointer;
				display: block;
			}

			@media ( max-width: 1098px ){
				.main{
					display: initial;
				}

				.main .container-1{
					flex-direction: row;
					max-width: 100%;
					margin: 0;
				}
				.main .container-1 .box-1{
					flex: 1;
					margin: 0 10px 10px 0;
				}
				.main .container-1 .box-2{
					flex: 1;
					margin: 0 0 10px 0;
				}
				.main .container-2{
					flex-direction: column-reverse;
				}
				.main .container-2 .cont  .box-3{
					flex: 1;
					margin: 10px 10px 0 0;
				}
				.main .container-2 .cont .box-4{
					flex: 1;
					margin: 10px 0 0 0;
				}
				.main .container-2 .cont{
					margin: 0;
				}
				
			}

			@media ( max-width: 868px ){
				.main  h2{
					font-size: 22px !important;
					line-height: normal !important;
				}
				.main  p{
					font-size: 13px;
					line-height: normal;
				}
				.main .btn{
					padding: 6px 15px !important;
					font-size: 13px !important;
				}
				.main iframe{
					height: 230px;
				}
				
			}

			@media ( max-width: 560px ){
				.main .container-1{
					flex-direction: column;
				}
				.main .container-2 .cont{
					flex-direction: column;
				}


				.main .container-1 .box-2{
					margin: 0 10px 10px 0;
				}
				.main .container-2 .cont .box-4{
					margin: 10px 10px 0 0;
				}
				
				.main .container-2 .box-5{
					margin-right: 10px;
				}
			}

			.main .video_image_popup{
				height: 358.05px;
				object-fit: cover;
				width: -webkit-fill-available;
			}
        </style>
        <div class="main">
            <div class="container-1">
                <div class="box-1 box bx" id="box-one" data-image="<?php echo $settings['image1_modal']['url']; ?>" data-video="<?php echo $settings['video1_id'] ?>" >
                    <h2><?php echo $settings['box1_title']; ?></h2>
                    <p><?php echo substr_replace(strip_tags($settings['box1_description']), "...", 100); ?></p>
                    <div class="btn trigger" id="btn-box-1" data-btn="modal-box1" >
                        <span><?php echo $settings['readmore1_title']; ?></span>
                    </div>
                </div>
                <div class="box-2 box bx" data-image="<?php echo $settings['image2_modal']['url']; ?>" data-video="<?php echo $settings['video2_id'] ?>" >
                    <h2><?php echo $settings['box2_title']; ?></h2>
                    <p><?php echo substr_replace(strip_tags($settings['box2_description']), "...", 100); ?></p>
                    <div class="btn trigger" data-btn="modal-box2">
                        <span><?php echo $settings['readmore2_title']; ?></span>
                    </div>
                </div>
            </div>
            <div class="container-2">
                <div class="cont">
                <div class="box-3 box bx"  data-image="<?php echo $settings['image3_modal']['url']; ?>" data-video="<?php echo $settings['video3_id'] ?>" >
                    <h2><?php echo $settings['box3_title']; ?></h2>
                    <p><?php echo substr_replace(strip_tags($settings['box3_description']), "...", 40); ?></p>
                    <div class="btn trigger" data-btn="modal-box3">
                        <span><?php echo $settings['readmore3_title']; ?></span>
                    </div>
                </div>
                <div class="box-4 box bx" data-image="<?php echo $settings['image4_modal']['url']; ?>" data-video="<?php echo $settings['video4_id'] ?>" >
                    <h2><?php echo $settings['box4_title']; ?></h2>
                    <p><?php echo substr_replace(strip_tags($settings['box4_description']), "...", 40); ?></p>
                    <div class="btn trigger" data-btn="modal-box4" >
                        <span><?php echo $settings['readmore4_title']; ?></span>
                    </div>
                </div>
                </div>
                <div class="box-5 bx" id="video-box">
				<iframe src="https://player.vimeo.com/video/<?php echo $settings['video1_id'] == '' ? "747752214" : $settings['video1_id'];  ?>" width="100%" height="350" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    <div class="modal">
                    <div class="modal-content">
                        <div class="close-model">
                        <span class="close-button">×</span>
                        </div>
                        <div style="height: 100%; overflow-y: auto; padding-right: 25px;">
							<div class="modal-box1 d-none modal-box">
								<h2><?php echo $settings['box1_title']; ?></h2>
								<div class="content">
									<?php echo $settings['box1_description']; ?>
								</div>
								<a <?php echo $this->get_render_attribute_string( 'readmore1_model_link' ); ?> class="read-btn"><?php echo $settings['readmore1_model_title']; ?></a>
							</div>
							<div class="modal-box2 d-none modal-box">
								<h2><?php echo $settings['box2_title']; ?></h2>
								<div class="content">
									<?php echo $settings['box2_description']; ?>
								</div>
								<a <?php echo $this->get_render_attribute_string( 'readmore2_model_link' ); ?> class="read-btn"><?php echo $settings['readmore2_model_title']; ?></a>
							</div>
							<div class="modal-box3 d-none modal-box">
								<h2><?php echo $settings['box3_title']; ?></h2>
								<div class="content">
									<?php echo $settings['box3_description']; ?>
								</div>
								<a <?php echo $this->get_render_attribute_string( 'readmore3_model_link' ); ?> class="read-btn"><?php echo $settings['readmore3_model_title']; ?></a>
							</div>
							<div class="modal-box4 d-none modal-box">
								<h2><?php echo $settings['box4_title']; ?></h2>
								<div class="content">
									<?php echo $settings['box4_description']; ?>
								</div>
								<a <?php echo $this->get_render_attribute_string( 'readmore4_model_link' ); ?> class="read-btn"><?php echo $settings['readmore4_model_title']; ?></a>
							</div>
						</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <script>
            var triggers = document.querySelectorAll(".trigger");
            var boxes = document.querySelectorAll(".main .box");
            var modal = document.querySelector(".modal");
            var closeButton = document.querySelector(".close-button");
            function toggleModal(event) {
		
            	modal.classList.toggle("show-modal");

				document.querySelectorAll(".main .modal-content .modal-box").forEach(mod => {
					mod.classList.add("d-none");
				});
				var className = event.currentTarget.getAttribute("data-btn");
				if(className){
					document.querySelector(".modal-content ."+className).classList.remove("d-none");
				}
				

            }
            function windowOnClick(event) {
				if (event.target === modal) {
					toggleModal();
				}
            }

			function boxData(event){
				var image = event.currentTarget.getAttribute("data-image");
				var video = event.currentTarget.getAttribute("data-video");
				if(video === ""){
					if(image !== ''){
						// Reseting the images
						var imgEl = document.querySelector(".main .box-5 .video_image_popup");
						if(imgEl){
							imgEl.remove();
						}

						document.querySelector(".main .box-5 iframe").classList.add("d-none");
						var img = document.createElement('img');
           				img.src = image;
           				img.classList.add("video_image_popup");
						   document.querySelector(".main .box-5").prepend(img)
						return;
					}
				}else{
					var imgEl = document.querySelector(".main .box-5 .video_image_popup");
					if(imgEl){
						imgEl.remove();
					}

					document.querySelector(".main .box-5 iframe").classList.remove("d-none");
					document.querySelector(".main .box-5 iframe").src = "https://player.vimeo.com/video/" + video;
				}
			}


            triggers.forEach(function(trigger){
                trigger.addEventListener("click", toggleModal);
            })
            boxes.forEach(function(box){
                box.addEventListener("click", boxData);
            })
            closeButton.addEventListener("click", toggleModal);
            window.addEventListener("click", windowOnClick);
        </script>

        <?php
	}


}