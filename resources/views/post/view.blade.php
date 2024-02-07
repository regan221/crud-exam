@extends('../layout.main')

@section('content')

    <div class="post-data">
        <div class="card">
            <div class="card-header">
            </div>

            <div class="card-body p-3">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                

                <form action="{{ route('update-post', $post->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="post-title">
                        <h5>Post Title</h5>
                        <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}" {{ $post->author != session('user')->id ? "disabled" : "" }}>
                    </div>
                    <small>Date posted: {{ $post->created_at}}</small>
    
                    <div class="post-content mt-3">
                        <h5>Post Content</h5>
                        <textarea name="content" id="" cols="30" rows="10" class="form-control" {{ $post->author != session('user')->id ? "disabled" : "" }}>{{ $post->content}}</textarea>
                    </div>

                    @if ($post->author == session('user')->id)
                    <div class="buttons">
                        <hr>
                        <button class="btn btn-secondary" type="submit">Update</button>
                        <a id="btn-delete" class="btn btn-danger">Delete</a>
                        <a href="{{ route('dashboard')}}" class="btn border">Back</a>
                    </div>
                @endif
                
                </form>


                <form id="delete-form" action="{{ route('delete-post', $post->id) }}" method="post" style="display: none;">
                    @csrf
                    @method('DELETE')

                    <button type="submit" style="">Delete</button>

                </form>
                
            

                
                
            </div>
            

        </div>
        
    </div>


    {{-- <div class="post-comments mt-5">

        <div class="card">
            <div class="card-header">
                <h5>Comment Section:</h5>
            </div>

            <div class="card-body">

                <div class="border p-3">
                    <h5>Jane Doe</h5>
                    <small>Jan 23, 2024 09:23 AM</small>
                    <hr>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta hic et possimus assumenda earum ducimus voluptate alias error perferendis eligendi ut doloribus eos atque, explicabo exercitationem voluptatibus dolore incidunt aperiam quibusdam. Eum commodi dicta corporis. Est, saepe aliquam, laborum libero ipsum, possimus deserunt esse maxime quae laudantium optio reprehenderit perspiciatis.
                    </p>
                </div>
                
                
            </div>

            <div class="card-footer">

            </div>

        </div>
    </div> --}}
@endsection

