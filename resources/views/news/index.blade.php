@extends('news.parent')

@section('title' , 'Temp')


@section('styles')

@endsection

@section('content')



<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

            @foreach ( $sliders as $slider)
            <div class="carousel-item @if($loop->first) active @endif" style="background-image: url('{{asset('storage/images/slider/'.$slider->image)}}')">
                <div class="carousel-caption d-none d-md-block">
                    <h3>{{ json_decode($slider->title, true)[LaravelLocalization::getCurrentLocale()]}}</h3>
                    <p>{{ json_decode($slider->description, true)[LaravelLocalization::getCurrentLocale()]}}</p>
                    
                </div>
            </div>
            @endforeach




        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content -->

<section>
    <div class="container">

        <h3 class="my-4">{{ __('translate.last-news') }}</h3>

        <!-- Marketing Icons Section -->
        <div class="row">

            @foreach ( $articles as $article)
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <h4 class="card-header">{{ json_decode($article->title, true)[LaravelLocalization::getCurrentLocale()]}}</h4>
                    <div class="card-body">
                        <p class="card-text">{{ json_decode($article->short_description, true)[LaravelLocalization::getCurrentLocale()]}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('news.details',$article->id) }}" class="btn btn-primary">{{__('translate.Learn-More')}}</a>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
        <!-- /.row -->
    </div>
</section>

@foreach ( $categories as $category )
<section class="gray-sec">
    <div class="container">
        <!-- category Section -->
        <h3 class="my-4">{{ json_decode($category->name, true)[LaravelLocalization::getCurrentLocale()]}}</h3>


        <div class="row">
            @foreach ( $category->articles as $article )
            {{-- @if ($article->category_id == $category->id ) --}}
            <div class="col-lg-4 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="{{asset('storage/images/article/'.$article->image)}}" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">{{ json_decode($article->title, true)[LaravelLocalization::getCurrentLocale()]}}</a>
                        </h4>
                        <p class="card-text">{{ json_decode($article->short_description, true)[LaravelLocalization::getCurrentLocale()]}}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('news.details',$article->id) }}" class="btn btn-primary">{{__('translate.Learn-More')}}</a>
                    </div>
                </div>
            </div>
            {{-- @endif --}}
            @endforeach
        </div>


        <div align="center"><a class="btn btn-success" href="{{ route('news.all',$category->id) }}">{{ __('translate.more-news') }}</a></div>
    </div>
</section>
@endforeach


@endsection


@section('scripts')

@endsection
