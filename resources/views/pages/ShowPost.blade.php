@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <!-- SideBar -->
        @include('parts/sideBar')
        <!-- ./SideBar -->

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-10 col-md-offset-1">

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


                        <img class="col-md-12" src="{{ Storage::url('posts/'. $post->image) }}" alt="{{ $post->title }}"/>

                        <div class="col-md-12">
                            <h3 style="color:#8e44ad;">{{ $post->title }}</h3>

                            <hr class="col-md-12 col-md-offset-0"/>

                            <p>{!!  Markdown::convertToHtml($post->content) !!}</p>

                            <br>

                            <hr class="col-md-12 col-md-offset-0"/>
                            
                            <div class='col-md-12'>

                                {{--  Linke category page --}}
                                <a href="/category/{{$post->article->id}}" class="col-md-4">
                                    {{ $post->article->name }}
                                </a>

                                {{--  Linke user page --}}
                                <a href="/publisher/{{$post->user->id}}" class="col-md-4">
                                    {{ $post->user->name }}
                                </a>

                                {{--  Linke --}}
                                @if($liked->isEmpty())
                                    <form method="POST" action="{{ url('/like/' . $post->id) }}">
                                        {{ csrf_field() }}
                                        <button class="like btn btn-default  col-md-2">
                                        I like it</button> 
                                    </form>
                                @else
                                    <span style="float:left; margin:0px 5px; font-size:18px; color:#2980b9;"> 
                                        likes: {{ count($post->likes) }}
                                    </span>  
                                @endif

                                {{--  Dislinke --}}
                                @if($disliked->isEmpty())
                                    <form method="POST" action="{{ url('/dislike/' . $post->id) }}">
                                        {{ csrf_field() }}
                                       <button class="btn btn-danger  col-md-2">I don't like it</button> 
                                    </form>
                                @else
                                    <span style="margin:0px 5px; font-size:18px; color:#e74c3c;"> 
                                       dislikes: {{ count($post->dislikes) }}
                                    </span>  
                                @endif
                                
                            </div>

                            <br/><br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
