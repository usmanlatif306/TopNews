<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<?php echo '<?xml-stylesheet type="text/xsl" href="' . asset("css/sitemap.xsl") . '"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	{{-- pages sitemap --}}
	@foreach ($data['pages'] as $name => $page)
	<url>
		@if ($loop->index === 0)
		<loc>{{ route($page['route']) }}</loc>
		@else
		<loc>{{ route($page['route'],$name) }}</loc>
		@endif
		
		@if($page['updated_at'])
		<lastmod>{{ $page['updated_at']->tz('UTC')->toAtomString() }}</lastmod>
		@endif
	</url>
	@endforeach

	{{-- news sites map --}}
	@foreach ($data['news'] as $item)
	<url>
		<loc>{{ route($item['route'],[$item['category'],$item['slug']]) }}</loc>
		@if($item['updated_at'])
		<lastmod>{{ $item['updated_at']->tz('UTC')->toAtomString() }}</lastmod>
		@endif
	</url>
	@endforeach
</urlset>