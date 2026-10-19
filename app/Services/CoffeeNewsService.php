<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class CoffeeNewsService
{
    public function getNews($limit = 9)
    {
        $cacheKey = 'coffee_news_all';

        // Gunakan berita yang sudah tersimpan jika tersedia.
        $cachedNews = Cache::get($cacheKey);

        if (is_array($cachedNews) && count($cachedNews) > 0) {
            return array_slice($cachedNews, 0, $limit);
        }

        try {
            $response = Http::timeout(15)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 CanoDeVasco/1.0',
                    'Accept' => 'application/rss+xml, application/xml, text/xml',
                ])
                ->get('https://perfectdailygrind.com/feed/');

            if (!$response->successful()) {
                return [];
            }

            libxml_use_internal_errors(true);
            $xml = simplexml_load_string($response->body());
            libxml_clear_errors();

            if (
                $xml === false ||
                !isset($xml->channel->item)
            ) {
                return [];
            }

            $articles = [];

            foreach ($xml->channel->item as $item) {
                $title = trim((string) $item->title);
                $link = trim((string) $item->link);
                $description = trim((string) $item->description);
                $date = trim((string) $item->pubDate);

                if ($title === '' || $link === '') {
                    continue;
                }

                $description = html_entity_decode(
                    strip_tags($description),
                    ENT_QUOTES | ENT_HTML5,
                    'UTF-8'
                );

                $description = preg_replace('/\s+/', ' ', $description);

                if (mb_strlen($description) > 220) {
                    $description = mb_substr($description, 0, 220) . '...';
                }

                $articles[] = [
                    'title' => $title,
                    'link' => $link,
                    'description' => $description,
                    'date' => $date,
                    'source' => 'Perfect Daily Grind',
                ];
            }

            if (count($articles) > 0) {
                Cache::put(
                    $cacheKey,
                    $articles,
                    now()->addMinutes(30)
                );

                return array_slice($articles, 0, $limit);
            }

            return [];

        } catch (\Throwable $e) {
            report($e);

            return [];
        }
    }
}