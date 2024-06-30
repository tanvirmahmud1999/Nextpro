<?php
return [
    'title'           => 'Pricing Table',
    'id'              => 'pricing',
    'icon'            => 'money-alt',
    'description'     => 'This is the pricing section',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Pricing Plan', 'nextpro'),
        ],
        [
            'type'     => 'select',
            'id'       => 'template_file',
            'name'     => esc_attr__('Select Template Style', 'nextpro'),
            'options'  => [
                'components/pricing-plan/pricing-plan.php'         => esc_attr__('Pricing Tab Style', 'nextpro'),
                'components/pricing-plan/pricing-plan-style3.php'         => esc_attr__('Tab with switch Style', 'nextpro'),
                'components/pricing-plan/pricing-plan-style2.php' => esc_attr__('Pricing Grid Style', 'nextpro'),
            ],
            'std'      => 'components/pricing-plan/pricing-plan.php',
            'multiple' => false,
            'placeholder' => esc_attr__('Select Plan style', 'nextpro'),
            'select_all_none' => false,
        ],
        [
            'name'      => esc_attr__('Subscription Note', 'nextpro'),
            'id'        => 'subscription_note',
            'type'      => 'text',
            'desc'      => sprintf('Use %s to make words highlight. e.g. %s', '<code>{}</code>', '<code>{SAVE 30%}</code>'),
            'std'       => esc_attr__('SAVE 30% ON YEARLY PLAN', 'nextpro'),
            'visible'   => ['template_file', 'in', ['components/pricing-plan/pricing-plan.php', 'components/pricing-plan/pricing-plan-style3.php']],
        ],
        [
            'name' => esc_attr__('Column width', 'nextpro'),
            'id'   => 'column_width',
            'type' => 'number',
            'std'   => 1,
            'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
            'visible'   => ['template_file', '=', 'components/pricing-plan/pricing-plan-style2.php'],
        ],
        [
            'name'              => esc_attr__('Pricing group items:', 'nextpro'),
            'id'                => 'pricing_group',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {menu_name}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add Item', 'nextpro'),
            'visible'   => ['template_file', 'in', ['components/pricing-plan/pricing-plan.php', 'components/pricing-plan/pricing-plan-style3.php']],
            'std'               => [
                [
                    'menu_name'                     => 'Monthly',
                    'column_width'                     => 3,
                    'pricing_list'                  => [
                        [
                            'plan_title'            => 'Starter Pack',
                            'value_for_money'       => 'value',
                            'plan_subtitle'         => 'Ideal for: Small businesses and startups',
                            'price_suffix'          => '$',
                            'price'                 => '99',
                            'subscription_label'    => 'month',
                            'price_button_text'     => 'Purchase Plan',
                            'price_button_url'      => '#',
                            'price_note'            => '*No Credit Card required',
                            'price_features'        => ['SEO Optimization', 'Social Media Marketing (2 platforms)', 'Pay-Per-Click Ad. (Basic)', 'Email Marketing (Full Suite)', 'Advanced Analytics and Reporting', 'Dedicated Account Manager'],
                            'price_addons'          => ['Email Marketing: $20/mo ', 'PPC Campaign Management: $30/mo '],
                        ],
                        [
                            'plan_title'            => 'Growth Accelerator',
                            'value_for_money'       => 'value',
                            'plan_subtitle'         => 'Ideal for: Small businesses and startups',
                            'price_suffix'          => '$',
                            'price'                 => '199',
                            'subscription_label'    => 'month',
                            'price_button_text'     => 'Purchase Plan',
                            'price_button_url'      => '#',
                            'price_note'            => '*No Credit Card required',
                            'price_features'        => ['SEO Optimization', 'Social Media Marketing (2 platforms)', 'Pay-Per-Click Ad. (Basic)', 'Email Marketing (Full Suite)', 'Advanced Analytics and Reporting', 'Dedicated Account Manager'],
                            'price_addons'          => ['Email Marketing: $20/mo ', 'PPC Campaign Management: $30/mo '],
                        ],
                        [
                            'plan_title'            => 'Full-Scale Domination',
                            'value_for_money'       => 'value',
                            'plan_subtitle'         => 'Ideal for: Small businesses and startups',
                            'price_suffix'          => '$',
                            'price'                 => '399',
                            'subscription_label'    => 'month',
                            'price_button_text'     => 'Purchase Plan',
                            'price_button_url'      => '#',
                            'price_note'            => '*No Credit Card required',
                            'price_features'        => ['SEO Optimization', 'Social Media Marketing (2 platforms)', 'Pay-Per-Click Ad. (Basic)', 'Email Marketing (Full Suite)', 'Advanced Analytics and Reporting', 'Dedicated Account Manager'],
                            'price_addons'          => ['Email Marketing: $20/mo ', 'PPC Campaign Management: $30/mo '],
                        ],
                    ],
                ],
                [
                    'menu_name'                     => 'Yearly',
                    'column_width'                     => 3,
                    'pricing_list'                  => [
                        [
                            'plan_title'            => 'Starter Pack',
                            'value_for_money'       => 'value',
                            'plan_subtitle'         => 'Ideal for: Small businesses and startups',
                            'price_suffix'          => '$',
                            'price'                 => '829',
                            'subscription_label'    => 'month',
                            'price_button_text'     => 'Purchase Plan',
                            'price_button_url'      => '#',
                            'price_note'            => '*No Credit Card required',
                            'price_features'        => ['SEO Optimization', 'Social Media Marketing (2 platforms)', 'Pay-Per-Click Ad. (Basic)', 'Email Marketing (Full Suite)', 'Advanced Analytics and Reporting', 'Dedicated Account Manager'],
                            'price_addons'          => ['Email Marketing: $20/mo ', 'PPC Campaign Management: $30/mo '],
                        ],
                        [
                            'plan_title'            => 'Growth Accelerator',
                            'value_for_money'       => 'value',
                            'plan_subtitle'         => 'Ideal for: Small businesses and startups',
                            'price_suffix'          => '$',
                            'price'                 => '1669',
                            'subscription_label'    => 'month',
                            'price_button_text'     => 'Purchase Plan',
                            'price_button_url'      => '#',
                            'price_note'            => '*No Credit Card required',
                            'price_features'        => ['SEO Optimization', 'Social Media Marketing (2 platforms)', 'Pay-Per-Click Ad. (Basic)', 'Email Marketing (Full Suite)', 'Advanced Analytics and Reporting', 'Dedicated Account Manager'],
                            'price_addons'          => ['Email Marketing: $20/mo ', 'PPC Campaign Management: $30/mo '],
                        ],
                        [
                            'plan_title'            => 'Full-Scale Domination',
                            'value_for_money'       => 'value',
                            'plan_subtitle'         => 'Ideal for: Small businesses and startups',
                            'price_suffix'          => '$',
                            'price'                 => '3349',
                            'subscription_label'    => 'month',
                            'price_button_text'     => 'Purchase Plan',
                            'price_button_url'      => '#',
                            'price_note'            => '*No Credit Card required',
                            'price_features'        => ['SEO Optimization', 'Social Media Marketing (2 platforms)', 'Pay-Per-Click Ad. (Basic)', 'Email Marketing (Full Suite)', 'Advanced Analytics and Reporting', 'Dedicated Account Manager'],
                            'price_addons'          => ['Email Marketing: $20/mo ', 'PPC Campaign Management: $30/mo '],
                        ],
                    ],
                ],
            ],
            'fields'  => [
                [
                    'name' => esc_attr__('Subscription menu Name', 'nextpro'),
                    'id'   => 'menu_name',
                    'type' => 'text',
                ],
                [
                    'name' => esc_attr__('Column width', 'nextpro'),
                    'id'   => 'column_width',
                    'type' => 'number',
                    'std'   => 3,
                    'desc'  => esc_attr__('How many columns would you like to add Large device, enter this number', 'nextpro'),
                ],
                [
                    'id'          => 'pricing_list',
                    'type'        => 'group',
                    'clone'             => true,
                    'clone_default'     => true,
                    'clone_as_multiple' => true,
                    'collapsible'       => true,
                    'default_state'     => 'collapsed',
                    'group_title'       => '{#}. {plan_title}',
                    'fields' => [
                        [
                            'name' => esc_attr__('Plan Title', 'nextpro'),
                            'id'   => 'plan_title',
                            'type' => 'text',
                        ],
                        [
                            'name' => esc_attr__('Value for money label', 'nextpro'),
                            'id'   => 'value_for_money',
                            'type' => 'text',
                        ],
                        [
                            'name' => esc_attr__('Plan Subtitle', 'nextpro'),
                            'id'   => 'plan_subtitle',
                            'type' => 'textarea',
                        ],
                        [
                            'id'   => 'price_suffix',
                            'name' => esc_attr__('Suffix (e.g., $, €,৳)', 'nextpro'),
                            'type' => 'text',
                            'std'  => '$',
                        ],
                        [
                            'name' => esc_attr__('Price', 'nextpro'),
                            'id'   => 'price',
                            'type' => 'number',
                        ],
                        [
                            'name' => esc_attr__('Subscription type', 'nextpro'),
                            'id'   => 'subscription_label',
                            'type' => 'text',
                        ],
                        [
                            'name'        => esc_attr__('price Button Text:', 'nextpro'),
                            'id'          => 'price_button_text',
                            'type'        => 'text',
                            'std'         => 'Purchase Plan',
                            'placeholder' => esc_attr__('Write Button Text', 'nextpro'),
                        ],
                        [
                            'name'        => esc_attr__('price Button URL:', 'nextpro'),
                            'id'          => 'price_button_url',
                            'desc'        => esc_attr__('URL for the button', 'nextpro'),
                            'type'        => 'text',
                            'std'         => '#',
                            'placeholder' => esc_attr__('Enter button URL here', 'nextpro'),
                        ],
                        [
                            'name' => esc_attr__('Purchase Note ', 'nextpro'),
                            'id'   => 'price_note',
                            'type' => 'text',
                        ],
                        [
                            'name' => esc_attr__('Services Included:', 'nextpro'),
                            'id'   => 'price_features',
                            'type' => 'text',
                            'desc'      => sprintf('Use %s to make the features premium. e.g. %s', '<code>{}</code>', '<code> { Dedicated Account Manager }</code>'),
                            'clone' => true,
                        ],
                        [
                            'name' => esc_attr__('Additional Add-ons: ', 'nextpro'),
                            'id'   => 'price_addons',
                            'type' => 'text',
                            'clone' => true,
                        ],
                    ],
                ],
            ],
        ],
        // pricing grid styles
        [
            'id'          => 'pricing_items',
            'type'        => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {plan_title}',
            'visible'   => ['template_file', '=', 'components/pricing-plan/pricing-plan-style2.php'],
            'std'               => [
                [
                    'plan_title'            => 'Starter Pack ',
                    'value_for_money'       => 'value',
                    'plan_subtitle'         => 'Ideal for: Small businesses and startups',
                    'price_suffix'          => '$',
                    'price'                 => '99',
                    'subscription'          => 'month',
                    'price_button_text'     => 'Purchase Plan',
                    'price_button_url'      => '#',
                    'price_note'            => '*No Credit Card required',
                    'price_features'        => ['SEO Optimization', 'Social Media Marketing (2 platforms)', 'Pay-Per-Click Ad. (Basic)', 'Email Marketing (Full Suite)', 'Advanced Analytics and Reporting', 'Dedicated Account Manager'],
                    'price_addons'          => ['Email Marketing: $20/mo ', 'PPC Campaign Management: $30/mo '],
                ],
                [
                    'plan_title'            => 'Growth Accelerator',
                    'value_for_money'       => 'value',
                    'plan_subtitle'         => 'Ideal for: Small businesses and startups',
                    'price_suffix'          => '$',
                    'price'                 => '199',
                    'subscription'          => 'month',
                    'price_button_text'     => 'Purchase Plan',
                    'price_button_url'       => '#',
                    'price_note'            => '*No Credit Card required',
                    'price_features'        => ['SEO Optimization', 'Social Media Marketing (2 platforms)', 'Pay-Per-Click Ad. (Basic)', 'Email Marketing (Full Suite)', 'Advanced Analytics and Reporting', 'Dedicated Account Manager'],
                    'price_addons'          => ['Email Marketing: $20/mo ', 'PPC Campaign Management: $30/mo '],
                ],
                [
                    'plan_title'            => 'Full-Scale Domination ',
                    'value_for_money'       => 'value',
                    'plan_subtitle'         => 'Ideal for: Small businesses and startups',
                    'price_suffix'          => '$',
                    'price'                 => '399',
                    'subscription'          => 'month',
                    'price_button_text'     => 'Purchase Plan',
                    'price_button_url'      => '#',
                    'price_note'            => '*No Credit Card required',
                    'price_features'        => ['SEO Optimization', 'Social Media Marketing (2 platforms)', 'Pay-Per-Click Ad. (Basic)', 'Email Marketing (Full Suite)', 'Advanced Analytics and Reporting', 'Dedicated Account Manager'],
                    'price_addons'          => ['Email Marketing: $20/mo ', 'PPC Campaign Management: $30/mo '],
                ],

            ],
            'fields' => [
                [
                    'name' => esc_attr__('Plan Title', 'nextpro'),
                    'id'   => 'plan_title',
                    'type' => 'text',
                ],
                [
                    'name' => esc_attr__('Value for money label', 'nextpro'),
                    'id'   => 'value_for_money',
                    'type' => 'text',
                ],
                [
                    'name' => esc_attr__('Plan Subtitle', 'nextpro'),
                    'id'   => 'plan_subtitle',
                    'type' => 'textarea',
                ],
                [
                    'id'   => 'price_suffix',
                    'name' => esc_attr__('Suffix (e.g., $, €,৳)', 'nextpro'),
                    'type' => 'text',
                    'std'  => '$',
                ],
                [
                    'name' => esc_attr__('Price', 'nextpro'),
                    'id'   => 'price',
                    'type' => 'number',
                ],
                [
                    'name' => esc_attr__('Subscription type', 'nextpro'),
                    'id'   => 'subscription_label',
                    'type' => 'text',
                ],
                [
                    'name'        => esc_attr__('price Button Text:', 'nextpro'),
                    'id'          => 'price_button_text',
                    'type'        => 'text',
                    'std'         => 'Purchase Plan',
                    'placeholder' => esc_attr__('Write Button Text', 'nextpro'),
                ],
                [
                    'name'        => esc_attr__('price Button URL:', 'nextpro'),
                    'id'          => 'price_button_url',
                    'desc'        => esc_attr__('URL for the button', 'nextpro'),
                    'type'        => 'text',
                    'std'         => '#',
                    'placeholder' => esc_attr__('Enter button URL here', 'nextpro'),
                ],
                [
                    'name' => esc_attr__('Purchase Note ', 'nextpro'),
                    'id'   => 'price_note',
                    'type' => 'text',
                ],
                [
                    'name' => esc_attr__('Services Included:', 'nextpro'),
                    'id'   => 'price_features',
                    'type' => 'text',
                    'desc'      => sprintf('Use %s to make the features premium. e.g. %s', '<code>{}</code>', '<code> </code>'),
                    'clone' => true,
                ],
                [
                    'name' => esc_attr__('Additional Add-ons: ', 'nextpro'),
                    'id'   => 'price_addons',
                    'type' => 'text',
                    'clone' => true,
                ],
            ],
        ],
    ],
];
