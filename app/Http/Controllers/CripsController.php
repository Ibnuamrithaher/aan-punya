<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
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
        $data = Crips::orderBy('category_id', 'asc')->get();

        if($request->ajax()){
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('nama_alternatif',function($row){
                        $name = "";
                        $alternatif = Alternatif::find($row->nama_alternatif);
                        if ($alternatif) {
                            $name = $alternatif->nama_alternatif;
                        }
                        return $name;
                    })
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
        $alternatif = Alternatif::all();
        return view('pages.crips.create',compact('category','alternatif'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $crips = Crips::create([
            'category_id' => $request->category,
            'nama_alternatif' => $request->nama_alternatif,
            'nama_crips' => $request->nama_crips,
            'nilai'   => $request->nilai,
        ]);
        $alternatif = Alternatif::find($request->nama_alternatif);
        // $alternatif->crips()->attach(1,['hasil' => 0]);
        $alternatif->crips()->attach($crips->id,['hasil' => 0]);

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
        $alternatif = Alternatif::all();
        return view('pages.crips.update',compact('category','crips','alternatif'));
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

        $alternatif = Alternatif::findOrFail($crips->nama_alternatif);
        $alternatif->crips()->detach([$id]);

        $alternatif = Alternatif::find($request->nama_alternatif);

        foreach ($alternatif->crips as $key => $value) {
            if ($value->id != $crips->nama_alternatif) {
                $crips_new[$value->id] = array('hasil' => 0);
            }
        }

        $crips->category_id = $request->category;
        $crips->nama_alternatif = $request->nama_alternatif;
        $crips->nama_crips = $request->nama_crips;
        $crips->nilai = $request->nilai;
        $crips->save();
        // array_push($crips_new,$request->nama_crips);
        $crips_new[$crips->id] = array('hasil' => 0);

        $alternatif->crips()->sync($crips_new,true);

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
