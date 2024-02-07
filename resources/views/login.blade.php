<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
    {{-- BS5 STYLE --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div class="">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark w-100">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">CRUD Exam</a>
            </div>
        </nav>
    
        <div class="main-content">


            <div class="d-flex justify-content-center align-items-center">
                {{-- <div class="login-image col-md-7 d-flex justify-content-center align-items-center">
                    <img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg" alt="" srcset="" height="500px">
                </div> --}}
                
        
                <div class="p-5">
                    <div class="text-center">
                        
                        <img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg" alt="" srcset="" height="300px">
                    </div>

                    <form id="login-form" action="{{ route('login-user') }}" method="POST" class="w-100">
                        @csrf
                        <h1 class="text-center text-secondary">Welcome back user!</h1>

                        @if (session()->has('created'))
                            <div class="alert alert-success">{{ session('created') }}</div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif



                        <div class="email">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="" autocomplete="off">
                        </div>
        
                        <div class="password">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
                        </div>
        
                        <input type="checkbox" name="showpassword" id="showpassword"> Show password
                        
                        <div class="mt-3">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                            <a href="{{ route('register') }}" class="btn border-primary text-primary w-100 mt-1">Register</a>
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- Custom JS --}}
    <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>