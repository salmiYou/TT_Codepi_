@extends('layouts.app')
@section('content')
<div>
  <h3> Éditer un concert </h3>
</div>

<form class="form-horizontal" role="form">
  <div class="form-group">
  <label class="control-label col-sm-2" for="sel1">Artiste:</label>
  <div class="col-sm-10">
    <select class="form-control" id="sel1">
      @foreach ($artists as $artist)
        @if ($artist->id === $currentConcert->artist->id)
        <option selected="selected">{{$currentConcert->artist->name}}</option>
        @else
        <option>{{$artist->name}}</option>
        @endif
      @endforeach
    </select>
  </div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" for="sel1">Artiste:</label>
<div class="col-sm-10">
  <select class="form-control" id="sel1">
    @foreach ($lieux as $lieu)
      @if ($lieu === $currentConcert->lieu)
      <option selected="selected">{{$currentConcert->lieu}}</option>
      @else
      <option>{{$lieu}}</option>
      @endif
    @endforeach
  </select>
</div>
</div>


</form>
@endsection
