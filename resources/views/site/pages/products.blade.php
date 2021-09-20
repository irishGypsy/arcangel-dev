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

<div class="content-wrapper" style="background-color: white;">
    <div class="clear"></div>
    <div class="filterpanel">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 leftfilter align-items-center">
                    <div id="finish_panel">
                    </div>
                    <div id="battery_group_panel">
                        <div class="panel">
                            <div class="panel-heading">
                                <span data-toggle="collapse" data-target="#demometerial" class="clickable">Group Number
                                    <i class="fa fa-minus-circle"></i>
                                </span>
                            </div>
                            <div class="panel-body collapse in scrol" id="demometerial">
                                <ul class="list-unstyled listli">
                                    @foreach($battery_groups as $b)
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="groupchk{{ $b->id }}" id="chkBatteryGroup{{ $b->id }}" value="{{ $b->battery_group_name }}" data_info_bat="{{ $b->id }}">
                                                <span class="cr">
                                                    <i class="cr-icon fa fa-check"></i>
                                                </span>
                                                <span class="tg">{{ $b->battery_group_name }}</span>
                                                <small class="rt">
                                                </small>
                                            </label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="capacity_panel">
                        <div class="panel">
                            <div class="panel-heading">
                                <span data-toggle="collapse" data-target="#demo2" class="clickable">Capacity
                                    <i class="fa fa-minus-circle"></i>
                                </span>
                            </div><!-- end of panel-heading -->
                            <div class="panel-body collapse in scrol" id="demo2">
                                <ul class="list-unstyled listli">
                                    @foreach($capacities as $c)
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="capchk{{ $c->id }}" id="chkCapacityGroup{{ $c->id }}" value="{{ $c->capacity_name }}" data_info_cap="{{ $c->id }}">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                <span class="tg">{{ $c->capacity_name }}. - .{{ $c->capacity_code }}</span>
                                                <small class="rt"></small>
                                            </label>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="cl"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12 rightfilter pd_n1">
                    <div class="prodboxlist">
                        <div id="showProdList">
                            <div class="boxselect">
                                <form class="form-inline pull-right">
                                    <div class="form-group">
                                        <label class="" for="">Sort By:</label>
                                        <select class="form-control" id="sort_by">
                                            <option value="1">All</option>
                                            <option value="2">Popularity</option>
                                            <option value="3">Price: High to low</option>
                                            <option value="4">Price: Low to high</option>
                                            <option value="5">Discount: High to low</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="clear"></div>
                            <div id="scrolldiv" class="products_list">
                                @foreach($products as $p)
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 pro_bdr product_box">
                                    <div class="panel prodbox">
                                        <div class="panel-body pro_imgs">
                                            <a href="/product/{{ $p->id }}" id="p_count">
                                                <div class="imgbox">
                                                    <img src="{{ asset('storage/'.$p->images->first()->image) }}" alt="{{ $p->name }}">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="hvr-float-shadow ">
                                            <a href="/product/{{ $p->id }}">{{ $p->name }}</a>
                                            <input type="hidden" class = "groupcheck" name="groupcheck" value="{{ $p->batterygroup->battery_group_name }}" data-tag-batgru="{{ $p->batterygroup->battery_group_name }}">
                                            <input type="hidden" class = "groupcheck" name="capcheck" value="{{ $p->capacity->capacity_name }}" data-tag-capgru="{{ $p->capacity->capacity_name }}">
                                        </div>
                                        <div class="panel-footer">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td><b>Group Number</b></td>
                                                    <td><p>{{ $p->batterygroup->battery_group_name }}</p></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row"><b>Capacity</b></td>
                                                    <td><p>{{ $p->capacity->capacity_name }}</p></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row"><b>Warranty</b></td>
                                                    <td><p>{{ $p->warranty }}</p></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row"><b>Price</b></td>
                                                    <td><strong>${{ number_format($p->price,2,'.',',') }}</strong></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="ctn">
                                                <a class="bncart" href="/product/{{ $p->id }}" title="Add to Cart">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<script>
    // get var ALL checkboxes
    var allCheckObj = $("input[type=checkbox]");
    // get all checkbox vals
    var allCheckVals = [];
    allCheckObj.each(function(o){
        allCheckVals.push($(this).val());
    })
    // get all :checked
    var allChecked = [];
    // get var ALL product boxes
    var allBoxObj = $("input:hidden[class='groupcheck']");
    console.log("all box obj: ");
    console.log(allBoxObj);
    var allBoxVal = [];
    // instance var for this product box OBJECT
    var boxVal = null;
    var checkVal = null;
    var boxObj = null;
    var checkObj = null;
    // loop each filter checkbox
    $("#battery_group_panel input[type=checkbox]").each(function(i){
        $(this).change(function(){
            allChecked = [];
            allCheckObj.each(function(){
                if($(this).is(":checked")){
                    allChecked.push($(this).val());
                }
            })
            allBoxVal = [];
            allBoxObj.each(function(v) {
                allBoxVal.push($(this).val());
            })
            allBoxObj.each(function(y){
                $(this).parents(".product_box").hide();
            })
            allBoxObj.each(function(t){
                boxVal = $(this).val();
                if ($.inArray(boxVal,allChecked) >= 0) {
                    $(this).parents(".product_box").show();
                }
            })
        })
});
    $("#capacity_panel input[type=checkbox]").each(function(i){
        $(this).change(function(){
            allChecked = [];
            allCheckObj.each(function(){
                if($(this).is(":checked")){
                    allChecked.push($(this).val());
                }
            })
            allBoxVal = [];
            allBoxObj.each(function(v) {
                allBoxVal.push($(this).val());
            })
            allBoxObj.each(function(y){
                $(this).parents(".product_box").hide();
            })
            allBoxObj.each(function(t){
                boxVal = $(this).val();
                if ($.inArray(boxVal,allChecked) >= 0) {
                    $(this).parents(".product_box").show();
                }
            })
        })
    });
</script>
    @include('site.partials.footer')

