<?php
return [
    'title'           => esc_attr__('Nextpro Image Block', 'nextpro'),
    'id'              => 'images',
    'icon'            => 'images-alt2',
    'description'     => 'This is an image block, there has multiple image styles, you can get different image style just selecting the image style.',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Image Block', 'nextpro'),
        ],
        [
            'name'            => esc_attr__('Select', 'nextpro'),
            'id'              => 'template_file',
            'type'            => 'select',
            'multiple'        => false,
            'placeholder'     => esc_attr__('Select an item', 'nextpro'),
            'select_all_none' => false,
            'options'         => [
                'components/images/single-shape-image.php'  => esc_attr__('Single Shape Image', 'nextpro'),
                'components/images/multi-shape-image.php'   => esc_attr__('Multiple Shape Image', 'nextpro'),
                'components/images/moving-image.php'        => esc_attr__('Moving Image', 'nextpro'),
                'components/images/gallery-type.php'        => esc_attr__('Gallery Type Image', 'nextpro'),
            ],
            'std'              => 'components/images/single-shape-image.php'
        ],

        // Single image Single shape
        [
            'id'               => 'single_image_single_shape',
            'name'             => esc_attr__('Add Image:', 'nextpro'),
            'type'             => 'single_image',
            'desc'             => esc_attr__('This image has 1 circle shape', 'nextpro'),
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'full',
            'visible'          => ['template_file', 'in', ['components/images/single-shape-image.php']]
        ],
        [
            'name'        => esc_attr__('Image alt text', 'nextpro'),
            'id'          => 'single_image_alt_text',
            'desc'        => esc_attr__('Type your image alt text', 'nextpro'),
            'type'        => 'text',
            'placeholder' => esc_attr__('Image alt text', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/single-shape-image.php']
        ],

        // Add Single image multiple shape
        [
            'id'               => 'image_url',
            'name'             => esc_attr__('Add Image:', 'nextpro'),
            'type'             => 'single_image',
            'desc'             => esc_attr__('This image has 4 different types of shapes', 'nextpro'),
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'full',
            'visible'          => ['template_file', 'in', 'components/images/multi-shape-image.php']
        ],
        [
            'name'        => esc_attr__('Image alt text', 'nextpro'),
            'id'          => 'image_alt_text',
            'desc'        => esc_attr__('Type your image alt text', 'nextpro'),
            'type'        => 'text',
            'placeholder' => esc_attr__('Image alt text', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/multi-shape-image.php']
        ],

        // 3 images moving (Moving 2 Images)
        [
            'type' => 'heading',
            'name' => esc_attr__('Top Image', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/moving-image.php'],
        ],
        [
            'id'               => 'process_top_image',
            'name'             => esc_attr__('Add Top Image:', 'nextpro'),
            'type'             => 'single_image',
            'desc'             => esc_attr__('Add the top image which is moving', 'nextpro'),
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'full',
            'visible'          => ['template_file', 'in', 'components/images/moving-image.php'],
        ],
        [
            'name'        => esc_attr__('Top Image Alt Text', 'nextpro'),
            'id'          => 'top_image_alt_text',
            'type'        => 'text',
            'placeholder' => esc_attr__('Image alt text', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/moving-image.php'],
        ],

        [
            'type' => 'heading',
            'name' => esc_attr__('Middle Image', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/moving-image.php'],
        ],
        [
            'id'               => 'process_middle_image',
            'name'             => esc_attr__('Add Middle Image:', 'nextpro'),
            'type'             => 'single_image',
            'desc'             => esc_attr__('Add Image', 'nextpro'),
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'full',
            'visible'          => ['template_file', 'in', 'components/images/moving-image.php'],
        ],
        [
            'name'        => esc_attr__('Middle Image Alt Text', 'nextpro'),
            'id'          => 'middle_image_alt_text',
            'type'        => 'text',
            'placeholder' => esc_attr__('Image alt text', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/moving-image.php'],
        ],
        [
            'type' => 'heading',
            'name' => esc_attr__('Bottom Image', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/moving-image.php'],
        ],
        [
            'id'               => 'process_bottom_image',
            'name'             => esc_attr__('Add Bottom Image:', 'nextpro'),
            'type'             => 'single_image',
            'desc'             => esc_attr__('Add the bottom image which is moving', 'nextpro'),
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'full',
            'visible'          => ['template_file', 'in', 'components/images/moving-image.php'],
        ],
        [
            'name'        => esc_attr__('Bottom Image Alt Text', 'nextpro'),
            'id'          => 'bottom_image_alt_text',
            'type'        => 'text',
            'placeholder' => esc_attr__('Image alt text', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/moving-image.php'],
        ],

        // Gallery type Image
        [
            'type' => 'heading',
            'name' => esc_attr__('Gallery Top Image', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/gallery-type.php'],
        ],
        [
            'id'               => 'gallery_top_image',
            'name'             => esc_attr__('Add Top Image:', 'nextpro'),
            'type'             => 'single_image',
            'desc'             => esc_attr__('Add the top image', 'nextpro'),
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'full',
            'visible'          => ['template_file', 'in', 'components/images/gallery-type.php'],
        ],
        [
            'name'        => esc_attr__('Top Image Alt Text', 'nextpro'),
            'id'          => 'gallery_top_image_alt_text',
            'type'        => 'text',
            'placeholder' => esc_attr__('Image alt text', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/gallery-type.php'],
        ],
        [
            'type' => 'heading',
            'name' => esc_attr__('Gallery Horizontal Image', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/gallery-type.php'],
        ],
        [
            'id'               => 'gallery_horizontal_image',
            'name'             => esc_attr__('Add Horizontal Image:', 'nextpro'),
            'type'             => 'single_image',
            'desc'             => esc_attr__('Add Horizontal Image', 'nextpro'),
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'full',
            'visible'          => ['template_file', 'in', 'components/images/gallery-type.php'],
        ],
        [
            'name'        => esc_attr__('Horizontal Image Alt Text', 'nextpro'),
            'id'          => 'gallery_horizontal_image_alt_text',
            'type'        => 'text',
            'placeholder' => esc_attr__('Image alt text', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/gallery-type.php'],
        ],
        [
            'type' => 'heading',
            'name' => esc_attr__('Gallery Vertical Image', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/gallery-type.php'],
        ],
        [
            'id'               => 'gallery_vertical_image',
            'name'             => esc_attr__('Add Vertical Image:', 'nextpro'),
            'type'             => 'single_image',
            'desc'             => esc_attr__('Add the Vertical image', 'nextpro'),
            'force_delete'     => false,
            'max_file_uploads' => 1,
            'max_status'       => false,
            'image_size'       => 'full',
            'visible'          => ['template_file', 'in', 'components/images/gallery-type.php'],
        ],
        [
            'name'        => esc_attr__('Vertical Image Alt Text', 'nextpro'),
            'id'          => 'gallery_vertical_image_alt_text',
            'type'        => 'text',
            'placeholder' => esc_attr__('Image alt text', 'nextpro'),
            'visible'          => ['template_file', 'in', 'components/images/gallery-type.php'],
        ],
    ],
];
