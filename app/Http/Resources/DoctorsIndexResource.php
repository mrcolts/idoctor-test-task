<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorsIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this['id'],
            'firstName' => $this['first_name'],
            'lastName' => $this['last_name'],
            'city' => $this['city'],
            'worksSinceYear' => $this['works_since_year'],

            'skills' => SkillsIndexResource::collection($this['skills']),
        ];
    }
}
