@extends('admin.admin_master')

@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-3 col-xl-2">
                                <img src="{{ asset('backend/assets/images/dashboard/Group126@2x.png') }}"
                                    class="gradient-corona-img img-fluid" alt="">
                            </div>
                            <div class="col-5 col-sm-7 col-xl-8 p-0">
                                <h4 class="mb-1 mb-sm-0">Want even more features?</h4>
                                <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Pro version with 5 unique
                                    layouts!</p>
                            </div>
                            <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                                <span>
                                    <a href="{{ url('/') }}" target="_blank"
                                        class="btn btn-outline-light btn-rounded get-started-btn">Visit our Website</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-body">
            <div class="card-body">
                <h4 class="card-title">New Post Insert</h4>
                <form action="{{ route('update.seo', $seo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Author</label>
                        <input type="text" class="form-control" name="meta_author" value="{{ $seo->meta_author }}">
                        @error('meta_author')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1"> Meta_Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $seo->meta_title }}">
                        @error('meta_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Meta_Keyword</label>
                        <input type="text" class="form-control" name="meta_keyword" value="{{ $seo->meta_keyword }}">
                        @error('meta_keyword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Meta_Description</label>
                        <textarea class="form-control" name="meta_des" id="summernote1">{!! $seo->meta_des !!}</textarea>
                        @error('meta_des')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Google_Analytics</label>
                        <textarea class="form-control" name="google_analytics" id="summernote1">{{ $seo->google_analytics }}</textarea>
                        @error('google_analytics')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleInputUsername1">Google_Verificaion</label>
                        <input type="text" class="form-control" name="google_verify" value="{{ $seo->google_verify }}">
                        @error('google_verify')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                
                    <div class="row" style="float:right">
                        <button type="submit" class="btn btn-primary ">Update</button>

                    </div>
            </div>
            </form>
        </div>








    </div>
    </div>
@endsection
