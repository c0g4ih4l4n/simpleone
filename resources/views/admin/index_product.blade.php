@extends ('template.main')
@section ('content')
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('admin') }}"><span>Admin Control Panel</span></a></li>
        <li class="active"><span>Manage Product</span></li>
    </ol>
    
    <div class="container" id="user-info-container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Product Name</th>
                        <th>Category </th>

                        <th>Price </th>
                        <th>Quantity </th>
                        <th>Supplier </th>
                        <th>Edit </th>
                        <th>Delete </th>
                    </tr>
                </thead>
                <tbody>
                <?php $num = 0 ?>
                @foreach ($products as $product)
                <?php $num ++; ?>
                    <tr>
                        <td>{!! $num !!}</td>
                        <td><a href="{!! URL::route('admin.products.show', $product['id']) !!}">{!! $product['product_name'] !!}</a></td>
                        <td><a href="{!! URL::route('categories.show', $product['category_id']) !!}">{!! $product['category_name'] !!}</a></td>
                        
                        <td>{!! $product['price'] !!}</td>
                        <td>{!! $product['quantity'] !!}</td>
                        <td><a href="#">{!! $product['supplier_name'] !!}</a></td>
                        <td><a href="{!! URL::route('admin.products.edit', $product['id']) !!}">Edit </a></td>
                        <td>
                        <form method="POST" action="{{ route('admin.products.destroy', $product['id']) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="{{ $product['id'] }}">
                            <button type='submit' class="btn btn-link">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a href="{!! URL::route('admin.products.create') !!}">Add New Product</a>
        
        @include ('template.pagination')
    </div>
@endsection