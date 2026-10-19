<?php

namespace App\Http\Controllers;

use App\Services\CoffeeNewsService;
use App\Models\News;

class AboutController extends Controller
{
    public function index(CoffeeNewsService $coffeeNews)
    {
        /*
        |--------------------------------------------------------------------------
        | AUTOMATIC COFFEE NEWS
        |--------------------------------------------------------------------------
        |
        | Berita otomatis tetap diambil dari CoffeeNewsService.
        | Bagian ini tidak diubah.
        |
        */

        $news = $coffeeNews->getNews(9);

        /*
        |--------------------------------------------------------------------------
        | MANUAL COFFEE NEWS
        |--------------------------------------------------------------------------
        |
        | Berita yang dibuat melalui website.
        | Semua pengunjung tetap dapat membaca berita.
        |
        */

        $manualNews = News::latest()->get();

        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE HALAMAN ABOUT
        |--------------------------------------------------------------------------
        */

        return view('about', compact(
            'news',
            'manualNews'
        ));
    }
}
