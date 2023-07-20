@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">REGISTER PRODUCT
    </h4>
    <div class="fw-bold py-1 mb-4">
        <div class="card">
            <h5 class="card-header">
                <a href="/product/create" type="button" class="btn btn-secondary">Add</a>
            </h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="/product/{{ $item->id }}/edit">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>
                                    <form action="/product/{{ $item->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value="delete" class="btn btn-danger btn-sm delete-btn"><i
                                                class="bx bx-trash me-1"></i></button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
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
                text: 'Apakah Anda yakin ingin menghapus data ini?',
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

    // Tampilkan SweetAlert untuk pesan sukses diluar loop
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
        });
    @endif
</script>
{{-- akhir sweet alert --}}
@endsection
