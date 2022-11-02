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
     * @var Repository
     */
    protected $config;

    /**
     * The url generator instance.
     *
     * @var UrlGenerator
     */
    protected $urlGenerator;

    /**
     * Create a new laravel open graph instance.
     *
     * @param Repository $config
     * @param UrlGenerator $urlGenerator
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
    public function start(): OpenGraph
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
     * @deprecated
     */
    public function title(string $pageTitle = null, string $glue = ' - '): OpenGraph
    {
        return $this->setTitle($pageTitle, $glue);
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
     * Set the open graph meta title.
     *
     * @param  string|null  $pageTitle
     * @param  string  $glue
     * @return $this
     */
    public function setTitle(string $pageTitle = null, string $glue = ' - '): OpenGraph
    {
        if (function_exists('title')) {
            $this->title = title($pageTitle ?? '');
        } else {
            $this->title = ($pageTitle ? $pageTitle.$glue : '').$this->config->get('app.name');
        }

        return $this;
    }

    /**
     * Set the open graph meta description.
     *
     * @param  string|null  $description
     * @return $this
     * @deprecated
     */
    public function description(string $description = null): OpenGraph
    {
        return $this->setDescription($description);
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
     * Set the open graph meta description.
     *
     * @param  string|null  $description
     * @return $this
     */
    public function setDescription(string $description = null): OpenGraph
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the open graph meta url.
     *
     * @param  string  $url
     * @return $this
     * @deprecated
     */
    public function url(string $url): OpenGraph
    {
        return $this->setUrl($url);
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
     * Set the open graph meta url.
     *
     * @param  string  $url
     * @return $this
     */
    public function setUrl(string $url): OpenGraph
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the open graph meta type.
     *
     * @param  string  $type
     * @return $this
     * @deprecated
     */
    public function type(string $type): OpenGraph
    {
        return $this->setType($type);
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
     * Set the open graph meta type.
     *
     * @param  string  $type
     * @return $this
     */
    public function setType(string $type): OpenGraph
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the open graph meta image.
     *
     * @param  string  $image
     * @return $this
     * @deprecated
     */
    public function image(string $image): OpenGraph
    {
        return $this->setImage($image);
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
     * Set the open graph meta image.
     *
     * @param  string  $image
     * @return $this
     */
    public function setImage(string $image): OpenGraph
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Set the open graph meta data.
     *
     * @param  array  $data
     * @return $this
     * @deprecated
     */
    public function data(array $data): OpenGraph
    {
        return $this->setData($data);
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
     * Set the open graph metadata.
     *
     * @param  array  $data
     * @return $this
     */
    public function setData(array $data): OpenGraph
    {
        $this->data = array_merge($this->data, $data);

        return $this;
    }

    /**
     * Check the open graph meta is enabled.
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }
}
