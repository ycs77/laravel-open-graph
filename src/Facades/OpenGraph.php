<?php

namespace Ycs77\LaravelOpenGraph\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Ycs77\LaravelOpenGraph\OpenGraph start()
 * @method static \Ycs77\LaravelOpenGraph\OpenGraph title(string $pageTitle = null, $glue = ' - ')
 * @method static string getTitle()
 * @method static \Ycs77\LaravelOpenGraph\OpenGraph description(string $description)
 * @method static string getDescription()
 * @method static \Ycs77\LaravelOpenGraph\OpenGraph url(string $type)
 * @method static string getUrl()
 * @method static \Ycs77\LaravelOpenGraph\OpenGraph type(string $type)
 * @method static string getType()
 * @method static \Ycs77\LaravelOpenGraph\OpenGraph image(string $image)
 * @method static null|string getImage()
 * @method static \Ycs77\LaravelOpenGraph\OpenGraph data(array $data)
 * @method static array getData()
 * @method static bool isEnabled()
 *
 * @see \Ycs77\LaravelOpenGraph\OpenGraph
 */
class OpenGraph extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'open-graph';
    }
}
