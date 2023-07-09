@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">DATA ORDER
    </h4>

    <div class="coffee_section layout_padding">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/' . $product->image) }}" class="rounded mx-auto d-block"
                                width="80%" alt="">
                        </div>
                        <div class="col-md-6 mt-1">
                            <h3>{{ $product->name }}</h3>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Price</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($product->price) }}</td>
                                    </tr>
                                    <hr>
                                    <tr>
                                        <td>Qty</td>
                                        <td>:</td>
                                        <td>{{ $product->qty }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Pesan</td>
                                        <td>:</td>
                                        <td>
                                            <form action="/transaction/{{ $product->id }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="text" name="jumlah_pesan" class="form-control"
                                                    required="">
                                                <button type="submit" class="btn btn-warning mt-2"><i
                                                        class="fa fa-shopping-cart"></i> Add Keranjang</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
