@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-body">
  <div class="row">
      <div class="col-sm-2">Filter</div>
        <div class="col-sm-2">
        <select id="city_select">
          <option value="unspecified" selected>Ville</option>
           @foreach ($villes as $ville)
            <option value={{$ville}}>{{$ville}}</option>
           @endforeach
        </select>
      </div>

      <div class="col-sm-2">
        <select id="tags_select">
          <option value="unspecified" selected>Tags</option>
          @foreach ($tags as $tag)
           <option value={{$tag}}>{{$tag}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-sm-2">
        <select id="price_select">
          <option value="unspecified" selected>Prix</option>
          @foreach ($prix as $price)
           <option value={{$price}}>{{$price}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-sm-2">entre le
        <select>
          <option value="unspecified">Debut</option>
        </select>
      </div>
      <div class="col-sm-2">
        et le
        <select>
          <option value="unspecified" selected>Fin</option>
        </select>
      </div>
  </div>
</div>
</div>

@include('concert_list')
<div class="panel-footer">
    <center>
     <ul id="pagination" class="pagination">
      </ul>
    </center>
</div>
<script>
$('#pagination').twbsPagination({
        totalPages: {{$page_count}},
        visiblePages: {{$page_count}},
        onPageClick: function (event, page) {
              $.post("" + page,
               {
                 _token : "{{ csrf_token() }}",
                 city: $("#city_select option:selected" ).val(),
                 tags: $("#tags_select option:selected" ).val(),
                 price:$("#price_select option:selected" ).val(),
               },
               function(data, status){
                   $('#concert_list_panel').replaceWith(data);
               });
        }
    });


$('#city_select').change(refreshResult);
$('#tags_select').change(refreshResult);
$('#price_select').change(refreshResult);

function refreshResult(){
  $.post("",
   {
       _token : "{{ csrf_token() }}",
       city: $("#city_select option:selected" ).val(),
       tags: $("#tags_select option:selected" ).val(),
       price:$("#price_select option:selected" ).val(),
   },
   function(data, status){
       $('#concert_list_panel').replaceWith(data);
   });
}
</script>
@endsection
