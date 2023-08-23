@extends('cms.parent')

@section('title' , 'Create Article')

@section('main_title' , 'Create Article')

@section('sub_title' , 'Create Article')


@section('styles')
@section('styles')
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/thinline.css">
<link rel="stylesheet" href="{{ asset('cms/css/tagsStyle.css') }}">
@endsection
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Data of Article</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('articles.store') }}" method="post">
                @csrf
              <div class="card-body">

                <div class="row">

                  <div class="col-md-6">
                      <div class="form-group">
                        <label>Category</label>
                        <select class="form-control select2" id="category_id" name="category_id"  style="width: 100%;">
                          @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>

                          @endforeach

                        </select>
                      </div>
                      <!-- /.form-group -->

                      <!-- /.form-group -->
                    </div>

                    <input type="text" name="author_id" id="author_id" value="{{$id}}"
                    class="form-control form-control-solid" hidden/>
                  </div>

                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="title">Name of Article</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter title of Article">
                </div>

                <div class="form-group col-md-6">
                    <label for="title">Name of Article (En)</label>
              <input type="text" class="form-control" name="title-en" id="title-en" placeholder="Enter title of Article EN">
            </div>


                <div class="form-group col-md-6">
                  <label for="short_description">short description of Article</label>
            <input type="text" class="form-control" name="short_description" id="short_description" placeholder="Enter short description of Article">
          </div>

            </div>
            <div class="row">

            <div class="form-group col-md-6">
              <label for="image">Choose Image</label>
        <input type="file" class="form-control" name="image" id="image" placeholder="Enter short description of Article">
      </div>

        </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="full_description">Full Description of Article</label>
                              <textarea class="form-control" style="resize: none;" id="full_description" name="full_description" rows="4"
                              placeholder="Enter Full Description of Article " cols="50"></textarea>
                      </div>
                  </div>
                </div>

                {{-- tags --}}
                <div class="row">
                <div class="tag-wrapper">
                    <div class="tag-title">
                        <i class="fas fa-tags"></i>
                        <h2>Tags</h2>
                    </div>
                    <div class="tag-content"> 
                      <p>Add a comma (,) after each tag</p>
                      <ul class="tag-ul">
                        <input type="text" class="form-control" id="tags" name="tags">                    </ul>
                    </div>
                    {{-- <div class="tag-details">
                      <p><span>10</span> tags are remaining</p>
                      <button>Remove All</button>
                    </div> --}}
                  </div>

                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                {{-- <button type="button" onclick=" performStore() " class="btn btn-primary">Store</button> --}}
                <button type="submit" class="btn btn-primary">Store</button>

                <a href="{{route('indexArticle' , $id)}}" type="submit" class="btn btn-info">Cancel</a>

              </div>
            </form>
          </div>
          <!-- /.card -->


        </div>

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


@endsection


@section('scripts')


<script>
     function performStore(){
        let formData = new FormData();

        formData.append('title',document.getElementById('title').value);
        formData.append('title-en',document.getElementById('title-en').value);
        formData.append('short_description',document.getElementById('short_description').value);
        formData.append('full_description',document.getElementById('full_description').value);
        formData.append('author_id',document.getElementById('author_id').value);
        formData.append('category_id',document.getElementById('category_id').value);
        let x = document.getElementById('tags').value;
        let arr = x.split(",");

        formData.append('tags',arr); 
        formData.append('image',document.getElementById('image').files[0]);

        store('/cms/articles' , formData);
    }
</script>

{{-- tags script --}}
<script src="{{ asset('cms/js/tags.js') }}"></script>



@endsection
