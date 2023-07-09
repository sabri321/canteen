@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">REGISTER PRODUCT
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
    
                    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
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
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Category</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <select id="category_id" name="category_id" class="form-select">
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>     
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Price</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input type="number" name="price" id="price" class="form-control" placeholder="Price" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Qty</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input type="number" name="qty" id="qty" class="form-control" placeholder="Qty" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2">
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
