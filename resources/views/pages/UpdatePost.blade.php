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
                    
                    <!-- Title -->
                    <div class="col-md-12">
                        <h1> Update post: </h1>
                        <hr/><br/>
                    </div>
                    <!-- ./Title -->

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/el-nour/' . $post->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-2 control-label">Title: </label>

                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') ?? $post->title }}" autofocus required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-md-2 control-label">Post image: </label>

                            <div class="col-md-10">
                                <input id="image" type="file" class="form-control" name="image" >

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-2 control-label">Content: </label>

                            <div class="col-md-10">
                                <textarea id="content" rows="8" class="form-control" name="content" required>{{ old('content') ?? $post->content  }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('article') ? ' has-error' : '' }}">
                            <label for="article" class="col-md-2 control-label">Article: </label>

                            <div class="col-md-10">
                                <select class="form-control"  name='article_id'>
                                 	@foreach ($articles as $artilce)
		                                @if ($post->article_id == $artilce['id'])
									    	<option value="{{ $artilce['id'] }}" selected> {{ $artilce['name'] }} </option>
										@else
										    <option value="{{ $artilce['id'] }}"> {{ $artilce['name'] }} </option>
										@endif
									@endforeach
								</select>

                                @if ($errors->has('article'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('article') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    
                        

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-0">
                                <button type="submit" class="btn btn-primary">
                                    Update post 
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
