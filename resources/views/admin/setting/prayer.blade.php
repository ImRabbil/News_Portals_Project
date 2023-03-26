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
                <h4 class="card-title">Prayer Time Update</h4>
                <form action="{{ route('update.prayer', $pray->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Fajar</label>
                        <input type="text" class="form-control" name="fajar" value="{{ $pray->fajar }}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1"> Johor</label>
                        <input type="text" class="form-control" name="johor" value="{{ $pray->johor }}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Achor</label>
                        <input type="text" class="form-control" name="achor" value="{{ $pray->achor }}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Magrib</label>
                        <input type="text" class="form-control" name="magrib" value="{{ $pray->magrib }}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Esha</label>
                        <input type="text" class="form-control" name="esha" value="{{ $pray->esha }}">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Jummah</label>
                        <input type="text" class="form-control" name="jummah" value="{{ $pray->jummah }}">

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
