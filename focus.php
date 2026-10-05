<?php

declare(strict_types=1);

use Awcodes\Focus\Card;
use Awcodes\Focus\Enums\Size;
use Awcodes\Focus\Screenshot;
use Awcodes\Focus\ScreenshotSuite;
use Playwright\Page\PageInterface;

/*
 * Documentation screenshots for Sticky Header, generated with awcodes/focus from the
 * Workbench (run `composer build` first). The Workbench seeds 25 fixed users on one list
 * page, and `?header=` picks the theme, so each theme is captured from the same page.
 */

// The header only sticks once the page has scrolled past it. Scroll a fixed distance, then wait for the plugin's
// IntersectionObserver to mark the page as sticky.
$scrolled = function (PageInterface $page): void {
    $page->evaluate('() => window.scrollTo(0, 360)');
    $page->waitForFunction('() => document.querySelector(".is-sticky") !== null');
};

$docs = [1280, 720];

// The awcodes card templates frame each screenshot at 1400x816.
$card = [1400, 816];

return ScreenshotSuite::make()
    ->screenshots([
        Screenshot::make('default')
            ->viewportSize(...$docs)
            ->visit('/admin/users?header=default')
            ->ready($scrolled)
            ->viewport(),

        Screenshot::make('floating')
            ->viewportSize(...$docs)
            ->visit('/admin/users?header=floating')
            ->ready($scrolled)
            ->viewport(),

        Screenshot::make('colored')
            ->viewportSize(...$docs)
            ->visit('/admin/users?header=colored')
            ->ready($scrolled)
            ->viewport(),

        // The share-image source, shaped to the card templates' screenshot slots. The two-up templates show it
        // dark in slot 1 and light in slot 2, so it is captured in both themes.
        Screenshot::make('card-colored')
            ->viewportSize(...$card)
            ->visit('/admin/users?header=colored')
            ->ready($scrolled)
            ->viewport(),
    ])
    ->cardTemplates('https://github.com/awcodes/focus-templates/tree/v1.1.0/dist')
    ->cards([
        // Open Graph and the GitHub social preview share one 2400x1260 template; GitHub crops 30px top and bottom.
        Card::make('social')
            ->template('two-up-wide')
            ->title('Sticky Header')
            ->screenshots(['card-colored', 'card-colored'])
            ->sizes([Size::OpenGraph, Size::GitHubSocial]),

        // The Filament plugin directory's 2560x1440 thumbnail.
        Card::make('thumbnail')
            ->template('two-up')
            ->title('Sticky Header')
            ->screenshots(['card-colored', 'card-colored'])
            ->sizes([Size::Filament]),
    ]);
