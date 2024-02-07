<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>
    {{-- BS5 STYLE --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark w-100" style="position:absolute">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Crud Exam</a>
        </div>
    </nav>

    <div class="main-content d-flex justify-content-center align-items-center">

        <div class="registration-form mt-5">
            <div class="text-center">
                <img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg" alt="" srcset="" width="350px">

            </div>
            <form id="user-registation-form" action="{{ route('store-user') }}" method="POST" class="w-100">
                @csrf
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                <div class="firstname">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="{{old('firstname')}}" autocomplete="off">
                </div>

                <div class="middlename">
                    <label for="middlename">Middlename</label>
                    <input type="text" name="middlename" id="middlename" class="form-control" value="{{old('middlename')}}" autocomplete="off">
                </div>

                <div class="lastname">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname')}}" autocomplete="off">
                </div>

                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" autocomplete="off">
                </div>

                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}" autocomplete="off">
                </div>

                <div class="password_confirmation">
                    <label for="password">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" autocomplete="off">
                </div>

                <a href="{{ route('login-user') }}" style="text-decoration: none; color: gray; font-weight: 300;">Already have an account?</a>
                <div class="mt-3">
                    <a id="btn_registration" class="btn btn-primary w-100 mt-1">Create account</a>
                    <button type="submit" class="btn btn-primary w-100 mt-1" style="display:none;">Register</button>
                </div>
                
            </form>
        </div>
        
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- SA --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Custom JS --}}
    <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>