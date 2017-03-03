@section('page_title', !empty($page_title) ? $page_title : '')
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{{ csrf_token() }}">
    {{--Meta补充--}}
    @section('meta')
    @show
    <title>@yield('page_title', '') - 社区后台</title>
    {{--页面样式之前--}}
    @section('before_style')
    @show

    <link href="/adminlte/css/bootstrap.min.css" rel="stylesheet">
    <link href="/adminlte/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/adminlte/css/animate.css" rel="stylesheet">
    <link href="/adminlte/css/style.css" rel="stylesheet">
    <link href="/adminlte/css/main.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="/adminlte/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="/adminlte/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    {{--页面样式之后--}}
    @section('after_style')
    @show

    {{--页面js之前--}}
    @section('before_js')
    @show

    <script>
        // 初始化数据
        {{--var initData = {!! json_encode($initData) !!};--}}
    </script>
    <script src="/adminlte/js/jquery-2.1.1.js"></script>
    <script src="/adminlte/js/bootstrap.min.js"></script>
    <script src="/adminlte/js/echarts.min.js"></script>
    <script src="/assets/js/vue.min.js"></script>
    <script src="/assets/editors/ue/ueditor.config.js"></script> <!--ueditor 不支持pjax异步预先加载//-->
    <script src="/assets/editors/ue/ueditor.all.min.js"></script> <!--ueditor 不支持pjax异步预先加载//-->

    {{--页面js之前--}}
    @section('after_js')
    @show
</head>

<body>
<script>

    $(document).ready(
            function(){


                $('body').on('refresh-script', function() {

                    var head = $('head');

                    var list = $('script[data-src],script[type=inline]');
                    list.map(function(index, item) {
                        item = $(item);
                        var id = (item.attr('data-src')||"").replace(/\//ig, '');
                        if(id) {
                            if(!$('#' + id).size()) {
                                        {{--var newScript = $('<script src="'+item.attr('data-src')+'" id="'+id+'"></script>');--}}
                                var newScript = $(`<script src="${item.attr('data-src')}" id="${id}"><\/script>`);
                                head.append(newScript);
                            }
                        }else {
                            var newScript = $(`<script>${item.html()}<\/script>`);
                            head.append(newScript);
                        }
                        item.remove();
                    });});
            }
    );


</script>

<div id="wrapper" class="huber-service">
    @include('homesite.layouts.side')
</div>
<div id="page-wrapper" class="gray-bg">
    {{--header开始--}}
    @include('homesite.layouts.header')
    {{--header结束--}}
    <div class="content" id="pjax-container">
        @yield('content')
        <script>
            $(document).ready(
                    function(){

                        $('body').trigger('refresh-script');
                        initPlugins();
                    });
        </script>
    </div>


    @include('homesite.layouts.footer')
</div>

{{--页面底部html--}}
@section('footer_html')
@show
</body>

<script src="/adminlte/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/adminlte/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="/adminlte/js/inspinia.js"></script>
<script src="/adminlte/js/plugins/pace/pace.min.js"></script>
{{--<script src="/adminlte/js/home.js"></script>--}}
<!-- Sweet alert -->
<script src="/adminlte/js/plugins/sweetalert/sweetalert.min.js"></script>
<script src="/adminlte/js/jquery.pjax.js"></script>
<!-- Tinycon -->
<script src="/adminlte/js/plugins/tinycon/tinycon.min.js"></script>

<script>
    $(document).pjax('a', '#pjax-container');
    $(document).on("pjax:timeout", function(event) {
        // 阻止超时导致链接跳转事件发生
        event.preventDefault()
    });

    $(document).on('pjax:send', function(evt) {
        var srcTag = evt.relatedTarget;
        if($(srcTag).attr('id') === 'menu_index') {
            $('.active').each(function() {
                $(this).removeClass('active');
            });
            $('.active2').each(function() {
                $(this).removeClass('active2');
            });
            $('.in').each(function() {
                $(this).removeClass('in');
            });
            $(srcTag).parent().addClass('active');
        } else if ($(srcTag).parent().hasClass('menu-item')) {
            var lis = document.getElementsByClassName('active2');
            for (var i = 0; i < lis.length; i ++) {
                var li = lis[i];
                var clsName = li.className;
                if (!clsName) {
                    clsName = '';
                }
                li.className = clsName.replace('active2', '');
            }
            srcTag.parentElement.className += ' active2';
            $('#menu_index').parent().removeClass('active');
        }

        //在pjax发送请求时，显示loading动画层
        $('#loading').show();
    });

    $(document).on('pjax:end', function() {
        var head = $('head');

    });

    $(document).on('pjax:complete', function() {
        //在pjax处理完成后，隐藏loading动画层
        //由于速度太快会导到loading层闪烁，影响体验，所以在此加上500毫秒延迟
        setTimeout(function(){$('#loading').hide()},500);

    });

</script>


<script>
    /**
     * 监听表单全选按钮
     * @constructor
    */
    function ListenFormAllSelected() {
        $('#se_tb_al_ck').change(function() {
            if ($(this).prop("checked")) {
                $('input[name="tbcheckbox_item_ids[]"]').prop('checked', true);
            } else {
                $('input[name="tbcheckbox_item_ids[]"]').prop('checked', false);
            }
        });
    }

    $('#openMenu').click(function () {
        $('#side-menu ul').toggleClass('open');
    });

    $('.nav-label').click(function() {
        if($('#side-menu ul').hasClass('open')){
            $('#side-menu ul').removeClass('open')
        }
    });

    $('.metismenu>li>a').click(function() {
        if($('#side-menu ul').hasClass('open')){
            $('#side-menu ul').removeClass('open')
        }
    });

</script>

@section('footer_js')
@show
</html>