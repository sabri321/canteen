@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">GENERATE LAPORAN
    </h4>
    <div class="fw-bold py-1 mb-4">
        <div class="card">
            <div class="table-responsive text-nowrap">
                <div class="card-footer">
                <form method="POST" action="{{ route('laporan.transaksi.generate') }}">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai:</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <label for="tanggal_akhir">Tanggal Akhir:</label>
                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Generate Laporan</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
