@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">REGISTER PRODUCT
    </h4>
    <div class="fw-bold py-1 mb-4">
        <div class="card">
            <h5 class="card-header">
                <a href="/product/create" type="button" class="btn btn-secondary">Add</a>
            </h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="/product/{{ $item->id }}/edit">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>
                                    <form action="/product/{{ $item->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="delete" class="btn btn-danger btn-sm"><i
                                                class="bx bx-trash me-1"></i></button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
