@extends('layouts.app')
@section("content")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Post</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h4>Create New Post</h4>
            <hr>

            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td class="w-25">Title</td>
                        <td>Category</td>
                        <td>Owner</td>
                        <td>Controls</td>
                        <td>Created</td>
                    </tr>
                </thead>

                <tbody>
                   @forelse($posts as $post)
                       <tr>
                           <td>
                               {{$post->id}}
                           </td>
                           <td>
                               {{$post->title}}
                           </td>
                           <td>
                               {{\App\Models\Category::find($post->category_id)->title}}
                           </td>
                           <td>
                               {{\App\Models\User::find($post->user_id)->name}}
                           </td>
                           <td>
                               <a href="{{ route('post.show',$post->id) }}" class="btn btn-sm btn-outline-dark">
                                   <i class="bi bi-info-circle"></i>
                               </a>
                               <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm btn-outline-dark">
                                   <i class="bi bi-pencil"></i>
                               </a>
                               <form action="{{route('post.destroy',$post->id)}}" method="post">
                                   @csrf
                                   @method('delete')
                                   <button class="btn btn-sm btn-outline-dark">
                                       <i class="bi bi-trash3"></i>
                                   </button>
                                   <a href="#" class="btn btn-sm btn-danger">
                                       <i class="bi bi-blockquote-left"></i>
                                   </a>
                               </form>
                           </td>
                           <td>
                               <p class="small mb-0 text-black-50">
                                   <i class="bi bi-calendar"></i>
                                   {{ $post->created_at->format('d M Y') }}
                               </p>
                               <p class="small mb-0 text-black-50">
                                   <i class="bi bi-clock"></i>
                                   {{ $post->created_at->format("h : m A") }}
                               </p>
                           </td>
                       </tr>
                   @empty
                   @endforelse
                </tbody>
            </table>
        </div>
        {{$posts->OnEachSide(1)->links()}}
    </div>
@endsection
