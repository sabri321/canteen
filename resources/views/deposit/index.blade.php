@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">DEPOSIT
    </h4>
    <div class="fw-bold py-1 mb-4">
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
                                $nominal = $item->nominal;
                                $status = $item->status;
                                $userIndex = array_search($userId, array_column($users, 'user_id'));
                            @endphp
                            @if ($userIndex !== false)
                                @if ($status == 1)
                                    @php
                                        $users[$userIndex]['nominal'] += $nominal;
                                    @endphp
                                @else
                                    @php
                                        $users[$userIndex]['nominal'] -= $nominal;
                                    @endphp
                                @endif
                            @else
                                @if ($status == 1)
                                    @php
                                        array_push($users, [
                                            'user_id' => $userId,
                                            'name' => $item->user ? $item->user->name : null,
                                            'nominal' => $nominal,
                                        ]);
                                    @endphp
                                @else
                                    @php
                                        array_push($users, [
                                            'user_id' => $userId,
                                            'name' => $item->user ? $item->user->name : null,
                                            'nominal' => -$nominal,
                                        ]);
                                    @endphp
                                @endif
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>




            </div>
        </div>
    </div>
@endsection
