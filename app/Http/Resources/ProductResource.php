<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources;


class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
     //   return parent::toArray($request);
        return [
            "id"=>$this->id,
          "name"=>$this->name,
          "image"=>$this->image,
          "price"=>$this->price,
            "description" => $this->description,
            "creator_id"=> $this->creator_id,
            'category_id'=>$this->category ? $this->category->id: null,
            'category_name'=>$this->category ? $this->category->name: null,

    
        ];
    }
}
