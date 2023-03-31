<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataResource extends JsonResource
{
    public $content;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {   
        if($this->content_type == 'youtube_link') {
            $this->content = 'https://img.youtube.com/vi/'.$this->value.'/hqdefault.jpg';
        } else {
            $this->content = asset('storage/'.$this->value);
        }
        return [
            'id' => $this->id,
            'value' => $this->content,
            'content_type' => $this->content_type,
        ];
    }
}
