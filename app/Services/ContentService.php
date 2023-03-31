<?php

namespace App\Services;

use App\Models\Content;
use Illuminate\Http\Request;
 
class ContentService
{
    public function createContent(Request $request,$specific_detail_id)
    {
        // if request is photo
        if($request->hasFile('images')) {
            foreach($request->file('images') as $file)
            {
                $this->newContent(uploadPhoto($file),$request,$specific_detail_id);
            }
        }

        // if request is youtube link
        if($request->youtube_link) {
            $this->newContent($request->youtube_link,$request,$specific_detail_id);
        }
    }

    public function updateContent(Request $request,$id) {
        if($request->content_type == 'photos'){
            //to delete images on db & folder (deleted some old images by user)
            if($request->old){
                $todelete = Content::select('id')->where('specific_detail_id',$id)->whereNotIn('id',$request->old)->pluck('id');
            }else{
                $todelete = Content::where('specific_detail_id',$id)->pluck('id');
            }
            if($todelete){
                $contents = Content::whereIn('id',$todelete)->get();
                foreach($contents as $content) {
                    deletePhoto("public/$content->value");
                    $content->delete();
                }
            }

            //store new images
            if($request->hasFile('images')){
                foreach($request->file('images') as $file)
                {
                    $this->newContent(uploadPhoto($file),$request,$id);
                }
            }
        } else {
            // if youtube link exist
            Content::where('specific_detail_id',$id)->update([
                'content_type' => $request->content_type,
                'value' => $request->youtube_link,
            ]);
        }
    }

    function newContent($value,$request,$specific_detail_id) {
        $content = new Content();
        $content->value = $value;
        $content->content_type = $request->content_type;
        $content->specific_detail_id = $specific_detail_id;
        $content->save();
    }
}