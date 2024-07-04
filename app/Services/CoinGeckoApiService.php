<?php
namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class CoinGeckoApiService {
    protected $baseUri;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUri = config('services.coingecko_api.base_url');
        $this->apiKey = config('services.coingecko_api.api_key');
        
    }

    public function getTest(){
        try {
            $response = Http::withHeaders([
                'x-cg-demo-api-key' => $this->apiKey,
            ])->get($this->baseUri . '/ping');
           
            if ($response->successful()) {
                return $response->json();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Unable to fetch coins list. Please try again later.'], 500);
        }
    }

   
    public function getCoinsList(){
        try {
            $response = Http::withHeaders([
                'x-cg-demo-api-key' => $this->apiKey,
            ])->get($this->baseUri . '/coins/markets', [
                'vs_currency' => 'usd',
                'page' => 1,
                'per_page' => 20
            ]);
            if ($response->successful()) {
                return $response->json();
            }
            return $response->json();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            // throw new Exception('Error getting test api: ');
        }
    }

    public function getMoreCoins(){
        try {
            $response = Http::withHeaders([
                'x-cg-demo-api-key' => $this->apiKey,
            ])->get($this->baseUri . '/coins/markets', [
                'vs_currency' => 'usd',
                'page' => 1,
                'per_page' => 20
            ]);
            if ($response->successful()) {
                return $response->json();
            }
            return $response->json();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            // throw new Exception('Error getting test api: ');
        }
    }

    public function getCoinInfo($id){
        try {
            $response = Http::withHeaders([
                'x-cg-demo-api-key' => $this->apiKey,
            ])->get($this->baseUri . '/coins/' . $id, [
                'vs_currency' => 'usd',
                'page' => 1,
                'per_page' => 20
            ]);
            if ($response->successful()) {
                return $response->json();
            }
            return $response->json();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            // throw new Exception('Error getting test api: ');
        }
    }

    
}
 
?>
