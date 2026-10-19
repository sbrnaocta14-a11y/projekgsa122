<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | MENAMPILKAN HALAMAN ABOUT / NEWS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | BERITA MANUAL
        |--------------------------------------------------------------------------
        */

        $manualNews = News::latest()->get();

        /*
        |--------------------------------------------------------------------------
        | BERITA OTOMATIS
        |--------------------------------------------------------------------------
        |
        | BAGIAN $news TETAP DIISI OLEH SISTEM NEWS OTOMATIS KAMU.
        |
        | Untuk sementara kita siapkan array kosong sebagai fallback.
        |
        */

        $news = $this->getAutomaticNews();

        return view('about', compact(
            'news',
            'manualNews'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | FORM TAMBAH BERITA
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('news-create');
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN BERITA BARU
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'date' => 'nullable|date',
            'description' => 'required|string',
            'link' => 'nullable|url|max:1000',
            'show_on_home' => 'nullable|boolean',
        ]);

        News::create([
            'title' => $request->title,
            'source' => $request->source,
            'date' => $request->date,
            'description' => $request->description,
            'link' => $request->link,
            'show_on_home' => $request->has('show_on_home'),
        ]);

        return redirect('/about')
            ->with('success', 'News berhasil ditambahkan!');
    }


    /*
    |--------------------------------------------------------------------------
    | FORM EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(News $news)
    {
        return view('news-edit', compact('news'));
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE BERITA
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'source' => 'required|string|max:255',
            'date' => 'nullable|date',
            'description' => 'required|string',
            'link' => 'nullable|url|max:1000',
            'show_on_home' => 'nullable|boolean',
        ]);

        $news->update([
            'title' => $request->title,
            'source' => $request->source,
            'date' => $request->date,
            'description' => $request->description,
            'link' => $request->link,
            'show_on_home' => $request->has('show_on_home'),
        ]);

        return redirect('/about')
            ->with('success', 'News berhasil diperbarui!');
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS BERITA
    |--------------------------------------------------------------------------
    */

    public function destroy(News $news)
    {
        $news->delete();

        return redirect('/about')
            ->with('success', 'News berhasil dihapus!');
    }


    /*
    |--------------------------------------------------------------------------
    | BERITA OTOMATIS
    |--------------------------------------------------------------------------
    |
    | JANGAN HAPUS SISTEM NEWS OTOMATIS LAMA KAMU.
    |
    | Nanti isi method ini kita sambungkan ke sistem otomatis
    | yang sekarang sudah kamu gunakan.
    |
    */

    private function getAutomaticNews()
    {
        return [];
    }
}