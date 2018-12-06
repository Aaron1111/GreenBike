<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;



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
        $shares = Share::where('share_qty', 'Tersedia')->get();
        $count = Share::where('share_qty', 'Tersedia')->count();
        return view('available', compact('shares', 'count'));
    }

        public function Navailable()
    {
        $shares = Share::where('share_qty', 'Dipinjam')->get();
        $count = Share::where('share_qty', 'Dipinjam')->count();
        return view('home', compact('shares', 'count'));
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
        'Id_peminjam'=>'required',
        'Nama'=>'required',
        'share_name'=>'required|integer',
        'share_price'=> 'required',
        'share_qty' => 'required'
      ]);
      $share = new Share([
        'Id_peminjam'=> $request->get('Id_peminjam'),
        'Nama'=> $request->get('Nama'),
        'share_name' => $request->get('share_name'),
        'share_price'=> $request->get('share_price'),
        'share_qty'=> $request->get('share_qty')
      ]);
      $share->save();
      return redirect('/shares')->with('success', 'Sepeda berhasil ditambahkan');
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

     return redirect('/shares')->with('success', 'Sepeda berhasil dihapus');
    }

    public function update(Request $request, $id)
{
      $request->validate([
        'Id_peminjam',
        'Nama',
        'share_qty' => 'required'
      ]);

      $share = Share::find($id);
      $share->Id_peminjam = $request->get('Id_peminjam');
      $share->Nama = $request->get('Nama');
      $share->share_qty = $request->get('share_qty');
      $share->save();

      return redirect('/shares')->with('success', 'Sepeda berhasil diperbarui');
}

}