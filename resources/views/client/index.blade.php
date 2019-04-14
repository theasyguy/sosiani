@extends('layouts.app', ['activePage' => 'client-management', 'titlePage' => __('Clients Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Clients') }}</h4>
                <p class="card-category"> {{ __('Here you can manage Clients') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('client.create') }}" class="btn btn-sm btn-primary">{{ __('Add Client') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Location') }}
                      </th>
                      <th>
                        {{ __('Contact Person') }}
                      </th>
                      <th>
                          {{ __('Email') }}
                      </th>
                      <th>
                          {{ __('Phone number') }}
                      </th>
                      <th>
                          {{ __('Date Created') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                        @if(count($clients)>0)
                      @foreach($clients as $client)
                        <tr>
                          <td>
                            {{ $client->name }}
                          </td>
                          <td>
                            {{ $client->location }}
                          </td>
                            <td>
                                {{ $client->contact }}
                            </td>
                            <td>
                                {{ $client->email }}
                            </td>
                            <td>
                                {{ $client->phone }}
                            </td>
                          <td>
                            {{ $client->created_at->format('Y-m-d') }}
                          </td>
                          <td class="td-actions text-right">

                              <form action="{{ route('client.destroy', $client) }}" method="post">
                                  @csrf
                                  @method('delete')

                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('client.edit', $client) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this client?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">close</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>

                              {{--<a rel="tooltip" class="btn btn-success btn-link" href="{{ route('client.edit') }}" data-original-title="" title="">--}}
                                {{--<i class="material-icons">edit</i>--}}
                                {{--<div class="ripple-container"></div>--}}
                              {{--</a>--}}

                          </td>
                        </tr>
                      @endforeach
                      @else
                      <tr>
                        <td class="text-center ">
                             No Clients added! <a href="{{ route('client.create') }}" class="btn btn-sm btn-danger">{{ __('Add Client') }}</a>
                        </td>
                      </tr>
                            @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection