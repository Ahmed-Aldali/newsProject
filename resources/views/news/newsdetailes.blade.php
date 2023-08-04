


@extends('news.parent')

@section('title' , 'Temp')


@section('styles')

@endsection

@section('content')


    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">{{ $articles->title }}

      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ route('news.index') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">{{ $articles->category->name }}</li>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="{{asset('storage/images/article/'.$articles->image)}}" alt="">

          <hr>

          <!-- Date/Time -->
          <p>Posted on {{ $articles->created_at }} , By {{ $articles->author->user->first_name }} {{ $articles->author->user->last_name }}</p>

          <hr>

          <!-- Post Content -->
          <p>{{ $articles->full_description }}</p>


          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <button type="button" onclick="performStore({{ $articles->id }})" class="btn btn-primary">Comment</button>
                <input hidden id="user_id" name="user_id" value="10">

              </form>


            </div>
          </div>

          <!-- Single Comment -->
          @foreach ( $comments as $comment)
          <div class="media mb-4">
            <img class="img-circle elevation-2" width="30" src="{{asset('storage/images/author/'.$comment->user->image)}}" alt="">
            <div class="media-body pl-3">
              <h5 class="mt-0">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</h5>
              {{ $comment->comment }}
            </div>
          </div>
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

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

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

        }


    </script>

    @endsection
