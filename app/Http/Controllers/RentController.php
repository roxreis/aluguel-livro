<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Models\Rent;
use App\Repository\RentRepository;
use Symfony\Component\HttpFoundation\Response;

class RentController extends Controller
{
    private RentRepository $repository;

    public function __construct(RentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getRents()
    {
        return response()->json(
            $this->repository->paginate()
        );
    }

    public function create()
    {
        //
    }

    public function postRent(StoreRentRequest $request)
    {
        $payload = $this->repository->getPayloadValidated($request);
        return response()->json(
            $this->repository->create($payload),
            Response::HTTP_CREATED
        );
    }

    public function getRent(int $id)
    {
        return response()->json(
            $this->repository->find($id)
        );
    }

    public function edit(Rent $rent)
    {
        //
    }

    public function putRent(UpdateRentRequest $request, int $id)
    {
        $payload = $this->repository->getPayloadValidated($request);
        return response()->json(
            $this->repository->update($id, $payload)
        );
    }

    public function deleteRent(int $id)
    {
        return response()->json(
            $this->repository->delete($id),
            Response::HTTP_NO_CONTENT
        );
    }
}
