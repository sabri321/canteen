@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1 mb-1">
        <span class="text-muted fw-light">Detail Transaction</span>
    </h4>

   
    <div class="coffee_section layout_padding">
        <div class="col-md-12">
            <div class="card">
                <div class="card-footer">
                    <a href="/history" class="btn btn-secondary">Back</a>
                    <button class="btn btn-primary" onclick="window.print()">Print</button>
                </div>
                <div class="card-body">
                    @if(!empty($transaction))
                        
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>name</th>
                                <th>Jumlah</th>
                                <th>Price</th>
                                <th>Total Bayar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no = 1; ?>
                            @foreach ($detail_transaction as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>Rp. {{ number_format($item->product->price) }}</td>
                                    <td>Rp. {{ number_format($item->total_harga) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"><strong>Total Bayar :</strong></td>
                                <td><strong>Rp. {{ number_format($transaction->total_bayar) }}</strong></td>
                          
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
