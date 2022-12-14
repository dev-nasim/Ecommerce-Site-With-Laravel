<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Edit Products
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
                                        Edit Products
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.products')}}" class="btn btn-outline-success float-end">All Products</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get(('message'))}}</div>
                                @endif
                                <form wire:submit.prevent="updateProduct">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Category Name" wire:model="name" wire:keyup="generateSlug">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" wire:model="slug">
                                        @error('slug')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="short_description" class="form-label">Short Description</label>
                                        <textarea class="form-control" name="short_description" placeholder="Enter Short Description" wire:model="short_description"></textarea>
                                        @error('short_description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter Description" wire:model="description"></textarea>
                                        @error('description')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="regular_price" class="form-label">Regular Price</label>
                                        <input type="text" class="form-control" id="regular_price" name="regular_price" placeholder="Enter Regular Price" wire:model="regular_price">
                                        @error('regular_price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="sale_price" class="form-label">Sale Price</label>
                                        <input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="Enter Sale Price" wire:model="sale_price">
                                        @error('sale_price')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter Products Sku" wire:model="sku">
                                        @error('sku')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="stock_status" class="form-label" >Stock Status</label>
                                        <select class="form-control" wire:model="stock_status">
                                            <option value="instock">In stock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                        @error('stock_status')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="featured" class="form-label">Feature Products</label>
                                        <select class="form-control" name="featured" wire:model="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                        @error('featured')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter Product Quantity" wire:model="quantity">
                                        @error('quantity')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="form-label" >Image</label>
                                        <input type="file" class="form-control" name="image" wire:model="newimage">
                                        @if($newimage)
                                            <img src="{{$newimage->temporaryUrl()}}" width="120px">
                                            @else
                                            <img src="{{asset('assets/imgs/products/')}}/{{$image}}" width="120px">
                                        @endif
                                        @error('newimage')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="category_id" class="form-label" >Category</label>
                                        <select class="form-control" name="category_id" wire:model="category_id">
                                            <option value="">---Select Category---</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>