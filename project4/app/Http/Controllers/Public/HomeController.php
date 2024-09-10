<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\MainDestination;
use App\Models\Review;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage()
    {
        $sliders = Slider::all();
        $reviews = Review::with('subDestination')->get();
        $articles = Article::take(3)->orderBy('created_at', 'DESC')->get();
        $contact = Contact::first();
        $maindestinations = MainDestination::with(['subDestinations.Gallery' => function ($query) {
            $query->orderBy('created_at', 'DESC')->take(8);
        }])->get();

        $data = [
            'contact' => $contact,
            'sliders' => $sliders,
            'reviews' => $reviews,
            'maindestinations' => $maindestinations,
            'articles' => $articles
        ];

        return view('public.homepage.home', $data);
    }

    public function allArticle()
    {
        $sliders = Slider::all();
        $articles = Article::all();
        $maindestinations = MainDestination::all();
        $contact = Contact::first();

        $data = [
            'contact' => $contact,
            'sliders' => $sliders,
            'maindestinations' => $maindestinations,
            'articles' => $articles
        ];

        return view('public.article.index', $data);
    }

    public function showArticle(string $id)
    {
        $contact = Contact::first();
        $sliders = Slider::all();
        $article = Article::findOrFail($id);
        $relatedArticles = Article::take(3)->get();
        $maindestinations = MainDestination::all();

        $data = [
            'contact' => $contact,
            'sliders' => $sliders,
            'article' => $article,
            'relatedArticles' => $relatedArticles,
            'maindestinations' => $maindestinations,
        ];

        return view('public.article.show', $data);
    }

    public function postReservation(Request $request)
    {
        $name = urlencode($request->input('name'));
        $pick_date = urlencode($request->input('pick_date'));
        $persons = urlencode($request->input('persons'));
        $pick_location = urlencode($request->input('pick_location'));
        $destination = $request->input('destination');
        $contact = Contact::first();
        $phone = 6282132607576;

        $message = "Halo, saya ingin melakukan reservasi dengan detail sebagai berikut:\n\n" .
           "Nama : $name\n" .
           "Tanggal Penjemputan : $pick_date\n" .
           "Jumlah Penumpang : $persons\n" .
           "Lokasi Penjemputan : $pick_location\n" .
           "Tujuan : $destination\n\n" .
           "Terima kasih.";

        $whatsappUrl = "https://wa.me/{$phone}?text=" . rawurlencode($message);

        return redirect()->away($whatsappUrl);
    }
}
