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
            if($data){
                // print_r(count($data));
                return view('home', ['data' => $data]) ;

            }
            return null;
        } 
        catch (\Exception $e) {
            throw ('API request failed ' . $e->getMessage());
            return null;
        }
    }

    public function coinDetails($id)
    {
        try{
            $data = $this->coinGeckoApiService->getCoinInfo($id);
            if($data){
                return view('home',$data) ;
                // print_r(count($data));
            }
            return null;
        } 
        catch (\Exception $e) {
            throw ('API request failed ' . $e->getMessage());
            return null;
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
