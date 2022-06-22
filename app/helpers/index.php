<?php
    if (! function_exists('show_star_comment_product')) {
        function show_star_comment_product($star)
        {
            switch ($star) {
                case 1:
                    echo '
                        <i class="fa fa-star-o empty"></i>
                        <i class="fa fa-star-o empty"></i>
                        <i class="fa fa-star-o empty"></i>
                        <i class="fa fa-star-o empty"></i>';
                    break;
                case 2:
                    echo '
                        <i class="fa fa-star-o empty"></i>
                        <i class="fa fa-star-o empty"></i>
                        <i class="fa fa-star-o empty"></i>';
                    break;
                case 3:
                    echo '
                        <i class="fa fa-star-o empty"></i>
                        <i class="fa fa-star-o empty"></i>';
                    break;
                case 4:
                    echo '
                        <i class="fa fa-star-o empty"></i>';
                    break;
            }
        }
    }

    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
?>