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
                <h4 class="card-title">All Post List
                    <a href="{{ route('admin.add.post') }}"> <button class="btn btn-success " style="float:right">Add New Post</button> </a>
                </h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Post Title </th>
                                <th> Category </th>
                                <th> District </th>
                                <th> Image </th>
                                <th> Post Date </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($post as $row)
                                <tr>
                                    <td> {{ $i++ }} </td>
                                    <td> {{ $row->title_en }}</td>
                                    <td> {{ $row->category_en }}</td>
                                    <td> {{ $row->district_en }}</td>
                                    <td>
                                        <img src="{{ asset($row->image) }}" alt="" style=" height:50px;width:50px" />
                                    </td>
                                    <td> {{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('edit.post', $row->id) }}" class="btn btn-success">
                                            Edit
                                        </a>
                                        <a href="{{ route('delete.subcategory', $row->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure for delete!')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $subcategory->links() }} --}}
                </div>
            </div>







        </div>

    </div>







    </div>
@endsection
