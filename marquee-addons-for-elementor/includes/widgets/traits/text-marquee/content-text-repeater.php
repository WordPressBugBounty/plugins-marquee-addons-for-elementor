<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

// Elementor Classes
use \Elementor\Controls_Manager;
use \Elementor\Repeater;

trait Textmarquee_Content_Text_Repeater {
    protected function content_text_repeater()
    {
		$this->start_controls_section(
			'deensimc_content_section',
			[
				'label' => esc_html__( 'Contents', 'marquee-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$deensimc_text_repeater = new Repeater();

		$deensimc_text_repeater->add_control(
			'deensimc_repeater_text_icon',
			[
				'label' => esc_html__( 'Text Icon', 'marquee-addons-for-elementor' ),
				'type' =>  Controls_Manager::ICONS,
				'label_block' => true,
                'skin' => 'inline',
                'default' => [
                    'value' => 'fas fa-check',
                    'library' => 'fa-solid',
                ],
			]
		);

		$deensimc_text_repeater->add_control(
			'deensimc_repeater_text',
			[
				'label' => esc_html__( 'Text', 'marquee-addons-for-elementor' ),
				'type' =>  Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'marquee-addons-for-elementor' ),
				'placeholder' => esc_html__( 'Type your title here', 'marquee-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'deensimc_repeater_text_main',
			[
				'label' => esc_html__( 'Text List', 'marquee-addons-for-elementor' ),
				'type' =>  Controls_Manager::REPEATER,
				'fields' => $deensimc_text_repeater->get_controls(),
				'default' => [
					[
						'deensimc_repeater_text' => esc_html__( 'Item content. Click the edit button to change this text.', 'marquee-addons-for-elementor' ),
					],
					[
						'deensimc_repeater_text' => esc_html__( 'Item content. Click the edit button to change this text.', 'marquee-addons-for-elementor' ),
					],
				],
				'title_field' => '{{{ deensimc_repeater_text }}}',
			]
		);

		$this->add_control(
			'deensimc_slide_position',
			[
				'label' => esc_html__( 'Show Vertical', 'marquee-addons-for-elementor' ),
				'type' =>  Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'marquee-addons-for-elementor' ),
				'label_off' => esc_html__( 'Hide', 'marquee-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'deensimc_slide_direction',
			[
				'label' => esc_html__( 'Show Reverse', 'marquee-addons-for-elementor' ),
				'type' =>  Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'marquee-addons-for-elementor' ),
				'label_off' => esc_html__( 'Hide', 'marquee-addons-for-elementor' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_responsive_control(
			'deensimc_text_marquee_alignment',
			[
				'label' => esc_html__( 'Alignment', 'marquee-addons-for-elementor' ),
				'type' =>  Controls_Manager::CHOOSE,
				'options' => [
					'start' => [
						'title' => esc_html__( 'Left', 'marquee-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'marquee-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'end' => [
						'title' => esc_html__( 'Right', 'marquee-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .deensimc-marquee-vertical, .deensimc-marquee-vertical .deensimc-marquee-group' => 'align-items: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
    }
}