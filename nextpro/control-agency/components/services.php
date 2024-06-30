<?php
if ($template_file == 'components/services/service-style1.php') {
    include('components/services/service-style1.php');
} elseif ($template_file == 'components/services/service-style2.php') {
    include('components/services/service-style2.php');
} elseif ($template_file == 'components/services/service-style3.php') {
    include('components/services/service-style3.php');
} elseif ($template_file == 'components/services/service-style4.php') {
    include('components/services/service-style4.php');
} else {
    echo "There is no service block here";
}
