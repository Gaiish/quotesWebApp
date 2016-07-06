@extends ('layouts.master')

@section('title')
Trending quotes
@endsection

@section('styles')
<link href="/src/css/font-awesome.min.css" rel="stylesheet">
@endsection

@section ('content')

@if (! empty(Request::segment(1)))
<div class="alert alert-warning">
  Filter set! <a href="{{route('index')}}">Show all quotes</a>
</div>
@endif

@if (count($errors) > 0)
  <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        {{$error}}
      @endforeach
  </div>
@endif
@if (Session::has('success'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>
      <i class="fa fa-check-circle fa-lg fa-fw"></i>Success. &nbsp;
    </strong>
    {{Session::get('success')}}
  </div>
@endif
<div class="row">
  <h1 align="center">Latest Quotes</h1>
  <div class="row">

    @for($i=0;$i<count($quotes);$i++)
    <div class="col-xs-12 col-md-4">
      <div class="well quote">
        <div class="pull-right delete">
          <a href="{{ route('delete', ['quote_id' => $quotes[$i]->id]) }}">&times;</a>
        </div><br>
        <div class="lead">
          {{ $quotes[$i]->quote }}
        </div>
        <div class="info">
          <small>Created by <a href="{{route('index', $quotes[$i]->author->name)}}">
            {{$quotes[$i]->author->name}}</a> on {{$quotes[$i]->created_at}}
          </small>
        </div>
      </div>
    </div>
    @endfor

  </div>
  <div class="row" align="center">
    {{$quotes->links()}}
  </div>
</div>
<div class="row edit-quote">
  <h1 align="center">Add a Quote</h1><br>
  <div class="col-xs-offset-1 col-xs-10 col-md-offset-3 col-md-6">
    <form class="form" method="POST" action="{{ route('create') }}">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group">
        <label for="name">Your Name </label>
        <input name="author" id="name" placeholder="your name" class="form-control">
      </div>
      <div class="form-group" >
        <label for="quote">Your Quote</label>
        <textarea name="quote" id="quote" rows="4" placeholder="your quote" class="form-control"></textarea>
      </div>
      <div>
      <button type="submit" class="btn btn-danger">Submit Quote</button>
      </div>
    </form>
  </div>
  </div>
@endsection
