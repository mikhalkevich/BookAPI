<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $media_files = [];
        if($this->getMedia()){
          foreach($this->getMedia() as $mediaItem){
              $media_files[] = ['url' => $mediaItem->getUrl(),'extension'=>$mediaItem->mime_type];
          }
        }
        return [
            'id'=>$this->id,
            'name' => $this->name,
            'ibsn' => $this->ibsn,
            'status' => $this->status,
            'year' => $this->year,
            'description' => $this->description,
            'language' => $this->language,
            'cover' => asset('storage/uploads/'.$this->image),
            'author_name'=> optional($this->author)->name,
            'author_obj'=>$this->when($request->author_obj, new BookAuthorResource($this->author)),
            'publisher'=>$this->publishing->name,
            'publisher_obj'=>$this->when($request->publisher_obj, new BookPublishingResource($this->publishing)),
            'publisher_city'=>$this->publishing->city,
            'media_files'=>$media_files,
            'media'=>$this->when($request->media, $this->getMedia()),
            'catalogs'=>CatalogBookResource::collection($this->catalogs),
        ];
    }
}
