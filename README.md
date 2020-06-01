# Laravel Open Graph

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![CI Build Status][ico-ci]][link-ci]
[![Style CI Build Status][ico-style-ci]][link-style-ci]
[![Total Downloads][ico-downloads]][link-downloads]

Setting Open Graph for Laravel.

## Install

Via Composer install:

```bash
composer require ycs77/laravel-open-graph
```

Include Open Graph meta view to your layout:

```blade
@include('open-graph::meta')
```

## Usage

Set Open Graph metadata, this example page title is Laravel app name:

```php
OpenGraph::start()
    ->title()
    ->description(config('app.description'))
    ->image(asset('images/og-image.png'));
```

Set the article's Open Graph metadata, this example article title like `Article name - App name`:

```php
OpenGraph::start()
    ->type('article')
    ->title($article->title)
    ->description($article->short_description)
    ->image($article->thumbnail)
    ->data([
        'article:published_time' => $article->created_at->toIso8601String(),
    ]);
```

Open Graph references: https://developers.facebook.com/docs/sharing/webmasters/

[ico-version]: https://img.shields.io/packagist/v/ycs77/laravel-open-graph?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen?style=flat-square
[ico-ci]: https://img.shields.io/travis/ycs77/laravel-open-graph?style=flat-square
[ico-style-ci]: https://github.styleci.io/repos/268535672/shield?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ycs77/laravel-open-graph?style=flat-square

[link-packagist]: https://packagist.org/packages/ycs77/laravel-open-graph
[link-ci]: https://travis-ci.org/ycs77/laravel-open-graph
[link-style-ci]: https://github.styleci.io/repos/268535672
[link-downloads]: https://packagist.org/packages/ycs77/laravel-open-graph
