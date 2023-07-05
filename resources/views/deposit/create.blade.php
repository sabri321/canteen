@extends('component.main')

@section('conten')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Register Product</h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="post" action="{{ route('deposit.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Name</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <select id="user_id" name="user_id" class="form-select">
                                    @foreach ($users as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} ( {{ $item->role }} )</option>     
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Nominal</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Price" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Status</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                <input type="number" name="status" id="status" class="form-control" placeholder="Status" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
                            </div>
                        </div>
                    </div> --}}
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Deskripsi</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                <input type="text" name="deskripsi" id="stadeskripsi" class="form-control" placeholder="Deskripsi" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
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
@endsection
