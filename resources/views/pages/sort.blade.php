@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <!-- SideBar -->
        @include('parts/sideBar')
        <!-- ./SideBar -->

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if (Auth::check())
                       <h1 style="color:#8e44ad;">{{ ($sortedAs  == Auth::user()->name) ? 'Your posts' : $sortedAs }}</h1>
                    @else
                        <h1 style="color:#8e44ad;">{{ $sortedAs }}</h1>
                    @endif
                    
                </div>
                <div class="panel-body">
                    @foreach($posts as $post)
                        <!-- Post -->
                        <div class="col-md-10 col-md-offset-1 ">

                            <h3>
                                <a href="/el-nour/{{ $post->id }}"  style="color:#8e44ad;"> {{ $post->title }} </a>
                            </h3>

                            {{-- If you are user --}}
                            @if (Auth::check())
                                <!-- Edit & Delete -->
                                @if (Auth::user()->id == $post->user->id)
                                    <div class="dropdown">
                                        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            To<span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                                            
                                            <a href="/el-nour/{{ $post->id }}/edit">
                                                <button class="btn btn-link">Edit</button> 
                                            </a>  
                                            
                                             
                                            <form action="el-nour/{{ $post->id }}" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="btn btn-link" name="remove">Delete!</button>
                                            </form>  
                                        </ul>
                                    </div>
                                    <br/>
                                @endif
                                <!-- ./Edit & Delete -->
                            @endif

                            <img class="col-md-12" height="200" src="{{ Storage::url('posts/'. $post->image) }}" alt="{{ $post->title }}"/>

                            <hr class="col-md-12 col-md-offset-0"/>
                            
                            <p> {!! Markdown::convertToHtml(str_limit($post->content, 30)) !!}.</p>

                            <br>
                            
                           {{--  Linke category page --}}
                            <span>
                                <a href="/category/{{$post->article->id}}"> 
                                    {{ $post->article->name }} 
                                </a> 
                            </span>

                            {{--  Linke user page --}}
                           <span style="margin-left: 20px;"> 
                                By <a href="/publisher/{{$post->user->id}}">
                                    @if (Auth::check())
                                       {{ ($post->user->id == Auth::user()->id) ? 'You' : $post->user->name }}
                                    @else
                                        {{$post->user->name }}
                                    @endif
                                </a> 
                            </span>

                            <span style="float:right; color:#27ae60;">
                                seen by {{ count($post->viewer) != 0 ? count($post->viewer) : 'noone'}}
                            </span>

                            <span style="float:right; margin-right: 10px; color:#2980b9;">
                                liked by {{ count($post->likes) != 0 ? count($post->likes) : 'noone'}}
                            </span>

                            <span style="float:right; margin-right: 10px; color:#e74c3c;">
                            disliked by {{ count($post->dislikes) !=0 ? count($post->dislikes) : 'noone'}}
                            </span>
                        </div>

                        <div class="col-md-12">
                            <br/><hr style="border-color:#8e44ad;"/><br/>
                        </div>
                        <!-- ./Post -->
                    @endforeach

                    <div class="col-md-offset-5">
                        {{ $posts->links() ?? '' }}
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
