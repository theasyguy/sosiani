@extends('layouts.app', ['activePage' => 'product-management', 'titlePage' => __('Products Management')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">{{ __('Products') }}</h4>
                            <p class="card-category"> {{ __('Here you can manage Products') }}</p>
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
                                    <a href="{{ route('product.create') }}" class="btn btn-sm btn-info">{{ __('Add Product') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th>
                                        {{ __('Variety name') }}
                                    </th>
                                    <th>
                                        {{ __('Length') }}
                                    </th>
                                    <th>
                                        {{ __('No. of stems') }}
                                    </th>

                                    <th>
                                        {{ __('Date Created') }}
                                    </th>
                                    <th class="text-right">
                                        {{ __('Actions') }}
                                    </th>
                                    </thead>
                                    <tbody>
                                    @if(count($products)>0)
                                        @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product->variety }}
                                                </td>
                                                <td>
                                                    {{ $product->length }}
                                                </td>
                                                <td>
                                                    {{ $product->stems}}
                                                </td>

                                                <td>
                                                    {{ $product->created_at->format('Y-m-d') }}
                                                </td>
                                                <td class="td-actions text-right">

                                                    <form action="{{ route('product.destroy', $product) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('product.edit', $product) }}" data-original-title="" title="Edit Product">
                                                            <i class="material-icons">edit</i>
                                                            <div class="ripple-container"></div>
                                                        </a>
                                                        <button rel="tooltip" type="button" class="btn btn-danger btn-link" data-original-title="" title="Delete" onclick="confirm('{{ __("Are you sure you want to delete this product?") }}') ? this.parentElement.submit() : ''">
                                                            <i class="material-icons">close</i>
                                                            <div class="ripple-container"></div>
                                                        </button>
                                                    </form>



                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-center ">
                                                No products added! <a href="{{ route('product.create') }}" class="btn btn-sm btn-danger">{{ __('Add product') }}</a>
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