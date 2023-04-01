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
                    data-toggle="modal" data-target="#create_ads">Add Ads</button>
                </h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Ads Link </th>
                                <th> Ads Image </th>
                                <th> Type </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($ads as $row)
                                <tr>
                                    <td> {{ $i++ }} </td>
                                    <td> {{ $row->link }}</td>
                                    <td> <img src="{{ asset($row->ads) }}" alt="" style="height: 80px;width:90px">
                                    </td>
                                    <td>
                                        @if ($row->type == 1)
                                            <span class="badge badge-success">Horizental</span>
                                        @else
                                            <span class="badge badge-info">Vertical</span>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal -->
<div class="modal fade" id="create_ads" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card-body">
                <form action="{{ route('store.ads') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputUsername1">Ads Link</label>
                        <input type="text" class="form-control" name="link" required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender"> Ads Photo Type </label>
                        <select class="form-control" name="type" id="subdistrict_id">
                            <option value="1">Horizental Photo</option>
                            <option value="2">Vertical Photo</option>
                        </select>
                    </div>
                    <div class="input-group">

                        <input type="file" name="ads" class="form-control-ifle"
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






@endsection
