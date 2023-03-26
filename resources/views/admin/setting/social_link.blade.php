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
                <h4 class="card-title">Socials Link Update</h4>
                <form action="{{ url('update.link', $link->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="{{ $link->facebook }}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1"> Twitter</label>
                        <input type="text" class="form-control" name="twitter" value="{{ $link->twitter }}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">YouTube</label>
                        <input type="text" class="form-control" name="youtube" value="{{ $link->youtube }}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Linkdin</label>
                        <input type="text" class="form-control" name="linkdin" value="{{ $link->linkdin }}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="{{ $link->instagram }}">

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
