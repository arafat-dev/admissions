@extends('admin.auth.layouts')

@section('content')
    <div class="col-md-7">

        <div class="card border-0 mb-5">

            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-7 mt-5">
                        <div class="d-flex justify-content-start">
                            <img src="{{ asset('assets/admin/assets/images/hira.PNG') }}" alt=""/><br>
                        </div>
                        <div class="d-flex justify-content-start">
                            <button class="btn btn-default border-1 border-success m-1">Admin</button>
                            <button class="btn btn-default border-1 border-success m-1">Account</button>
                            <button class="btn btn-default border-1 border-success m-1">Hostel</button>
                            <button class="btn btn-default border-1 border-success m-1">Student</button>
                        </div>
                        <div >
                        <b><h1>Sign In</h1></b>
                        <br>
                        {{-- <b>New Here ? </b><b><a href="{{ route('admin.register') }}"> Create Account</a></b> --}}
                        </div>

                        <form action="{{ route('admin.authenticate') }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label font-weight-bolder text-md-start text-start">Email Address</label>
                                <div class="col-md-9">
                                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label font-weight-bolder text-md-start text-start">Password</label>
                                <div class="col-md-9">
                                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row d-flex justify-content-end">
                                  <a href="#"><u>Forgot Password?</u></a>
                            </div>
                            <div class="mb-3 d-flex justify-content-start">
                                <input type="submit" class="text-md-start btn btn-primary" value="Sign In">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5 m-0 p-0" >
        <img src="{{ asset('assets/admin/assets/images/login.PNG') }}" alt="" width="100%"  style="height: 650px;" />
    </div>

@endsection
