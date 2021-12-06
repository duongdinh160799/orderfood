{{----}}
{{--Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8--}}
{{--Author: KeenThemes--}}
{{--Website: http://www.keenthemes.com/--}}
{{--Contact: support@keenthemes.com--}}
{{--Follow: www.twitter.com/keenthemes--}}
{{--Dribbble: www.dribbble.com/keenthemes--}}
{{--Like: www.facebook.com/keenthemes--}}
{{--Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes--}}
{{--Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes--}}
{{--License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.--}}
{{-- --}}
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
<head>
    <meta charset="utf-8"/>

    {{-- Title Section --}}
    <title>{{ config('app.name') }} | @yield('title', $page_title ??'Trang chủ')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    {{-- Favicon --}}
{{--    <link rel="shortcut icon" href="{{ asset('media/logos/logo_tab.jpeg') }}"/>--}}

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('layout.resources.css') as $style)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($style)) : asset($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Layout Themes (used by all pages) --}}
    @foreach (Metronic::initThemes() as $theme)
        <link href="{{ config('layout.self.rtl') ? asset(Metronic::rtlCssPath($theme)) : asset($theme) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Includable CSS --}}
    @yield('styles')
</head>

<body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">

@if (config('layout.page-loader.type') != '')
    @include('layout.partials._page-loader')
@endif

<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(media/bg/bg-2.jpg);">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-15">
                    <a href="#">
                        <img src="media/logos/dmm_logo.png" class="max-h-150px" alt=""/>
                    </a>
                </div>
                <!--end::Login Header-->
                @yield('content')
                <div class="row ">

                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Main-->

{{-- Global Config (global config for global JS scripts) --}}
<script>
    var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
</script>

{{-- Global Theme JS Bundle (used by all pages)  --}}
@foreach(config('layout.resources.js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
@endforeach

{{-- Includable JS --}}
@yield('scripts')

</body>
</html>

