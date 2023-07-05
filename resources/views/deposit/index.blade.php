@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1 mb-1">
        <span class="text-muted fw-light">Deposit History</span>
    </h4>
    <div class="fw-bold py-3 mb-4">
        <div class="card">
            <h5 class="card-header">
                <a href="/deposit/create" type="button" class="btn btn-secondary">Add</a>
            </h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Nominal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $users = [];
                        @endphp
                        @foreach ($deposit as $item)
                            @php
                                $userId = $item->user_id;
                                $totalNominal = $item->nominal;
                                $userIndex = array_search($userId, array_column($users, 'user_id'));
                            @endphp
                            @if ($userIndex !== false)
                                @php
                                    $users[$userIndex]['nominal'] += $item->nominal;
                                @endphp
                            @else
                                @php
                                    array_push($users, [
                                        'user_id' => $userId,
                                        'name' => $item->user->name,
                                        'nominal' => $item->nominal,
                                    ]);
                                @endphp
                            @endif
                        @endforeach
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['nominal'] }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="/deposit/{{ $user['user_id'] }}">
                                        <i class="bx bx-show-alt me-1"></i>
                                    </a>
                                    <form action="/deposit/{{ $user['user_id'] }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="delete" class="btn btn-danger btn-sm">
                                            <i class="bx bx-trash me-1"></i>
                                        </button>
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
