@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    @php
        $subc = DB::table('subcategories')
            ->where('category_id', $post->category_id)
            ->get();
        $subd = DB::table('subdistrict')
            ->where('district_id', $post->district_id)
            ->get();
        
    @endphp
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


        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Post Insert</h4>
                    <form action="{{ route('update.post',$post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            {{-- start row --}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Title English</label>
                                <input type="text" value="{{ $post->title_en }}" name="title_en" class="form-control"
                                    id="exampleInputName1">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Title Hindi</label>
                                <input type="text" value="{{ $post->title_hin }}" name="title_hin" class="form-control"
                                    id="exampleInputName1">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleSelectGender">Category Name</label>
                                <select class="form-control" name="category_id" id="exampleSelectGender">
                                    <option disabled="" selected="">--Select Category</option>
                                    @foreach ($category as $row)
                                        <option value="{{ $row->id }}" <?php
                                        if ($row->id == $post->category_id) {
                                            echo 'selected';
                                        }
                                        ?>>{{ $row->category_en }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleSelectGender">SubCategory Name</label>
                                <select class="form-control" name="subcategory_id" id="subcat_id">
                                    <option disabled="" selected="">--Select SubCategory</option>
                                    @foreach ($subc as $row)
                                        <option value="{{ $row->id }}" <?php
                                        if ($row->id == $post->subcategory_id) {
                                            echo 'selected';
                                        }
                                        ?>>{{ $row->subcategory_en }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                        </div>



                        <div class="row">

                            <div class="form-group col-md-6">
                                <label for="exampleSelectGender">District Name</label>
                                <select class="form-control" name="district_id" id="exampleSelectGender">
                                    <option selected="" disabled="">--Select District</option>
                                    @foreach ($district as $row)
                                        <option value="{{ $row->id }}" <?php
                                        if ($row->id == $post->district_id) {
                                            echo 'selected';
                                        } ?>> {{ $row->district_en }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleSelectGender">SubDistrict Name</label>
                                <select class="form-control" name="subdistrict_id" id="subdistrict_id">
                                    <option selected="" disabled="">--Select SubDistrict</option>
                                    @foreach ($subd as $row)
                                        <option value="{{ $row->id }}" <?php
                                        if ($row->id == $post->subdistrict_id) {
                                            echo 'selected';
                                        } ?>>
                                            {{ $row->subdistrict_en }} </option>
                                    @endforeach


                                </select>
                            </div>

                        </div>

                        <label for="exampleFormControlInput1" class="form-label">New Image</label>
                        <input type="file" value="{{ $post->image }}" name="image" class="form-control"
                            id="exampleFormControlInput1">

                        <input type="hidden" name="old_image" value="{{ $post->image }}">

                        <div class="form-group">
                            <img src="{{ URL::to($post->image) }}" style="height:100px;width:200px">
                        </div>


                        {{-- <div class="input-group">

                            <input type="file" name="image" class="form-control-ifle" id="inputGroupFile02">

                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">New Image Upload</label>
                                <input type="file" name="image" class="form-control-ifle" id="inputGroupFile02">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Old Image</label>
                                <img src="{{ URL::to($post->image) }}" alt="" style="height:70px; width:50px;">
                                <input type="hiden" name="old_image">
                            </div>

                        </div> --}}



                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Tags English</label>
                                <input type="text" value="{{ $post->tags_en }}" name="tags_en" class="form-control"
                                    id="exampleInputName1">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputName1">Tags Hindi</label>
                                <input type="text" value="{{ $post->tags_hin }}" name="tags_hin" class="form-control"
                                    id="exampleInputName1">
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="exampleTextarea1">Details English</label>
                            <textarea class="form-control" name="details_en" id="summernote"> {{ $post->details_en }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Details Hindi</label>
                            <textarea class="form-control" name="details_hin" id="summernote1">{{ $post->details_hin }}</textarea>
                        </div>


                        <hr>
                        <h4 class="text-center"> Extra Option</h4>
                        <br>
                        <div class="row">

                            <label class="form-check-label col-md-3">
                                <input type="checkbox" name="headline" class="form-check-input " value="1"
                                    <?php if ($post->headline == 1) {
                                        echo 'checked';
                                    } ?>>
                                Headline <i class="input-helper"></i></label>

                            <label class="form-check-label col-md-3">
                                <input type="checkbox" name="big_thumbnail" class="form-check-input" value="1"
                                    <?php if ($post->big_thumbnail == 1) {
                                        echo 'checked';
                                    } ?>> General
                                big_thumbnail <i class="input-helper"></i></label>

                            <label class="form-check-label col-md-3">
                                <input type="checkbox" name="first_section" class="form-check-input" value="1"
                                    <?php if ($post->first_section == 1) {
                                        echo 'checked';
                                    } ?>>
                                First Section <i class="input-helper"></i></label>

                            <label class="form-check-label col-md-3">
                                <input type="checkbox" name="first_section_thumbnail" class="form-check-input"
                                    value="1" <?php if ($post->first_section_thumbnail == 1) {
                                        echo 'checked';
                                    } ?>> First
                                Section BigThumbnail <i class="input-helper"></i></label>

                        </div>
                        <br><br>


                        <div class="row" style="float:right">
                            <button type="submit" class="btn btn-primary ">Update</button>

                        </div>




                    </form>


                </div>
            </div>










        </div>
    </div>
    </div>







    {{-- Start Create Modal --}}

    </div>

    {{-- End Create Modal --}}





    </div>







    </div>


    {{-- this json for category and subcategory --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                console.log(category_id);
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/get/subcategory/') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#subcat_id").empty();
                            $.each(data, function(key, value) {
                                $("#subcat_id").append('<option value="' + value.id +
                                    '">' + value.subcategory_en + '</option>');
                            });
                            // console.log(data);
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>



    {{-- this json for district and subdisrict --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="district_id"]').on('change', function() {
                var district_id = $(this).val();
                console.log(district_id);
                if (district_id) {
                    $.ajax({
                        url: "{{ url('/get/subdistrict/') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#subdistrict_id").empty();
                            $.each(data, function(key, value) {
                                $("#subdistrict_id").append('<option value="' + value
                                    .id + '">' + value.subdistrict_en + '</option>');
                            });
                            // console.log(data);
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
