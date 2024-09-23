<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;

class HomeController extends Controller
{
    
    public function __invoke(){
        //Utilizo la API cocktaildb
        $client = new Client([
            'base_uri' => "www.thecocktaildb.com/api/json/v1/1/"
            ]);
    
        $imagesArray = array();
        for ($i = 0; $i < 8; $i++){
            $response = $client->request('GET','random.php');
            $tragosJson = json_decode($response->getBody());
            $tragoImageUrl = (($tragosJson->drinks)[0])->strDrinkThumb;
            array_push($imagesArray, $tragoImageUrl);
        }
    
        return view('home')->with('imagesArray',$imagesArray);
    }
    
   
}
