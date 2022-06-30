<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\gallery;
use App\Models\Product;
use App\Models\Slideshow;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\json_decode;

class WebController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Home',
            'kategori' => Category::all(),
            'slide' => Slideshow::all(),
            'post' => Product::all(),
            'galeri' => gallery::all()
        ];
        return view('index', $data);
    }
    
    public function produk(){
        $data = [
            'title' => 'Produk',
            'kategori' => Category::all(),
            'slide' => Slideshow::all(),
            'post' => Product::all(),
        ];
        return view('produk', $data);
    }

    public function detail($slug){

        $data = [
            'title' => 'Detail ' . Product::firstWhere('slug_name', $slug)->product_name,
            'post' => Product::firstWhere('slug_name', $slug),
            'kategori' => Category::all(),
            'slide' => Slideshow::all(),
            'kategori_detail' => Product::firstWhere('slug_name', $slug)->category->categories,
            'kategori_isi' => Category::firstWhere('id', Product::firstWhere('slug_name', $slug)->category->id)
            

        ];
        return view('detail', $data);
    }

    public function galeri(){
        $data = [
            'title' => 'Galeri',
            'slide' => Slideshow::all(),
            'kategori' => Category::all(),
            'galeri' => gallery::all()
        ];
        return view('galeri', $data);
    }
    public function info(){
        $data = [
            'title' => 'Galeri',
        ];
        return view('galeri', $data);
    }
    public function kategori($slug){
        $data = [
            'title' => 'Kategori',
            'slide' => Slideshow::all(),
            'kategori' => Category::all(),
            'post' => Category::firstWhere('slug', $slug)->product,
            'kategori_nama' => Category::firstWhere('slug', $slug)

        ];
        return view('kategori', $data);
    }
    public function about(){
        $data = [
            'title' => 'Tentang Perusahaan',
            'slide' => Slideshow::all(),
            'galeri' => gallery::all(),
            'kategori' => Category::all(),

        ];
        return view('about', $data);
    }

    //admin

    public function slideshow_(){
        $data = [
            'title' => 'SlideShow',
            'slide' => Slideshow::all()
        ];
        return view('dashboard.slideshow', $data);
    }
    public function kategori_(){
        $data = [
            'title' => 'Kategori',
            'kategori' => Category::get(),
        ];
        return view('dashboard.categori', $data);
    }
    public function produk_(){
        $data = [
            'title' => 'Produk',
            'kategori' => Category::all(),
            'produk' => Product::all()
        ];
        return view('dashboard.produk', $data);
    }
    public function info_(){
        $data = [
            'title' => 'Info',
        ];
        return view('dashboard.produk', $data);
    }
    public function galeri_(){
        $data = [
            'title' => 'Galeri',
            'galeri' => gallery::all()
        ];
        return view('dashboard.galeri', $data);
    }

    //admin model

    public function slideAdd(Request $request){
        foreach($request->file('gambar') as $item){
            $item->store('public/slide',['disk' => 'my_file']);
            Slideshow::create([
                'nama' => $item->hashName(),
            ]);
        }

        return self::slideshow_();

    }
    public function slideDelete($slug){
        $imageName = Slideshow::firstWhere('id', $slug)->nama;
        File::delete(public_path('../public_html/public/slide/'.$imageName));

        Slideshow::destroy($slug);

        return self::slideshow_();

    }

    public function kategoriUpdate(Request $request){
        $slug = Str::slug($request->kategori);
        if(Category::firstWhere('slug', $slug)){
            $slug = Str::slug($request->kategori.' '.rand(1,10));
        }
        Category::create([
            'categories' => $request->kategori,
            'slug' => $slug
        ]);
        return self::kategori_();

    }
    public function hapusKategori($request){

        Category::destroy($request);
        return self::kategori_();

    }
    public function produkAdd(Request $r){
        $slug = Str::slug($r->name);
        if(Product::firstWhere('slug_name', $slug)){
            $slug = Str::slug($r->name." ".rand(0,10));
        }
        
        $imageName = [];

        foreach($r->file('image') as $image){
            $image->store('public/productImage', ['disk' => 'my_file']);
            array_push($imageName, $image->hashName());
        }

        
        
        Product::create([
            'category_id' => $r->category,
            'product_name' => $r->name,
            'slug_name' => $slug,
            'url_foto' => json_encode($imageName),
            'harga' => $r->price,
            'deskripsi' => $r->description,
            'fitur' => $r->features,
            'spek' => $r->spec,
            'syarat' => $r->term
        ]);

        return redirect('/admin/produk');

    }
    public function produkDelete($request){
        $imageName = Product::firstWhere('id', $request)->url_foto;
        $image = json_decode($imageName);
        foreach($image as $img){
            File::delete(public_path('../public_html/public/productImage/').$img);
        }


        Product::destroy($request);
        return redirect('/admin/produk');

    }
    public function galeriAdd(Request $request){
        gallery::create([
            'image' => $request->file('image')->hashName(),
            'caption' => $request->caption
        ]);

        $request->file('image')->store('public/galeri/', ['disk'=>'my_file']);

        return redirect('/admin/galeri');
        

    }
    public function galeriDelete($slug){
        $imageName = gallery::firstWhere('id', $slug)->image;
        File::delete(public_path('../public_html/public/galeri/').$imageName);
        gallery::destroy($slug);
        return redirect('/admin/galeri');
    }
    //LOGIN PAGE

    public function login(){
        return view('login');
    }
    public function login_(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
 
            return redirect()->intended('/admin');
        }
        return back();
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    

    
}
