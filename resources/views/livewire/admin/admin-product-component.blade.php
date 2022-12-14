<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Products
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        All Products
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <a href="{{route('admin.product.add')}}" class="btn btn-success float-end">Add New Product</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="aler">{{Session::get(('message'))}}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL No.</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = ($products->currentPage()-1)*$products->perPage();
                                    @endphp
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td><img src="{{ asset('assets/imgs/products')}}/{{ $product->image }}" alt="{{$product->name}}" style="width: 80px;height: 80px"></td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->stock_status}}</td>
                                            <td>{{$product->regular_price}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-outline-info">Edit</a>
                                                <a href="#" class="btn btn-warning" onclick="deleteConfirmation({{ $product->id }})">Delete</a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>

                                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal fade" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Are You Sure to delete this data...!!!</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" onclick="deleteProduct()" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id) {
        @this.set('product_id',id);
            $('#deleteConfirmation').modal('show')
        }
        function deleteProduct() {
        @this.call('deleteProduct');
            $('#deleteConfirmation').modal('hide');
            setTimeout(function(){
                location.reload();
            },1000);
        }

    </script>
@endpush
