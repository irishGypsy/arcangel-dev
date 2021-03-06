<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>--}}
@include('site.partials.styles')
@include('site.partials.scripts')
</head>
<body class="app sidebar-mini rtl bg-white">
@include('site.partials.header')
@include('site.partials.nav')
{{--@include('affiliate.partials.sidebar')--}}

<main class="" id="app">
    @yield('content')
</main>

@include('site.partials.footer')
</body>
</html>
@stack('scripts')
{{--<script src="{{ asset('backend/js/jquery-3.5.1.min.js') }}"></script>--}}
{{--<script src="{{ asset('backend/js/popper.min.js') }}"></script>--}}
{{--<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>--}}
<script src="{{ asset('backend/js/main.js') }}"></script>
<script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>
<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
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



