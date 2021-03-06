<?php

namespace App\Http\Controllers;

use App\Routes;
use App\Coords;
use Illuminate\Http\Request;
use App\Http\Resources\RouteCollection;
use Carbon\Carbon;

use function GuzzleHttp\json_encode;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = new RouteCollection(routes::all());

        $sorted = $collection->sortBy('wall_location');
        
        return $sorted->all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function show(Routes $routes)
    {
        $coordData = coords::all();
        
        $returnArray = [];
        $point = null;

        foreach ($coordData as $item){
            $routeData = routes::where('wall_location', $item->id)->get();
            
            if($routeData){
            $routeDiff = $routeData[0]->difficulty;
        
           switch($routeDiff){
               case "5.7": $diffColor = "red"; break;
               case "5.8": $diffColor = "yellow"; break;
               case "5.9": $diffColor = "green"; break;
               case "5.10": $diffColor = "white"; break;
               case "5.11": $diffColor = "blue"; break;
               case "5.12": $diffColor = "black"; break;
               case "5.13": $diffColor = "purple"; break;
           }
   
                
            $editCoords = str_replace(str_split('[] '), '', $item->coords);
            $arrCoords = explode(",", $editCoords);

            for($i = 0; $i <= 2; $i++){
                $arrCoords[$i] = intval($arrCoords[$i]);
            }

            $point = [
                "name"=>strval($item->id),
                "shape"=>"circle",
                "coords"=>$arrCoords,
                "preFillColor"=>$diffColor
            ];


            array_push($returnArray, $point); 
          } 
        }
        return $returnArray;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function edit(Routes $routes)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Routes $routes)
    {
        Routes::where('id', request('id'))->update(['difficulty' => request('diff')]);
        Routes::where('id', request('id'))->update(['type' => request('type')]);
        Routes::where('id', request('id'))->update(['set_date' => Carbon::now()]);
        Routes::where('id', request('id'))->update(['expire_date' => Carbon::now()->addDays(30)]);

        

        return response()->json('Success!! Maybe...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Routes $routes)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function showOne(Routes $routes)
    {
        $routeData = Routes::all()->where('wall_location' , request('id'));
        
        return $routeData;
    }
}
