<?php
return [
    'title'           => esc_attr__('About Image', 'nextpro'),
    'id'              => 'about-image',
    'icon'            => 'cover-image',
    'description'     => 'This is an image block, there has multiple image styles, you can get different image style just selecting the image style.',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('About Image', 'nextpro'),
        ],
        [
            'type'  => 'hidden',
            'id'    => 'template',
            'name'    => 'Template',
            'std'   => 'components/about-image.php',
        ],
        [
            'name'            => 'Experience Card Alignment',
            'id'              => 'select_alignment',
            'type'            => 'select',
            'multiple'        => false,
            'std'             => 'text-left',
            'options'         => [
                'left-align'       => 'Text Left',
                'experience-card-center' => 'Text Center',
                'experience-card-top'        => 'Text Top',
            ],
            'desc'        => esc_attr__('You can change this Experience Card alignment by selecting a different alignment option.', 'nextpro'),
        ],
        [
            'name' => esc_attr__('Flip Image', 'nextpro'),
            'id'   => 'flip_image',
            'type' => 'switch',
            'style'     => 'square',
            'std'  => false,
            'desc' => esc_attr__('If you would like to Flip your image then Enable the switch.', 'nextpro'),
        ],
        // Abou image 
        [
            'id'               => 'about_image',
            'name'             => esc_attr__('Add Image:', 'nextpro'),
            'type'             => 'single_image',
            'desc'             => esc_attr__('This is about image ', 'nextpro'),
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'full',
        ],
        [
            'name'        => esc_attr__('Image alt text', 'nextpro'),
            'id'          => 'about_image_alt_text',
            'desc'        => esc_attr__('Type your image alt text', 'nextpro'),
            'type'        => 'text',
            'placeholder' => esc_attr__('Image alt text', 'nextpro'),
        ],
        [
            'name'        => esc_attr__('Year of experience', 'nextpro'),
            'id'          => 'experience_time',
            'desc'        => esc_attr__('Enter the number of years of experience you have', 'nextpro'),
            'type'        => 'number',
            'std'         => '13',
            'placeholder' => esc_attr__('13', 'nextpro'),
        ],
        [
            'name'        => esc_attr__('Experience quote', 'nextpro'),
            'id'          => 'experience_text',
            'desc'        => esc_attr__('Write your experience quote', 'nextpro'),
            'type'        => 'text',
            'std'         => 'Years of Experience in Digital marketing Industry',
        ],
    ],
];
