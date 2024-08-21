@extends('user.layout.app')
@section('title','Add Task ')
@push('header_script')
    <link href="{{asset('theme/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet"
          type="text/css"/>
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Task</h4>
                        <div class="page-title-right">
                            <a class="btn btn-primary " href="{{route('user-task.index')}}"><i
                                    class='fas fa-arrow-left'></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route'=>array('user-task.store'), 'onsubmit'=>'BtnSubmit.disabled = true','method' => 'post']) !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title"
                                               id="title" value="{{old('title')}}" required>
                                        <span class="text-danger">{{$errors->first('title')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description"
                                              id="description">{{old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="deadline" class="form-label">Deadline<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="deadline"
                                               id="deadline" autocomplete="off"
                                               value="{{old('deadline', date('d-m-Y'))}}"
                                               required>
                                        <span class="text-danger">{{$errors->first('deadline')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="priority" class="form-label">Priority<span
                                                class="text-danger">*</span></label>
                                        {!! Form::select("priority", [''=>'Select Priority','low'=>'Low','medium'=>'Medium','high'=>'High'], old('priority'), ['class'=>'form-control','required'] ) !!}
                                        <span class="text-danger">{{$errors->first('priority')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status<span
                                                class="text-danger">*</span></label>
                                        {!! Form::select("status", [''=>'Select Status','pending'=>'Pending','completed'=>'Completed'], old('status'), ['class'=>'form-control','required'] ) !!}
                                        <span class="text-danger">{{$errors->first('status')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" id="BtnSubmit" class="btn btn-primary w-md">Submit</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection
@push('footer_script')
    <script src="{{asset('theme/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script>
        $("#deadline").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            startDate: 'today',
        });
    </script>
@endpush
