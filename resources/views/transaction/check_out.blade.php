@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">CHECK OUT</span>
    </h4>

    <div class="coffee_section layout_padding">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (!empty($transaction))
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Jumlah</th>
                                        <th>Price</th>
                                        <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Total
                                            Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($detail_transactions as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                {{ $item->product->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Rp.
                                                {{ number_format($item->product->price) }}</td>
                                            <td>Rp. {{ number_format($item->total_harga) }}</td>
                                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <form action="/check-out/{{ $item->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
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
                                            <form action="{{ url('konfirmasi-check-out') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="bx bx-check me-1"></i> Check Out
                                                </button>
                                            </form>
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
    @if (session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
        <script>
            // Tampilkan SweetAlert untuk pesan berhasil login
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif


    @if (session('error'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script>
        // Tampilkan SweetAlert untuk pesan kesalahan
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    </script>
@endif



    {{-- awal sweet alert --}}
    <!-- Tambahkan SweetAlert library dan jQuery di luar loop -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Tangkap event klik tombol hapus
            $('.delete-btn').on('click', function(event) {
                event.preventDefault(); // Mencegah form submit secara langsung
                var form = $(this).closest('form'); // Dapatkan form terdekat dari tombol hapus yang diklik

                // Tampilkan SweetAlert untuk konfirmasi hapus data user
                Swal.fire({
                    icon: 'warning',
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus Pesanan?',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna menekan tombol "Hapus", submit form hapus
                        form.submit();
                    }
                });
            });
        });
    </script>





<script>
    $(document).ready(function() {
        // Tangkap event submit form checkout
        $('form').on('submit', function(event) {
            event.preventDefault(); // Mencegah form submit secara langsung
            var form = $(this); // Dapatkan form yang sedang disubmit

            // Tampilkan SweetAlert untuk konfirmasi checkout
            Swal.fire({
                icon: 'warning',
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin Melakukan Check Out?',
                showCancelButton: true,
                confirmButtonText: 'Checkout',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna menekan tombol "Checkout", submit form checkout
                    form.off('submit').submit(); // Hapus event handler dan lakukan submit
                }
            });
        });
    });
</script>


@endsection
