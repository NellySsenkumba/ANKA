@extends('Layouts.AdminLayout')
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Participants</h3>

    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Participants Details</h4>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>Product</th>
                                    <th>points</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $pat)
                                <tr>
                                    <td>{{ $pat->name }}</td>
                                    <td>{{ $pat->name }}</td>
                                    <td>{{ $pat->points }}</td>
                                    <td>{{ $pat->name }}</td>

                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
