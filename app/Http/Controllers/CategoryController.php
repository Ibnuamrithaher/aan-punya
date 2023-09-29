<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Category::get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<form action="'. route('category.destroy', $row->id) .'" method="POST">
                                    '.method_field("DELETE").'
                                    '.csrf_field().'
                                    <a class="btn btn-primary" href="'. route('category.edit', $row->id) .'">Edit</a>
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>';
                        // $btn = \Form::open(["route" => ["category.destroy", $row->id], "method" => "DELETE"] ).'<button type="submit" class="btn btn-link" onclick="return confirmDelete()">Delete</button>'.\Form::close();
                        // $btn = ''.\Form::open(["route" => ["category.destroy", $row->id], "method" => "DELETE"] ).'<button type="submit" class="btn btn-link" onclick="return confirmDelete()">Delete</button>'.\Form::close().'';
                        // $btn = '<a href="'. Route('category.edit',$row->id) .'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';
                        // $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        //
        return view('pages.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.category.create');
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
        $category = Category::create([
            'kode_category' => $request->kode_category,
            'nama_category' => $request->nama_category,
            'atribut'   => $request->atribut,
            'nilai_bobot' => $request->nilai_bobot,
        ]);
        return redirect()->route('category.index')->with('succes','Insert Data Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        //return $category;
        return view('pages.category.update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $category->update([
            'kode_category' => $request->kode_category,
            'nama_category' => $request->nama_category,
            'atribut'   => $request->atribut,
            'nilai_bobot' => $request->nilai_bobot,
        ]);
        return redirect()->route('category.index')->with('succes','Update Data Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        // $category->crips()->delete();
        return redirect()->route('category.index')->with('succes','Deleted Data Succesfully');

    }
}
