<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Edit Post
                        <div class="card-body">
                            @if (Session::has('Post_updated'))
                            <div class="alert alert-success" role="alert">
                            {{ Session::get('Post_updated') }}
                        </div>
                        @endif
                            <form method="POST" action="{{ route('post.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $post->id }}"/>
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="body">Post Description</label>
                                    <textarea class="form-control" name="body" rows="3">{{ $post->body }}</textarea>
                                </div>
                                <input type="submit" class="btn btn-success" value="Update"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
