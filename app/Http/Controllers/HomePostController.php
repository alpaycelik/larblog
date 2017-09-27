<?php

namespace App\Http\Controllers;

use App\ForumKonu;
use App\Yorum;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePostController extends HomeController
{
    public function post_blog_yorum($slug, Request $request){
        if(Auth::check()){
            $validator = Validator::make($request->all(), [
                'icerik' => 'required'
            ]);
        }
        else{
            $validator = Validator::make($request->all(), [
                'isim' => 'required',
                'mail' => 'required|email',
                'icerik' => 'required'
            ]);
        }
        if($validator->fails()){
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Form hatası..!']);
        }
        $kategori = explode('/', $slug);
        $request->merge(['blog' => $kategori[count($kategori)-1]]);
        if(Auth::check()){
            $request->merge([
                'kullanici_id' => Auth::user()->id
            ]);
        }
        Yorum::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Yorum başarıyla yapıldı.']);
    }

    public function post_forum_konu_ekle(Request $request){
        $validator = Validator::make($request->all(), [
            'baslik' => 'required',
            'ana_baslik' => 'required',
            'icerik' => 'required',
        ]);
        if($validator->fails()){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Form alanları boş bırakılmamalıdır..!']);
        }
        try {
            $tarih = str_slug(Carbon::now());
            $slug = str_slug($request->baslik).'-'.$tarih;
            $yazar = Auth::User()->id;
            $request->merge(['slug' => $slug, 'yazar' => $yazar]);
            ForumKonu::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt işlemi başarılı.']);
        }
        catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Kayıt işlemi hatalı..!', 'hata' => $e]);
        }
    }

}
