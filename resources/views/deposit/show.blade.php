@extends('component.main')
@section('conten')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">History Transaksi</h5>
        </div>
        <div class="card-footer">
            <a href="/deposit" class="btn btn-secondary">Back</a>
            <button class="btn btn-primary" onclick="window.print()">Print</button>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">
                    <h6>Name User : {{ $deposit[0]->user->name }}</h6>
                    <h6>Total Deposit : {{ $totalDeposit }}</h6>
                </label>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Deskripsi</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deposit as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nominal }}</td>
                                <td>
                                    @if ($item->status == '1')
                                        <p class="text-success">Deposit</p>
                                    @else
                                        <p class="text-danger">Withdraw</p>
                                    @endif

                                </td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
