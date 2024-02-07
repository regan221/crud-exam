@extends('../layout.main')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form action="{{ route('store-post') }}" method="post">
        @csrf
        <input type="hidden" name="author" value="{{session('user')->id}}">
        <div class="post-title">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="post-body mt-3">
            <label for="content">Post Content</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-secondary mt-3">Create Post</button>
        <a href="{{ route('dashboard') }}" type="submit" class="btn border-secondary mt-3 px-4">Back</a>
    </form>
@endsection