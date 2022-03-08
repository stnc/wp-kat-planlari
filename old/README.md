# wp-kat-planlari


// astra nın starter arayuzu,wpform lite ve polylang wp mail eklentisinde var 
//http://teknoyeni.test/wp-admin/admin.php?page=wp-mail-smtp-setup-wizard#/
//collabse yapsın 

// jQuery(document).ready(function() {
//   if ( !jQuery(document.body).hasClass('folded') ) {
//       jQuery("#collapse-button").trigger('click');
//   }
// });

// notice ıcın 
// https://www.satollo.net/how-to-remove-wordpress-admin-notices

https://www.google.com/search?q=worpress+my+plugin++notice+disable&rlz=1C1FKPE_trTR967TR967&sxsrf=AOaemvJSN7ezCb-aSg5E1Kki6IUdCrrphg%3A1640262577500&ei=sWvEYfjfHYeW9u8PrKOwgAw&ved=0ahUKEwi4_JOi9vn0AhUHi_0HHawRDMAQ4dUDCA4&uact=5&oq=worpress+my+plugin++notice+disable&gs_lcp=Cgdnd3Mtd2l6EAM6BwgAEEcQsAM6BwgjELACECc6CAgAEAgQDRAeSgQIQRgASgQIRhgAUMUFWMNVYMJYaAJwAXgAgAGnAYgBvwySAQQwLjEymAEAoAEByAEIwAEB&sclient=gws-wiz 


https://forum.tutorials7.com/2551/disable-plugin-update-notifications-function-in-wordpress


https://xd.adobe.com/view/8af0288c-7757-49d4-9de4-0439f021d723-dfa3/



<?php

namespace App\Http\Controllers\Admin;

use App\Application;
use App\Contact;
use App\Tekno;
use App\TeknoKat;
use App\TeknoOfis;
use App\TeknoOfisKisi;
use App\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatPlaniController extends Controller
{
    private $data = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function katplaniPass()
    {
        return view('admin.katPass', $this->data);
    }

    public function katplaniPassPost(Request $request)
    {
        if($request->has('pass')){
            if($request->input('pass') == "teknokat"){
                $request->session()->put('kat_planlari', "1");
                return redirect('/kat_planlari');
            }else{
                return redirect()->back()->withErrors('Şifre yanlış.');
            }

        }else{
            return redirect()->back()->withErrors('Şifre yanlış.');
        }
    }

    public function katplani()
    {

        return view('admin.katplani', $this->data);
    }

    public function katplaniDetay($tekno)
    {


        DB::enableQueryLog();


        

        if($tekno == -1){
            $kat = TeknoKat::where('name', 'LIKE', '%BODRUM%')->get();
            
            $this->data['tekno'] = $kat;
            $this->data['teknoName'] = "Genel Bodrum";
        }else{
            $tekno = Tekno::find($tekno);
            if(!$tekno)
                abort(404);

            $this->data['tekno'] = $tekno->katlar;
            $this->data['teknoName'] = $tekno->name;
 
        }
        
        dd(DB::getQueryLog());
        return view('admin.katplani_bina', $this->data);
    }

    public function katplaniKatDetay($tekno, $kat)
    {
        $tekno = Tekno::find($tekno);
        if(!$tekno)
            abort(404);

        $kat = TeknoKat::find($kat);
        if(!$kat)
            abort(404);

        $this->data['tekno'] = $tekno;
        $this->data['kat'] = $kat;

        return view('admin.katplani_kat', $this->data);
    }

    public function katplaniKatEdit($kat, $nere = "konum")
    {
       
        $kat = TeknoKat::find($kat);
        if(!$kat)
            abort(404);

        $this->data['kat'] = $kat;
        $this->data['nere'] = $nere;

        return view('admin.katplani_kat_edit', $this->data);
    }

    public function katKiraVer(Request $request){
        $ofis_id = $request->input('ofis_id');
        $name = $request->input('name');

        $ofis = TeknoOfis::find($ofis_id);

        TeknoOfisKisi::create([
            'tekno_id' => $ofis->tekno_id,
            'tekno_kat_id' => $ofis->tekno_kat_id,
            'tekno_ofis_id' => $ofis->id,
            'name' => $name,
        ]);

        $ofis->isEmpty = 1;
        $ofis->save();

    }

    public function ofisBosalt(Request $request){

        $ofis_id = $request->query('ofis');

        $ofis = TeknoOfis::find($ofis_id);

        $ofis->isEmpty = 0;
        $ofis->save();

    }

    public function katplaniKatSaveFull(Request $request, $ofis_id, $nere){

        $ofis = TeknoOfis::find($ofis_id);

        $arr = [
            'width' => $request->query('width'),
            'height' => $request->query('height'),
            'left' => $request->query('left'),
            'top' => $request->query('top'),
        ];

        if($nere == "ofis"){
            $ofis->office_area = json_encode($arr);
        }else if($nere == "isim"){
            $ofis->name_area = json_encode($arr);
        }

        $ofis->save();

    }

    public function katplaniKatSaveHalf(Request $request, $ofis_id, $nere){

        $ofis = TeknoOfis::find($ofis_id);
        $datas = [];

        if($nere == "ofis"){
            $datas = json_decode($ofis->office_area, 1);
        }else if($nere == "isim"){
            $datas = json_decode($ofis->name_area, 1);
        }

        $arr = [
            'width' => $datas['width'],
            'height' => $datas['height'],
            'left' => $request->query('left'),
            'top' => $request->query('top'),
        ];

        if($nere == "ofis"){
            $ofis->office_area = json_encode($arr);
        }else if($nere == "isim"){
            $ofis->name_area = json_encode($arr);
        }

        $ofis->save();

    }


}
