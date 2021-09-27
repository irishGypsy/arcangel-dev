<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Banner;
use App\Models\Faq;
use App\Models\Video;
use App\Models\Product;
use App\Models\BatteryFinders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class WelcomeController extends Controller
{

    public function display()
    {
//        $banners = Banner::all();

//        $products = DB::table('products')
//            ->join('product_images','products.id','=','product_images.product_id')
//            ->select('products.id','products.name','products.mrp','product_images.image')
//            ->where('products.popular','=','1')
//            ->get();

        return view('site.app');
    }

    public function getPage($id)
    {
        $post = DB::table('posts')->find($id);

        return view('site.pages.post', compact('post'));
    }

    public function getFaqs()
    {

        $faqs = Faq::where('status','=','Active')->orderBy('id')->get();

        return view('site.pages.faq', compact('faqs'));

    }

    public function getVideos()
    {

        $videos = Video::all()->where('status','=','Active');

        return view('site.pages.video', compact('videos'));

    }

}
