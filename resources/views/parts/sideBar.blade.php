<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-body">
           <div class="col-md-12">
                <br/>
                <a class="btn btn-success" href="/el-nour/create"> To add a new Post </a>
                
                <hr style="border-color:#8e44ad;"/>
               
                <h2 style="color:#8e44ad;" >Categories:</h2>
                <ul class="list-unstyled">
	                @foreach($articles as $article)
	                	<li>
		                	<a href="/category/{{$article->id}}"> 
		                		{{$article->name}}
		                	</a>
	                	</li>
	                @endforeach
            	</ul>

            	<hr style="border-color:#8e44ad;"/>

            	<h2 style="color:#8e44ad;" >Show list by:</h2>
            	<ul class="list-unstyled">
                    <li><a href="/viewers">Most viewers</a></li>
            	    <li><a href="/likes">Most likes</a></li>
                    <li><a href="/popular">Most popular</a></li>
            	</ul>
            	
            </div>
        </div>
    </div>
</div>