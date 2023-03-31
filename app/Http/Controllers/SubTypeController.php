<?php

namespace App\Http\Controllers;

use App\Models\SubType;
use App\Models\Type;
use App\Services\SubTypeService;
use App\Traits\ContentTrait;
use App\Traits\SpecificDetailTrait;
use Illuminate\Http\Request;

class SubTypeController extends Controller
{
    use ContentTrait;
    use SpecificDetailTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SubType::orderBy('created_at','desc')->paginate(13);

        return view('sub_types.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::cursor();

        return view('sub_types.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,SubTypeService $subTypeService) {
        $subTypeService->createOrUpdateSubType($request);       

        return redirect()->route('sub-types.index')->with("info","New Sub Type created!!!");
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
        $data = SubType::find($id);
        $types = Type::cursor();

        return view('sub_types.edit',compact('data','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,SubTypeService $subTypeService)
    {
        $subTypeService->createOrUpdateSubType($request,$id); 

        return redirect()->route('sub-types.index')->with("info","Sub Type updated!!!");
    }

    public function contents_by_sub_type($id) {
        $info = SubType::find($id);
        $data = $this->get_contents('sub_type_id',$info->id);

        return view('sub_types.contents',compact('data','info'));
    }

    public function list($id) {
        $type = Type::find($id);

        $data = SubType::where('type_id',$id)->orderBy('created_at','desc')->paginate(13);

        return view('sub_types.list',compact('data','type'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->deleteContentPhoto('sub_type_id',$id);

        $sub_type = SubType::find($id);
        $sub_type->delete();

        return redirect()->route('sub-types.index')->with("info","Sub Type deleted");
    }
}
