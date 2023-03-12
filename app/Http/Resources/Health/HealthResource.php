<?php

namespace App\Http\Resources\Health;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class HealthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'code' => Response::HTTP_OK,
            'app_id' => 'backoffice',
            'message' => 'success',
        ];
    }
}
