<?php
namespace MetForm_Pro\Traits;

use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Utils;


defined( 'ABSPATH' ) || exit;

/*
* This is a global widget control trait. 
* There are some different fucntions for different control section. 
* For registering any widget just use this trait and call control section function which you want to use.
*/

trait Quiz_Control{

	protected function get_form_type(){
		$post_id = get_the_ID();
		$form_type = isset(\MetForm\Core\Forms\Action::instance()->get_all_data($post_id)['form_type']) ? 
		\MetForm\Core\Forms\Action::instance()->get_all_data($post_id)['form_type'] : 'contact_form';
		return $form_type;
	}

	protected function quiz_controls($param = []) {

		$this->add_control(
			'mf_input_label_status',
			[
				'label' => esc_html__( 'Label', 'metform-pro' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'mf_input_name',
			[
				'label' => esc_html__( 'Name', 'metform-pro' ),
				'type' => Controls_Manager::TEXT,
				'default' => $this->get_name(),
				'title' => esc_html__( 'Enter name of the input', 'metform-pro' ),
				'description' => esc_html__('Name is must required. Enter name without space or any special character. use only underscore/ hyphen (_/-) for multiple word. Name must be different.', 'metform-pro'),
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'mf_input_label',
			[
				'label' => esc_html__( 'Label', 'metform-pro' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 2,
				'default' => esc_html__( 'Question', 'metform-pro' ),
				'title' => esc_html__( 'Enter question', 'metform-pro' ),
				'placeholder' => esc_html__( 'Enter question', 'metform-pro' ),
			]
		);

		$this->add_control(
			'mf_quiz_point',
			[
				'label' => esc_html__( 'Point', 'metform-pro' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 0,
				'min' => 0,
				'title' => esc_html__( 'Enter point', 'metform-pro' ),
				'placeholder' => esc_html__( 'Enter point', 'metform-pro' ),
				'description' => esc_html__( "Note: if the point and the negative point both are set at zero, we won't consider it a question.", 'metform-pro' ),
			]
		);

		if(in_array('text', $param)){
			$this->add_control(
				'mf_quiz_add_answer',
				[
					'label' => esc_html__( 'Add answer for the question?', 'metform-pro' ),
					'type' => Controls_Manager::SWITCHER,
					'default' => 'no',
					'label_on' => 'Yes',
					'label_off' => 'No',
					'return_value' => 'yes',
				]
			);
	
			$this->add_control(
				'mf_quiz_question_answer',
				[
					'label' => esc_html__( 'Answer:', 'metform-pro' ),
					'type' => Controls_Manager::TEXTAREA,
					'rows' => 2,
					'title' => esc_html__( 'Enter answer', 'metform-pro' ),
					'placeholder' => esc_html__( 'Enter answer', 'metform-pro' ),
					'condition' => [
						'mf_quiz_add_answer' => 'yes',
					],
				]
			);

			$this->add_control(
				'mf_quiz_add_negative_point',
				[
					'label' => esc_html__( 'Add negative point?', 'metform-pro' ),
					'type' => Controls_Manager::SWITCHER,
					'default' => 'no',
					'label_on' => 'Yes',
					'label_off' => 'No',
					'return_value' => 'yes',
					'condition' => [
						'mf_quiz_add_answer' => 'yes',
					],
				]
			);
		}

		if(!in_array("text", $param)){
			$this->add_control(
				'mf_quiz_add_negative_point',
				[
					'label' => esc_html__( 'Add negative point?', 'metform-pro' ),
					'type' => Controls_Manager::SWITCHER,
					'default' => 'no',
					'label_on' => 'Yes',
					'label_off' => 'No',
					'return_value' => 'yes',
				]
			);
		}

		$this->add_control(
			'mf_quiz_negative_point',
			[
				'label' => esc_html__( 'Negative point', 'metform-pro' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'default' => 0,
				'step' => 0.5,
				'title' => esc_html__( 'Enter negative point', 'metform-pro' ),
				'condition' => [
					'mf_quiz_add_negative_point' => 'yes',
				],
			]
		);

		if(in_array("text", $param)){
			$this->add_control(
				'mf_input_placeholder',
				[
					'label' => esc_html__( 'Placeholder', 'metform-pro' ),
					'type' => Controls_Manager::TEXT,
					'default' => $this->get_title(),
					'title' => esc_html__( 'Enter placeholder', 'metform-pro' ),
				]
			);
		}

		$this->add_control(
			'mf_input_help_text',
			[
				'label' => esc_html__( 'Help Text : ', 'metform-pro' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 3,
				'placeholder' => esc_html__( 'Type your help text', 'metform-pro' ),
			]
		);

		if(in_array('radio', $param) || in_array('checkbox', $param) || in_array('toggle-select', $param)){
			$this->add_control(
				'mf_input_display_option',
				[
					'label' => esc_html__( 'Option Display : ', 'metform-pro' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'inline-block'  => esc_html__( 'Horizontal', 'metform-pro' ),
						'block' => esc_html__( 'Vertical', 'metform-pro' ),
					],
					'default' => 'inline-block',
					'selectors' => [
						'{{WRAPPER}} .mf-radio-option' => 'display: {{VALUE}};',
						'{{WRAPPER}} .mf-checkbox-option' => 'display: {{VALUE}};',
						'{{WRAPPER}} .mf-toggle-select-option' => 'display: {{VALUE}};',
					],
					'description' => esc_html__('Option display style.', 'metform-pro'),
				]
			);
		}

		if(in_array('image-select', $param)){
			$this->add_control(
				'mf_input_display_option',
				[
					'label' => esc_html__( 'Option Display : ', 'metform-pro' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'inline-flex'  => esc_html__( 'Horizontal', 'metform-pro' ),
						'inline-block' => esc_html__( 'Vertical', 'metform-pro' ),
					],
					'default' => 'inline-flex',
					'selectors' => [
						'{{WRAPPER}} .mf-image-select' => 'display: {{VALUE}};',
					],
					'description' => esc_html__('Image select option display style.', 'metform-pro'),
				]
			);
		}

		if(in_array('select', $param)){
			$this->add_control(
				'mf_input_data_type',
				[
					'label'     => esc_html__('Data Type', 'metform-pro'),
					'type'      => Controls_Manager::HIDDEN,
					'default'   => 'custom'
				]
			);

			$this->add_control(
				'mf_input_placeholder',
				[
					'label' => esc_html__( 'Placeholder', 'metform-pro' ),
					'type' => Controls_Manager::TEXT,
					'default' => $this->get_title(),
					'title' => esc_html__( 'Enter placeholder', 'metform-pro' ),
				]
			);
		}

        if(in_array('radio', $param) || in_array('checkbox', $param)){
			$this->add_control(
				'mf_input_option_text_position',
				[
					'label' => esc_html__( 'Option Text Position : ', 'metform-pro' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'after'  => esc_html__( 'After', 'metform-pro' ),
						'before' => esc_html__( 'Before', 'metform-pro' ),
					],
					'default' => 'after',
					'description' => esc_html__('Where do you want to option?', 'metform-pro'),
				]
			);
		}

		if(in_array('image-select', $param) || in_array('toggle-select', $param)){
			$this->add_control(
				'mf_input_options_multiselect',
				[
					'label' => esc_html__( 'Type : ', 'metform-pro' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'radio'		=> esc_html__( 'Single Answer', 'metform-pro' ),
						'checkbox'	=> esc_html__( 'Multiple Answer', 'metform-pro' ),
					],
					'default' => 'radio',
				]
			);
		}

       	if(in_array('radio', $param) || in_array('checkbox', $param) || in_array('select', $param)){
			$input_fields = new Repeater();

			$input_fields->add_control(
				'mf_input_option_text', [
					'label' => esc_html__( 'Option Text', 'metform-pro' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Option Text' , 'metform-pro' ),
					'label_block' => true,
					'description' => esc_html__('Select option text that will be show to user.', 'metform-pro'),
				]
			);

			$input_fields->add_control(
				'mf_input_option_value', [
					'label' => esc_html__( 'Option Value', 'metform-pro' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Option Value' , 'metform-pro' ),
					'label_block' => true,
				]
			);

			$input_fields->add_control(
				'mf_input_option_status', [
					'label' => esc_html__( 'Option Status', 'metform-pro' ),
					'type' => Controls_Manager::HIDDEN,
					'default' => '',
				]
			);
			
			$input_fields->add_control(
				'mf_input_option_selected', [
					'label' => esc_html__( 'Select it default ? ', 'metform-pro' ),
					'type' => Controls_Manager::HIDDEN,
					'default' => '',
				]
			);

			$input_fields->add_control(
				'mf_quiz_question_answer',
				[
					'label' => esc_html__( 'Select as answer?', 'metform-pro' ),
					'type' => Controls_Manager::SWITCHER,
					'yes' => esc_html__( 'Yes', 'metform-pro' ),
					'' => esc_html__( 'No', 'metform-pro' ),
					'return_value' => 'yes',
					'default' => '',
				]
			);

			$this->add_control(
				'mf_input_list',
				[
					'label' => esc_html__( 'Options', 'metform-pro' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $input_fields->get_controls(),
					'default' => [
						[
							'mf_input_option_text' => 'Option 1',
							'mf_input_option_value' => 'value-1',
							'mf_input_option_status' => '',
						],
						[
							'mf_input_option_text' => 'Option 2',
							'mf_input_option_value' => 'value-2',
							'mf_input_option_status' => '',
						],
						[
							'mf_input_option_text' => 'Option 3',
							'mf_input_option_value' => 'value-3',
							'mf_input_option_status' => '',
						],
					],
					'title_field' => '{{{ mf_input_option_text }}}',
					'description' => esc_html__('You can add/edit here your selector options.', 'metform-pro'),
					'frontend_available' => true,
				]
			);
	   	}

       	if(in_array('multi-select', $param)){
			$this->add_control(
				'mf_input_placeholder',
				[
					'label' => esc_html__( 'Placeholder', 'metform-pro' ),
					'type' => Controls_Manager::TEXT,
					'default' => $this->get_title(),
					'title' => esc_html__( 'Enter here place holder', 'metform-pro' ),
				]
			);

			$input_fields = new Repeater();

			$input_fields->add_control(
				'label', [
					'label' => esc_html__( 'Option Text', 'metform-pro' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Input Text' , 'metform-pro' ),
					'label_block' => true,
					'description' => esc_html__('Select option text that will be show to user.', 'metform-pro'),
				]
			);
			$input_fields->add_control(
				'value', [
					'label' => esc_html__( 'Option Value', 'metform-pro' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Input Value' , 'metform-pro' ),
					'label_block' => true,
					'description' => esc_html__('Select list value that will be store/mail to desired person.', 'metform-pro'),
				]
			);

			$input_fields->add_control(
				'mf_input_option_status', [
					'label' => esc_html__( 'Status', 'metform-pro' ),
					'type' => Controls_Manager::HIDDEN,
					'default' => '',
				]
			);

			$input_fields->add_control(
				'mf_input_option_selected', [
					'label' => esc_html__( 'Select it default ? ', 'metform-pro' ),
					'type' => Controls_Manager::HIDDEN,
					'default' => '',
				]
			);

			$input_fields->add_control(
				'mf_quiz_question_answer',
				[
					'label' => esc_html__( 'Select as answer?', 'metform-pro' ),
					'type' => Controls_Manager::SWITCHER,
					'yes' => esc_html__( 'Yes', 'metform-pro' ),
					'' => esc_html__( 'No', 'metform-pro' ),
					'return_value' => 'yes',
					'default' => '',
				]
			);

			$this->add_control(
				'mf_input_list',
				[
					'label' => esc_html__( 'Options', 'metform-pro' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $input_fields->get_controls(),
					'title_field' => '{{{ label }}}',
					'default' => [
						[
							'label' => 'Item 1',
							'value' => 'value-1',
							'mf_input_option_status' => '',
						],
						[
							'label' => 'Item 2',
							'value' => 'value-2',
							'mf_input_option_status' => '',
						],
						[
							'label' => 'Item 3',
							'value' => 'value-3',
							'mf_input_option_status' => '',
						],
					],
					'description' => esc_html__('You can add/edit here your selector options.', 'metform-pro'),
					'frontend_available' => true,
				]
			);
	   	}

		if(in_array('toggle-select', $param)){
			$input_fields = new Repeater();

			$input_fields->add_control(
				'mf_input_option_text',
				[
					'label' => esc_html__( 'Toggle for select', 'metform-pro' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'toggle', 'metform-pro' ),
					'placeholder' => esc_html__( 'Enter toggle text', 'metform-pro' ),
				]
			);

			$input_fields->add_control(
				'mf_input_option_value', 
				[
					'label' => esc_html__( 'Option Value', 'metform-pro' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'value' , 'metform-pro' ),
					'label_block' => true,
				]
			);

			$input_fields->add_control(
				'mf_input_option_status', 
				[
					'label' => esc_html__( 'Option Status', 'metform-pro' ),
					'type' => Controls_Manager::HIDDEN,
					'default' => '',
				]
			);

			$input_fields->add_control(
				'mf_input_option_default_value', 
					[
						'label' => esc_html__( 'Select it default ?', 'metform-pro' ),
						'type' => Controls_Manager::HIDDEN,
						'default' => 'no',
					]
			);

			$input_fields->add_control(
				'mf_quiz_question_answer',
				[
					'label' => esc_html__( 'Select as answer?', 'metform-pro' ),
					'type' => Controls_Manager::SWITCHER,
					'yes' => esc_html__( 'Yes', 'metform-pro' ),
					'' => esc_html__( 'No', 'metform-pro' ),
					'return_value' => 'yes',
					'default' => '',
				]
			);

			$input_fields->add_control(
				'mf_input_icon_status',
				[
					'label' => esc_html__( 'Add	 Icon', 'metform-pro' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'metform-pro' ),
					'label_off' => esc_html__( 'Hide', 'metform-pro' ),
					'return_value' => 'yes',
					'default' => '',
					'separator' => 'before',
				]
			);

			$input_fields->add_control(
				'mf_input_icon',
				[
					'label' =>esc_html__( 'Icon', 'metform-pro' ),
					'type' => Controls_Manager::ICONS,
					'label_block' => true,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					],
					'condition' => [
						'mf_input_icon_status' => 'yes',
					],
				]
			);

			$input_fields->add_control(
				'mf_input_icon_align',
				[
					'label' =>esc_html__( 'Icon Position', 'metform-pro' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'left',
					'options' => [
						'left' =>esc_html__( 'Before', 'metform-pro' ),
						'right' =>esc_html__( 'After', 'metform-pro' ),
					],
					'condition' => [
						'mf_input_icon_status' => 'yes',
					],
				]
			);

			$this->add_control(
				'mf_input_list',
				[
					'label' => esc_html__( 'Toggle select Options', 'metform-pro' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $input_fields->get_controls(),
					'default' => [
						[
							'mf_input_option_text' => 'toggle-1',
							'mf_input_option_value' => 'toggle-1',
							'mf_input_option_status' => '',
						],
						[
							'mf_input_option_text' => 'toggle-2',
							'mf_input_option_value' => 'toggle-2',
							'mf_input_option_status' => '',
						],
						[
							'mf_input_option_text' => 'toggle-3',
							'mf_input_option_value' => 'toggle-3',
							'mf_input_option_status' => '',
						],
					],
					'title_field' => '{{{ mf_input_option_text }}}',
					'description' => esc_html__('You can add/edit here your selector options.', 'metform-pro'),
					'frontend_available' => true,
				]
			);
		}

		if(in_array('image-select', $param)){

			$input_fields = new Repeater();

			$input_fields->add_control(
				'mf_image_select_title',
				[
					'label' => esc_html__( 'Title', 'metform-pro' ),
					'type' => Controls_Manager::TEXT,
				]
			);

			$input_fields->add_control(
				'mf_input_option_text',
				[
					'label' => esc_html__( 'Thumbnail', 'metform-pro' ),
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);

			$input_fields->add_control(
				'mf_input_option_img_hover',
				[
					'label' => esc_html__( 'Preview (Optional)', 'metform-pro' ),
					'type' => Controls_Manager::MEDIA,
				]
			);

			$input_fields->add_control(
				'mf_input_option_value', [
					'label' => esc_html__( 'Option Value', 'metform-pro' ),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Option Value' , 'metform-pro' ),
					'label_block' => true,
				]
			);

			$input_fields->add_control(
				'mf_input_option_status', [
					'label' => esc_html__( 'Option Status', 'metform-pro' ),
					'type' => Controls_Manager::HIDDEN,
					'default' => '',
				]
			);

			$input_fields->add_control(
				'mf_input_option_default_value', [
						'label' => esc_html__( 'Select it default ?', 'metform-pro' ),
						'type' => Controls_Manager::HIDDEN,
						'default' => 'no',
					]
			);

			$input_fields->add_control(
				'mf_quiz_question_answer',
				[
					'label' => esc_html__( 'Select as answer?', 'metform-pro' ),
					'type' => Controls_Manager::SWITCHER,
					'yes' => esc_html__( 'Yes', 'metform-pro' ),
					'' => esc_html__( 'No', 'metform-pro' ),
					'return_value' => 'yes',
					'default' => '',
				]
			);

			$this->add_control(
				'mf_input_list',
				[
					'label' => esc_html__( 'Image select Options', 'metform-pro' ),
					'type' => Controls_Manager::REPEATER,
					'fields' => $input_fields->get_controls(),
					'default' => [
						[
							'mf_input_option_value' => 'image-1',
							'mf_input_option_status' => '',
						],
						[
							'mf_input_option_value' => 'image-2',
							'mf_input_option_status' => '',
						],
						[
							'mf_input_option_value' => 'image-3',
							'mf_input_option_status' => '',
						],
					],
					'title_field' => '{{{ mf_image_select_title }}}',
					'description' => esc_html__('You can add/edit here your selector options.', 'metform-pro'),
					'frontend_available' => true,
				]
			);
		}
	}
}
