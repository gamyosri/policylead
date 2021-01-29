<?php


namespace App\Helpers;


use App\Models\Article;
use Carbon\Carbon;
use Goutte\Client;
use Illuminate\Support\Facades\Http;

class ScarpingHelper
{


    public function getXmlContentFrom(String $url)
    {
        $response = Http::get($url);

        return $response->body();
    }

    public function xmlCotnentToArray(String $xml_string){
        $xml = simplexml_load_string($xml_string);
        $json = json_encode($xml);

        return json_decode($json,TRUE);
    }

    public function saveArrayItems(array $items){
        foreach($items as $item){
            try {
            Article::create([
                'title' => $item['title'],
                'link' => $item['link'],
                'date' => Carbon::parse($item['pubDate']),
                'excerpt' => $item['description'],
                'fulltext'=>$this->getFullTextFromArticle($item['link']),
            ]);
            } catch (\Exception $exception)
            {
                continue;
            }
        }
    }

    public function scrapeSite()
    {
        $xml_string = $this->getXmlContentFrom('https://www.spiegel.de/politik/index.rss');
        $items = $this->xmlCotnentToArray($xml_string);
        $articles = $items['channel']['item'];
        $this->saveArrayItems($articles);
    }

    public function getFullTextFromArticle(String $url)
    {
        $client=new Client();
        $page = $client->request('GET',$url);
        $nodes = $page->filter('.RichText p')->each(function ($node) {
            return  $node->text();
        });

        return collect($nodes)->implode(PHP_EOL);
    }
}
