<?php
declare(strict_types=1);

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function external_url(?string $url): string
{
    if (!$url) return '';
    $parts = parse_url($url);
    if (!is_array($parts) || !isset($parts['scheme'], $parts['host']) || !in_array(strtolower($parts['scheme']), ['https', 'http'], true)) return '';
    return $url;
}

function section(string $id, string $title, string $kicker = ''): void
{
    echo '<section class="section content-section" id="' . e($id) . '" tabindex="-1">';
    echo '<div class="section-heading"><div><p class="eyebrow">' . e($kicker) . '</p><h2>' . e($title) . '</h2></div></div>';
}

function end_section(): void { echo '</section>'; }
