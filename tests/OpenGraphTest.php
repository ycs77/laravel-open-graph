<?php

namespace Ycs77\LaravelOpenGraph\Test;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Routing\UrlGenerator;
use Mockery as m;
use PHPUnit\Framework\TestCase;
use Ycs77\LaravelOpenGraph\OpenGraph;

class OpenGraphTest extends TestCase
{
    public function testBasicOpenGraph()
    {
        /** @var \Illuminate\Contracts\Config\Repository|\Mockery\MockInterface $config */
        $config = m::mock(Repository::class);
        $config->shouldReceive('get')
            ->with('app.name')
            ->once()
            ->andReturn('Test app');
        $config->shouldReceive('get')
            ->with('app.description')
            ->once()
            ->andReturn('Test app description...');

        /** @var \Illuminate\Contracts\Routing\UrlGenerator|\Mockery\MockInterface $urlGenerator */
        $urlGenerator = m::mock(UrlGenerator::class);
        $urlGenerator->shouldReceive('current')
            ->once()
            ->andReturn('http://laravel-open-graph.test/');

        $openGraph = new OpenGraph($config, $urlGenerator);
        $openGraph->start()
            ->title('Test title')
            ->description('Test description')
            ->image('http://example.com/test-image')
            ->type('test-type');

        $this->assertTrue($openGraph->isEnabled());
        $this->assertEquals('Test title - Test app', $openGraph->getTitle());
        $this->assertEquals('Test description', $openGraph->getDescription());
        $this->assertEquals('http://example.com/test-image', $openGraph->getImage());
        $this->assertEquals('test-type', $openGraph->getType());
    }

    public function testUnStartOpenGraphStatus()
    {
        /** @var \Illuminate\Contracts\Config\Repository|\Mockery\MockInterface $config */
        $config = m::mock(Repository::class);
        $config->shouldReceive('get')
            ->with('app.name')
            ->once()
            ->andReturn('Test app');
        $config->shouldReceive('get')
            ->with('app.description')
            ->once()
            ->andReturn('Test app description...');

        /** @var \Illuminate\Contracts\Routing\UrlGenerator|\Mockery\MockInterface $urlGenerator */
        $urlGenerator = m::mock(UrlGenerator::class);
        $urlGenerator->shouldReceive('current')
            ->once()
            ->andReturn('http://laravel-open-graph.test/');

        $openGraph = new OpenGraph($config, $urlGenerator);

        $this->assertFalse($openGraph->isEnabled());
    }

    public function testDefaultOpenGraph()
    {
        /** @var \Illuminate\Contracts\Config\Repository|\Mockery\MockInterface $config */
        $config = m::mock(Repository::class);
        $config->shouldReceive('get')
            ->with('app.name')
            ->once()
            ->andReturn('Test app');
        $config->shouldReceive('get')
            ->with('app.description')
            ->once()
            ->andReturn('Test app description...');

        /** @var \Illuminate\Contracts\Routing\UrlGenerator|\Mockery\MockInterface $urlGenerator */
        $urlGenerator = m::mock(UrlGenerator::class);
        $urlGenerator->shouldReceive('current')
            ->once()
            ->andReturn('http://laravel-open-graph.test/');

        $openGraph = new OpenGraph($config, $urlGenerator);
        $openGraph->start();

        $this->assertTrue($openGraph->isEnabled());
        $this->assertEquals('Test app', $openGraph->getTitle());
        $this->assertEquals('Test app description...', $openGraph->getDescription());
        $this->assertEquals('Test app', $openGraph->getSiteName());
        $this->assertNull($openGraph->getImage());
        $this->assertEquals('website', $openGraph->getType());
    }

    public function testLocaleOpenGraphData()
    {
        /** @var \Illuminate\Contracts\Config\Repository|\Mockery\MockInterface $config */
        $config = m::mock(Repository::class);
        $config->shouldReceive('get')
            ->with('app.name')
            ->once()
            ->andReturn('Test app');
        $config->shouldReceive('get')
            ->with('app.description')
            ->once()
            ->andReturn('Test app description...');

        /** @var \Illuminate\Contracts\Routing\UrlGenerator|\Mockery\MockInterface $urlGenerator */
        $urlGenerator = m::mock(UrlGenerator::class);
        $urlGenerator->shouldReceive('current')
            ->once()
            ->andReturn('http://laravel-open-graph.test/');

        $openGraph = new OpenGraph($config, $urlGenerator);
        $openGraph->start()
            ->setLocale('en_GB');

        $this->assertTrue($openGraph->isEnabled());
        $this->assertEquals('en_GB', $openGraph->getLocale());
    }

    public function testAlternateLocaleOpenGraphData()
    {
        /** @var \Illuminate\Contracts\Config\Repository|\Mockery\MockInterface $config */
        $config = m::mock(Repository::class);
        $config->shouldReceive('get')
            ->with('app.name')
            ->once()
            ->andReturn('Test app');
        $config->shouldReceive('get')
            ->with('app.description')
            ->once()
            ->andReturn('Test app description...');

        /** @var \Illuminate\Contracts\Routing\UrlGenerator|\Mockery\MockInterface $urlGenerator */
        $urlGenerator = m::mock(UrlGenerator::class);
        $urlGenerator->shouldReceive('current')
            ->once()
            ->andReturn('http://laravel-open-graph.test/');

        $openGraph = new OpenGraph($config, $urlGenerator);
        $openGraph->start()
            ->setAlternateLocale('en_GB')
            ->setAlternateLocale('fr_FR');

        $this->assertTrue($openGraph->isEnabled());
        $this->assertEquals([
            'en_GB',
            'fr_FR'
        ], $openGraph->getAlternateLocale());
    }

    public function testSetSiteNameOpenGraphData()
    {
        /** @var \Illuminate\Contracts\Config\Repository|\Mockery\MockInterface $config */
        $config = m::mock(Repository::class);
        $config->shouldReceive('get')
            ->with('app.name')
            ->once()
            ->andReturn('Test app');
        $config->shouldReceive('get')
            ->with('app.description')
            ->once()
            ->andReturn('Test app description...');

        /** @var \Illuminate\Contracts\Routing\UrlGenerator|\Mockery\MockInterface $urlGenerator */
        $urlGenerator = m::mock(UrlGenerator::class);
        $urlGenerator->shouldReceive('current')
            ->once()
            ->andReturn('http://laravel-open-graph.test/');

        $openGraph = new OpenGraph($config, $urlGenerator);
        $openGraph->start()
            ->setSiteName('Test app');

        $this->assertTrue($openGraph->isEnabled());
        $this->assertEquals('Test app', $openGraph->getSiteName());
    }

    public function testSetOtherOpenGraphData()
    {
        /** @var \Illuminate\Contracts\Config\Repository|\Mockery\MockInterface $config */
        $config = m::mock(Repository::class);
        $config->shouldReceive('get')
            ->with('app.name')
            ->once()
            ->andReturn('Test app');
        $config->shouldReceive('get')
            ->with('app.description')
            ->once()
            ->andReturn('Test app description...');

        /** @var \Illuminate\Contracts\Routing\UrlGenerator|\Mockery\MockInterface $urlGenerator */
        $urlGenerator = m::mock(UrlGenerator::class);
        $urlGenerator->shouldReceive('current')
            ->once()
            ->andReturn('http://laravel-open-graph.test/');

        $openGraph = new OpenGraph($config, $urlGenerator);
        $openGraph->start()
            ->setData([
                'other' => 'data...',
            ]);

        $this->assertTrue($openGraph->isEnabled());
        $this->assertEquals([
            'other' => 'data...',
        ], $openGraph->getData());
    }
}
