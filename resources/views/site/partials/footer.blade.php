
<div class="" style="background-color: black !important;width:100%;">
    <br>
    <div class="mbm">
        <img style="width:127px;" src="http://localhost:3000/frontend/images/logo2.png" alt="Arc Angel Battery">
    </div>
    <div class="d-flex flex-row justify-content-center col-md-12" id="stickymenu" style="width:80%; margin: 0 auto;color:#a2a2a2;font-size:14px;">
        <div class="p-1">
            <a href="{{ route('products.list') }}">PRODUCTS</a>
        </div>
        <div class="p-1">|</div>
        <div class="p-1">
            <a href="{{ route('site.faq') }}">FAQs</a>
        </div>
        <div class="p-1">|</div>
        <div class="p-1">
            <a href="{{ route('site.video') }}">VIDEOS</a>
        </div>
        <div class="p-1">|</div>
        <div class="p-1">
            <a href="{{ route('site.contact') }}">CONTACT US</a>
        </div>
        @foreach($footer_posts as $f)
            <div class="p-1">|</div>
            <div class="p-1">
                <a href="{{ route('post.page', $f->id) }}">{{ \Illuminate\Support\Str::upper($f->title) }}</a>
            </div>
        @endforeach
    </div>
            <div class="social_outer">
                <div class="social">
                    <a class="face" href="https://www.facebook.com/Arc-Angel-Battery-172640030326755/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook fa-fw"></i></a>
                </div>
                <p>Join us for more inspiration!</p>
                <p class="f_copy">Copyright © 2018 Arc-Angel Battery LLC. All rights
                    reserved.</p>
                <img style="margin-top:10px;" alt="BBB Accredited Business" src="https://seal-houston.bbb.org/gen-seals/img.png?bid=90061993&amp;w=293&amp;h=61&amp;color=blue&amp;v=2&amp;chk=CBB2CE9890">
            </div>
        </div>
