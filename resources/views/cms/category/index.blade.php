@extends('cms.parent')

@section('title' , 'Index Category')

@section('main_title' , 'Index Category')

@section('sub_title' , 'index of category')


@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <a href="{{route('categories.create')}}" type="submit" class="btn btn-info">Add New Category</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th style="width: 10px">id</th>
                <th>Name of category</th>
                <th>Status of category</th>
                <th>Number of Articles</th>

                <th>Setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category )
                <tr>
                    <td>{{$category->id  }}</td>
                    <td>{{ json_decode($category->name, true)[LaravelLocalization::getCurrentLocale()]}}</td>
                    <td><span class="badge bg-info"> {{$category->status}}</span></td>
                    {{-- <td> ( {{$category->articles_count}} ) Articles</td> --}}
                    <td><a href="{{route('news.all',['id'=>$category->id])}}"
                        class="btn btn-info">({{ $category->articles_count}})
                        article/s</a>
                    </td>

                    <td>
                        <div class="btn-group">
                          <a href="{{route('categories.edit' , $category->id )}}" type="button" class="btn btn-info">edit</a>
                          <button type="button" onclick="performDestroy({{$category->id }} , this)" class="btn btn-danger">delete</button>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>
                @endforeach




            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        {{ $categories->links() }}
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

        confirmDestroy('/cms/categories/'+id  ,reference );

    }

    </script>
@endsection
