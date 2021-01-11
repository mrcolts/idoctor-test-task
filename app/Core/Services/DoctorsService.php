<?php


namespace App\Core\Services;


use App\Http\Requests\DoctorsIndexRequest;
use App\Http\Requests\PaginateListRequest;
use App\Http\Resources\DoctorsIndexResource;
use App\Models\Doctor;


final class DoctorsService extends BaseService
{
    public function index(DoctorsIndexRequest $request,
                          PaginateListRequest $paginate_request)
    {
        $doctors = Doctor::filter($request->all())
            ->paginateFilter(15, ['*'], $paginate_request['page']);

        return $this->sentPaginatedResponse(
            resource: DoctorsIndexResource::class,
            result: $doctors,
            message: 'Doctors retrieved successfully.'
        );
    }
}
