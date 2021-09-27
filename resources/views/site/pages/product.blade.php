<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - {{ config('app.name') }}</title>
    @include('site.partials.styles')
    @include('site.partials.scripts')

</head>
<body style="background-color:#333333">
@include('site.partials.header')
@include('site.partials.nav')

<section class="section-pagetop" style="background-color: white; height: 50px;">
    <br><br>
        <div class="container clearfix">
            <h2 class="title-page">{{ $product->name }}</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top" id="site" style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row no-gutters">
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap">
                                    @if ($product->images->count() > 0)
                                        <div class="img-big-wrap">
                                            <div class="padding-y">
                                                <a href="{{ asset('storage/'.$product->images->first()->image) }}" data-fancybox="">
                                                    <img src="{{ asset('storage/'.$product->images->first()->image) }}" alt="{{$product->name}}" width="400px">
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </article>
                            </aside>
                            <aside class="col-sm-7">
                                <article class="p-5">
                                    <h2 class="title mb-3"><b>{{ $product->name }}
                                        @if($product->inventory->available_qty < 1)
                                         - Out of Stock
                                        @endif
                                        </b></h2>
                                    <dl class="row">
                                        <dt class="col-sm-3">SKU</dt>
                                        <dd class="col-sm-9">{{ $product->sku }}</dd>
                                        <dt class="col-sm-3">Capacity</dt>
                                        <dd class="col-sm-9">{{ $product->capacity->capacity_name }}</dd>
                                        <dt class="col-sm-3">Battery Group</dt>
                                        <dd class="col-sm-9">{{ $product->batterygroup->material_name }}</dd>
                                        <br>
                                        <dd class="col-sm-12"><h3><b>Availability:</b>  <i>
                                        @if($product->inventory->available_qty > 0)
                                            {{ $product->inventory->available_qty }} left in stock!
                                        @else
                                            Out of stock!
                                        @endif
                                        </i></h3></dd>
                                    </dl>
                                    <div class="mb-3">
                                        @if ($product->price > 0)
                                            @if($saleprice != null)
                                                <var class="price h3 text-danger">
                                                    <span class="currency">{{ config('settings.currency_symbol') }}</span>
                                                    <span class="num" id="productPrice" STYLE="text-decoration:line-through">{{ $product->price }}</span>
                                                    <span class="num" id="productPrice">Sale Price:  ${{ $saleprice }}</span>
                                                </var>
                                            @else
                                                <var class="price h3 text-danger">
                                                    <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->price }}</span>
                                                </var>
                                            @endif


                                        @endif
                                    </div>
                                    <hr>
                                    <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <div class="row">
                                           <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 my-1">
                                                        <b>Quantity:</b>
                                                    </div>
                                                        <div class="col-sm-6 my-1">
                                                            <input class="form-control" type="number" min="1" value="1" max="{{ $product->id }}" name="qty" style="width:70px;">
                                                            <input type="hidden" name="productId" value="{{ $product->id }}">
                                                            <input type="hidden" name="price" value="{{ $saleprice != null ? $saleprice : $product->price }}">
                                                        </div>
                                                </div>

                                               @if($packages->count() >=1)
                                               <div class="row">
                                                   <div class="col-sm-6 my-1">
                                                       <b>Choose a package to customize your battery:</b>
                                                   </div>
                                                   <div class="col-sm-6 my-1">
                                                       <select class="form-control my-1">
                                                           <option value="">Choose...</option>
                                                           @foreach($packages as $p)
                                                               <option value="{{ $p->package_id }}">
                {{ $p->name.'     ( + $'.number_format($p->price_adjustment,2,'.',',').') ' }}
                                                               </option>
                                                               @endforeach
                                                       </select>
                                                   </div>
                                               </div>
                                               @endif

                                                <div class="col-sm-12 my-2 text-right">
                                                    <button type="submit" class="btn btn-primary px-4">
                                                        <i class="fas fa-shopping-cart"></i> Add To Cart
                                                    </button>

                                                </div>
                                            </div>
                                        </div>

                                    </form>

<br>

                                </article>
                            </aside>
                            <div class="col-sm-12">
                                <div class="related_pro_di">
                                    <h2>Technical Specifications</h2>
                                    {!!  $product->technical_specifications  !!}
                                <br><hr><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>

    <br>
@include('site.partials.footer')

