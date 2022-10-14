<?php

namespace Ycs77\LaravelOpenGraph;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Routing\UrlGenerator;

class OpenGraph
{
    /**
     * Open graph is enabled.
     *
     * @var bool
     */
    protected $enabled = false;

    /**
     * The open graph meta title.
     *
     * @var string
     */
    protected $title;

    /**
     * The open graph meta description.
     *
     * @var string|null
     */
    protected $description;

    /**
     * The open graph meta url.
     *
     * @var string
     */
    protected $url;

    /**
     * The open graph meta type.
     *
     * @var string
     */
    protected $type = 'website';

    /**
     * The open graph meta image.
     *
     * @var string
     */
    protected $image;

    /**
     * The other open graph meta data.
     *
     * @var array
     */
    protected $data = [];

    /**
     * The config repository instance.
     *
     * @var \Illuminate\Contracts\Config\Repository
     */
    protected $config;

    /**
     * The url generator instance.
     *
     * @var \Illuminate\Contracts\Routing\UrlGenerator
     */
    protected $urlGenerator;

    /**
     * Create a new laravel open graph instance.
     *
     * @param  \Illuminate\Contracts\Config\Repository  $config
     * @param  \Illuminate\Contracts\Routing\UrlGenerator  $urlGenerator
     * @return void
     */
    public function __construct(Repository $config, UrlGenerator $urlGenerator)
    {
        $this->config = $config;
        $this->urlGenerator = $urlGenerator;
        $this->title();
        $this->description($this->config->get('app.description'));
        $this->url($this->urlGenerator->current());
    }

    /**
     * Start build open graph meta data.
     *
     * @return $this
     */
    public function start()
    {
        $this->enabled = true;

        return $this;
    }

    /**
     * Set the open graph meta title.
     *
     * @param  string|null  $pageTitle
     * @param  string  $glue
     * @return $this
     */
    public function title(string $pageTitle = null, $glue = ' - ')
    {
        $this->title = function_exists('title')
            ? title($pageTitle ?? '')
            : (($pageTitle ? $pageTitle . $glue : '') . $this->config->get('app.name'));

        return $this;
    }

    /**
     * Get the open graph meta title.
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the open graph meta description.
     *
     * @param  string|null  $description
     * @return $this
     */
    public function description(string $description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the open graph meta description.
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the open graph meta url.
     *
     * @param  string  $url
     * @return $this
     */
    public function url(string $url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the open graph meta url.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set the open graph meta type.
     *
     * @param  string  $type
     * @return $this
     */
    public function type(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the open graph meta type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the open graph meta image.
     *
     * @param  string  $image
     * @return $this
     */
    public function image(string $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the open graph meta image.
     *
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Set the open graph meta data.
     *
     * @param  array  $data
     * @return $this
     */
    public function data(array $data)
    {
        $this->data = array_merge($this->data, $data);

        return $this;
    }

    /**
     * Get the open graph meta data.
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Check the open graph meta is enabled.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }
}
