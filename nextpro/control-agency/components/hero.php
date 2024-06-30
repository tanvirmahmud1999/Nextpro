
 <?php
    if ($template_file == 'components/hero/hero.php') {
        include('components/hero/hero.php');
    } elseif ($template_file == 'components/hero/hero-style2.php') {
        include('components/hero/hero-style3.php');
    } elseif ($template_file == 'components/hero/hero-style3.php') {
        include('components/hero/hero-style3.php');
    } else {
        echo "There is no Hero block here";
    }
