@extends('component.main')

@section('conten')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Product</h5>
            </div>
            <div class="card-body">
                <form method="post" action="/product/{{ $product->id }}" enctype="multipart/form-data">
                    
                    @method('put')
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name User" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="{{ old('name', $product->name) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Category</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <select id="category_id" name="category_id" class="form-select">
                                    @foreach ($category as $item)
                                    <option value="{{ old('category_id', $item->id) }}">{{ $item->name }}</option>     
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
                                <input type="number" name="price" id="price" class="form-control" placeholder="price" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" value="{{ old('price', $product->price) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Qty</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                <input type="number" name="qty" id="qty" class="form-control" placeholder="qty" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" value="{{ old('qty', $product->qty) }}">
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
