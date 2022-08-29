<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kategori;
use App\Riwayatkategori;
use Illuminate\Support\Facades\Crypt;
use Session;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;
//use Illuminate\Support\Str;
class AdminController extends Controller
{ 
    /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('auth');
   }


    // DASHBOARD
    public function dashboard()
    {
        $kategori = Kategori::select('id');
        return view('admin.dashboard.home', compact('kategori'));
    }

     // KATEGORI
     public function kategori(Request $req)
     {
         $data = Kategori::get();
         return view('admin.kategori.kategori',['data'=>$data]);
     }
     public function kategoriform(){
         return view('admin.kategori.tambah');
     }
     public function kategoritambah(Request $request){
         $this->validate($request, [
          //  'id'=>'',
            'nama'=>'required|regex:/^[a-zA-Z ]{2,50}$/',
         ]);
         $kategori = Kategori::create([
           // 'id' => $request->id,
            'user_id' => Auth()->id(),
             'nama' => $request->nama,
         ]);
        if ($kategori) {
            Riwayatkategori::create([
                'user_id' => Auth()->id(),
                'kategori_id' =>  $kategori->id, //ambil id kategori dan jadikan foreign key didalam tabel riwayat_kategori
                 'nama' => "Telah Menambahkan",
             ]);
            return back()->with('success', 'Data Berhasil Ditambahkan');
        }
        else {
            return back()->with('error', 'Data Gagal Ditambahkan');
        }
     }
     public function kategorihapus($id)
     {
        try{
            $idi = Crypt::decrypt($id);
            $a= Kategori::findOrFail($idi);//ambil id kategori
            $ab = $a->nama;//ambil nama kategori dari id kategori
            $fg=array('Telah Menghapus',$ab);//buat menjadi array karna multiple value
            $variable =implode(' ', $fg);//convert array to string
            Kategori::find($idi)->destroy($idi);
            Riwayatkategori::create([
                'user_id' => Auth()->id(),
                'kategori_id' => $idi,
                'nama' => $variable,
             ]);
            return back()->with('success', 'Data Berhasil Dihapus');
        }catch (DecryptException $e) {
            return abort(404);
         }
     }
     public function kategoriformedit($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= Kategori::findOrFail($id);
            $edit_kategori = $data->id;
            Session::put('edit_kategori', $edit_kategori);
            return view('admin.kategori.edit',compact('data'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function kategoriedit(Request $request)
    {
            $idedit_kategori = Session::get('edit_kategori');
            \Validator::make($request->all(), 
            [
                'nama'=>'required|regex:/^[a-zA-Z ]{3,50}$/',
            ])->validate();
                $field = [
                    'nama' => $request->nama,
                ];
            $result = Kategori::where('id', $idedit_kategori)->update($field);
            if($result){
                Riwayatkategori::create([
                    'user_id' => Auth()->id(),
                    'kategori_id' =>     $idedit_kategori,
                    'nama' => "Telah Mengedit",
                 ]);
                return back()->with('success', 'Data Berhasil Diupdate');
            } else{
                return back();
            }
    }
    public function kategoridetail($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= Kategori::findOrFail($id);
            return view('admin.kategori.detail',compact('data'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function kategoririwayat() //ERROR, seharusnya jika kategori_id yg di GET tidak ada value nya maka data yg lain masih bisa ditampilkan 
    {
        $data = Riwayatkategori::get();
        return view('admin.kategori.riwayat',['data'=>$data]);       
       
        // $dataq = Kategori::select('id')->get();
        //$dataqw = Riwayatkategori::where('kategori_id', $dataq)->get();
        //if(empty($dataqw)){
        //    return view('admin.kategori.riwayat',['data'=>"kosong"]);      
        //}else{
        //    return view('admin.kategori.riwayat',['data'=>$dataqw]);       
       // }


        //$dataq = Kategori::select('id')->get();
        //$dataqw = Riwayatkategori::where('kategori_id', $dataq)->get();
        //if (!$dataqw->isEmpty()) {
        //    return view('admin.kategori.riwayat',['data'=>"kosong"]);     
        // }else{
        //    return view('admin.kategori.riwayat',['data'=>$dataqw]);       
        // }
       
         

        //if(empty($dataqw)){
        //    return view('admin.kategori.riwayat',['data'=>"kosong"]);      
        //}else{
        //    return view('admin.kategori.riwayat',['data'=>$dataqw]);       
       // }
     
    }
}
