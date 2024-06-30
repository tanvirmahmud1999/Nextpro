<?php
return [
    'title'           => esc_attr__('Nextpro Testimonial', 'nextpro'),
    'id'              => 'testimonial-block',
    'icon'            => 'admin-comments',
    'description'     => 'Display your testimonial testimonials',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Testimonial Section', 'nextpro'),
        ],
        [
            'name'            => esc_attr__('Testimonials Style', 'nextpro'),
            'id'              => 'template_file',
            'type'            => 'select',
            'multiple'        => false,
            'select_all_none' => false,
            'options'         => [
                'components/testimonial/testimonial.php'            => esc_attr__('Default', 'nextpro'),
                'components/testimonial/testimonial-style2.php'     => esc_attr__('Testimonial Style 2', 'nextpro'),
                'components/testimonial/testimonial-style3.php'     => esc_attr__('Testimonial Style 3', 'nextpro'),
            ],
            'std'              => 'components/testimonial/testimonial.php'
        ],
        [
            'name'              => esc_attr__('Testimonials', 'nextpro'),
            'id'                => 'testimonial_group',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {name}',
            'max_clone'         => 20,
            'add_button'        => esc_attr__('Add new testimonial', 'nextpro'),
            'visible'      => ['template_file', 'in', ['components/testimonial/testimonial.php', 'components/testimonial/testimonial-style2.php']],
            'std'               => [
                [
                    'rating_logo'  =>  get_theme_file_uri('assets/images/shapes/trustpilot-img.png'),
                    'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                    'name'       => esc_attr__('Larry A. Kolb ', 'nextpro'),
                    'designation'          => esc_attr__('Driftwood Road', 'nextpro'),
                    'video_link' => 'https://www.youtube.com/watch?v=TKnufs85hXk',
                    'image'      => get_theme_file_uri('assets/images/testimonial/testimonial-img1-1.jpg'),
                ],
                [
                    'rating_logo'  =>  get_theme_file_uri('assets/images/shapes/trustpilot-img.png'),
                    'comment'  => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                    'name'       => esc_attr__('Sarah Johnson', 'nextpro'),
                    'designation'          => esc_attr__('DigitalRevolve Solutions', 'nextpro'),
                    'video_link' => 'https://www.youtube.com/watch?v=TKnufs85hXk',
                    'image'      => get_theme_file_uri('assets/images/testimonial/testimonial-img1-2.png'),
                ],
                [
                    'rating_logo'  =>  get_theme_file_uri('assets/images/shapes/trustpilot-img.png'),
                    'comment'  => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                    'name'       => esc_attr__('Elvira F. Pine', 'nextpro'),
                    'designation'          => esc_attr__('Valley Street', 'nextpro'),
                    'video_link' => 'https://www.youtube.com/watch?v=TKnufs85hXk',
                    'image'      => get_theme_file_uri('assets/images/testimonial/testimonial-img1-1.jpg'),
                ],
            ],
            'fields' => [
                [
                    'name'         => esc_attr__('Rating Logo', 'nextpro'),
                    'id'           => 'rating_logo',
                    'type'         => 'file_input',
                    'visible'      => ['template_file', '=', 'components/testimonial/testimonial-style2.php'],
                ],
                [
                    'name'        => esc_attr__('Comment', 'nextpro'),
                    'type'        => 'textarea',
                    'id'          => 'comment',
                    'placeholder' => esc_attr__('Comment\'s text here', 'nextpro'),
                    'desc'        => sprintf(esc_attr__('Type your Comment\'s here. Use %s to make words bold. e.g. %s', 'nextpro'), '<code>{}</code>', '<code>{Highly recommended!}</code>'),
                ],
                [
                    'name'        => esc_attr__('Name of the commenter', 'nextpro'),
                    'type'        => 'text',
                    'id'          => 'name',
                    'desc'        => esc_attr__('commenter Name here.'),
                    'placeholder' => esc_attr__('Name of the commenter',   'nextpro'),
                ],
                [
                    'name'        => esc_attr__('Commenter Designation', 'nextpro'),
                    'type'        => 'textarea',
                    'id'          => 'designation',
                    'placeholder' => esc_attr__('Commenter Designation',   'nextpro'),
                    'desc'        => esc_attr__('Write your designation here.', 'nextpro'),
                ],
                [
                    'name'        => esc_attr__('Commenter video tutorial link', 'nextpro'),
                    'type'        => 'text',
                    'id'          => 'video_link',
                    'desc'        => esc_attr__('Name here.'),
                    'placeholder' => esc_attr__('Name of the commenter',   'nextpro'),
                    'visible'      => ['template_file', '=', 'components/testimonial/testimonial.php'],
                ],
                [
                    'name'         => esc_attr__('Commenter image', 'nextpro'),
                    'id'           => 'image',
                    'type'         => 'file_input',
                ],
            ],
        ],
        [
            'type' => 'heading',
            'name' => esc_attr__('Testimonial style 3', 'nextpro'),
            'visible'      => ['template_file', '=', 'components/testimonial/testimonial-style3.php'],
        ],
        // Testimonial style 3
        [
            'name'        => __('Group Items', 'control-agency'),
            'id'          => 'testimonial_lists',
            'std'         => control_agency_config('testimonial_lists'),
            'type'        => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. Group Item',
            'max_clone'         => 4,
            'visible'      => ['template_file', '=', 'components/testimonial/testimonial-style3.php'],
            'std'         => [
                [
                    'testimonial_group'  => [
                        [
                            'subject'    => esc_attr__('Design quality', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Emily Thompson', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-1.png'),
                            'designation'          => esc_attr__('Founder, NewPulse Labs', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Gonçalo Dias', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-5.png'),
                            'designation'          => esc_attr__('L\'Oréal', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Dan Mcleay', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-7.png'),
                            'designation'          => esc_attr__('MasterCard', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Design quality', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-1.png'),
                            'name'       => esc_attr__('Dan Mcleay', 'nextpro'),
                            'designation'          => esc_attr__('Founder, NewPulse Labs', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-5.png'),
                            'name'       => esc_attr__('Gonçalo Dias', 'nextpro'),
                            'designation'          => esc_attr__('L\'Oréal', 'nextpro'),
                        ],
                    ],

                ],
                [
                    'testimonial_group'  => [
                        [
                            'subject'    => esc_attr__('Design quality', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-1.png'),
                            'name'       => esc_attr__('Dan Mcleay', 'nextpro'),
                            'designation'          => esc_attr__('Founder, NewPulse Labs', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-5.png'),
                            'name'       => esc_attr__('Gonçalo Dias', 'nextpro'),
                            'designation'          => esc_attr__('L\'Oréal', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Design quality', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Emily Thompson', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-1.png'),
                            'designation'          => esc_attr__('Founder, NewPulse Labs', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Gonçalo Dias', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-5.png'),
                            'designation'          => esc_attr__('L\'Oréal', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Dan Mcleay', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-7.png'),
                            'designation'          => esc_attr__('MasterCard', 'nextpro'),
                        ],
                    ],

                ],
                [
                    'testimonial_group'  => [
                        [
                            'subject'    => esc_attr__('Design quality', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Emily Thompson', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-1.png'),
                            'designation'          => esc_attr__('Founder, NewPulse Labs', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Design quality', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-1.png'),
                            'name'       => esc_attr__('Dan Mcleay', 'nextpro'),
                            'designation'          => esc_attr__('Founder, NewPulse Labs', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-5.png'),
                            'name'       => esc_attr__('Gonçalo Dias', 'nextpro'),
                            'designation'          => esc_attr__('L\'Oréal', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Gonçalo Dias', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-5.png'),
                            'designation'          => esc_attr__('L\'Oréal', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Dan Mcleay', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-7.png'),
                            'designation'          => esc_attr__('MasterCard', 'nextpro'),
                        ],
                    ],

                ],
                [
                    'testimonial_group'  => [

                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Gonçalo Dias', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-5.png'),
                            'designation'          => esc_attr__('L\'Oréal', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Dan Mcleay', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-7.png'),
                            'designation'          => esc_attr__('MasterCard', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Customizibility', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-5.png'),
                            'name'       => esc_attr__('Gonçalo Dias', 'nextpro'),
                            'designation'          => esc_attr__('L\'Oréal', 'nextpro'),
                        ], [
                            'subject'    => esc_attr__('Design quality', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'name'       => esc_attr__('Emily Thompson', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-1.png'),
                            'designation'          => esc_attr__('Founder, NewPulse Labs', 'nextpro'),
                        ],
                        [
                            'subject'    => esc_attr__('Design quality', 'nextpro'),
                            'comment'    => esc_attr__('Incredible results! NextMarketing delivered outstanding digital strategies that elevated for and that our brand. Highly recommended!', 'nextpro'),
                            'image'      => get_theme_file_uri('assets/images/resource/client-img4-1.png'),
                            'name'       => esc_attr__('Dan Mcleay', 'nextpro'),
                            'designation'          => esc_attr__('Founder, NewPulse Labs', 'nextpro'),
                        ],
                    ],

                ],
            ],
            'fields' => [
                [
                    'id'          => 'testimonial_group',
                    'type'        => 'group',
                    'clone'             => true,
                    'clone_default'     => true,
                    'clone_as_multiple' => true,
                    'collapsible'       => true,
                    'default_state'     => 'collapsed',
                    'group_title'       => '{#}. {name}',
                    'fields' => [
                        [
                            'name'        => esc_attr__('Comment', 'nextpro'),
                            'type'        => 'textarea',
                            'id'          => 'comment',
                            'placeholder' => esc_attr__('Comment\'s text here', 'nextpro'),
                            'desc'        => sprintf(esc_attr__('Type your Comment\'s here. Use %s to make words bold. e.g. %s', 'nextpro'), '<code>{}</code>', '<code>{Highly recommended!}</code>'),
                        ],
                        [
                            'name'        => esc_attr__('Name of the commenter', 'nextpro'),
                            'type'        => 'text',
                            'id'          => 'name',
                            'desc'        => esc_attr__('commenter Name here.'),
                            'placeholder' => esc_attr__('Name of the commenter',   'nextpro'),
                        ],
                        [
                            'name'        => esc_attr__('Commenter Designation', 'nextpro'),
                            'type'        => 'textarea',
                            'id'          => 'designation',
                            'placeholder' => esc_attr__('Commenter Designation',   'nextpro'),
                            'desc'        => esc_attr__('Write your designation here.', 'nextpro'),
                        ],
                        [
                            'name'        => esc_attr__('Which subject has commented on', 'nextpro'),
                            'type'        => 'text',
                            'id'          => 'subject',
                            'placeholder' => esc_attr__('Which subject has commented on',   'nextpro'),
                            'desc'        => esc_attr__('Type your subject here', 'nextpro'),
                            'visible'      => ['template_file', '=', 'components/testimonial/testimonial-style3.php'],
                        ],
                        [
                            'name'         => esc_attr__('Commenter image', 'nextpro'),
                            'id'           => 'image',
                            'type'         => 'file_input',
                        ],
                    ],
                ],

            ],
        ],
        [
            'name'            => 'Button Alignment',
            'id'              => 'button_alignment',
            'type'            => 'select',
            'multiple'        => false,
            'std'             => 'text-center',
            'options'         => [
                'text-left'       => 'Text Left',
                'text-center' => 'Text Center',
                'text-end'        => 'Text Right',
            ],
            'visible'      => ['template_file', '=', 'components/testimonial/testimonial-style3.php'],
            'desc'        => esc_attr__('You can change this button alignment by selecting a different alignment option.', 'nextpro'),
        ],
        [
            'name'        => esc_attr__('Buttons', 'nextpro'),
            'id'          => 'buttons',
            'type'        => 'btn',
            'clone'        => false,
            'std'         => [
                [
                    'text' => 'View all Review',
                    'url' => '#',
                    'class' => 'section-client-rating__btn next-marketing-btn dark-btn dark-btn btn ',
                    'target' => '',
                ],
            ],
            'visible'      => ['template_file', '=', 'components/testimonial/testimonial-style3.php'],
        ],
    ],
];