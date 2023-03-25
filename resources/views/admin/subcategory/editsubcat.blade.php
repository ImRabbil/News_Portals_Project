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
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Edit Sub-Category 
                    
                </h4>
                </p>
                <div class="table-responsive">
                    <div class="card-body">
                        <form action="{{ route('update.subcategory',$subcategory->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">SubCategory English</label>
                                <input type="text" class="form-control" value="{{ $subcategory->subcategory_en  }}" name="subcategory_en" >
                                @error('subcategory_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">SubCategory Hindi</label>
                                <input type="text" class="form-control" value="{{ $subcategory->subcategory_hin  }}" name="subcategory_hin" >
                                @error('subcategory_hin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlSelect2"> Select Category</label>
                                <select class="form-control" name="category_id" id="exampleFormControlSelect2">
                                    <option disabled="" selected="">--Select Category</option>
                                    @foreach ($category as $row)
                                        <option value="{{ $row->id }}"
                                            <?php
                                            if($row->id == $subcategory->category_id ) echo "selected";                                               
                                            ?> 
                                            >{{ $row->category_en }} |
                                            {{ $row->category_hin }}</option>
                                    @endforeach

                                </select>
                            </div>
                            {{-- <div class="form-group">
                            <label for="exampleInputUsername1">Category Name</label>
                            <input type="text" class="form-control" name="category_hin" required>
                            @error('category_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                           </div> --}}


                            <div class="modal-footer ">
                               
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                    </div>
                    </form>
                </div>
              
            </div>
        </div>

       





    </div>







    </div>
@endsection
