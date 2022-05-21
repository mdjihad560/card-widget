<?php

class Elementor_Card_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'card_widget';
	}

	public function get_title() {
		return esc_html__( 'Card Widget', 'card-addon' );
	}

	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	public function get_custom_help_url() {
		return 'https://go.elementor.com/widget-name';
	}

	public function get_categories() {
		return [ 'card-addon-category' ];
	}

	public function get_keywords() {
		return [ 'card', 'card' ];
	}

  protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'card-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Team Image
		$this->add_control(
			'card_image',
			[
				'label' => esc_html__( 'Choose Image', 'card-addon' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		// card icon
		$this->add_control(
			'card_icon',
			[
				'label' => esc_html__( 'Icon', 'card-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
		// card name
		$this->add_control(
			'card_name',
			[
				'label' => esc_html__( 'Name', 'card-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Name', 'card-addon' ),
				'placeholder' => esc_html__( 'Type your title here', 'card-addon' ),
			]
		);

		$this->add_control(
			'card_icon_hide',
			[
				'label' => esc_html__( 'Social Hide?', 'simple-team-addon' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'simple-team-addon' ),
				'label_off' => esc_html__( 'Hide', 'simple-team-addon' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		
		$this->end_controls_section();

		// start style parts

			// Image
			$this->start_controls_section(
				'card_image_style',
				[
					'label' => esc_html__( 'Image', 'card-addon' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);


			$this->add_control(
				'object-position',
				[
					'label' => esc_html__( 'Object Position', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'center top',
					'options' => [
						'center center'  => esc_html__( 'Center', 'card-addon' ),
						'center top'  => esc_html__( 'Top', 'card-addon' ),
						'center bottom'  => esc_html__( 'Bottom', 'card-addon' ),
					],
					'selectors' => [
						'{{WRAPPER}} .card-thumb img' => 'object-position: {{SIZE}};',
					],
				]
			);
			

			$this->add_control(
				'card_iamge_width',
				[
					'label' => esc_html__( 'Width', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 100,
					],
					'selectors' => [
						'{{WRAPPER}} .card-thumb img' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'card_height_width',
				[
					'label' => esc_html__( 'Height', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => '%',
						'size' => 100,
					],
					'selectors' => [
						'{{WRAPPER}} .card-thumb img' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

	
			$this->add_control(
				'card_image_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .card-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);
			$this->end_controls_section();
			// end image

			// icon
			$this->start_controls_section(
				'icon_style_section',
				[
					'label' => esc_html__( 'Icon', 'card-addon' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
	
			$this->start_controls_tabs(
				'icon_style_tabs'
			);

			$this->add_control(
				'icon_style_layout',
				[
					'label' => esc_html__( 'Select Icon Style', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'icon-default',
					'options' => [
						'icon-default'  => esc_html__( 'Default', 'card-addon' ),
						'icon-style1'  => esc_html__( 'Icon Style 1', 'card-addon' ),
					],
				]
			);
	
			$this->start_controls_tab(
				'icon_style_normal_tab',
				[
					'label' => esc_html__( 'Normal', 'card-addon' ),
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'icon_background',
					'label' => esc_html__( 'Background', 'card-addon' ),
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .card-icon',
				]
			);

			$this->add_control(
				'icon_fill_color',
				[
					'label' => esc_html__( 'Color', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .card-icon i' => 'color: {{VALUE}}',
						'{{WRAPPER}} .card-icon path' => 'fill: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'icon_stroke_color',
				[
					'label' => esc_html__( 'Stroke Color', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .card-icon path' => 'stroke: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'card_icon_width',
				[
					'label' => esc_html__( 'Width', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 1,
						],
					
					],
			
					'selectors' => [
						'{{WRAPPER}} .card-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_control(
				'icon_size',
				[
					'label' => esc_html__( 'Size', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px'],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 20,
					],
					'selectors' => [
						'{{WRAPPER}} .card-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .card-icon svg' => 'width: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_control(
				'icon_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .card-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'icon_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'card-addon' ),
					'selector' => '{{WRAPPER}} .card-icon',
				]
			);
	
			$this->end_controls_tab();

			// icon hover
	
			$this->start_controls_tab(
				'icon_style_hover_tab',
				[
					'label' => esc_html__( 'Hover', 'card-addon' ),
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'icon_hover_background',
					'label' => esc_html__( 'Background', 'card-addon' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .card-item:hover .card-icon',
				]
			);

			$this->add_control(
				'icon_hover_fill_color',
				[
					'label' => esc_html__( 'Color', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .card-item:hover .card-icon i' => 'color: {{VALUE}}',
						'{{WRAPPER}} .card-item:hover .card-icon path' => 'fill: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'icon_hover_stroke_color',
				[
					'label' => esc_html__( 'Stroke Color', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .card-item:hover .card-icon path' => 'stroke: {{VALUE}}',
					],
				]
			);
			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'icon_hover_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'card-addon' ),
					'selector' => '{{WRAPPER}} .card-item:hover .card-icon',
				]
			);

			$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->end_controls_section();

			// start title

				$this->start_controls_section(
					'name_style_section',
					[
						'label' => esc_html__( 'Name', 'card-addon' ),
						'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					]
				);
		
				$this->start_controls_tabs(
					'name_style_tabs'
				);
		
				$this->start_controls_tab(
					'name_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'card-addon' ),
					]
				);
	
				$this->add_control(
					'name_color',
					[
						'label' => esc_html__( 'Color', 'card-addon' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .card-data h4' => 'color: {{VALUE}}',
						],
					]
				);

				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'name_typography',
						'selector' => '{{WRAPPER}} .card-data h4',
					]
				);
				$this->add_group_control(
					\Elementor\Group_Control_Text_Shadow::get_type(),
					[
						'name' => 'name_text_shadow',
						'label' => esc_html__( 'Text Shadow', 'card-addon' ),
						'selector' => '{{WRAPPER}} .card-data h4',
					]
				);
				$this->add_control(
					'name_margin',
					[
						'label' => esc_html__( 'Margin', 'card-addon' ),
						'type' => \Elementor\Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .card-data h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);
				$this->end_controls_tab();
	
				// name hover
		
				$this->start_controls_tab(
					'name_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'card-addon' ),
					]
				);

				$this->add_control(
					'name_Hover_color',
					[
						'label' => esc_html__( 'Color', 'card-addon' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .card-item:hover .card-data h4' => 'color: {{VALUE}}',
						],
					]
				);
				$this->end_controls_tab();
				$this->end_controls_tabs();
	
				$this->end_controls_section();

				// Box
			$this->start_controls_section(
				'card_box_style',
				[
					'label' => esc_html__( 'Box', 'card-addon' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'card_box_background',
					'label' => esc_html__( 'Background', 'card-addon' ),
					'types' => [ 'classic', 'gradient', 'video' ],
					'selector' => '{{WRAPPER}} .card-data',
				]
			);
	

			$this->add_control(
				'card_box_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .card-data' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before'
				]
			);
			$this->add_control(
				'card_box_padding',
				[
					'label' => esc_html__( 'Padding', 'card-addon' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .card-data' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'card_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'card-addon' ),
					'selector' => '{{WRAPPER}} .card-data',
					'separator' => 'before'
				]
			);
	
			
			$this->end_controls_section();
			// end image


	}

  protected function render() {
    $settings = $this->get_settings_for_display();
		$card_image = $settings['card_image'];
		$card_icon = $settings['card_icon'];
		$card_name = $settings['card_name'];
		$card_icon_hide = $settings['card_icon_hide'];
		$icon_style_layout = $settings['icon_style_layout'];

		?>
		<div class="card-item">
				<div class="card-thumb">
					<img src="<?php echo esc_url($card_image['url'])?>" alt="">
							<?php if (($card_name) || ($card_icon)) : ?>
									<div class="card-data">
											<?php if($card_icon_hide == 'yes') : ?>
													<div class="card-icon <?php echo $icon_style_layout ?>">
															<?php \Elementor\Icons_Manager::render_icon($card_icon, ['aria-hidden' => 'true']);?>
													</div>
											<?php endif;?>
											<?php if($card_name) : ?>
													<h4><?php echo esc_html($card_name)?></h4>
											<?php endif;?>
									</div>
							<?php endif;?>
					</div>
			</div>
		<?php
		}
}

