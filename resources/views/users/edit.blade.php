@extends('component.main')

@section('conten')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Users</h5>
            </div>
            <div class="card-body">
                <form method="post" action="/users/{{ $users->id }}" enctype="multipart/form-data">
                    
                    @method('put')
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name User" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="{{ old('name', $users->name) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Username</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" value="{{ old('username', $users->username) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 form-password-toggle">
                        <label class="col-sm-2 col-form-label" for="basic-default-password12">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="password"">
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Address</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Address" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" value="{{ old('address', $users->address) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Phone</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" value="{{ old('phone', $users->phone) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Role</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <select id="role" name="role" class="form-select">
                                    <option value="Administrator" {{ old('role', $users->role) === 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                    <option value="Tenant" {{ old('role', $users->role) === 'Tenant' ? 'selected' : '' }}>Tenant</option>
                                    <option value="Member" {{ old('role', $users->role) === 'Member' ? 'selected' : '' }}>Member</option>
                                    <!-- Tambahkan opsi peran lainnya di sini -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company"></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" id="image" class="custom-file-input">
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
            </div>
        </div>
    </div>
@endsection
