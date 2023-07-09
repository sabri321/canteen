@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1 mb-1">
        <span class="text-muted fw-light">History Transaction</span>
    </h4>

    <div class="coffee_section layout_padding">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Status</th>
                                <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Total Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no = 1; ?>
                            @foreach ($transaction as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                               
                                <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    @if ($item->status == 0)
                                        Belum bayar
                                    @else
                                        Check Out Berhasil Saldo Terpotong
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($item->total_bayar) }}</td>
                                <td>
                                    <a href="{{ url('history') }}/{{ $item->id }}" class="btn btn-warning"><i class="fa fa-info"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
