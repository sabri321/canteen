@extends('component.main')
@section('conten')
    <h4 class="fw-bold py-1">
        <span class="text-muted fw-light">HISTORY DEPOSIT
    </h4>
    <div class="fw-bold py-1 mb-4">
        <div class="card">
            <div class="table-responsive text-nowrap">
                <div class="card-footer">
                    <a href="/deposit" class="btn btn-secondary">Back</a>
                    <button class="btn btn-primary" onclick="window.print()">Print</button>
                </div>

                
                <div class="card-body">
                    <div class="mb-3"> 
                            <h6 style="color: orange">{{ $deposit[0]->user->name }} ( {{ $deposit[0]->user->role }} )</h6>
                    </div>
                    <hr>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                    <th>Deskripsi</th>
                                    <th>Date</th>
        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deposit as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nominal }}</td>
                                        <td>
                                            @if ($item->status == '1')
                                                <p class="text-success">Deposit</p>
                                            @else
                                                <p class="text-danger">Withdraw</p>
                                            @endif
        
                                        </td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>{{ $item->created_at }}</td>
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
