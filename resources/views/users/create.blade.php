@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">REGISTER USER
    </h4>
    <div class="fw-bold py-1 mb-4">
        <div class="card">
            <div class="table-responsive text-nowrap">


                
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name User" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Username</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-password12">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-describedby="basic-default-password2">
                                    <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Address</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Phone</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Role</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <select id="role" name="role" class="form-select">
                                        <option disabled selected>Select role</option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Tenant">Tenant</option>
                                        <option value="Member">Member</option>
                                        <!-- Add other role options here -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Image</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" id="image" class="custom-file-input">
                                        <label class="custom-file-label" for="image"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end mt-3">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
