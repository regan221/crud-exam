@extends('../layout.main')


@section('content')
    <div class="posts-section p-5">

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        
        @if ($posts !== null && $posts->count() > 0)
            @foreach ($posts as $post)
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>{{ $post->title }}</h3>
                        <small>Date posted: {{ $post->created_at}} | {{ session('user')->id }} </small>
                    </div>
        
                    <div class="card-body">
                        {{ $post->content }}
                    </div>
        
                    <div class="card-footer">
                        <a href="post/{{ $post->id }}" class="btn btn-secondary view-post">View</a>
                    </div>
                </div>
            @endforeach

            <div class="mt-5 pagination-button">
                {{ $posts->links() }}
            </div>
            
        @else
            <h1>No post found</h1>
            <a href="{{ route('create-post')}}" class="btn btn-secondary">Create Post</a>
        @endif
        


    </div>
@endsection