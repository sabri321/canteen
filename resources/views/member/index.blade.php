@extends('component.main')
@section('conten')
<h4 class="fw-bold py-1 mb-1">
    <span class="text-muted fw-light">Data Member
</h4>
    <div class="fw-bold py-3 mb-4">
        <div class="card">
            <h5 class="card-header"> <button type="button" class="btn btn-secondary">Add</button></h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>                
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $item)                        
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->role }}</td>
                            <td>
                                <a class="d-inline" href="javascript:void(0);"
                                  ><i class="bx bx-edit-alt me-1"></i></a
                                >
                                <a class="d-inline" href="javascript:void(0);"
                                  ><i class="bx bx-trash me-1"></i></a
                                >
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
