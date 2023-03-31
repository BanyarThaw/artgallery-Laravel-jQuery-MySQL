<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Services\SectorService;
use App\Traits\SpecificDetailTrait;
use App\Traits\SubSectorTrait;
use Illuminate\Http\Request;

class SectorController extends Controller
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
        $data = Sector::orderBy('created_at','DESC')->paginate(10);

        return view('sectors.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,SectorService $sectorService)
    {
        $sectorService->createOrUpdateSector($request);

        return redirect()->route('sectors.index')->with("info","New Sector created!!!");
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
        $data = Sector::find($id);

        return view('sectors.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,SectorService $sectorService)
    {
        $sectorService->createOrUpdateSector($request,$id);

        return redirect()->route('sectors.index')->with("info","Sector updated!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->deleteContentPhoto('sector_id',$id);
        $this->deleteSubSectorPhoto($id);
        
        $sector = Sector::find($id);
        $sector->delete();

        return redirect()->route('sectors.index')->with("info","Sector deleted");
    }
}
