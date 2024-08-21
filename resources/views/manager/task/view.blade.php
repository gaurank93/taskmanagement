@extends('manager.layout.app')
@section('title','Task Details')
@push('header_script')
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Task Details</h4>
                        <div class="page-title-right">
                            <a class="btn btn-primary " href="{{route('manager-task.index')}}"><i
                                    class='fas fa-arrow-left'></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title">{{ $data->title }}</h5>
                                    <p class="card-text"><strong>Description:</strong> {{ $data->description }}</p>
                                    <p class="card-text"><strong>Status:</strong> {{ $data->status }}</p>
                                    <p class="card-text"><strong>Assigned To:</strong> {{ $data->user->name }}</p>
                                    <p class="card-text"><strong>Due
                                            Date:</strong> {{ date('d-M-Y', strtotime($data->deadline)) }}</p>
                                    <p class="card-text"><strong>Priority:</strong>
                                        @if ($data->priority == 'low')
                                            <span class="badge badge-primary">LOW</span>
                                        @elseif ($data->priority == 'medium')
                                            <span class="badge badge-pink">Medium</span>
                                        @else
                                            <span class="badge badge-info">High</span>
                                        @endif
                                    </p>
                                    <p class="card-text"><strong>Status:</strong>
                                        @if ($data->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @else
                                            <span class="badge badge-success">Completed</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            @if(count($data->taskDocuments) > 0)
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h3>Documents</h3>
                                    </div>
                                    @foreach($data->taskDocuments as $document)
                                        <div class="col-md-4 mb-2">
                                            <a href="{{$document->document_path}}" target="_blank">
                                                <div class="text-center">
                                                    <object data="{{$document->document_path}}" width="300"
                                                            height="200">
                                                    </object>
                                                    <div><p>Download</p></div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection
@push('footer_script')
@endpush
