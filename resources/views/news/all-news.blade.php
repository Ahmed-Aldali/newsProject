@extends('news.parent')

@section('title' , 'Temp')


@section('styles')

@endsection

@section('content')



    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3"> {{ $categories->name }}  News</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('news.index') }}">Home</a>
        </li>
      </ol>

      @foreach ( $articles as $article)
              <!-- news title One -->
      <div class="row">
        <div class="col-md-7">
          <a href="{{ route('news.details',$article->id) }}">
            <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0" src="{{asset('storage/images/article/'.$article->image)}}" alt="">
          </a>
        </div>
        <div class="col-md-5">
          <h3>{{ $article->title }}</h3>
          <p>{{ $article->short_description }}</p>
          <a class="btn btn-primary" href="{{ route('news.details',$article->id) }}">Read More
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div>
      <!-- /.row -->
      <hr>
      @endforeach


      <!-- Pagination -->
      {{ $articles->links() }}

    </div>
    <!-- /.container -->
    @endsection


    @section('scripts')

    @endsection
