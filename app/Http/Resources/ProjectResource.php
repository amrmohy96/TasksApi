<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "user_name" => $this->user->name,
            "name" => $this->name,
            "tasks" => TaskResource::collection($this->whenLoaded('tasks')),
            "tasks_count" => $this->tasks_count,
            "created_at" => $this->created_at->diffForHumans(),
            "updated_at" => $this->updated_at->diffForHumans()
        ];
    }

    public function with($request)
    {
        return [
            'Status' => "200 OK"
        ]; // TODO: Change the autogenerated stub
    }
}
