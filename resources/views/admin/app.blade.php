<!DOCTYPE html>
<html lang="en">
<head>
    <title>Arc-Angel Battery Admin Panel</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/logo2-bg.png') }}">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">

</head>
<body class="app sidebar-mini rtl">
@include('admin.partials.header')
@include('admin.partials.sidebar')
<main class="app-content" id="app">
    @yield('content')
</main>

</body>
</html>
{{--@stack('scripts')--}}
{{--<script src="{{ asset('backend/js/jquery-3.5.1.min.js') }}"> </script>--}}
<script src="{{ asset('backend/js/jquery-3.6.js') }}" ></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/main.js') }}"></script>
<script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script src="{{ asset('backend/js/plugins/chart.js') }}"></script>
{{--<script src="{{ asset('backend/js/app.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{asset('backend/js/plugins/chart.js')}}"></script>

<script type="text/javascript">

        var data = {
            labels: {!!  $labels  !!},
            datasets: [
                {
                    label: "Sales",
                    fillColor: "rgba(25,193,193,0.2)",
                    strokeColor: "rgb(10,47,168,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    barWidth: "flex",
                    data: {{ $data }}
                }
            ]
        };

        var ctxb = $("#salesBarChart").get(0).getContext("2d");
        var barChart = new Chart(ctxb).Bar(data);
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#sampleTable').DataTable();
    });
    //
</script>
<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 300,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help image imagetools wordcount'
        ],
        toolbar1: 'undo redo | formatselect | fontselect | fontsizeselect bold italic backcolor',
        toolbar2:    ' | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | imagetools | help' ,
        menu: {
            file: {question: 'File', items: 'newdocument restoredraft | preview | print '},
            edit: {question: 'Edit', items: 'undo redo | cut copy paste | selectall | searchreplace'},
            view: {
                question: 'View',
                items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen'
            },
            insert: {
                question: 'Insert',
                items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime'
            },
            format: {
                question: 'Format',
                items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat'
            },
            tools: {question: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount'},
            table: {question: 'Table', items: 'inserttable | cell row column | tableprops deletetable'},
            help: {question: 'Help', items: 'help'}
        },
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
</script>



