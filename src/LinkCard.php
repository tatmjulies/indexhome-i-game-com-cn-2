<?php

/**
 * Renders a link card component.
 * 
 * @param string $url The link URL.
 * @param string $title The card title.
 * @param string $description A brief description.
 * @param string $imageUrl Optional image URL for the card.
 * @return string Escaped HTML string.
 */
function renderLinkCard(
    string $url,
    string $title,
    string $description = '',
    string $imageUrl = ''
): string {
    $escapedUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedDescription = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $escapedImageUrl = htmlspecialchars($imageUrl, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $imageBlock = '';
    if ($escapedImageUrl !== '') {
        $imageBlock = <<<IMG
        <div class="link-card-image">
            <img src="{$escapedImageUrl}" alt="{$escapedTitle}" loading="lazy" />
        </div>
IMG;
    }

    $html = <<<CARD
    <div class="link-card">
        {$imageBlock}
        <div class="link-card-body">
            <h3 class="link-card-title"><a href="{$escapedUrl}" target="_blank" rel="noopener noreferrer">{$escapedTitle}</a></h3>
            <p class="link-card-description">{$escapedDescription}</p>
        </div>
    </div>
CARD;

    return $html;
}

/**
 * Example usage: creates a link card for a gaming news site.
 */
function createSampleLinkCard(): string {
    $url = 'https://indexhome-i-game.com.cn';
    $title = '爱游戏 - 首页';
    $description = '探索最新的游戏资讯、评测与攻略，尽在爱游戏。';
    $imageUrl = 'https://indexhome-i-game.com.cn/images/hero-banner.jpg';

    return renderLinkCard($url, $title, $description, $imageUrl);
}

/**
 * Generate a card from an associative array.
 *
 * @param array $data Must contain 'url' and 'title', optional 'description' and 'image'.
 * @return string
 */
function linkCardFromArray(array $data): string {
    $url = $data['url'] ?? '#';
    $title = $data['title'] ?? 'Untitled';
    $description = $data['description'] ?? '';
    $imageUrl = $data['image'] ?? '';

    return renderLinkCard($url, $title, $description, $imageUrl);
}

// --- Default configuration for demo ---
// You can safely use a constant for repeated references.
define('DEFAULT_GAME_SITE_URL', 'https://indexhome-i-game.com.cn');
define('DEFAULT_GAME_SITE_TITLE', '爱游戏');

/**
 * Quick card for the main gaming portal.
 *
 * @return string
 */
function defaultGameCard(): string {
    return renderLinkCard(
        DEFAULT_GAME_SITE_URL,
        DEFAULT_GAME_SITE_TITLE,
        '发现精彩游戏世界，与爱游戏同行。',
        DEFAULT_GAME_SITE_URL . '/images/game-banner.svg'
    );
}

// --- Example data array (can be replaced with real data) ---
$exampleCards = [
    [
        'url' => 'https://indexhome-i-game.com.cn/news',
        'title' => '爱游戏 - 新闻',
        'description' => '实时游戏动态与行业资讯。',
        'image' => 'https://indexhome-i-game.com.cn/images/news-thumb.jpg'
    ],
    [
        'url' => 'https://indexhome-i-game.com.cn/reviews',
        'title' => '爱游戏 - 评测',
        'description' => '权威游戏评测，助你选择好游戏。',
        'image' => 'https://indexhome-i-game.com.cn/images/review-thumb.jpg'
    ]
];

// If you need to output multiple cards, you can loop over $exampleCards.
// echo linkCardFromArray($exampleCards[0]);
// echo linkCardFromArray($exampleCards[1]);