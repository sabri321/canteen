@extends('component.main')

@section('conten')
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Category</h5>
            </div>
            <div class="card-body">
                <form method="post" action="/category/{{ $category->id }}" enctype="multipart/form-data">
                    
                    @method('put')
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Name</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name User" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="{{ old('name', $category->name) }}">
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
