<?php
namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\RequestException;

class CoinGeckoApiService {
    protected $baseUri;
    protected $apiKey;
    protected $cacheDuration;

    public function __construct()
    {
        $this->baseUri = config('services.coingecko_api.base_url');
        $this->apiKey = config('services.coingecko_api.api_key');
        $this->cacheDuration = 60 * 60;
        
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

   
    public function getCoinsList($page = 1, $resultsPerPage =20){

        $cacheKey = 'coins_list_' . $page . '_' . $resultsPerPage;
        return Cache::remember($cacheKey, $this->cacheDuration, function () use ($page, $resultsPerPage) {
            try {
                $response = Http::withHeaders([
                    'x-cg-demo-api-key' => $this->apiKey,
                ])->get($this->baseUri . '/coins/markets', [
                    'vs_currency' => 'usd',
                    'page' => $page,
                    'per_page' => $resultsPerPage,
                    'price_change_percentage' => '7d,30d'
                ]);
                if ($response->successful()) {
                    return $response->json();
                }
                return $response->json();
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                // throw new Exception('Error getting test api: ');
            }
        });
    }

    public function getMoreCoins($page = 2, $resultsPerPage = 20){

        $cacheKey = 'coins_list_' . $page . '_' . $resultsPerPage;
        return Cache::remember($cacheKey, $this->cacheDuration, function () use ($page, $resultsPerPage) {
            try {
                $response = Http::withHeaders([
                    'x-cg-demo-api-key' => $this->apiKey,
                ])->get($this->baseUri . '/coins/markets', [
                    'vs_currency' => 'usd',
                    'page' => $page,
                    'per_page' => $resultsPerPage
                ]);
                if ($response->successful()) {
                    return $response->json();
                }
                return $response->json();
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                // throw new Exception('Error getting test api: ');
            }
        });
    }

    public function getCoinInfo($id){

        $cacheKey = 'coins_info_' . $id;
        return Cache::remember($cacheKey, $this->cacheDuration, function () use ($id) {
            try {
                $response = Http::withHeaders([
                    'x-cg-demo-api-key' => $this->apiKey,
                ])->get($this->baseUri . '/coins/' . $id, [
                    'tickers' => 'true'
                ]);
                if ($response->successful()) {
                    return $response->json();
                }
                return $response->json();
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                // throw new Exception('Error getting test api: ');
            }
        });
    }
    
}
 
?>
