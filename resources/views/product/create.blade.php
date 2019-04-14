@extends('layouts.app', ['activePage' => 'product-management', 'titlePage' => __('Products Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('product.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Add Product') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('product.index') }}" class="btn btn-sm btn-info">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Variety name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('variety') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('variety') ? ' is-invalid' : '' }}" name="variety" id="input-name" type="text" placeholder="{{ __('Variety Name') }}" value="{{ old('variety') }}" required="true" aria-required="true"/>
                      @if ($errors->has('variety'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('variety') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Length in CM') }}</label>
                  <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('length') ? ' has-danger' : '' }}">
                          <select class="form-control{{ $errors->has('length') ? ' is-invalid' : '' }}" name="length" id="input-email" required>
                              <option>80CM</option>
                              <option>60CM</option>
                              <option>50CM</option>

                          </select>
                          @if ($errors->has('length'))
                          <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('length') }}</span>
                          @endif
                      </div>


                  </div>
                </div>
                <div class="row">
                      <label class="col-sm-2 col-form-label">{{ __('No. of stems') }}</label>
                      <div class="col-sm-7">
                          <div class="form-group{{ $errors->has('stems') ? ' has-danger' : '' }}">
                              <span>Stems: <span id="stem"></span></span>
                              <input class="form-control{{ $errors->has('stems') ? ' is-invalid' : '' }} slider" min="120" max="400"  step="10" value="140" name="stems" id="myRange" type="range" placeholder="{{ __('No. of stems') }}" required />

                              @if ($errors->has('stems'))
                                  <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('stems') }}</span>
                              @endif
                          </div>
                      </div>
                  </div>



              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-info">{{ __('Add Product') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
      var slider = document.getElementById("myRange");
      var output = document.getElementById("stem");
      output.innerHTML = slider.value;

      slider.oninput = function() {
          output.innerHTML = this.value;
      }
  </script>
@endsection