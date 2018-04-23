<?php

namespace EFrame\Http\Resources\Json;

use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Http\Resources\Json\ResourceCollection as IlluminateResourceCollection;

class ResourceCollection extends IlluminateResourceCollection
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function toResponse($request)
    {
        return $this->resource instanceof AbstractPaginator
                    ? (new PaginatedResourceResponse($this))->toResponse($request)
                    : parent::toResponse($request);
    }
}
