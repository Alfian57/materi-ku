<?php

namespace App\Helpers;

/**
 * HTML Sanitizer Helper
 * 
 * Provides secure HTML sanitization for user-generated content.
 * Uses a whitelist approach to allow only safe HTML tags and attributes.
 */
class HtmlSanitizer
{
    /**
     * Allowed HTML tags for content rendering
     */
    protected static array $allowedTags = [
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6',
        'p',
        'br',
        'hr',
        'strong',
        'b',
        'em',
        'i',
        'u',
        's',
        'del',
        'ins',
        'blockquote',
        'pre',
        'code',
        'ul',
        'ol',
        'li',
        'a',
        'img',
        'table',
        'thead',
        'tbody',
        'tr',
        'th',
        'td',
        'div',
        'span',
    ];

    /**
     * Allowed attributes per tag
     */
    protected static array $allowedAttributes = [
        'a' => ['href', 'title', 'target', 'rel'],
        'img' => ['src', 'alt', 'width', 'height', 'class', 'style'],
        'div' => ['class', 'style'],
        'span' => ['class', 'style'],
        'p' => ['class', 'style'],
        'table' => ['class', 'style'],
        'th' => ['class', 'style', 'colspan', 'rowspan'],
        'td' => ['class', 'style', 'colspan', 'rowspan'],
        'h1' => ['class', 'style'],
        'h2' => ['class', 'style'],
        'h3' => ['class', 'style'],
        'h4' => ['class', 'style'],
        'h5' => ['class', 'style'],
        'h6' => ['class', 'style'],
        'blockquote' => ['class', 'style'],
        'pre' => ['class', 'style'],
        'code' => ['class', 'style'],
        'ul' => ['class', 'style'],
        'ol' => ['class', 'style'],
        'li' => ['class', 'style'],
    ];

    /**
     * Dangerous patterns to remove
     */
    protected static array $dangerousPatterns = [
        // Event handlers
        '/\s+on\w+\s*=\s*["\'][^"\']*["\']/i',
        // JavaScript URLs
        '/javascript\s*:/i',
        // Data URLs (except safe image types)
        '/data\s*:(?!image\/(png|jpeg|gif|webp))/i',
        // VBScript
        '/vbscript\s*:/i',
        // Expression (IE)
        '/expression\s*\(/i',
    ];

    /**
     * Sanitize HTML content
     */
    public static function clean(?string $html): string
    {
        if (empty($html)) {
            return '';
        }

        // Remove null bytes
        $html = str_replace("\0", '', $html);

        // Build allowed tags string for strip_tags
        $allowedTagsString = '<' . implode('><', self::$allowedTags) . '>';

        // Strip disallowed tags
        $html = strip_tags($html, $allowedTagsString);

        // Remove dangerous patterns
        foreach (self::$dangerousPatterns as $pattern) {
            $html = preg_replace($pattern, '', $html);
        }

        // Parse and sanitize attributes
        $html = self::sanitizeAttributes($html);

        return $html;
    }

    /**
     * Sanitize HTML attributes
     */
    protected static function sanitizeAttributes(string $html): string
    {
        // Match all HTML tags with attributes
        return preg_replace_callback(
            '/<(\w+)([^>]*)>/i',
            function ($matches) {
                $tag = strtolower($matches[1]);
                $attributes = $matches[2];

                // If tag has no allowed attributes, return tag without attributes
                if (!isset(self::$allowedAttributes[$tag])) {
                    return "<{$tag}>";
                }

                $allowedAttrs = self::$allowedAttributes[$tag];
                $cleanAttributes = [];

                // Extract and filter attributes
                preg_match_all('/(\w+)\s*=\s*["\']([^"\']*)["\']/', $attributes, $attrMatches, PREG_SET_ORDER);

                foreach ($attrMatches as $attr) {
                    $attrName = strtolower($attr[1]);
                    $attrValue = $attr[2];

                    if (in_array($attrName, $allowedAttrs)) {
                        // Additional validation for specific attributes
                        if ($attrName === 'href' || $attrName === 'src') {
                            // Only allow http, https, and relative URLs
                            if (!preg_match('/^(https?:\/\/|\/|\.\/|#)/i', $attrValue) && !empty($attrValue)) {
                                continue;
                            }
                        }

                        // Sanitize style attribute
                        if ($attrName === 'style') {
                            $attrValue = self::sanitizeStyle($attrValue);
                        }

                        $cleanAttributes[] = "{$attrName}=\"" . htmlspecialchars($attrValue, ENT_QUOTES, 'UTF-8') . "\"";
                    }
                }

                $attrString = !empty($cleanAttributes) ? ' ' . implode(' ', $cleanAttributes) : '';
                return "<{$tag}{$attrString}>";
            },
            $html
        );
    }

    /**
     * Sanitize CSS style attribute
     */
    protected static function sanitizeStyle(string $style): string
    {
        // Remove dangerous CSS
        $dangerousCss = [
            '/expression\s*\(/i',
            '/javascript\s*:/i',
            '/behavior\s*:/i',
            '/-moz-binding/i',
            '/url\s*\(/i',
        ];

        foreach ($dangerousCss as $pattern) {
            $style = preg_replace($pattern, '', $style);
        }

        return $style;
    }
}
