<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;
use jpmurray\LaravelCountdown\Countdown;
use Carbon\Carbon;
use DB;


class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Share::all();
        $count =  Share::count();

        return view('shares.index', compact('shares', 'count'));
    }

    public function all()
    {
        $shares = Share::all();
        $count = Share::count();
        return view('all', compact('shares', 'count'));
    }

    public function available()
    {
        $shares = Share::where('status', 'Tersedia')->get();
        $count = Share::where('status', 'Tersedia')->count();
        return view('available', compact('shares', 'count'));
    }

        public function Navailable()
    {
  
     
           // $countdown= Countdown::from($now->copy()->subYears(5))
        //                 ->to($now)->get();
        $shares = Share::where('status', 'Dipinjam')->get();
        $count = Share::where('status', 'Dipinjam')->count();

              $now2= Share::where('status', 'Dipinjam')->select('created_at')->get();
        $now  = Carbon::now();
        for ($i=0; $i <$count ; $i++) { 
            # code...
        
        $future = Carbon::parse(($now2[$i]->created_at->toDateTimeString()))->addDays(180);
       // $now = Carbon::parse($now3)->format('Y/m/d')->addDays(30);
        // $future = Carbon::parse($future2)->format('Y/m/d');
        // $future = new Carbon('last day of December 2018', 'Asia/Jakarta');
        //$now = new Carbon('now', 'Asia/Jakarta');
         $diff = $now->diffInSeconds($future);
        $ddss =  $diff          % 86400;
         $dd   = ($diff - $ddss) / 86400;
         $hhss =  $ddss          %  3600;
         $hh   = ($ddss - $hhss) /  3600;
         $mmss =  $hhss          %    60;
        $mm   = ($hhss - $mmss) /    60;
         $ss   =  $mmss          %    60;
}
        return view('home', compact('shares', 'count', 'now','dd','hh','mm','ss','future'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('shares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'nim'=>'required|unique:shares|regex:/[A-Z][0-9]{8}/',
        'nama'=>'required_if:status,Dipinjam',
        'id_sepeda'=>'required|unique:shares|regex:/[0-9]{4}/',
        'jenis_sepeda'=> 'required|regex:/[A-Z]{3}/',
        'status' => 'required'
      ]);
      $share = new Share([
        'nim'=> $request->get('nim'),
        'nama'=> $request->get('nama'),
        'id_sepeda' => $request->get('id_sepeda'),
        'jenis_sepeda'=> $request->get('jenis_sepeda'),
        'status'=> $request->get('status')
      ]);
      $share->save();
      return redirect('/all')->with('success', 'Sepeda berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $share = Share::find($id);

        return view('shares.edit', compact('share'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $share = Share::find($id);
     $share->delete();

     return redirect('/all')->with('success', 'Sepeda berhasil dihapus');
    }

    public function update(Request $request, $id)
{
      $request->validate([
        'nim'=>'required|regex:/[A-Z][0-9]{8}/',
        'nama'=>'required_if:status,Dipinjam',
        'status' => 'required'
      ]);

      $share = Share::find($id);
      $share->nim = $request->get('nim');
      $share->nama = $request->get('nama');
      $share->status = $request->get('status');
      $share->save();

      return redirect('/all')->with('success', 'Sepeda berhasil diperbarui');
}

}