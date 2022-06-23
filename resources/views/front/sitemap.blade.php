<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url($home->slug) }}</loc>
        <lastmod>{{ $home->last_edit_at->toIso8601String() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ url($expertises->slug) }}</loc>
        <lastmod>{{ $expertises->last_edit_at->toIso8601String() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ url($about->slug) }}</loc>
        <lastmod>{{ $about->last_edit_at->toIso8601String() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ url($contact->slug) }}</loc>
        <lastmod>{{ $contact->last_edit_at->toIso8601String() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ url($disclaimer->slug) }}</loc>
        <lastmod>{{ $disclaimer->last_edit_at->toIso8601String() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ url($algemeen->slug) }}</loc>
        <lastmod>{{ $algemeen->last_edit_at->toIso8601String() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ url($privacy->slug) }}</loc>
        <lastmod>{{ $privacy->last_edit_at->toIso8601String() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>{{ url($cookie->slug) }}</loc>
        <lastmod>{{ $cookie->last_edit_at->toIso8601String() }}</lastmod>
        <changefreq>yearly</changefreq>
        <priority>1</priority>
    </url>
</urlset>
