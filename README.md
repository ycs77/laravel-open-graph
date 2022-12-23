# Laravel Open Graph

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![GitHub Tests Action Status][ico-github-action]][link-github-action]
[![Style CI Build Status][ico-style-ci]][link-style-ci]
[![Total Downloads][ico-downloads]][link-downloads]

---

**Recommended to use [archtechx/laravel-seo](https://github.com/archtechx/laravel-seo) or [artesaos/seotools](https://github.com/artesaos/seotools) package instead.**

---

Setting Open Graph for Laravel.

## Install

Via Composer install:

```bash
composer require ycs77/laravel-open-graph
```

Include Open Graph meta view into your layout `<head>`:

```blade
@include('open-graph::meta')
```

## Usage

Set Open Graph metadata into Controller (this example page title default is Laravel app name):

*HomeController*
```php
<?php

namespace App\Http\Controllers;

use Ycs77\LaravelOpenGraph\Facades\OpenGraph;

class HomeController extends Controller
{
    public function index()
    {
        OpenGraph::start()
            ->title()
            ->description('The site description...')
            ->image(asset('images/og-image.png'));

        return view('home');
    }
}
```

Set the article's Open Graph metadata Controller (this example article title like `Article name - App name`):

*ArticleController*
```php
<?php

namespace App\Http\Controllers;

use App\Article;
use Ycs77\LaravelOpenGraph\Facades\OpenGraph;

class ArticleController extends Controller
{
    public function show(Article $article)
    {
        OpenGraph::start()
            ->type('article')
            ->title($article->title)
            ->description($article->description)
            ->image($article->thumbnail)
            ->data([
                'article:published_time' => $article->created_at->toIso8601String(),
            ]);

        return view('home');
    }
}
```

Open Graph references: https://developers.facebook.com/docs/sharing/webmasters/

[ico-version]: https://img.shields.io/packagist/v/ycs77/laravel-open-graph?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen?style=flat-square
[ico-github-action]: https://img.shields.io/github/actions/workflow/status/ycs77/laravel-open-graph/tests.yml?branch=main&label=tests&style=flat-square
[ico-style-ci]: https://github.styleci.io/repos/268535672/shield?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ycs77/laravel-open-graph?style=flat-square

[link-packagist]: https://packagist.org/packages/ycs77/laravel-open-graph
[link-github-action]: https://github.com/ycs77/laravel-open-graph/actions/workflows/tests.yml?query=branch%3Amain
[link-style-ci]: https://github.styleci.io/repos/268535672
[link-downloads]: https://packagist.org/packages/ycs77/laravel-open-graph
