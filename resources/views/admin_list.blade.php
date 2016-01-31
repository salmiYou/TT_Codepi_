@extends('layouts.app')
@section('content')
<div class="row">
  <div class="panel panel-default">
    <div class="panel-body">
        <div class="dataTable_wrapper">
          <table class="table table-striped table-bordered table-hover" id="dataTable">
            <thead>
                <tr>
                  <th>Artiste</th>
                  <th>Date</th>
                  <th>Lieu</th>
                  <th></th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
              @foreach ($concerts as $concert)
              <tr>
              <td>{{$concert->artist->name}}</td>
              <td>{{$concert->date}}</td>
              <td>{{$concert->lieu}}</td>
              <td><button class="btn btn-primary" onClick="editConcert({{$concert->id}})"> Éditer</button></td>
              <td><button class="btn btn-danger" onClick="deleteConcert({{$concert->id}})"> Supprimer</button></td>
            </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
    $('#dataTable').DataTable({
       "bFilter": false
    });
});

function deleteConcert($id){
  $.post("admin/delete/{{$concert->id}}",
   {
       _token : "{{ csrf_token() }}"
   },
   function(data, status){
     location.reload();
   });
}

function editConcert($id){
  window.location.href = "admin/edit/" + $id;
}
</script>
@endsection
