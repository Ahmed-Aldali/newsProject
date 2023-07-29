@extends('cms.parent')

@section('title' , 'Index Article')

@section('main_title' )
<h1 class="d-block">{{ Auth::user()->user->first_name .' '.Auth::user()->user->last_name }}  Articles</h1>
@endsection
@section('sub_title' , 'index of Article')


@section('styles')

@endsection

@section('content')


<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{route('createArticle' , $id)}}" type="submit" class="btn btn-info">Add New Article</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Image</th>
                <th>Title of Article</th>
                <th>Short Description</th>

                <th>Setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ($articles as $article )
                <tr>
                    <td>{{$article->id  }}</td>
                  <td>
                    <img class="img-circle img-bordered-sm" src="{{asset('storage/images/article/'.$article->image)}}" width="50" height="50" alt="User Image">
                </td>

                    <td>{{ $article->title }}</td>
                    <td>{{ $article->short_description }}</td>

                    {{-- <td><span class="badge bg-info"> {{$Article->status}}</span></td> --}}

                    <td>
                        <div class="btn-group">
                          <a href="{{route('categories.edit' , $article->id )}}" type="button" class="btn btn-info">edit</a>
                          <button type="button" onclick="performDestroy({{$article->id }} , this)" class="btn btn-danger">delete</button>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>
                @endforeach




            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{ $articles->links() }}
      </div>
      <!-- /.card -->


      <!-- /.card -->
    </div>
    <!-- /.col -->

    <!-- /.col -->

    @endsection

@section('scripts')

<script>
    function performDestroy(id , reference){

        confirmDestroy('/cms/articles/'+id  ,reference );

    }

    </script>
@endsection
