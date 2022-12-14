<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Categories
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
                                        All Category
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <a href="{{route('admin.categories.add')}}" class="btn btn-outline-success float-end">Add New Categories</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get(('message'))}}</div>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $i = ($categories->currentPage()-1)*$categories->perPage();
                                    @endphp
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>
                                                <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-outline-info">Edit</a>
                                                <a href="#" class="btn btn-warning" onclick="deleteConfirmation({{ $category->id }})">Delete</a>
                                            </td>
                                        </tr>

                                    @endforeach
                                </table>
                                </tbody>
                                {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
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
                        <button type="button" onclick="deleteCategory()" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id) {
            @this.set('category_id',id);
            $('#deleteConfirmation').modal('show')
        }
        function deleteCategory() {
            @this.call('deleteCategory');
            $('#deleteConfirmation').modal('hide');
            setTimeout(function(){
                location.reload();
            },1000);
        }

    </script>
@endpush
