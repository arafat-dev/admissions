@extends('admin.auth.layouts')

@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card border-0 mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-10 mt-5">
                        <div class="m-0 m-auto d-table">
                            <b><h1>Signup</h1></b>
                            <img src="{{ asset('/assets/images/hira.PNG') }}" alt="" class="m-0 m-auto"/><br>
                        </div>
                        <div class="d-block">

                            <form class="mt-5" action="{{ route('admin.store') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="name" class="col-md-4 col-form-label text-md-start text-start">Name</label>
                                    <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-md-4 col-form-label text-md-start text-start">Email Address</label>
                                    <div class="col-md-6">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="password" class="col-md-4 col-form-label text-md-start text-start">Password</label>
                                    <div class="col-md-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-start text-start">Confirm Password</label>
                                    <div class="col-md-6">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <button class="col-3 btn btn-default border-1 border-success m-1">Admin</button>
                                    <button class="col-3 btn btn-default border-1 border-success m-1">Account</button>
                                    <button class="col-3 btn btn-default border-1 border-success m-1">Hostel</button>
                                    <button class="col-3 btn btn-default border-1 border-success m-1">Student</button>
                                </div>

                                <div class="mb-3 row">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Register">
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5 m-0 p-0" >
        <img src="{{ asset('/assets/images/login.PNG') }}" alt="" width="100%"  style="height: 650px;" />
</div>

</div>

@endsection
