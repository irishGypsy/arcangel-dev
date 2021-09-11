
<section class="search_bar_form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form_pane">
                    <form action="{{ route('site.batteryfinder.products') }}" method="GET" role="form" enctype="multipart/form-data">
{{--                        , [$make ?? '',$model ?? '',$year ?? '',$engine ?? '']--}}
                        <div class="form_wrap">
                            <select name="make" id="make">
                                <option value=""></option>
                            </select>
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </div>
                        <div class="form_wrap">

                            <select name="model" id="model">
                                <option value=""></option>
                            </select>
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </div>

                        <div class="form_wrap">
                            <select name="year" id="year">
                                <option value=""></option>
                            </select>
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </div>

                        <div class="form_wrap">
                            <select name="engine" id="engine">
                                <option value=""></option>
                            </select>
                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </div>

                        <div class="form_wrap">
                            <input id="btnSubmit" type="submit" value="search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    $(document).ready(function() {
       $("#model").prop('disabled', true);
       $("#year").prop('disabled', true);
       $("#engine").prop('disabled', true);

        $.ajax({
            url: "http://localhost:3000/batteryfinders/getmakes",
            contentType: "application/json",
            dataType: 'json',
            success: function(result){
                $("#make").empty();
                $.each(result,function(){
                    $("#make").append(new Option(this.make,this.make))
                })
                $("#make").prepend(new Option( "-- Select Make --", 0, true, true));
            },
            error: function(result){
                $("#make").append(new Option( result.value(), 0, true, true));
            }
        })
    });

    $("#make").change(
        function (){
            $("#model").prop('disabled', false);
            $.ajax({
                url: "http://localhost:3000/batteryfinders/getmodels/" + $("#make").val() ,
                contentType: "application/json",
                dataType: 'json',
                success: function(result){
                    $("#model").empty();
                    $.each(result, function(){
                        $("#model").append(new Option(this.model, this.model));
                    })
                    $("#model").prepend(new Option("-- Select Model --", "", true, true));
                },
                error: function(result){
                    $("#model").append(new Option( result.value(), 0, true, true));
                }
            })
        }
    );

    $("#model").change(
        function (){
            $("#year").prop('disabled', false);
            $.ajax({
                url: "http://localhost:3000/batteryfinders/getyears/"
                        + $("#make").val() +"/"
                        + $("#model").val(),
                contentType: "application/json",
                dataType: 'json',
                success: function(result){
                    $("#year").empty();
                    $.each(result, function(){
                        $("#year").append(new Option(this.year, this.year));
                    })
                    $("#year").prepend(new Option("-- Select Year --", "", true, true));
                },
                error: function(result) {
                    $("#year").append(new Option(request.value(), "", true, true));
                }
            })
        }
    );

    $("#year").change(
        function (){
            $("#engine").prop('disabled', false);
            $.ajax({
                url: "http://localhost:3000/batteryfinders/getengines/"
                    + $("#make").val() +"/"
                    + $("#model").val() + "/"
                    + $("#year").val(),
                contentType: "application/json",
                dataType: 'json',
                success: function(result){
                    $("#engine").empty();
                    $.each(result, function(){
                        $("#engine").append(new Option(this.engine_name, this.engine_name));
                    })
                    $("#engine").prepend(new Option("-- Select Engine --",'',true,true))
                },
                error: function(result){
                    $("#engine").append(new Option(result.value(),0,true,true));
                }
        })
        });

</script>

