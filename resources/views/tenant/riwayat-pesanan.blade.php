@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">RIWAYAT ORDER</span>
    </h4>
    <div class="fw-bold py-1 mb-4">
        <div class="card">
            <div class="table-responsive text-nowrap">
                @if ($transactions->isEmpty())
                    <p class="text-center size:20 my-5 text-warning">Tidak Ada Riwayat Order</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Member</th>
                                <th>Order</th>
                                <th>Jml Order</th>
                                <th>Total Bayar</th>
                                <th>Date Transaction</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                @foreach ($transaction->detailtransaction as $detailTransaction)
                                    @if ($detailTransaction->product->user_id == Auth::user()->id)
                                        <tr>
                                            <td>{{ $transaction->id }}</td>
                                            <td>{{ $transaction->user->name }}</td>
                                            <td>{{ $detailTransaction->product->name }}</td>
                                            <td>{{ $detailTransaction->qty }}</td>
                                            <td>{{ $detailTransaction->total_harga }}</td>
                                            <td>{{ $transaction->updated_at->format('d-m-Y H:i:s') }}</td>
                                            <td>
                                                @if ($transaction->status == 0)
                                                    <span class="badge bg-danger rounded-pill">Belum Check Out</span>
                                                @elseif ($transaction->status == 1)
                                                    <span class="badge bg-success rounded-pill">Sudah Check Out</span>
                                                @elseif ($transaction->status == 2)
                                                    <span class="badge bg-warning rounded-pill">Sudah Diserahkan</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($transaction->status == 1)
                                                    <a href="{{ route('tenant.serahkan-pesanan', $transaction->id) }}" class="btn btn-primary btn-sm">Serahkan Pesanan</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
