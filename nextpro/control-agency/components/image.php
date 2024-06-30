<?php
if ($template_file == 'components/images/single-shape-image.php') {
    include('components/images/single-shape-image.php');
} elseif ($template_file == 'components/images/multi-shape-image.php') {
    include('components/images/multi-shape-image.php');
} elseif ($template_file == 'components/images/moving-image.php') {
    include('components/images/moving-image.php');
} elseif ($template_file == 'components/images/gallery-type.php') {
    include('components/images/gallery-type.php');
} else {
    echo "There is no image block here";
}
