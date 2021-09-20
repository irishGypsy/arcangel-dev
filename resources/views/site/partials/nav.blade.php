
<div id="wrapper" style="color:#a2a2a2;">
    <br>
    <div class="text-center">
        <a href="{{ route('site.app') }}">
        <img src="{{ asset('frontend/images/logo2.png') }}" alt="Arc-Angel Batteries Ltd.">
        </a>
    </div>
    <br>
    <div class="sticky-top">
    <div class="d-flex flex-row justify-content-center col-md-12 border-top" id="stickymenu" style="width:80%; margin: 0 auto;border-color: #a2a2a2;">
        <div class="p-3">
            <a href="{{ route('products.list') }}">PRODUCTS</a>
        </div>
        <div class="p-3">|</div>
        <div class="p-3">
            <a href="{{ route('site.faq') }}">FAQs</a>
        </div>
        <div class="p-3">|</div>
        <div class="p-3">
            <a href="{{ route('site.video') }}">VIDEOS</a>
        </div>
        @foreach($header_posts as $h)
            <div class="p-3">|</div>
            <div class="p-3">
                <a href="{{ route('post.page', $h->id) }}">{{ \Illuminate\Support\Str::upper($h->title) }}</a>
            </div>
        @endforeach
    </div>
    </div>
</div>
