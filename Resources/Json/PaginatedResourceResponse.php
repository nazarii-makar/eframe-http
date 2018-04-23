<?php

namespace EFrame\Http\Resources\Json;

use Illuminate\Support\Arr;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse as IlluminatePaginatedResourceResponse;

class PaginatedResourceResponse extends IlluminatePaginatedResourceResponse
{
    /**
     * Gather the meta data for the response.
     *
     * @param  array $paginated
     *
     * @return array
     */
    protected function meta($paginated)
    {
        $paginated = $this->resource->resource->toArray();

        return Arr::except($paginated, [
                'data',
                'first_page_url',
                'last_page_url',
                'prev_page_url',
                'next_page_url',
                'current_page',
                'current_let',
                'per_page',
                'last_page',
            ]) + [
                'pages' => $paginated['last_page'] ?? null,
                'page'  => $paginated['current_page'] ?? null,
                'let'   => $paginated['current_let'] ?? null,
                'limit' => $paginated['per_page'] ?? null,
            ];
    }
}
