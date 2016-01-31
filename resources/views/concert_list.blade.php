<div id="concert_list_panel" class="panel panel-default">
  <div class="panel-body">
     @for ($i=($current_page*9); $i < ((($current_page*9)+9) <= count($concerts) ? (($current_page*9)+9) : count($concerts)) ; $i++)
        @if(($i%3) === 0)
        <div class="row">
          @for ($j=$i; $j < (($i+3) <= count($concerts) ? ($i+3) : count($concerts)); $j++)
              <div class="col-sm-4">
                 <div>{{$concerts[$j]->artist->name}} @ {{$concerts[$j]->ville}}</div>
                 <div>
                   <center><img src="../resources/assets/images/{{$concerts[$j]->artist->image}}" style="max-width: 100%"></center>
                 </div>
                 <div>
                   <span class="pull-left">{{$concerts[$j]->date}}</span>
                   <span class="pull-right">Prix: {{$concerts[$j]->prix}}</i></span>
                 </div>

                  <div>
                    <span class="pull-left">{{$concerts[$j]->artist->tags}}</span>
                    <span class="pull-right"><a href="concert/{{$concerts[$j]->id}}">Voir les détails</a></i></span>
                  </div>
               </div>
            @endfor
        </div>
        @endif
     @endfor
</div>
</div>
