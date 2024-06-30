<?php
return [
    'title'           => 'Banner single',
    'id'              => 'banner-archive',
    'disable_block'   => true,
    'icon'            => 'cover-image',
    'visible' => ['template', 'in', ['job/loop/content.php', 'service/loop/content.php','project/loop/content.php']],
    'fields'          => [
        [
            'id'   => 'image',
            'name' => 'Image',
            'type' => 'single_image',
            'std'  => '',
            'desc'  => 'Use for the element',
        ],
       

    ],
];
