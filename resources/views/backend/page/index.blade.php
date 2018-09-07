@extends('backend.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pages</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ asset('/create/page') }}"> Create New Page</a>
            </div>
        </div>
    </div>

{{-- 
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}


    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Title EN</th>
            <th>Body EN</th>
            <th>page link</th>
            <th>Tag en</th>
            <th>created_by</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($pages as $page)
    <tr>
    	<td>{{$page->id}}</td>
        <td>{{$page->title_en}}</td>
        <td>{{$page->body_en}}</td>
        <td>{{$page->tag_en}}</td>
        <td>{{$page->page_link}}</td>
        <td>{{Auth::user()->name}}</td>
        <td>
	        <a class="btn btn-danger" href="{{url('/show/allpages/'.$page->id.'/delete/') }}">Delete</a>
            <a class="btn btn-warning" href="{{url('/show/allpages/'.$page->id.'/edit/') }}">Edit</a>
        </td>
    </tr>
    @endforeach
    </table>
@endsection