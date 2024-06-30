<div class="pagination pt-5">
    <ul class="pagination pagination-lg d-block mx-auto">
        <?php
        global $wp_query;

        $total_pages = $wp_query->max_num_pages;
        $current_page = max(1, get_query_var('paged'));

        // Previous page link
        if ($current_page > 1) {
            echo '<li class="page-item my-1 d-inline-block"><a class="page-link" href="' . esc_url(get_pagenum_link($current_page - 1)) . '"> ' . nextpro_get_icon_svg('ui', 'arrow_left') . '</a></li>';
        }

        // Page numbers
        for ($i = 1; $i < $total_pages; $i++) {
            if ($i == $current_page) {
                echo '<li class="page-item my-1 d-inline-block active"><span class="page-link">' . $i . '</span></li>';
            } else {
                echo '<li class="page-item my-1 d-inline-block"><a class="page-link" href="' . esc_url(get_pagenum_link($i)) . '">' . $i . '</a></li>';
            }
        }

        // Next page link
        if ($current_page < $total_pages) {
            echo '<li class="page-item my-1 d-inline-block"><a class="page-link" href="' . esc_url(get_pagenum_link($current_page + 1)) . '">' . nextpro_get_icon_svg('ui', 'arrow_right') . '</a></li>';
        }
        ?>
    </ul>
</div>