@extends('Layouts.layout')
@section('content')


<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Participants</h3>
        </div>
        <div class="row">



            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Participant name </th>
                                        <th> Product </th>
                                        <th> Product available </th>
                                        <th> Points </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td> 1 </td>
                                        <td> Isaac</td>
                                        <td> Milk </td>
                                        <td> 10 </td>
                                        <td> 14 </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</div>
<!-- main-panel ends -->
@endsection
