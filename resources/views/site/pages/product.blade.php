@extends('site.app')
@section('title', $product->name)
@section('content')
    <section class="section-pagetop" style="background-color: white; height: 50px;">
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
{{--                                    @else--}}
{{--                                        <div class="img-big-wrap">--}}
{{--                                            <div>--}}
{{--                                                <a href="https://via.placeholder.com/176" data-fancybox=""><img src="https://via.placeholder.com/176"></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    @if ($product->images->count() > 0)--}}
{{--                                        <div class="img-small-wrap">--}}
{{--                                            @foreach($product->images as $image)--}}
{{--                                                <div class="item-gallery">--}}
{{--                                                    <img src="{{ asset('storage/'.$image->image) }}" alt="">--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
                                    @endif
                                </article>
                            </aside>

{{-- ###############   details on the right side  ############################ --}}
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
                                        @if ($product->mrp > 0)
                                            <var class="price h3 text-danger">
                                                <span class="currency">${{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->mrp }}</span>
{{--                                                <del class="price-old"> {{ config('settings.currency_symbol') }}{{ $product->price }}</del>--}}
                                            </var>
{{--                                        @else--}}
{{--                                            <var class="price h3 text-success">--}}
{{--                                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->mrp }}</span>--}}
{{--                                            </var>--}}
                                        @endif
                                    </div>
                                    <hr>
                                    <form action="{{ route('product.add.cart') }}" method="POST" role="form" id="addToCart">
                                        @csrf
                                        <div class="row">
{{--                                            <div class="col-sm-12">--}}
{{--                                                <dl class="dlist-inline">--}}
{{--                                                </dl>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-sm-12">
                                            <dl class="row">
                                                <dt class="col-sm-3">Quantity: </dt>
                                                    <input class="form-control" type="number" min="1" value="1" max="{{ $product->id }}" name="qty" style="width:70px;">
                                                    <input type="hidden" name="productId" value="{{ $product->id }}">
                                                <input type="hidden" name="price" value="500">
                                                    {{--                                                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">--}}
                                                    </dt>
                                                <dd class="col-sm-9"><button type="submit" class="btn btn-success">
                                                        <i class="fas fa-shopping-cart"></i> Add To Cart
                                                    </button>

                                                </dd>
                                            </dl>
                                        </div>

{{--                                            <div class="col-sm-12">--}}
{{--                                                <dl class="dlist-inline">--}}
{{--                                                    <dt>Quantity: </dt>--}}
{{--                                                    <dd>--}}
{{--                                                        <input class="form-control" type="number" min="1" value="1" max="{{ $product->id }}" name="qty" style="width:70px;">--}}
{{--                                                        <input type="hidden" name="productId" value="{{ $product->id }}">--}}
{{--                                                        <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price : $product->price }}">--}}
{{--                                                    </dd>--}}
{{--                                                </dl>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <hr>--}}
{{--                                        <button type="submit" class="btn btn-success"><i class="fas fa-shopping-cart"></i> Add To Cart</button>--}}
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
{{--                <div class="col-md-12">--}}
{{--                    <article class="card mt-4">--}}
{{--                        <div class="card-body" style="color:white;">--}}
{{--                            {!! $product->description !!}--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <br>
{{--    <hr>--}}
    <br>
@stop
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#addToCart').submit(function (e) {
                if ($('.option').val() == 0) {
                    e.preventDefault();
                    alert('Please select an option');
                }
            });
            $('.option').change(function () {
                $('#productPrice').html("{{ $product->sale_price != '' ? $product->sale_price : $product->price }}");
                let extraPrice = $(this).find(':selected').data('price');
                let price = parseFloat($('#productPrice').html());
                let finalPrice = (Number(extraPrice) + price).toFixed(2);
                $('#finalPrice').val(finalPrice);
                $('#productPrice').html(finalPrice);
            });
        });
    </script>
@endpush
