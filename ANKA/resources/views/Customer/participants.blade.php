@extends('Layouts.layout')
@section('content')



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
                                        <th>  </th>
                                        <th> Participant name </th>
                                        <th> Product </th>
                                        <th> Product available </th>
                                        <th> Points </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @php
                                         $i=1;
                                     @endphp
                                       
                                    @foreach ($participants as $pat)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $pat->name }}</td>
                                        @foreach ($products as $pdt)
                                            @if($pdt->participants_id==$pat->id)
                                            <td>{{ $pdt->name }}</td>
                                            
                                            @endif
                                        @endforeach

                                        @foreach ($products as $pdt)
                                            @if($pdt->participants_id==$pat->id)
                                            <td>{{ $pdt->left_quantity }}</td>
                                            
                                            @endif
                                        @endforeach
                                        
                                        
                                        <td>{{ $pat->points }}</td>
    
                                    </tr>
                                    @php
                                    $i++;
                                @endphp
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    

<!-- main-panel ends -->
@endsection
