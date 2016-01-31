<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Concert;
use Google_Client;
use Google_Service_YouTube;

class ConcertController extends Controller
{
    //
    const CONCERTS_PER_PAGE = 9;


    public function index(Request $request)
    {
      $concerts = Concert::orderBy('created_at', 'asc')->get();
      $villes = array();
      $tags = array();
      $prix = array();

      foreach ($concerts as $concert) {
          if (!in_array($concert->ville, $villes)){
            $villes[] = $concert->ville;
          }

          if (!in_array($concert->prix, $prix)){
            $prix[] = $concert->prix;
          }

          if (!in_array($concert->artist->tags, $tags)){
            $tags[] = $concert->artist->tags;
          }

      }
      $current_page = 0;
      $concert_count = count($concerts);
      $page_count = ($concert_count % SELF::CONCERTS_PER_PAGE) != 0 ? floor($concert_count/SELF::CONCERTS_PER_PAGE) + 1 : floor($concert_count/SELF::CONCERTS_PER_PAGE) ;

      return view('concerts', [
        'concerts' => $concerts,
        'villes' => $villes,
        'tags' => $tags,
        'prix' => $prix,
        'page_count' => $page_count,
        'current_page' => $current_page
    ]);
    }


    public function concert(Request $request, $concertId){
      $concert = Concert::where('id', $concertId)->first();
      $imagePath = "assets/images/" . $concert->artist->image;

      $client = new Google_Client();
      $client->setDeveloperKey("AIzaSyD0HX0kSeMKR_QWBYx-HE-6Wui9zL66ePU");
      $youtube = new Google_Service_YouTube($client);
      $searchResponse = $youtube->search->listSearch('id,snippet', array(
      'q' => $concert->artist->name,
      'type' => 'video',
      'maxResults' => 1,
    ));

    foreach ($searchResponse['items'] as $searchResult) {
     switch ($searchResult['id']['kind']) {
       case 'youtube#video':
         $youtubeVideoId =  $searchResult['id']['videoId'];
         break;
     }
   }
      return view('concert', [
        'imagePath' => $imagePath,
        'concert' => $concert,
        'videoUrl' => "http://www.youtube.com/embed/".$youtubeVideoId
      ]);
    }

    public function filter(Request $request){

      $city = $request->input('city');
      $tags = $request->input('tags');
      $price = $request->input('price');

      $matchThese = array();

      if ($city != 'unspecified'){
        $matchThese['ville'] = $city;
      }

      if ($price != 'unspecified'){
        $matchThese['prix'] = $price;
      }


      $concertsQueryBuilder = Concert::orderBy('concerts.created_at', 'asc');
      if ($tags != 'unspecified'){
        $matchThese['tags'] = $tags;
        $concertsQueryBuilder->join('artists', 'artists.id', '=', 'concerts.artist_id');
      }

      $concertsQueryBuilder->where($matchThese);
      $concerts = $concertsQueryBuilder->get();
      $villes = array();
      $tags = array();
      $prix = array();

      foreach ($concerts as $concert) {
          if (!in_array($concert->ville, $villes)){
            $villes[] = $concert->ville;
          }

          if (!in_array($concert->prix, $prix)){
            $prix[] = $concert->prix;
          }

          if (!in_array($concert->artist->tags, $tags)){
            $tags[] = $concert->artist->tags;
          }
      }
      
      $current_page = 0;
      $concert_count = count($concerts);
      $page_count = ($concert_count % SELF::CONCERTS_PER_PAGE) != 0 ? floor($concert_count/SELF::CONCERTS_PER_PAGE) + 1 : floor($concert_count/SELF::CONCERTS_PER_PAGE) ;

      return view('concert_list', [
        'concerts' => $concerts,
        'villes' => $villes,
        'tags' => $tags,
        'prix' => $prix,
        'page_count' => $page_count,
        'current_page' => $current_page
    ]);
    }

    public function getPage(Request $request, $pageIndex){
      $city = $request->input('city');
      $tags = $request->input('tags');
      $price = $request->input('price');

      $matchThese = array();

      if ($city != 'unspecified'){
        $matchThese['ville'] = $city;
      }

      if ($price != 'unspecified'){
        $matchThese['prix'] = $price;
      }


      $concertsQueryBuilder = Concert::orderBy('concerts.created_at', 'asc');
      if ($tags != 'unspecified'){
        $matchThese['tags'] = $tags;
        $concertsQueryBuilder->join('artists', 'artists.id', '=', 'concerts.artist_id');
      }

      $concertsQueryBuilder->where($matchThese);
      $concerts = $concertsQueryBuilder->get();
      $villes = array();
      $tags = array();
      $prix = array();

      foreach ($concerts as $concert) {
          if (!in_array($concert->ville, $villes)){
            $villes[] = $concert->ville;
          }

          if (!in_array($concert->prix, $prix)){
            $prix[] = $concert->prix;
          }

          if (!in_array($concert->artist->tags, $tags)){
            $tags[] = $concert->artist->tags;
          }

      }
      $current_page = $pageIndex - 1;
      $concert_count = count($concerts);
      $page_count = ($concert_count % SELF::CONCERTS_PER_PAGE) != 0 ? floor($concert_count/SELF::CONCERTS_PER_PAGE) + 1 : floor($concert_count/SELF::CONCERTS_PER_PAGE) ;

      return view('concert_list', [
        'concerts' => $concerts,
        'villes' => $villes,
        'tags' => $tags,
        'prix' => $prix,
        'page_count' => $page_count,
        'current_page' => $current_page
    ]);
    }
}
