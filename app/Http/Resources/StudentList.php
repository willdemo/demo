<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentList extends JsonResource
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
        		'Student Number'=>$this->student_number,
        		'First Name'=>$this->first_name,
        		'Last Name'=>$this->last_name,
        		'Full Name'=>($this->first_name. ' '.$this->last_name),
        		'Classroom Info'=>$this->classroom,
        ]; 
    }
}
