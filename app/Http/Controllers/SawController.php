<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Category;
use App\Models\Crips;
use Illuminate\Http\Request;
Use Yajra\DataTables\Facades\DataTables;
class SawController extends Controller
{
    //
    public function alternatif(Request $request)
    {
        // $data = Alternatif::all();
        // dd($data[0]->crips);
        if($request->ajax()){
            $data = Alternatif::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';
                        return $btn;
                    })
                    ->addColumn('C1', function($row){
                        return $row->crips[0]->nilai;
                    })
                    ->addColumn('C2', function($row){
                        return $row->crips[1]->nilai;
                    })
                    ->addColumn('C3', function($row){
                        return $row->crips[2]->nilai;
                    })
                    ->addColumn('C4', function($row){
                        return $row->crips[3]->nilai;
                    })
                    ->rawColumns(['action','C1','C2','C3','C4'])
                    ->make(true);
        }

        return view('pages.saw.alternatif');
    }

    public function hasil(){
        $alternatif = Alternatif::all();
        $category = Category::all();
        $cripts = Crips::all();
        
        //dd(Alternatif::with('crips')->get());
        $Matrix_afinitas = [];
        $max = [];
        $min = [];

        //Cleaning alternatif data
        foreach ($alternatif as $key => $value) {
            # code...
            foreach ($category as $key1 => $value1) {
                # code...
                if(empty($value->crips[$key1]->nilai)){
                    // unset($Matrix_afinitas[$key]);
                    $Matrix_afinitas[$key] = 0;
                }else{
                    // $Matrix_afinitas[$key][$key1] = $value->crips[$key1]->nilai;
                }
            }
        }
        
        
        //Mencari Nilai Min Dan Max
        foreach ($category as $key => $value) {
            # code...
            $max[$key] = 0;
            $min[$key] = 999999999999999999999999999999999999999999999999999999999999999999999999;
        }
        
        foreach ($category as $key => $value) {
            # code...
            foreach ($alternatif as $key1 => $value1) {
                # code...
                //nilai max
                if(empty($value1->crips[$key])){
                    continue;
                }else{
                    if($max[$key] <= $value1->crips[$key]->nilai){
                        $max[$key] = $value1->crips[$key]->nilai;
                    }
                        
                    if($min[$key] >= $value1->crips[$key]->nilai){
                        $min[$key] = $value1->crips[$key]->nilai;
                    }
                }    
            }
            
        }

        
        //return $Matrix_afinitas;
        foreach ($alternatif as $key => $value) {
            # code...
            foreach ($category as $key1 => $value1) {
                # code...
                if(empty($value->crips[$key1])){
                    //unset($Matrix_R[$key]);
                    $Matrix_R[$key][$key1] = 0;
                }else{
                    if ($value1->atribut == 'Benefit') {
                        # code...
                        $Matrix_R[$key][$key1] = $value->crips[$key1]->nilai/$max[$key1];
                    }elseif ($value1->atribut == 'Cost') {
                        # code...
                        $Matrix_R[$key][$key1] = $min[$key1]/$value->crips[$key1]->nilai;
                    }   
                }
                
            }
        }
        //dd($Matrix_R);
        //hasil
        $hasil = [];
        foreach ($Matrix_R as $key => $value) {
            # code...
            $hasil[$key] = 0;
        }

        foreach ($alternatif as $key => $value) {
            # code...
            foreach ($category as $key1 => $value1) {
                # code...
                if(empty($Matrix_R[$key][$key1])){
                    continue;
                }else{
                    $hasil[$key] += ($Matrix_R[$key][$key1]*$value1->nilai_bobot);
                }
                
            }
            
        }
        
        //dd($Matrix_R);
        //return max($hasil);

        //return $data;
        //dd($Matrix_R);
        return view('pages.saw.hasil',compact('alternatif','category','Matrix_R','hasil'));
    }
}
