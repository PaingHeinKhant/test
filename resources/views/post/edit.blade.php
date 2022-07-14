@extends('layouts.app')
@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Edit Post</h4>
            <hr>
            <form action="{{route('post.update',$post->id)}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label class="form-label" for="title" >Edit Post</label>
                    <input
                        type="text"
                        value="{{ old('title',$post->title) }}"
                        class="form-control @error('title') is-invalid @enderror"
                        id="title"
                        name="title">
                    @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class=mb-3"">
                    <label class="form-label" for="category" >Category</label>
                    <select
                        type="text"
                        class="form-select @error('category') is-invalid @enderror"
                        id="category"
                        name="category">
                        @foreach(\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ $category->id == old('category',$post->category) ? 'selected':'' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class=mb-3"">
                    <label class="form-label" for="description" >Post Title</label>
                    <textarea
                        type="text"
                        rows="10"
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        name="description">

                        {{ old('description',$post->description) }}

                    </textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <div class="">
                        <label class="form-label" for="featured_image">Post Title</label>
                        <input
                            type="file"
                            class="form-control @error('featured_image') is-invalid @enderror"
                            name="featured_image"
                            id="featured_image"
                        >
                        @error("featured_image")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-lg btn-primary">Update Post</button>
                </div>
                @isset($post->featured_image)
                    <img src="{{ asset('storage/'.$post->featured_image) }}"  class="w-100 mt-3" alt="">
                @endisset
            </form>

        </div>
    </div>
@endsection
