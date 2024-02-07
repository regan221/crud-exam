@extends('../layout.main')

@section('content')
    <div class="profile-section">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form id="user-update-form" action="{{route('update-profile', session('user')->id)}}" method="POST" class="w-100">
            @csrf
            @method('PUT')

            <h1>Profile Information</h1>
            <div class="firstname">
                <label for="firstname">Firstname</label>
                <input type="text" name="firstname" id="firstname" class="form-control" value="{{ session('user')->firstname }}" autocomplete="off">
            </div>

            <div class="middlename">
                <label for="middlename">Middlename</label>
                <input type="text" name="middlename" id="middlename" class="form-control" value="{{ session('user')->middlename }}" autocomplete="off">
            </div>

            <div class="lastname">
                <label for="lastname">Lastname</label>
                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ session('user')->lastname }}" autocomplete="off">
            </div>

            <div class="email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ session('user')->email }}" autocomplete="off">
            </div>

            <div class="password">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" value="{{session('curr_user_pass')}}" autocomplete="off">
            </div>

            <div class="password_confirmation">
                <label for="password">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{session('curr_user_pass')}}" autocomplete="off">
            </div>

            <div class="mt-3">
                <button type="submit" style="display: none;">Update</button>
                <a id="btn_updt_usr" class="btn btn-secondary mt-1">Update</a>
                <a href="{{route('dashboard')}}" class="btn text-secondary border">Back</a>
            </div>
            
        </form>
    </div>
@endsection