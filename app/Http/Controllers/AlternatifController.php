<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Category;
use App\Models\Crips;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $students = json_decode(file_get_contents("json/data.json"), true);
        // $alternatifs = Alternatif::latest()->get();
        $alternatifs = Alternatif::all();
        $category = Category::OrderBy('id','asc')->get();

        //dd($alternatifs[0]->crips);
        //dd($alternatifs[0]->crips[0]->pivot->hasil);

        // return Datatables::of($alternatifs)
        //             ->addIndexColumn()
        //             ->addColumn('action', function($row){
        //                 $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';
        //                 $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';
        //                 return $btn;
        //             })
        //             ->addColumn('C', function($row){
        //                 return Category::all();
        //             })
        //             ->rawColumns(['action'])->toJson();

        if ($request->ajax()) {
            $data = Alternatif::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';
                        return $btn;
                    })
                    ->addColumn('C', function($row){
                        return Category::all();
                    })
                    ->rawColumns(['action','C'])
                    ->make(true);
        }

        //return view('book',compact('books'));
        return view('pages.alternatif.index',compact('alternatifs','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        $crips = Crips::all();
        return view('pages.alternatif.create',compact('category','crips'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $category = [];
        // foreach ($request->category as $key => $value) {
        //     # code...
        //     $category[] = $value;
        // }
        // return $request->category;
        // dd($category);
        $alternatif = Alternatif::create([
            'kode_alternatif' => $request->kode_alternatif,
            'nama_alternatif' => $request->nama_alternatif,
        ]);

        // $alternatif->crips()->attach($request->category,['hasil' => 0]);
        return redirect()->route('alternatif.index')->with('succes','Insert Data Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternatif $alternatif)
    {
        //
        $category = Category::all();
        return view('pages.alternatif.update',compact('alternatif','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        //
        $alternatif->update([
            'kode_alternatif' => $request->kode_alternatif,
            'nama_alternatif' => $request->nama_alternatif,
        ]);


        // foreach ($request->category as $key => $value) {
        //     # code...
        //     $category[$value] = array('hasil' => 0);
        // }

        //dd($category);
        // $alternatif->crips()->sync($category,true);
        return redirect()->route('alternatif.index')->with('succes','Update Data Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternatif $alternatif)
    {
        //
        $alternatif->delete();
        $alternatif->crips()->detach();
        return redirect()->route('alternatif.index')->with('succes','Deleted Data Succesfully');
    }
}
