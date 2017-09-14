@if(Session::has('success'))
  <div id="post-alert" class="bs-component">
      <div class="alert alert-dismissible alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert">×</button>
            <h4><strong>Success</strong></h4><br>
            <p>
                {{ Session::get('success') }}
            </p>
      </div>
  </div>

@endif

@if(count($errors) > 0)
    <div id="post-alert" class="bs-component">
        <div class="alert alert-dismissible alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
              <strong><h4>Errors</h4></strong>
              <ul>
                  @foreach($errors->all() as $error)
                    <li>
                      {{ $error }}
                    </li>
                  @endforeach
              </ul>
        </div>
    </div>

@endif

@section('scripts')
    <script src="http://127.0.0.1:8080/HOST/blog-v1-23-08/js/alerts.js"></script>
@endsection