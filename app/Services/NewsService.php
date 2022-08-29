<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * Class NewsService
 * @package App\Services
 */
class NewsService
{
    // get everything
    public function getEverything($q = 'bitcoin', $sources = null, $domains = null, $exclude_domains = null, $from = null, $to = null, $language = null, $sort_by = null,  $page_size = null, $page = null)
    {
        $payload['q'] = $q;
        $response =  $this->call('everything', $payload);
        return $response;
    }

    // get top headlines
    public function getTopHeadLines($country = 'us', $category = null, $q = null, $sources = null, $page_size = null, $page = null)
    {
        // if query search is defiend
        if ($q) {
            $payload['q'] = $q;
        }

        // if source is defiend
        if ($sources) {
            $payload['sources'] = $sources;
        }

        // if country is defiend
        if ($country) {
            $payload['country'] = $country;
        }

        // if category is defiend
        if ($category) {
            $payload['category'] = $category;
        }

        // if page_size is defiend
        if ($page_size) {
            $payload['page_size'] = $page_size;
        }

        // if page is defiend
        if ($page) {
            $payload['page'] = $page;
        }

        $response =  $this->call('top-headlines', $payload);
        return $response;
    }


    // calling api call
    private function call($query, $payload = null)
    {
        $params = $payload ? http_build_query($payload) : $payload;
        $response = Http::withHeaders([
            'Authorization' => config('services.news_api_token'),
            'Accept' => 'application/json'
        ])->get('https://newsapi.org/v2/' . $query . '?' . $params);

        return $response->json();
    }
}
