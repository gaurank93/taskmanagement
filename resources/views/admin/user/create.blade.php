@extends('admin.layout.app')
@section('title','Add User')
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
                        <h4 class="mb-sm-0 font-size-18">Add User</h4>
                        <div class="page-title-right">
                            <a class="btn btn-primary " href="{{route('user.index')}}"><i
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
                            {!! Form::open(['route'=>array('user.store'), 'onsubmit'=>'BtnSubmit.disabled = true','method' => 'post']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role<span
                                                    class="text-danger">*</span></label>
                                        {!! Form::select("role", [''=>'Select User Role', 'manager'=>'Manager', 'user'=>'User'], old('role'), ['class'=>'form-control', 'required'] ) !!}
                                        <span class="text-danger">{{$errors->first('role')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name<span
                                                    class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                               id="name" value="{{old('name')}}" required>
                                        <span class="text-danger">{{$errors->first('name')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email<span
                                                    class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email"
                                               id="email" value="{{old('email')}}" required>
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password<span
                                                    class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password"
                                               id="password" value="{{old('password')}}" required>
                                        <span class="text-danger">{{$errors->first('password')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="delete_it" class="form-label">Permission To Delete<span
                                                    class="text-danger">*</span></label>
                                        {!! Form::select("delete_it", [''=>'Select Permission', 'yes'=>'Yes', 'no'=>'No'], old('delete_it'), ['class'=>'form-control', 'required'] ) !!}
                                        <span class="text-danger">{{$errors->first('delete_it')}}</span>
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
