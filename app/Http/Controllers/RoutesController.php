<?php

namespace App\Http\Controllers;

use App\Routes;
use App\Coords;
use Illuminate\Http\Request;
use App\Http\Resources\RouteCollection;

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
        
        return routes::find(2);
        
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
    public function show(Routes $routes, Request $request)
    {
        $coordData = coords::all();
        
        $returnArray = [];
        $point = null;

        foreach ($coordData as $item){
            $routeData = routes::where('wall_location', $item->id)->get();
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
                "name"=>$item->id,
                "shape"=>"circle",
                "coords"=>$arrCoords,
                "preFillColor"=>$diffColor
            ];


            array_push($returnArray, $point); 
            
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
        //
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
        //
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
}
