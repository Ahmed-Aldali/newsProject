<?php
use App\Models\Category;
$categories = Category::where('status','active')->take(3)->get();
?>

<!DOCTYPE html>
<html lang='{{ LaravelLocalization::getCurrentLocale() }}' dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('news/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('news/css/modern-business.css') }}" rel="stylesheet">

    @yield('styles')

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('news.index') }}">{{__('translate.news')}}</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.index') }}">{{__('translate.home')}}</a>
                    </li>

                    @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.all',$category->id) }}">{{ json_decode($category->name, true)[LaravelLocalization::getCurrentLocale()]}}</a>
                    </li>
                    @endforeach



                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.showContact') }}">{{__('translate.contact')}}</a>
                    </li>

                    
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" 
                        class="nav-link"> {{ $properties['native'] }}</a>
                    </li>
                @endforeach


                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->

    @yield('content')
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">{{ __('translate.Copyright') }} &copy; {{ __('translate.copyrightName') }} {{ now()->year }}</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('news/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('news/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="{{ asset('cms/js/crud.js') }}"></script>

    @yield('scripts')

  </body>

</html>
