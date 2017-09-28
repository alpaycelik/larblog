<?php

namespace App\Http\Controllers;

use App\ForumKonu;
use App\ForumYorum;
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

    public function post_forum_yorum($ana_konu, $slug, Request $request){
        if(Auth::check()){
            $validator = Validator::make($request->all(), [
                'icerik' => 'required'
            ]);
        }
        else{
            return redirect('/login');
        }
        if($validator->fails()){
            return response(['durum' => 'error', 'baslik' => 'Hatalı', 'icerik' => 'Form hatası..!']);
        }
        $request->merge(['kullanici_id' => Auth::user()->id, 'forum' => $slug]);
        ForumYorum::create($request->all());
        return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Yorum başarıyla yapıldı.']);
    }

    public function post_forum_konu_sil(Request $request){
        $durum = $request->durum;
        if($durum == 'sil'){
            try {
                ForumKonu::where('id', $request->id)->delete();
                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Silme işlemi başarılı.']);
            }
            catch (\Exception $e){
                return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Silme işlemi başarısız..!', 'hata' => $e]);
            }
        }
        elseif($durum == 'gizle'){

        }
    }

}
