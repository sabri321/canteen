@extends('component.main');
@section('conten')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Form Register</h5>
      </div>
      <div class="card-body">
        <form method="post" action="/tenant">
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                <input type="text" name="name" id="name" class="form-control" id="basic-icon-default-fullname" placeholder="Name User" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Username</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                <input type="text" name="username" id="username" id="basic-icon-default-company" class="form-control" placeholder="Username" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-password12">Password</label>
            <div class="col-sm-10">
            <div class="input-group input-group-merge">
              <input type="password" class="form-control" id="password" name="password" placeholder="············"  aria-describedby="basic-default-password2">
              <span id="basic-default-password2" class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Address</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                <input type="text" name="address" id="address" id="basic-icon-default-company" class="form-control" placeholder="Address" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Phone</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                <input type="text" name="phone" id="phone" id="basic-icon-default-company" class="form-control" placeholder="Phone" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Deposit</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                <input type="int" name="deposit" id="deposit" id="basic-icon-default-company" class="form-control" placeholder="Deposit" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Deposit</label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <select id="role" name="role" class="form-select">
                    <option>Default select</option>
                    @foreach ($tenant as $item)
                        
                    <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                   
                  </select>
                 </div>
            </div>
          </div>
          
          
          <div class="input-group">
            <input type="file" name="image" id="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
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