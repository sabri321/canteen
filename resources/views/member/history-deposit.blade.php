@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">RIWAYAT DEPOSIT
    </h4>
    <div class="fw-bold py-1 mb-4">
        <div class="card">
            <div class="table-responsive text-nowrap">
                <div class="card-body">
                        <button class="btn btn-primary mb-4" onclick="window.print()">Print</button>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nominal</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($depositHistories as $index => $depositHistory)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $depositHistory->created_at->format('d-m-Y H:i:s') }}</td>
                                        <td>Rp. {{ number_format($depositHistory->nominal) }}</td>
                                        <td>{{ $depositHistory->deskripsi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
        
                        </table>
                    </div>
                </div>



                
            </div>
        </div>
    </div>
@endsection
