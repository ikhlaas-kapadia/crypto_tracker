<?php

namespace App\Http\Controllers;

use App\Services\CoinGeckoApiService;
use Illuminate\Http\Request;

class CoinGeckoController extends Controller
{
    protected $coinGeckoApiService;
    
    public function __construct(CoinGeckoApiService $apiService)
    {
        $this->coinGeckoApiService = $apiService;
    }

    public function coinsList()
    {
        try{
            $data = $this->coinGeckoApiService->getCoinsList();
            if(isset($data['error'])){
                return response()->json($data, 500);
            }
            // print_r(count($data));
            return view('home', ['data' => $data]) ;
        } 
        catch (\Exception $e) {
            return response ('API request failed ' . $e->getMessage()); 
        }
    }

    public function coinDetails($id)
    {
        try{
            $data = $this->coinGeckoApiService->getCoinInfo($id);
            if(isset($data['error'])){
                return response()->json($data, 500);
            }
                return view('coin-info', ['data' => $data]) ;
                // print_r(count($data));
        } 
        catch (\Exception $e) {
            return response ('API request failed ' . $e->getMessage()); 
        }
    }


    public function test()
    {

        try{
            $data = $this->coinGeckoApiService->getTest();
            if($data){
                return response()->json($data);
            }
            return null;
        } 
        catch (\Exception $e) {
            throw ('API request failed ' . $e->getMessage());
            return null;
        }
        
    }

}
