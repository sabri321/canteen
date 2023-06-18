@extends('component.main')
@section('conten')
    <div class="fw-bold py-3 mb-4">
        <div class="card">
            <h5 class="card-header">Table User Canteen</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Sabri</td>
                            <td>0973636233</td>
                            <td>Kediri</td>
                            <td>083872635263</td>
                            <td>Administrator</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Syukron</td>
                            <td>0089363623</td>
                            <td>Mataram</td>
                            <td>087863659989</td>
                            <td>Member</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
