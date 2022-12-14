<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> All Slides
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
                                        All Slides
                                    </div>
                                    <div class="col-md-6 float-end">
                                        <a href="{{route('admin.home.slider.add')}}" class="btn btn-outline-success float-end">Add New Slides</a>
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
                                            <th scope="col">Image</th>
                                            <th scope="col">Top Title</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Sub Title</th>
                                            <th scope="col">Offer</th>
                                            <th scope="col">Link</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach($slides as $slide)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>
                                                    <img src="{{asset('assets/imgs/slider')}}/{{$slide->image}}" width="80px">
                                                </td>
                                                <td>{{$slide->top_title}}</td>
                                                <td>{{$slide->title}}</td>
                                                <td>{{$slide->sub_title}}</td>
                                                <td>{{$slide->offer}}</td>
                                                <td>{{$slide->link}}</td>
                                                <td>{{$slide->status == 1 ? 'Active':'Inactive'}}</td>
                                                <td>
                                                    <a href="{{route('admin.home.slider.edit', $slide->id)}}" class="btn btn-outline-info">Edit</a>
                                                    <a href="#" class="btn btn-warning" onclick="deleteConfirmation({{ $slide->id }})">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

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
                        <button type="button" onclick="deleteSlide()" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id) {
        @this.set('slide_id',id);
            $('#deleteConfirmation').modal('show')
        }
        function deleteSlide() {
        @this.call('deleteSlide');
            $('#deleteConfirmation').modal('hide');
            setTimeout(function(){
                location.reload();
            },1000);
        }

    </script>
@endpush
