<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    //
    public function show(Request $request)
    {

        try{
            $authUser = Auth::user();
            if($authUser){
                $portfolio = Portfolio::where('user_id', $authUser->id)->get();
                return view('portfolio', ['data' => $portfolio]) ;
            } else {
                return view('portfolio', ['data' => 'test']) ;
            }
            // $data = $this->coinGeckoApiService->getCoinsList();
            // if(isset($data['error'])){
            //     return response()->json($data, 500);
            // }
            // print_r(count($data));

        } 
        catch (\Exception $e) {
            return response ('API request failed ' . $e->getMessage()); 
        }
    }
}
