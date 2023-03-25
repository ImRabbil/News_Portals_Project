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
                <h4 class="card-title">Category List
                    <button type="button" class="btn btn-success btn-fw template-demo" style="float:right"
                        data-toggle="modal" data-target="#createCategory">Add Category</button>
                </h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Category English </th>
                                <th> Category Hindi </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($category as $row)
                                <tr>
                                    <td> {{ $i++ }} </td>
                                    <td> {{ $row->category_en }}</td>
                                    <td> {{ $row->category_hin }}</td>
                                    <td>
                                        <a href="#" type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#EditCategory{{ $row->id }}">
                                            Edit
                                        </a>
                                        <a href="{{ route('delete.category', $row->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure for delete!')">Delete</a>
                                    </td>
                                </tr>
                                {{-- Start Edit Modal --}}
                                <div class="modal fade" id="EditCategory{{ $row->id }}" tabindex="-1" role="dialog"
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
                                                    <form action="{{ route('update.category', $row->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Category English</label>
                                                            <input type="text" class="form-control" name="category_en"
                                                                value="{{ $row->category_en }}">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Category Hindi</label>
                                                            <input type="text" class="form-control" name="category_hin"
                                                                value="{{ $row->category_hin }}">

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
                {{ $category->links() }}
            </div>
        </div>

        {{-- Start Create Modal --}}
        <div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Team</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Category English</label>
                                    <input type="text" class="form-control" name="category_en" required>
                                    @error('category_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Category Hindi</label>
                                    <input type="text" class="form-control" name="category_hin" required>
                                    @error('category_hin')
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
