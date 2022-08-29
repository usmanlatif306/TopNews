<?php

namespace App\Console\Commands;

use App\Models\Headline;
use App\Models\HeadlineDetail;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Console\Command;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Str;

class FetchNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:fetch {country=gb}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will fetch news';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // top headlines
        $headlines = (new NewsService())->getTopHeadLines($this->argument('country'));
        $this->save_results($headlines);

        // sports
        $sports = (new NewsService())->getTopHeadLines($this->argument('country'), 'sports');
        $this->save_results($sports, 'sports');

        // business
        $business = (new NewsService())->getTopHeadLines($this->argument('country'), 'business');
        $this->save_results($business, 'business');

        // entertainment
        $entertainment = (new NewsService())->getTopHeadLines($this->argument('country'), 'entertainment');
        $this->save_results($entertainment, 'entertainment');

        // health
        $health = (new NewsService())->getTopHeadLines($this->argument('country'), 'health');
        $this->save_results($health, 'health');

        // science
        $science = (new NewsService())->getTopHeadLines($this->argument('country'), 'science');
        $this->save_results($science, 'science');

        // technology
        $technology = (new NewsService())->getTopHeadLines($this->argument('country'), 'technology');
        $this->save_results($technology, 'technology');
    }

    // saving results is database
    private function save_results($payload, $category = 'top_headline')
    {
        // is payload is successfull
        if ($payload['status'] === 'ok') {
            foreach ($payload['articles'] as $article) {
                $headline = News::where('title', $article['title'])->first();

                if (!$headline) {
                    $top_headline = News::create([
                        'title' => $article['title'],
                        'author' => $article['author'],
                        'image' => $article['urlToImage'],
                        'url' => $article['url'],
                        'category' => $category
                    ]);
                    $top_headline->news_description()->create([
                        'description' => $article['description'],
                        'content' => $article['content'],
                    ]);
                }
            }
            $message = str_replace("_", " ", $category);

            $this->info(ucwords($message) . ' news saved successfully!');
        }
        // if payload has error
        elseif ($payload['status'] === 'error') {

            $this->error($payload['message']);
        }
        // if error is unknown
        else {

            $this->error('Something went wrong!');
        }
    }
}
