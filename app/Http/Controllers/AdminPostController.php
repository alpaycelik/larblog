<?php

namespace App\Http\Controllers;

use App\Anabaslik;
use App\Ayarlar;
use App\Blog;
use App\Hakkimizda;
use App\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class AdminPostController extends AdminController
{
    public function post_ayarlar(Request $request) {
        if(isset($request->logo)){
            $validator = Validator::make($request->all(), [
                'logo' => 'mimes:jpeg,jpg,png,gif'
            ]);
            if($validator->fails()){
                return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Yüklediğiniz dosya formatı jpeg,jpg,png,gif olmalıdır..!']);
            }

            $logo = Input::file('logo');
            $logo_uzanti = Input::file('logo')->getClientOriginalExtension();
            $logo_isim = 'logo.'.$logo_uzanti;
            Storage::disk('uploads')->makeDirectory('img');
            Image::make($logo->getRealPath())->resize(222,108)->save('uploads/img/'.$logo_isim);

        }

        try{
            unset($request['_token']);
            if(isset($request->logo)){
                unset($request['eski_logo']);
                Ayarlar::where('id', 1)->update($request->all());
                Ayarlar::where('id', 1)->update(['logo' => $logo_isim]);
            }
            else{
                $eski_logo = $request->eski_logo;
                unset($request['eski_logo']);
                Ayarlar::where('id', 1)->update($request->all());
                Ayarlar::where('id', 1)->update(['logo' => $eski_logo]);
            }
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla yapıldı.']);
        }
        catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Kayıt yapılamadı..!']);
        }
    }

    public function post_hakkimizda(Request $request){
        try{
            unset($request['_token']);
            Hakkimizda::where('id', 1)->update($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla yapıldı.']);
        }
        catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Kayıt yapılamadı..!']);
        }
    }

    public function post_blog_ekle(Request $request){
        $validator = Validator::make($request->all(), [
            'resimler[]' => 'mimes:jpeg,jpg,png,gif',
            'baslik' => 'required|max:250',
            'etiketler' => 'required|max:255',
            'icerik' => 'required',
            'kisaicerik' => 'required|max:255',
            'kategori' => 'required'
        ]);
        if($validator->fails()){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Doldurulması zorunlu olan alanları doldurunuz..!']);
        }
        $tarih = str_slug(Carbon::now());
        $slug = str_slug($request->baslik).'-'.$tarih;
        $resimler = $request->file('resimler');
        if (!empty($resimler)){
            $i = 1;
            foreach ($resimler as $resim){
                $resim_uzanti = $resim->getClientOriginalExtension();
                $resim_isim = $i.'.'.$resim_uzanti;
                Storage::disk('uploads')->makeDirectory('img/blog/'.$slug);
                Storage::disk('uploads')->put('img/blog/'.$slug.'/'.$resim_isim, file_get_contents($resim));
                $i++;
            }
        }
        try{
            // unset($request['_token']);
            $request->merge(['slug' => $slug]);
            Blog::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla yapıldı.']);
        }
        catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Kayıt yapılamadı..!', 'hata' => $e]);
        }
    }

    public function post_blog_sil(Request $request){
        try{
            Blog::where('slug', $request->slug)->delete();
            Storage::disk('uploads')->deleteDirectory('img/blog/'.$request->slug);
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Silme işlemi başarılı.']);
        }
        catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Silme işlemi hatalı..!', 'hata' => $e]);
        }
    }

    public function post_blog_duzenle($slug, Request $request){
        $validator = Validator::make($request->all(), [
            'resimler[]' => 'mimes:jpeg,jpg,png,gif',
            'baslik' => 'required|max:250',
            'etiketler' => 'required|max:255',
            'icerik' => 'required',
            'kisaicerik' => 'required|max:255'
        ]);
        if($validator->fails()){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Doldurulması zorunlu olan alanları doldurunuz..!']);
        }
        if (isset($request->resim)){
            try{
            Storage::disk('uploads')->delete($request->resim);
                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Resim silme işlemi başarılı.']);
            }
            catch (\Exception $e){
                return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Resim silme işlemi hatalı..!', 'hata' => $e]);
            }
        }
        else{
            $resimler = $request->file('resimler');
            if (!empty($resimler)){
                $i = $request->sayi;
                $i++;
                foreach ($resimler as $resim){
                    $resim_uzanti = $resim->getClientOriginalExtension();
                    $resim_isim = $i.'.'.$resim_uzanti;
                    Storage::disk('uploads')->makeDirectory('img/blog/'.$slug);
                    Storage::disk('uploads')->put('img/blog/'.$slug.'/'.$resim_isim, file_get_contents($resim));
                    $i++;
                }
            }
            try{
                Blog::where('slug', $slug)->update([
                    'baslik' => $request->baslik,
                    'etiketler' => $request->etiketler,
                    'icerik' => $request->icerik,
                    'kisaicerik' => $request->kisaicerik
                ]);
                return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt başarıyla güncellendi.']);
            }
            catch (\Exception $e){
                return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Kayıt yapılamadı..!', 'hata' => $e]);
            }
        }
    }

    public function post_kategori_ekle(Request $request){
        $validator = Validator::make($request->all(), [
            'ad' => 'required'
        ]);
        if($validator->fails()){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Kategori adı boş bırakılmamalıdır..!']);
        }
        try {
            $slug = str_slug($request->ad);
            $request->merge(['slug' => $slug]);
            Kategori::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt işlemi başarılı.']);
        }
        catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Kayıt işlemi hatalı..!', 'hata' => $e]);
        }

    }

    public function post_kategori_sil(Request $request){
        try {
            Kategori::where('id', $request->id)->delete();
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Silme işlemi başarılı.']);
        }
        catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Silme işlemi başarısız..!', 'hata' => $e]);
        }
    }

    public function post_anabaslik_ekle(Request $request){
        $validator = Validator::make($request->all(), [
            'baslik' => 'required|',
            'kisa_aciklama' => 'required'
        ]);
        if($validator->fails()){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Form alanları boş bırakılmamalıdır..!']);
        }
        try {
            $slug = str_slug($request->baslik);
            $request->merge(['slug' => $slug]);
            Anabaslik::create($request->all());
            return response(['durum' => 'success', 'baslik' => 'Başarılı', 'icerik' => 'Kayıt işlemi başarılı.']);
        }
        catch (\Exception $e){
            return response(['durum' => 'error', 'baslik' => 'Hatalı!', 'icerik' => 'Kayıt işlemi hatalı..!', 'hata' => $e]);
        }
    }

}
