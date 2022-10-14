@if (OpenGraph::isEnabled())
    @if($openGraphDescription = OpenGraph::getDescription())
        <meta name="description" content="{{ OpenGraph::getDescription() }}">
    @endif
    <meta property="og:url" content="{{ OpenGraph::getUrl() }}" />
    <meta property="og:type" content="{{ OpenGraph::getType() }}" />
    <meta property="og:title" content="{{ OpenGraph::getTitle() }}" />
    @if($openGraphDescription)
        <meta property="og:description" content="{{ $openGraphDescription }}" />
    @endif
    @if ($openGraphImage = OpenGraph::getImage())
        <meta property="og:image" content="{{ $openGraphImage }}" />
    @endif
    @foreach (OpenGraph::getData() as $key => $value)
        <meta property="og:{{ $key }}" content="{{ $value }}" />
    @endforeach
@endif