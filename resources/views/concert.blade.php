@extends('layouts.app')
@section('content')

<script>
var address = "{{$concert->adresse}}, {{$concert->ville}}, France";
</script>
<script src="{{asset('assets/js/concerts.js')}}" ></script>
<div class="row">
      <div class="col-sm-8">
        <div><h3> {{$concert->artist->name}} @  {{$concert->ville}} </h3>
        </div>
        <div>
          <center><img src="{{asset($imagePath)}}" style="max-width: 100%"></center>
        </div>
      </br>
        <div id="description">
          <p>
            {{$concert->artist->description}}
          </p>
        </div>
      </div>
      <div class="col-sm-4" style="border:1px solid black">
          <h3> Pré-commandez </h3>
          <h4> Commander votre place pour le concert de {{$concert->artist->name}} </h4>
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>Date</td>
                  <td>{{$concert->date}}</td>
                </tr>
                <tr>
                  <td>Lieu</td>
                  <td>{{$concert->lieu}}</td>
                </tr>
                <tr>
                  <td>Adresse</td>
                  <td>{{$concert->adresse}}</td>
                </tr>
                <tr>
                  <td>Ville</td>
                  <td>{{$concert->ville}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <center><div id="googleMap" style = "width:250px; height:250px"></div></center>
          <br/>
          <div>
            <center>
            <button type="button" class="btn btn-default">Commandez</button>
            </center>
          </div>
          <br/>
      </div>
</div>
<div class="row">
  <div>
    <h3>Vidéo de l'artiste </h3>
  </div>
  <iframe id="ytplayer" type="text/html" width="640" height="390"
  src={{$videoUrl}} frameborder="0"/>
</div>

@endsection
