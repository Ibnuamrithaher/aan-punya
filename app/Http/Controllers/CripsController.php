<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Crips;
use Illuminate\Http\Request;
use DataTables;
class CripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $data = Crips::latest()->get();
        // dd($data[8]->category->nama_category);
        if($request->ajax()){
            $data = Crips::get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '
                        <form action="'. route('crips.destroy', $row->id) .'" method="POST">
                                    '.method_field("DELETE").'
                                    '.csrf_field().'
                                    <a class="btn btn-primary" href="'. route('crips.edit', $row->id) .'" width="50%">Edit</a>
                                    <button  onclick="return confirm(\'Are You Sure Want to Delete?\')" class="btn btn-danger" type="submit">Delete</button>
                                </form>';
                        return $btn;
                    })
                    ->addColumn('kode_category', function($row){
                        return $row->category->kode_category;
                    })
                    ->rawColumns(['action','kode_category'])
                    ->make(true);
        }
        return view('pages.crips.index');
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
        return view('pages.crips.create',compact('category'));
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
        $crips = Crips::create([
            'category_id' => $request->category,
            'nama_alternatif' => $request->nama_alternatif,
            'nama_crips' => $request->nama_crips,
            'nilai'   => $request->nilai,
        ]);
        return redirect()->route('crips.index')->with('succes','Insert Data Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function show(Crips $crips)
    {
        //
        return $crips;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::all();
        $crips = Crips::find($id);
        return view('pages.crips.update',compact('category','crips'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $crips = Crips::find($id);
        $crips->category_id = $request->category;
        $crips->nama_alternatif = $request->nama_alternatif;
        $crips->nama_crips = $request->nama_crips;
        $crips->nilai = $request->nilai;
        $crips->save();

        return redirect()->route('crips.index')->with('succes','Update Data Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $crips = Crips::find($id);
        $crips->delete();
        return redirect()->route('crips.index')->with('succes','Deleted Data Succesfully');
    }
}
