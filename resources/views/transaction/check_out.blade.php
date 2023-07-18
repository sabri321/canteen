@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">CHECK OUT</span>
    </h4>

    <div class="coffee_section layout_padding">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(!empty($transaction))
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Jumlah</th>
                                        <th>Price</th>
                                        <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Total Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($detail_transactions as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $item->product->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Rp. {{ number_format($item->product->price) }}</td>
                                            <td>Rp. {{ number_format($item->total_harga) }}</td>
                                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <form action="/check-out/{{ $item->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Anda yakin akan menghapus data ?');">
                                                        <i class="fa fa-trash"></i>Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="4"><strong>Total Bayar :</strong></td>
                                        <td><strong>Rp. {{ number_format($transaction->total_bayar) }}</strong></td>
                                        <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-warning"
                                                onclick="return confirm('Anda yakin akan Check Out ?');">
                                                </i> Check Out
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
