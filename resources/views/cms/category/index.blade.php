@extends('cms.parent')

@section('title' , 'Index Category')

@section('main_title' , 'Index Category')

@section('sub_title' , 'index of category')


@section('styles')

@endsection

@section('content')

{{-- <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Responsive Hover Table</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>User</th>
                <th>Date</th>
                <th>Status</th>
                <th>Reason</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>183</td>
                <td>John Doe</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-success">Approved</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              </tr>
              <tr>
                <td>219</td>
                <td>Alexander Pierce</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-warning">Pending</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              </tr>
              <tr>
                <td>657</td>
                <td>Bob Doe</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-primary">Approved</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              </tr>
              <tr>
                <td>175</td>
                <td>Mike Doe</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-danger">Denied</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>

@endsection --}}


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
                    <td>{{ $category->name }}</td>
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