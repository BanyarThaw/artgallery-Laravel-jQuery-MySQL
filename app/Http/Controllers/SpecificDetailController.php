<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateSpecificDetailRequest;
use App\Models\Category;
use App\Models\Content;
use App\Models\Sector;
use App\Models\SpecificDetail;
use App\Models\SubSector;
use App\Models\SubType;
use App\Models\Type;
use App\Services\ContentService;
use App\Services\SpecificDetailService;
use App\Traits\ContentTrait;
use App\Traits\SpecificDetailTrait;

class SpecificDetailController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::cursor();
        $types = Type::cursor();
        $sectors = Sector::cursor();

        return view('specific_detail.create',compact('categories','types','sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateSpecificDetailRequest $request,SpecificDetailService $SpecificDetailService,ContentService $contentService) {
        $specific_detail = $SpecificDetailService->createOrUpdateSpecificDetail($request);
        $contentService->createContent($request,$specific_detail->id);
        
        return redirect()->route('subsectors.content',$request->sub_sector_id)->with('info','Content Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = SpecificDetail::find($id);

        return view('specific_detail.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specific_detail = SpecificDetail::with('contents')->where('id',$id)->first();
        $categories = Category::cursor();
        $types = Type::cursor();
        $sectors = Sector::cursor();
        $sub_sectors = SubSector::where('sector_id',$specific_detail->sector_id)->orderBy('created_at','desc')->get();
        $types = Type::cursor();
        $sub_types = SubType::where('type_id',$specific_detail->type_id)->orderBy('created_at','desc')->get();

        $contents = Content::where('specific_detail_id',$id)->get()->toArray();
        return view('specific_detail.edit',compact('categories','types','sectors','specific_detail','contents','sub_sectors','types','sub_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateSpecificDetailRequest $request,$id,SpecificDetailService $SpecificDetailService,ContentService $contentService) {
        $SpecificDetailService->createOrUpdateSpecificDetail($request,$id);
        $contentService->updateContent($request,$id);

        return redirect()->route('subsectors.content',$request->sub_sector_id)->with("info","Specific Detail updated!!!");
    }

    public function getContents($id) {
        $specific_detail = SpecificDetail::where('id',$id)->first();
        $oldImages = [];
        foreach($specific_detail->contents as $content){
            $oldImages[] = [
                'id' => $content->id,
                'src' => asset('/storage/'.$content->value),
            ];
        }
        return response()->json($oldImages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->deleteContentPhoto('id',$id);

        $specific_detail = SpecificDetail::find($id);
        $specific_detail->delete();

        return redirect()->route('sub-sectors.index')->with('info','Content Deleted successfully.');
    }
    
    public function get_sub_types_of_type($id) {
        $data = SubType::where('type_id',$id)->orderBy('created_at','DESC')->get();

        return view('specific_detail.show_options',compact('data'));
    }

    public function get_sub_sectors_of_sector($id) {
        $data = SubSector::where('sector_id',$id)->orderBy('created_at','DESC')->get();

        return view('specific_detail.show_options',compact('data'));
    }

    public function contents($sub_sector_id) {
        $sub_sector = SubSector::find($sub_sector_id);

        $data = $this->get_contents('sub_sector_id',$sub_sector->id);
        
        return view('specific_detail.contents',compact('data','sub_sector'));
    }

    public function contents_by_category($cat_id) {
        $info = Category::find($cat_id);
        $data = $this->get_contents('category_id',$cat_id);

        return view('specific_detail.category',compact('data','info'));
    }
}
