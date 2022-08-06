<?php

/**
 * Elementor Questionaire
 *
 * @package           Elementor Questionaire
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
class questionaire_widget_elementore extends \Elementor\Widget_Base {
	

	public function get_style_depends() {

		wp_register_style( 'questionaire-style', plugins_url( 'assets/css/style.css', __FILE__ ) );

		return [
			'questionaire-style',
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
		return 'Questionaire';
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
		return esc_html__( 'Questionaire', 'elementor-questionaire' );
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
		return [ 'el-questionaire' ];
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
		return [ 'questionaire', 'widgets', 'custom', 'questionaire widgets' ];
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
				'label' => esc_html__( 'Questionaire', 'elementor-questionaire' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'font_family_ques',
			[
				'label' => esc_html__( 'Font Family', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "Poppins",
				'selectors' => [
					'{{WRAPPER}} #questionaire' => 'font-family: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'content_showques',
			[
				'label' => esc_html__( 'Show Content', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'elementor-questionaire' ),
				'label_off' => esc_html__( 'Hide', 'elementor-questionaire' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'widget_title_ques',
			[
				'label' => esc_html__( 'Title', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Americans With Over $15,000 In Debt Could Receive Debt Elimination. Check Eligibility Below.', 'elementor-questionaire' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor-questionaire' ),
				'condition' => [
					'content_showques' => [ 'yes' ],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Title Typography', 'elementor-questionaire' ),
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} h1',
				'condition' => [
					'content_showques' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'hr1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'condition' => [
					'content_showques' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'image_ques',
			[
				'label' => esc_html__( 'Choose Image', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'content_showques' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'condition' => [
					'content_showques' => [ 'yes' ],
				],
			]
		);

		$this->add_control(
			'item_description_ques',
			[
				'label' => esc_html__( 'Description', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( "                <p>
					<strong>Rarely Advertised Program is helping adults who have over $10,000 
					in debt find relief from late payments and high-interest balances.</strong> 
					</p>
					<p>Millions of Americans are qualified to receive Financial Forgiveness through this new policy 
						to relieve stress from Credit Card Payments, Medical Bills, Utility Payments, and other unsecured debts. 
					</p>
					<h2>How Do I Check If I Qualify?</h2>
					<p>It's easy and completely free to check eligibility. Follow the steps below to get started. </p>
					<ul>
						<li><i></i><strong>Step 1: </strong> Confirm How Much You Owe</li>
						<li><i></i><strong>Step 2: </strong> Choose What You Need Relief For</li>
						<li><i></i><strong>Step 3: </strong> See If You Qualify to Claim Forgiveness</li>
					</ul>", 'elementor-questionaire' ),
				'placeholder' => esc_html__( 'Type your description here', 'elementor-questionaire' ),
				'condition' => [
					'content_showques' => [ 'yes' ],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slide_one',
			[
				'label' => esc_html__( 'Question Slides', 'elementor-questionaire' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Slides Questions Typography', 'elementor-questionaire' ),
				'name' => 'slides_typography',
				'selector' => '{{WRAPPER}} #questionaire .ques-box .slides .slide h2',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Slides Options Typography', 'elementor-questionaire' ),
				'name' => 'options_typography',
				'selector' => '{{WRAPPER}} #questionaire .ques-box .slides .slide .options .option',
			]
		);

		$this->add_control(
			'options_color',
			[
				'label' => esc_html__( 'Option Buttons Color', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #questionaire .ques-box .slides .slide .options .option' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'hr3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'slides_nos',
			[
				'label' => esc_html__( 'How many Slides?', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 3,
				'step' => 1,
				'default' => 3,
			]
		);

		$this->add_control(
			'more_optionsques1',
			[
				'label' => esc_html__( 'Slide ONE', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'slides_nos' => [ 1, 2, 3 ],
				],
			]
		);

		$this->add_control(
			'slide1_title_ques',
			[
				'label' => esc_html__( 'Slide One Question', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Do you Live in The USA?', 'elementor-questionaire' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor-questionaire' ),
				'condition' => [
					'slides_nos' => [ 1, 2, 3 ],
				],
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'button_title_slide1', [
				'label' => esc_html__( 'Slide One Options', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Yes' , 'elementor-questionaire' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'options_slide1',
			[
				'label' => esc_html__( 'Options List', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'button_title_slide1' => esc_html__( 'Yes', 'elementor-questionaire' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'elementor-questionaire' ),
					],
				],
				'title_field' => '{{{ button_title_slide1 }}}',
				'condition' => [
					'slides_nos' => [ 1, 2, 3 ],
				],
			]
		);
		
		$this->add_control(
			'hr4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'more_optionsques2',
			[
				'label' => esc_html__( 'Slide TWO', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'slides_nos' => [ 2, 3 ],
				],
			]
		);

		$this->add_control(
			'slide2_title_ques',
			[
				'label' => esc_html__( 'Slide Two Question', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Click Below to Qualify for Debt Elimination', 'elementor-questionaire' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor-questionaire' ),
				'condition' => [
					'slides_nos' => [ 2, 3 ],
				],
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'button_title_slide2', [
				'label' => esc_html__( 'Slide Two Options', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Yes' , 'elementor-questionaire' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'options_slide2',
			[
				'label' => esc_html__( 'Options List', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'button_title_slide2' => esc_html__( 'Yes', 'elementor-questionaire' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'elementor-questionaire' ),
					],
				],
				'title_field' => '{{{ button_title_slide2 }}}',
				'condition' => [
					'slides_nos' => [ 2, 3 ],
				],
			]
		);
		
		$this->add_control(
			'hr5',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'more_optionsques3',
			[
				'label' => esc_html__( 'Slide THREE', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'slides_nos' => [ 3 ],
				],
			]
		);

		$this->add_control(
			'slide3_title_ques',
			[
				'label' => esc_html__( 'Slide Three Question', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'This is Qustion Three?', 'elementor-questionaire' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor-questionaire' ),
				'condition' => [
					'slides_nos' => [ 3 ],
				],
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'button_title_slide3', [
				'label' => esc_html__( 'Slide Three Options', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Yes' , 'elementor-questionaire' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'options_slide3',
			[
				'label' => esc_html__( 'Options List', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'button_title_slide3' => esc_html__( 'Yes', 'elementor-questionaire' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'elementor-questionaire' ),
					],
				],
				'title_field' => '{{{ button_title_slide3 }}}',
				'condition' => [
					'slides_nos' => [ 3 ],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'results_slide',
			[
				'label' => esc_html__( 'Result Slide', 'elementor-questionaire' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'progress_bar_color',
			[
				'label' => esc_html__( 'Progress Bar Color', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #questionaire #myBar' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'result_title_ques',
			[
				'label' => esc_html__( 'Title', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Congratulations!', 'elementor-questionaire' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor-questionaire' ),
			]
		);

		$this->add_control(
			'resultbtnTop_ques',
			[
				'label' => esc_html__( 'Description', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( "              <div class='loadingCopy'>You Pre-Qualify for
                <b>
                  <font> Financial Forgiveness for Credit Card Payments, Medical Bills, and more. </font>
                </b>
              </div>
              <p>
                <strong>Click below to claim your relief before spots run out.</strong>
              </p>", 'elementor-questionaire' ),
				'placeholder' => esc_html__( 'Type your description here', 'elementor-questionaire' ),
			]
		);

		$this->add_control(
			'phoneNotext',
			[
				'label' => esc_html__( 'Button Text', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CALL 123456789', 'elementor-questionaire' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor-questionaire' ),
			]
		);

		$this->add_control(
			'buttonLinkQues',
			[
				'label' => esc_html__( 'Button Link', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-questionaire' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => 'tel:+123456789',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'linkColorQues',
			[
				'label' => esc_html__( 'Link Button Color', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #questionaire .ques-box .results a' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'result_btnbottom_ques',
			[
				'label' => esc_html__( 'Below Button Text', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Act quickly!', 'elementor-questionaire' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor-questionaire' ),
			]
		);

		$this->add_control(
			'time_title',
			[
				'label' => esc_html__( 'Time Text', 'elementor-questionaire' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'This pre-approval expires in', 'elementor-questionaire' ),
				'placeholder' => esc_html__( 'Type your title here', 'elementor-questionaire' ),
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
		if ( ! empty( $settings['buttonLinkQues']['url'] ) ) {
			$this->add_link_attributes( 'buttonLinkQues', $settings['buttonLinkQues'] );
		}
		
        ?>
        <div id="questionaire">
            <div class="ques-box">
				<?php
				if($settings['content_showques']){
					?>
					<div class="content">
						<h1><?php echo $settings['widget_title_ques'] ?></h1>
						<img src="<?php echo $settings['image_ques']['url']; ?>" alt="check image">
						<?php echo $settings['item_description_ques']; ?>
					</div>
					<?php
				}
				?>
                <div class="slides">
					<?php
					if($settings['slides_nos'] === 3){
						?>
						<div class="slide slide0">
							<h2><?php echo $settings['slide1_title_ques'] ?></h2>
							<div class="options">
								<?php
								if($settings['options_slide1']){
									foreach (  $settings['options_slide1'] as $item ) {
										?>
										<button class="option" data-option="1"><?php echo $item['button_title_slide1']; ?></button>
										<?php
									}
								}
								?>
							</div>
						</div>
						<div class="slide slide1 d-none">
							<h2><?php echo $settings['slide2_title_ques'] ?></h2>
							<div class="options">
								<?php
								if($settings['options_slide2']){
									foreach (  $settings['options_slide2'] as $item ) {
										?>
										<button class="option" data-option="2"><?php echo $item['button_title_slide2']; ?></button>
										<?php
									}
								}
								?>
							</div>
						</div>
						<div class="slide slide2 last d-none">
							<h2><?php echo $settings['slide3_title_ques'] ?></h2>
							<div class="options">
								<?php
								if($settings['options_slide3']){
									foreach (  $settings['options_slide3'] as $item ) {
										?>
										<button class="option" data-option="3"><?php echo $item['button_title_slide3']; ?></button>
										<?php
									}
								}
								?>
							</div>
						</div>
						<?php
					}elseif($settings['slides_nos'] === 2){
						?>
						<div class="slide slide0">
							<h2><?php echo $settings['slide1_title_ques'] ?></h2>
							<div class="options">
								<?php
								if($settings['options_slide1']){
									foreach (  $settings['options_slide1'] as $item ) {
										?>
										<button class="option" data-option="1"><?php echo $item['button_title_slide1']; ?></button>
										<?php
									}
								}
								?>
							</div>
						</div>
						<div class="slide slide1 d-none">
							<h2><?php echo $settings['slide2_title_ques'] ?></h2>
							<div class="options">
								<?php
								if($settings['options_slide2']){
									foreach (  $settings['options_slide2'] as $item ) {
										?>
										<button class="option" data-option="2"><?php echo $item['button_title_slide2']; ?></button>
										<?php
									}
								}
								?>
							</div>
						</div>
						<?php
					}elseif($settings['slides_nos'] === 1){
						?>
						<div class="slide slide0">
							<h2><?php echo $settings['slide1_title_ques'] ?></h2>
							<div class="options">
								<?php
								if($settings['options_slide1']){
									foreach (  $settings['options_slide1'] as $item ) {
										?>
										<button class="option" data-option="1"><?php echo $item['button_title_slide1']; ?></button>
										<?php
									}
								}
								?>
							</div>
						</div>
						<?php
					}
					?>
                </div>
                <div id="myProgress" class="d-none">
                <div id="myBar"></div>
                </div>
                <div class="results d-none">
                <div class="content">
                    <div class="loading">
						<div id="loading1" >Reviewing Your Answers...</div>  
						<div id="loading2" class="d-none" >Matching You with the Best Options...</div>  
						<div id="loading3" class="d-none" >Confirming Eligibility...</div>  
                    </div>
                    <div class="afterLoading d-none">
                    <h3><?php echo $settings['result_title_ques'] ?></h3>
                    <?php echo $settings['resultbtnTop_ques']; ?>
                    <a onClick="fbq('track', 'Lead')" <?php echo $this->get_render_attribute_string( 'buttonLinkQues' ); ?>><?php echo $settings['phoneNotext'] ?></a>
                    <p>
                        <strong><?php echo $settings['result_btnbottom_ques'] ?></strong>
                    </p>
                    <p>
                        <strong><?php echo $settings['time_title'] ?> <span id="countingItem">02:00</span></strong>
                    </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <?php
	}


}