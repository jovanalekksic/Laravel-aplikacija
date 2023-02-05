<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'book';

    //         "name" => $this->faker->slug(),
    //         "genre_id" => Genre::factory(),
    //         "title" => $this->faker->word(),
    //         "author" => $this->faker->firstName(),
    //         "description" => $this->faker->sentence(),
    //         "user_id" => User::factory(),
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            //'name' => $this->resource->name,
            'genre' => $this->resource->genre,
            'author' => $this->resource->author,
            'description' => $this->resource->description,
            'user' => new UserResource($this->resource->user)
        ];
    }
}
