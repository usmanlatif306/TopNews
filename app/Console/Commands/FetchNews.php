<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\News;
use App\Services\NewsDataService;
use Illuminate\Console\Command;
use Stichoza\GoogleTranslate\GoogleTranslate;

class FetchNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:fetch {--country=*} {--pages=1}';

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
        $pages = (int)$this->option('pages') - 1;
        $countries = $this->option('country');

        if ($pages < 0) {
            $this->error('Invalid page numbers, should be greater then 0');
        } else {
            $categories = News::categories();

            // fetching news based on different countries
            foreach ($countries as $country) {
                // fetching different categories news
                foreach ($categories  as $category) {
                    // fetching news pages as come from request
                    for ($page = 0; $page <= $pages; $page++) {
                        $query = array("country" => $country, "category" => $category, "page" => $page);
                        $top_headlines = (new NewsDataService())->getLatestNews($query);
                        $this->save_results($top_headlines, $country, $category, $page + 1);
                    }
                }
            }
        }
    }

    // saving results is database
    private function save_results($response, $country, $category = 'top', $page)
    {
        // is payload is successfull
        if ($response->status === 'success') {
            foreach ($response->results as $article) {
                // if news has image and content then save to db
                if ($article->image_url && $article->content) {
                    $result = News::where('title', $article->title)->first();
                    if (!$result) {
                        $news = News::create([
                            'title' => $article->title,
                            'author' => $article->creator ? $article->creator[0] : null,
                            'source' => $article->source_id,
                            'image' => $article->image_url,
                            'url' => $article->link,
                            'category' => $category,
                            'country' => $country
                        ]);
                        $news->news_description()->create([
                            'description' => $article->description,
                            'content' => $article->content,
                        ]);
                    }
                }
            }

            $country_name = ucwords($article->country[0]);
            // storing country in db
            $old_country = Country::whereCode($country)->first();
            if (!$old_country) {
                Country::create([
                    'name' => $country_name,
                    'code' => $country
                ]);
            }
            $message = str_replace("_", " ", $category);

            $this->info(ucwords($message) . ' news for ' . $country_name . ' page(' . $page . ') saved successfully!');
        }
        // if payload has error
        elseif ($response->status === 'error') {

            $this->error($response->results->message);
        }
        // if error is unknown
        else {

            $this->error('Something went wrong!');
        }
    }
}
