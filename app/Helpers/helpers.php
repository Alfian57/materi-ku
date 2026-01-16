<?php

use App\Helpers\HtmlSanitizer;

if (!function_exists('clean_html')) {
    /**
     * Sanitize HTML content for safe rendering
     *
     * @param string|null $html
     * @return string
     */
    function clean_html(?string $html): string
    {
        return HtmlSanitizer::clean($html);
    }
}
