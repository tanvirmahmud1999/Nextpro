<?php
if ($template_file == 'components/features/feature-style1.php') {
    include('components/features/feature-style1.php');
} elseif ($template_file == 'components/features/feature-style2.php') {
    include('components/features/feature-style2.php');
} elseif ($template_file == 'components/features/feature-style3.php') {
    include('components/features/feature-style3.php');
} elseif ($template_file == 'components/features/feature-style4.php') {
    include('components/features/feature-style4.php');
} else {
    echo "There is no features block here";
}
