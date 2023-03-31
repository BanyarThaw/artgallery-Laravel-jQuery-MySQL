<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubSectorRequest;
use App\Http\Requests\UpdateSubSectorRequest;
use App\Models\Sector;
use App\Models\SubSector;
use App\Models\Type;
use App\Services\SubSectorService;
use App\Traits\SpecificDetailTrait;
use App\Traits\SubSectorTrait;

class SubSectorController extends Controller
{
    use SpecificDetailTrait;
    use SubSectorTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SubSector::orderBy('created_at','DESC')->paginate(13);

        return view('sub_sectors.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectors = Sector::cursor();
        $types = Type::cursor();

        return view('sub_sectors.create',compact('sectors','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubSectorRequest $request,SubSectorService $subSectorService) {
        $subSectorService->createSubSector($request);

        return redirect()->route('sub-sectors.index')->with("info","New Sub Sector created!!!");
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
        $data = SubSector::find($id);
        $sectors = Sector::cursor();

        return view('sub_sectors.edit',compact('data','sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubSectorRequest $request,SubSectorService $subSectorService,$id) { 
        $subSectorService->updateSubSector($request,$id);

        return redirect()->route('sub-sectors.index')->with("info","Sub Sector updated!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->deleteContentPhoto('sub_sector_id',$id);

        $sub_sector = SubSector::find($id);

        deletePhoto("public/$sub_sector->sub_sector_logo");
        
        $sub_sector->delete();

        return redirect()->route('sub-sectors.index')->with('info','Sub Sector deleted!!!');
    }

    public function list($id) {
        $sector = Sector::find($id);

        $data = SubSector::where('sector_id',$id)->orderBy('created_at','desc')->paginate(12);

        return view('sub_sectors.list',compact('data','sector'));
    }
}
