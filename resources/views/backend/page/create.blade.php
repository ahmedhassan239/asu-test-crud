@extends('backend.layout.master')
@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
    <form method="post" action="{{url('/create/page')}}" enctype="multipart/form-data">
	           <input type="hidden" name="_token" value="{{csrf_token()}}">
	        <div class="form-group">
	            <label for="title">English Title</label>
	            <input type="text" class="form-control" name="title_en"/>
	        </div>
	        <div class="form-group">
	            <label>Arabic Title</label>
	            <input type="text" class="form-control" name="title_ar"/>
	        </div>
	        <div class="form-group">
	            <label>English Body</label>
	            <textarea cols="5" rows="5" class="form-control" name="body_en"></textarea>
	        </div>
	        <div class="form-group">
	            <label>Arabic Body</label>
	            <textarea cols="5" rows="5" class="form-control" name="body_ar"></textarea>
	        </div>
	        <div class="form-group">
	            <label>Page Link</label>
	            <input type="text" class="form-control" name="page_link"/>
	        </div>
	        <div class="form-group">
	            <label>English Tag</label>
	            <input type="text" class="form-control" name="tags_en"/>
	        </div>
	        <div class="form-group">
	            <label>Arabic Tag</label>
	            <input type="text" class="form-control" name="tags_ar"/>
	        </div>
	        <div class="form-group">
	            <label>Meta description</label>
	            <input type="text" class="form-control" name="meta_desc"/>
	        </div>
	        <div class="form-group">
	            <label>File input</label>
	            <input  name="image_url" type="file">
	        </div>
	      	<input type="submit" class="btn btn-primary">

	    </form>
    </div>
</div>
@endsection