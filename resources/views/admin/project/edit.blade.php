@extends('layouts.admin')

@section('content')

<h1 class="my-5">Edit post: {{$project->title}}</h1>

@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card shadow">
    <div class="card-body">
        <form action="{{route('admin.projects.update',$project)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label text-primary"><strong>Title</strong></label>
                <input type="text" name="title" id="title" class="form-control @error ('title') is-invalid @enderror" placeholder="Enter a title" aria-describedby="helperTitle" value="{{old('title', $project->title)}}">
                <small id=" helperTitle" class="text-muted">Your project title max 50 character</small>
            </div>
            @error('title')
            <span class="text-dark">{{$message}}</span>
            @enderror

            <div class=" mb-3">
                <label for="cover_image" class="form-label text-primary"><strong>Choose file</strong></label>
                <input type="file" class="form-control @error ('cover_image') is-invalid @enderror" name="cover_image" id="" placeholder="Choose a file" aria-describedby="fileHelp">
                <div id="fileHelp" class="form-text">Add an image</div>
            </div>
            @error('cover_image')
            <span class="text-dark">{{$message}}</span>
            @enderror

            <div class="mb-3">
                <label for="title" class="form-label text-primary"><strong>Type</strong></label>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    <option value="">Seleziona un valore</option>
                    @foreach($types as $type)
                    <option value="{{$type->id}}" @if($project->type && $type->id === $project->type->id) selected @endif>{{$type->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label text-primary"><strong>Technologies</strong></label>
                <select class="form-select" multiple aria-label="multiple select example" name="technologies[]">
                    @foreach($technologies as $t)
                    <option value="{{$t->id}}">{{$t->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="content" class="form-label text-primary"><strong>Content</strong></label>
                <textarea class="form-control @error ('content') is-invalid @enderror" name="content" id="content" rows="3">{{old('content', $project->content)}}</textarea>
            </div>
            @error('content')
            <span class="text-dark">{{$message}}</span>
            @enderror

            <button class="btn btn-primary  btn_hover" type="submit"> Update your project
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                    <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                </svg>
            </button>
        </form>


    </div>

</div>

@endsection