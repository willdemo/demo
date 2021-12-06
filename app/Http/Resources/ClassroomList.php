<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\StudentList;

class ClassroomList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
        		'Classroom ID'=>$this->id,
        		'Name'=>$this->name,        		
        		'school_id'=>$this->school_id,
        		'Students'=>StudentList::collection($this->students),
        ]; 
    }
}
