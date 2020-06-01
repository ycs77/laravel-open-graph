@if (OpenGraph::isEnabled())
    <meta name="description" content="{{ OpenGraph::getDescription() }}">
    <meta property="og:url" content="{{ OpenGraph::getUrl() }}" />
    <meta property="og:type" content="{{ OpenGraph::getType() }}" />
    <meta property="og:title" content="{{ OpenGraph::getTitle() }}" />
    <meta property="og:description" content="{{ OpenGraph::getDescription() }}" />
    @if ($openGraphImage = OpenGraph::getImage())
    <meta property="og:image" content="{{ $openGraphImage }}" />
    @endif
    @foreach (OpenGraph::getData() as $key => $value)
    <meta property="og:{{ $key }}" content="{{ $value }}" />
    @endforeach
@endif
