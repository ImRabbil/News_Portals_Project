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
                <h4 class="card-title">Photos List
                    <button type="button" class="btn btn-success btn-fw template-demo" style="float:right"
                        data-toggle="modal" data-target="#createPhoto">Add Gallery</button>
                </h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Photo Name </th>
                                <th> Photos </th>
                                <th> Type </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($photo as $row)
                                <tr>
                                    <td> {{ $i++ }} </td>
                                    <td> {{ $row->title }}</td>
                                    <td> <img src="{{ asset($row->photo) }}" alt="" style="height: 80px;width:90px">
                                    </td>
                                    <td>
                                        @if ($row->type == 1)
                                            <span class="badge badge-success">Big Photo</span>
                                        @else
                                            <span class="badge badge-info">Smaill Photo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#EditPhoto{{ $row->id }}">
                                            Edit
                                        </a>
                                        <a href="{{ route('delete.photo', $row->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Are you sure for delete!')">Delete</a>
                                    </td>
                                </tr>
                                {{-- Start Edit Modal --}}
                                <div class="modal fade" id="EditPhoto{{ $row->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <form action="{{ route('update.photo', $row->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Photo Name</label>
                                                            <input type="text" class="form-control" name="title"
                                                                value="{{ $row->title }}">

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">Photo Type</label>
                                                            <select class="form-control" name="type" id="subdistrict_id">
                                                                <option selected="">--Select Type</option>
                                                                <option value="1">Big Photo</option>
                                                                <option value="0">Small Photo</option>
                                                            </select>
                                                        </div>

                                                        <label for="exampleFormControlInput1" class="form-label">New
                                                            Image</label>
                                                        <input type="file" value="{{ $row->photo }}" name="photo"
                                                            class="form-control" id="exampleFormControlInput1">

                                                        <input type="hidden" name="old_image" value="{{ $row->photo }}">

                                                        <div class="form-group">
                                                            <img src="{{ URL::to($row->photo) }}"
                                                                style="height:100px;width:200px">
                                                        </div>



                                                        <div class="modal-footer ">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                </div>

                {{-- End Edit Modal --}}
                @endforeach
                </tbody>
                </table>
                {{ $photo->links() }}
            </div>
        </div>

        {{-- Start Create Modal --}}
        <div class="modal fade" id="createPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form action="{{ route('store.photo') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Photo Name</label>
                                    <input type="text" class="form-control" name="title" required>
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectGender">Photo Type</label>
                                    <select class="form-control" name="type" id="subdistrict_id">
                                        <option value="1">Big Photo</option>
                                        <option value="0">Small Photo</option>


                                    </select>
                                </div>

                                <div class="input-group">

                                    <input type="file" name="photo" class="form-control-ifle"
                                        id="inputGroupFile02">

                                </div>




                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- End Create Modal --}}





    </div>







    </div>
@endsection
