<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Edit Slide
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
                                        Edit Slide
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.home.slider')}}" class="btn btn-outline-success float-end">All Slides</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get(('message'))}}</div>
                                @endif
                                <form wire:submit.prevent="updateSlide">
                                    <div class="form-group">
                                        <label class="form-label">Top Title</label>
                                        <input type="text" class="form-control" placeholder="Enter Top Title" wire:model="top_title">
                                        @error('top_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="Enter Slide Title" wire:model="title">
                                        @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Sub Title</label>
                                        <input type="text" class="form-control" placeholder="Enter Slide Title" wire:model="sub_title">
                                        @error('sub_title')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Offer</label>
                                        <input type="text" class="form-control" placeholder="Enter Slide Title" wire:model="offer">
                                        @error('offer')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Link</label>
                                        <input type="text" class="form-control" placeholder="Enter Slide Title" wire:model="link">
                                        @error('link')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" wire:model="status">
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                        @error('status')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Image</label>
                                        <input type="file" class="form-control" wire:model="newimage">
                                        @if($newimage)
                                            <img src="{{$newimage->temporaryUrl()}}" width="80px">
                                            @else
                                            <img src="{{asset('assets/imgs/slider')}}/{{$image}}" width="80px">
                                        @endif
                                        @error('newimage')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary float-end">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>