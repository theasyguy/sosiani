@extends('layouts.app', ['activePage' => 'client-management', 'titlePage' => __('Client Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('client.update', $client) }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">{{ __('Edit Client') }}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('client.index') }}" class="btn btn-sm btn-success">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Client name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', $client->name) }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Client Location') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" id="input-email" type="text" placeholder="{{ __('Location') }}" value="{{ old('location', $client->location) }}" required />
                                            @if ($errors->has('location'))
                                                <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('location') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Contact Person') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('contact') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" id="input-email" type="text" placeholder="{{ __('Contact person') }}" value="{{ old('contact', $client->contact) }}" required />
                                            @if ($errors->has('contact'))
                                                <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('contact') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Client Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $client->email) }}" required />
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Client Phone') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-email" type="text" placeholder="{{ __('Phone No.') }}" value="{{ old('phone', $client->phone) }}" required />
                                            @if ($errors->has('phone'))
                                                <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-success">{{ __('Edit Client') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection