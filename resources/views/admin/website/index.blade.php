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
                <h4 class="card-title">Website List
                    <button type="button" class="btn btn-success btn-fw template-demo" style="float:right"
                        data-toggle="modal" data-target="#createWebsite">Add website</button>
                </h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Website Name </th>
                                <th> Website Link </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($website as $row)
                                <tr>
                                    <td> {{ $i++ }} </td>
                                    <td> {{ $row->website_name }}</td>
                                    <td> {{ $row->website_link }}</td>
                                    <td>
                                        <a href="#" type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#EditWebsite{{ $row->id }}">
                                            Edit
                                        </a>
                                        <a href="{{ route('delete.website', $row->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Are you sure for delete!')">Delete</a>
                                    </td>
                                </tr>
                                {{-- Start Edit Modal --}}
                                <div class="modal fade" id="EditWebsite{{ $row->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Website</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <form action="{{ route('update.website', $row->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Website Name</label>
                                                            <input type="text" class="form-control" name="website_name"
                                                                value="{{ $row->website_name }}">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Website Link</label>
                                                            <input type="text" class="form-control" name="website_link"
                                                                value="{{ $row->website_link }}">

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
                {{-- {{ $website->links() }} --}}
            </div>
        </div>

        {{-- Start Create Modal --}}
        <div class="modal fade" id="createWebsite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Website</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form action="{{ route('store.website') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Website Name</label>
                                    <input type="text" class="form-control" name="website_name" required>
                                    @error('website_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Website Link</label>
                                    <input type="text" class="form-control" name="website_link" required>
                                    @error('website_link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
