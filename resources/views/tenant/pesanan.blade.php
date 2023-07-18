@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">NOTIF ORDER</span>
    </h4>
    <div class="fw-bold py-1 mb-4">
        <div class="card">
            @if ($transactions->isEmpty())
                <p class="text-center size:20 my-5 text-warning">Tidak Ada Riwayat Order</p>
            @else
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. Transaksi</th>
                                <th>Nama Member</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
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
                                            <td>
                                                @if ($transaction->status == 0)
                                                    <span class="badge bg-danger rounded-pill">Belum Check Out</span>
                                                @else
                                                    Sudah Check Out
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
