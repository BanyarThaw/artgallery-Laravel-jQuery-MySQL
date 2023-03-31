<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Category;
use App\Models\Content;
use App\Models\Sector;
use App\Models\SubSector;
use App\Models\SubType;
use App\Models\Type;

class PublicController extends Controller
{
    public function header($title) {
        $contents = ($title == 'category') ? Category::cursor() : (($title == 'types')  ? Type::cursor() : Sector::cursor());

        return response()->json([ "success" => true,"data" => $contents ]);
    }

    public function sub_sectors($sector_id) {
        $sub_sectors = SubSector::where('sector_id',$sector_id)->take(6)
                        ->orderBy('id','desc')
                        ->get();

        return response()->json([ "data" => $sub_sectors ]);
    }

    public function sub_sectors_more($sector_id,$lastid) {
        $sub_sectors = SubSector::where('sector_id',$sector_id)->where('id','<',$lastid)
                            ->take(6)
                            ->orderBy('id','desc')
                            ->get();

        return response()->json([ "data" => $sub_sectors ]);
    }

    public function sub_types($type_id) {
        $sub_types = SubType::where('type_id',$type_id)->take(6)
                        ->orderBy('id','desc')
                        ->get();

        return response()->json([ "data" => $sub_types ]);
    }

    public function sub_types_more($type_id,$lastid) {
        $sub_types = SubType::where('type_id',$type_id)->where('id','<',$lastid)
                    ->take(6)
                    ->orderBy('id','desc')
                    ->get();

        return response()->json([ "data" => $sub_types ]);
    }

    public function index($type,$id) {
        if($type == 'latest') {
            $contents = Content::orderBy('id','desc')->paginate(12);
        } else { 
            $contents = Content::whereHas('specific_detail',function($q) use ($type,$id) {
                    $q->where($type,$id);
                })
                ->select('id','value','content_type')
                ->orderBy('id','desc')
                ->paginate(12);   
        }
    
        return response()->json([
            "success" => true,
            "message"  => $type." data", 
            "data" => DataResource::collection($contents),
        ],200);
    }

    public function show($id) {
        $content = Content::find($id);
        $value = ($content->content_type == 'youtube_link') ? "//www.youtube.com/embed/".$content->value."?rel=0&vq=hd240" : asset('storage/'.$content->value);
        $data = [
            "id" => $content->id,
            "value" => $value,
            "content type" => $content->content_type,
        ];

        return response()->json([ "success" => true,"data" => $data ]);
    }

    public function data($each_respective_name,$each_respective_id,$lastid) {
        if($each_respective_name == 'latest') {
            $contents = Content::where('id','<',$lastid)->take(12)->orderBy('id','desc')->get();
        } else {
            $contents = Content::where('id','<',$lastid)->whereHas('specific_detail',function($q) use ($each_respective_name,$each_respective_id) {
                            $q->where($each_respective_name,$each_respective_id);
                        })
                        ->take(12)
                        ->orderBy('id','desc')
                        ->get();
        }

        return response()->json([ "data" => DataResource::collection($contents) ]);
    }
}
