@php echo '<?xml version="1.0" encoding="UTF-8"?>'; @endphp
<urlset 
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

    <!-- Homepage -->
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    <!-- Dynamic Posts -->
    @foreach ($menus as $menu)
    <?php if($menu->page_type == 'blog'){ 
            $pageParam = getUrl('blog_url'). '/';
        } elseif($menu->page_type == 'brand'){
            $pageParam = getUrl('brand_url') . '/';
        } elseif($menu->page_type == 'about'){
            $pageParam = getUrl('about_url') . '/';
        }elseif($menu->page_type == 'sector'){
            $pageParam = getUrl('sector_url') . '/';
        }elseif($menu->page_type == 'page'){
            $pageParam = null;
        }
       
    ?>
        

        <url>
            <loc>{{ url('/' . $pageParam . $menu->seo_url) }}</loc>
            <lastmod>{{ $menu->created_at }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    <!-- Dynamic Blogs -->
    @foreach ($blogs as $blog)
        <url>
            <loc>{{ url('/' . getUrl('blog_url') . '/' . $blog->seo_url) }}</loc>
            <lastmod>{{ $blog->created_at }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
    @endforeach

    <!-- Dynamic Career Jobs -->
    @foreach ($careerJobs as $careerJob)
        <url>
            <loc>{{ url('/' . getUrl('career_url') . '/' . $careerJob->seo_url) }}</loc>
            <lastmod>{{ $careerJob->created_at }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach

</urlset>
