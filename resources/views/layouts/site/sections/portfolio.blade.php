<!-- Portfolio Section -->
@php
$Portfolio = \App\Model\Portfolio::with('categories')->get();
$tab = array();

foreach ($Portfolio as $item) {
if (!in_array($item->service->title, $tab))
array_push($tab, $item->service->title);
}
@endphp

@if ($Portfolio)
<section class="portfolio-section  " style="padding-top: 40px;;">
    <div class="section-inner">
        <div class="container">
            <div class="heading text-uppercase center">Portfolio</div>

            <div class="gallery-block">
                <div class="gallery">
                    <ul class="gallery-filter js-filter">
                        <li class="active"><a href="#" data-filter=".all">All</a></li>
                        @foreach($tab as $item)
                        <li class="text-capitalize">
                            <a href="#" data-filter=".{{ preg_replace("/\s+/", "", $item) }}">{{ $item }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <ul class="gallery-list js-gallery">
                        @foreach($Portfolio as $item)
                        <li class="gallery-item all {{ preg_replace("/\s+/", "", $item->service->title) }}" onclick="window.location.href='{{ url('portfolio/') .'/'. $item->slug }}'">
                            <a class="item-a" href="{{ url('portfolio/') .'/'. $item->slug }}" data-original-width="800" data-original-height="1200"><img src="{{asset('storage/portfolio/thumbnail').'/'.\App\Model\Attachments::find($item->thumbnail)->path}}" width="482" height="280" alt=""></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


<script src="{{ asset('assets/site/js') }}/isotope.pkgd.min.js"></script>

<script>
    setTimeout(function() {
        (function($) {
            var $gallery = $('.js-gallery');
            var $filter = $('.js-filter');
            var $isotope = $gallery.isotope();

            var filter = '.all';
            var items = [];
            var options = {
                getThumbBoundsFn: function(index) {
                    var _img = $gallery.find(filter).eq(index).find('img')[0];
                    var _rect = _img.getBoundingClientRect();
                    var _scroll = window.pageYOffset || document.documentElement.scrollTop;
                    return {
                        x: _rect.left,
                        y: _rect.top + _scroll,
                        w: _rect.width
                    };
                },
            };

            // Generate PID (Use for history)
            $gallery.find('.gallery-item').each(function(i, el) {
                var index = i + 1; // Do this fo
                var $link = $(el).find('a');
                $link.attr('data-pid', index);
            });

            // Update Items on loaded
            updateItems(filter);

            // Bind click event to a tag for get index then open Gallery
            $gallery.on('click', 'a', function(event) {
                event.preventDefault();

                options.index = $(this).parent('.gallery-item').index(filter);
                openGallery(items, options);
            });

            // Bind click event to a tag for filter gallery by isotope then update items object
            $filter.on('click', 'a', function(event) {
                event.preventDefault();

                filter = this.dataset.filter;
                $isotope.isotope({
                    filter: filter,
                });
                updateItems(filter);

                $(this).parent('li').addClass('active').siblings().removeClass('active');
            });

            // Open image from hash
            if (window.location.hash) {
                var hash = window.location.hash;
                var params = hash.split('&');
                var pid;
                params.forEach(function(el, i) {
                    var param = el.split('=');
                    if (param[0] === 'pid') {
                        pid = param[1];
                    }
                });
                options.index = Number(pid - 1);
                openGallery(items, options);
            }

            // Open gallery with items object and options
            function openGallery(items, options) {
                var markup = $('.pswp').get(0);
                var gallery = new PhotoSwipe(markup, PhotoSwipeUI_Default, items, options);
                gallery.init();
            }

            // Update items object with filter select by class
            function updateItems(selector) {
                items = [];
                $gallery.find(selector).each(function(idx, el) {
                    var _link = $(el).find('a').get(0);
                    var source = _link.href;
                    var width = _link.dataset.originalWidth;
                    var height = _link.dataset.originalHeight;
                    var caption = _link.dataset.caption;
                    var pid = _link.dataset.pid;
                    var item = {
                        src: source,
                        w: width,
                        h: height,
                        title: caption,
                        msrc: source,
                        pid: pid,
                    }
                    items.push(item);
                });
            }
        })(jQuery);
    }, 500)
</script>
