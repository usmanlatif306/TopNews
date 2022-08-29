<?php

namespace App\Services;

use NewsdataIO\NewsdataApi;

/**
 * Class NewsDataService
 * @package App\Services
 */
class NewsDataService
{
    private $newsDataObj;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->newsDataObj = new NewsdataApi(config('services.news_data_key'));
    }

    // getting latest news
    public function getLatestNews($query)
    {
        $response = $this->newsDataObj->get_latest_news($query);
        return $response;
        // $this->response($response);
    }

    // getting crpto news
    public function getCryptoNews($query)
    {
        $response = $this->newsDataObj->get_crypto_news($query);
        return $response;
        // $this->response($response);
    }

    // getting news sources
    public function newsSources($query)
    {
        $response = $this->newsDataObj->news_sources($query);
        return $response;
        // $this->response($response);
    }

    // getting news archive
    public function newsArchive($query)
    {
        $response = $this->newsDataObj->news_archive($query);
        return $response;
        // $this->response($response);
    }

    // sending response
    private function response($response)
    {
        // response is success
        if ($response->status === 'success') {
            return $response->results;
        } else {
            // response is error
            return $response->results->message;
        }
    }
}
