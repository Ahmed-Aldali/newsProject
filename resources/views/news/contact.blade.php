@extends('news.parent')

@section('title' , 'Temp')


@section('styles')

@endsection

@section('content')



    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">{{ __('translate.contact') }}</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">{{ __('translate.home') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('translate.contact') }}</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Contact Form -->

          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>{{ __('translate.Full-Name') }}:</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>{{ __('translate.Phone-Number') }}:</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>{{ __('translate.Email-Address') }}:</label>
                <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>{{ __('translate.Message') }}:</label>
                <textarea rows="10" cols="100" class="form-control" id="message" name="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="button" onclick="performStore()" class="btn btn-primary" id="sendMessageButton">{{ __('translate.Send-Message') }}</button>
          </form>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>{{ __('translate.Contact-Details') }}</h3>
          <p>
            3481 Melrose Place
            <br>Beverly Hills, CA 90210
            <br>
          </p>
          <p>
            <abbr title="Phone">P</abbr>: (123) 456-7890
          </p>
          <p>
            <abbr title="Email">E</abbr>:
            <a href="mailto:name@example.com">name@example.com
            </a>
          </p>
          <p>
            <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
          </p>
        </div>
      </div>
      <!-- /.row -->



      <!-- /.row -->

    </div>
    <!-- /.container -->


@endsection


@section('scripts')
    <script src="{{ asset('news/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('news/js/contact_me.js') }}"></script>

    <script>
        function performStore(){
           let formData = new FormData();

           formData.append('fullname',document.getElementById('fullname').value);
           formData.append('mobile',document.getElementById('mobile').value);
           formData.append('email',document.getElementById('email').value);
           formData.append('message',document.getElementById('message').value);

           store('/news/storeContact' , formData);
       }
   </script>

@endsection
