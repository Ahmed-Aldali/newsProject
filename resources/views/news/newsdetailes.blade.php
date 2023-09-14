


@extends('news.parent')

@section('title' , 'Temp')


@section('styles')

@endsection

@section('content')


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">{{ json_decode($articles->title, true)[LaravelLocalization::getCurrentLocale()]}}

      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('news.index') }}">{{ __('translate.home') }}</a>
        </li>
        {{-- <li class="breadcrumb-item active">{{ $articles->category->name }}</li> --}}
        <li class="breadcrumb-item active">{{ json_decode($articles->category->name, true)[LaravelLocalization::getCurrentLocale()]}}</li>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="{{asset('storage/images/article/'.$articles->image)}}" alt="">

          <hr>

          <!-- Date/Time -->
          <p>{{ __('translate.Posted-on') }} {{ $articles->created_at }} , {{ __('translate.By') }} {{ $articles->author->user->first_name }} {{ $articles->author->user->last_name }}</p>

          <hr>

          <!-- Post Content -->
          <p>{{ json_decode($articles->full_description, true)[LaravelLocalization::getCurrentLocale()]}}</p>


          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">{{__('translate.Leave-Comment')}}:</h5>
            @if(session('success'))
            <div class="alert alert-success" id="alert-Success-comment">
                {{ session('success') }}
            </div>
            @endif
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif --}}

            <div class="card-body">
              <form>

                <div class="form-group">
                  <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>

                @error('comment')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror

                <button type="button" onclick="performStore({{ $articles->id }})" class="btn btn-primary mt-4">{{ __('translate.Comment') }}</button>
                <input hidden id="user_id" name="user_id" value="10">
              </form>
            </div>
          </div>

          {{-- json_decode to  Convert JSON to associative array --}}
          @foreach  ( json_decode($articles->tags, true)  as $tag) 
          <span class="media-body pl-3">
            <a href="{{ route('TagNews' , $tag) }}" class="btn ">#{{$tag}} </a>
            </span>
          @endforeach


          <!-- Tags -->
          {{-- @foreach ( $tags as $tag)
            <span class="media-body pl-3">
                #{{ $tag->name }}
            </span>

          @endforeach --}}


          <!-- Single Comment -->
          @foreach ( $comments as $comment)
          @if($comment->user)
          <div class="media mb-4">
            <img class="img-circle elevation-2" width="30" src="{{$comment->user ? asset('storage/images/author/'.$comment->user->image ) : ""}}" alt="">
            <div class="media-body pl-3">
              {{-- <h5 class="mt-0">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</h5> --}}
              {{ $comment->comment }}
            </div>
          </div>
          @endif
          @endforeach


          <!-- Comment with nested comments -->
          {{-- <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">Commenter Name</h5>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

              <div class="media mt-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>

            </div>
          </div> --}}

        </div>



      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    @endsection


    @section('scripts')

    <script>
        function performStore(articleID){
            let formData = new FormData();

            formData.append('comment',document.getElementById('comment').value);
            formData.append('article_id',articleID);
            formData.append('user_id',document.getElementById('user_id').value);

            store('/news/storeComment' , formData);
            window.location.reload();

        }


    </script>

    <script>
    $(function () {
        var duration = 3000; // 3 seconds
        setTimeout(function () { $('#alert-Success-comment').hide(); }, duration);
    });
    </script>

    @endsection
