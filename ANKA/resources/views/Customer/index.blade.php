@extends('Layouts.layout')
@section('content')



    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Products</h3>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="preview-list">
                            @foreach ($products as $pdt)
                            <div class="preview-item border-bottom">
                                <div class="preview-item-content d-flex flex-grow">
                                    <div class="flex-grow">
                                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                            <h6 class="preview-subject">{{ $pdt->name }}</h6>
                                            <button type="button" class="btn btn-outline-success">ORDER</button>
                                            

                                        </div>
                                        <p class="text-muted">{{ $pdt->description }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="preview-item-content d-flex flex-grow">
                                <div class="flex-grow">
                                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                        
                                    </div>
                                    <p class="text-muted"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
