@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">NOTIF ORDER
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
                                <th>Name</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Total Bayar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                @foreach ($transaction->detailtransaction as $detailTransaction)
                                    <tr>
                                        <td>{{ rand(10000000, 99999999) }}</td>
                                        <td>{{ $transaction->user->name }}</td>
                                        <td>{{ $detailTransaction->product->name }}</td>
                                        <td>{{ $detailTransaction->qty }}</td>
                                        <td>{{ $transaction->total_bayar }}</td>
                                        <td>
                                            @if ($transaction->status == 0)
                                                <span class="badge bg-danger rounded-pill">Belum Check Out</span>
                                            @else
                                                Sudah Check Out
                                            @endif
                                        </td>
                                       
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
 





        </div>
    </div>
@endsection
