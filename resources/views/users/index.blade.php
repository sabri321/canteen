@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">DATA USERS
    </h4>
    <div class="fw-bold py-1 mb-4">
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Deposit</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sortedUsers = $users->sortBy(function ($user) {
                                return $user->role;
                            });
                        @endphp
                        @foreach ($sortedUsers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->deposit }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="/users/{{ $item->id }}/edit">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>
                                    <form action="/users/{{ $item->id }}" method="post" class="d-inline">
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
