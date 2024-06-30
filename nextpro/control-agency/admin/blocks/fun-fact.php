<?php
return [
    'title'       => 'Fun Facts Section',
    'id'          => 'fun-fact',
    'icon'        => 'chart-bar',
    'description' => 'Fun Facts section settings',
    'fields'      => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Fun Facts', 'nextpro'),
        ],
        [
            'type' => 'hidden',
            'id'   => 'template',
            'name' => 'Template',
            'std'  => 'components/fun-fact.php'
        ],
        [
            'name'              => esc_attr__('Fun Facts Settings', 'nextpro'),
            'id'                => 'fun_facts_items',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => 'Fun Fact {#}',
            'std'               => [
                [
                    'fun_fact_count' => 5,
                    'fun_fact_suffix' => 'k+',
                    'fun_fact_text' => esc_attr__('Website Optimized', 'nextpro'),
                    'fun_fact_delay' => 0,
                ],
                [
                    'fun_fact_count' => 4.9,
                    'fun_fact_suffix' => 'k',
                    'fun_fact_text' => esc_attr__('Positive Reviews', 'nextpro'),
                    'fun_fact_delay' => 1,
                ],
                [
                    'fun_fact_count' => 96,
                    'fun_fact_suffix' => '%',
                    'fun_fact_text' => esc_attr__('Retention Rate', 'nextpro'),
                    'fun_fact_delay' => 2,
                ],
                [
                    'fun_fact_count' => 15,
                    'fun_fact_suffix' => 'X',
                    'fun_fact_text' => esc_attr__('Conversion Rate Increased', 'nextpro'),
                    'fun_fact_delay' => 2,
                ],
            ],
            'fields'            => [
                [
                    'id'   => 'fun_fact_count',
                    'name' => esc_attr__('Count', 'nextpro'),
                    'type' => 'number',
                    'std'  => 0,
                ],
                [
                    'id'   => 'fun_fact_suffix',
                    'name' => esc_attr__('Suffix (e.g., k+, %)', 'nextpro'),
                    'type' => 'text',
                    'std'  => '',
                ],
                [
                    'id'   => 'fun_fact_text',
                    'name' => esc_attr__('Text', 'nextpro'),
                    'type' => 'text',
                    'std'  => '',
                ],
                [
                    'id'   => 'fun_fact_delay',
                    'name' => esc_attr__('Animation Delay (ms)', 'nextpro'),
                    'type' => 'number',
                    'std'  => 0,
                ],
            ],
        ],
    ],
];
