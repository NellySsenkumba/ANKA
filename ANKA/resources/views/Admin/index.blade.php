@extends('Layouts.AdminLayout')
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">

        </div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">
                                    @php
                                    $max=$products[0];
                                    @endphp
                                    @for ($i=0;$i<count($products);$i++)
                                        
                                        @if(($max->total_quantity-$max->left_quantity)<($products[$i]->total_quantity-$products[$i]->left_quantity))
                                        @php
                                            $max=$products[$i];
                                        @endphp

                                        @endif
                                    @endfor
                                    {{ $max->name }}
                                
                                
                                </h3>
                                <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Most Bought Product</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">
                                    @php
                                    $min=$products[0];
                                    @endphp
                                    @for ($i=0;$i<count($products);$i++)
                                        
                                        @if(($min->total_quantity-$min->left_quantity)>(($products[$i]->total_quantity)-$products[$i]->left_quantity))
                                        @php
                                            $min=$products[$i];
                                        @endphp

                                        @endif
                                    @endfor
                                    {{ $min->name }}

                                </h3>
                                <!-- <p class="text-success ml-2 mb-0 font-weight-medium"></p> -->
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-danger">
                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Least Bought Product</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                
                                    @php
                                        $sale=$products[0];
                                    @endphp
                                    
                                    @foreach ($products as $pdt)
                                            
                                                @if($pdt->total_quantity!=0)
                                                    @if (((($sale->left_quantity)/$sale->total_quantity))>(($pdt->left_quantity)/ $pdt->total_quantity))
                                                    @php
                                                    $sale=$pdt;
                                                    @endphp
                                                    @endif

                                                
                                                
                                                @endif
                                            
                                            
                                            
                                        @endforeach
                                         
                                        <h3 class="mb-0"> {{ $sale->name }}</h3>
                                                <h6 class="mb-0">{{ (($sale->total_quantity-$sale->left_quantity)/ $sale->total_quantity)*100 }}%</h6>
                                                

                                
                                <!-- <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p> -->
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-cart-plus"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Highest Persentage Sale</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{ count($participants) }}</h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                                <span class="mdi mdi-account-outline"></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total participants</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Line chart</h4>
                    <canvas id="lineChart" style="height:250px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bar chart</h4>
                    <canvas id="barChart" style="height:230px"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pie chart</h4>
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Scatter chart</h4>
                    <canvas id="scatterChart" style="height:250px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->
    @endsection
