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
                        <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th>  </th>
                                        <th> Participant name </th>
                                        <th> Product </th>
                                        <th> Product Published </th>
                                        <th> Product Booked </th>
                                        <th> Percentage Sale  </th>
                                        <th> Points </th>
                                        <th> Rank </th>
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
                                            <td>{{ $pdt->total_quantity }}</td>
                                            
                                            @endif
                                        @endforeach
                                        @foreach ($products as $pdt)
                                            @if($pdt->participants_id==$pat->id)
                                            <td>{{ $pdt->total_quantity-$pdt->left_quantity }}</td>
                                            
                                            @endif
                                        @endforeach
                                        
                                        
                                        @foreach ($products as $pdt)
                                            @if($pdt->participants_id==$pat->id && $pdt->total_quantity!=0)
                                                
                                                    <td>{{ (($pdt->total_quantity-$pdt->left_quantity)/ $pdt->total_quantity)*100 }}%</td>
                                            @elseif($pdt->participants_id==$pat->id && $pdt->total_quantity==0)    
                                                <td>0%</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $pat->points }}</td>
                                        <td>{{ $pat->rank }}</td>
    
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
