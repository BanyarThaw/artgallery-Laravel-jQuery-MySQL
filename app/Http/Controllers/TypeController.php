<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Services\TypeService;
use App\Traits\SpecificDetailTrait;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    use SpecificDetailTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Type::orderBy('created_at','DESC')->paginate(10);

        return view('types.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,TypeService $typeService)
    {
        $typeService->createOrUpdateType($request);

        return redirect()->route('types.index')->with("info","New Type created!!!");
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
        $data = Type::find($id);

        return view('types.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,TypeService $typeService)
    {
        $typeService->createOrUpdateType($request,$id);

        return redirect()->route('types.index')->with("info","Type updated successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->deleteContentPhoto('type_id',$id);

        $type = Type::find($id);
        $type->delete();

        return redirect()->route('types.index')->with("info","Type deleted Successfully!!!");
    }
}
