<?php

namespace App\Repository;

use App\Models\Rent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class RentRepository
{
  const PAGINATION_SIZE = 10;

  private Builder $query;

  public function __construct()
  {
    $this->query = Rent::query();
  }

  public function find(int $id)
  {
    $hasRegister = $this->findRegisterByParam('id', $id);
    if ($hasRegister === 0)
      return response()->json([
        'message' => 'This id not exist'
      ], 404);

    return $this->query->findOrFail($id);
  }

  public function paginate()
  {
    $hasRegister = DB::table('rents')->get()->count();
    if ($hasRegister === 0)
      return response()->json([
        'message' => 'Not content'
      ], 204);

    return $this->query->paginate(self::PAGINATION_SIZE);
  }

  public function findRegisterByParam(string $column, mixed $value): mixed
  {
    return DB::table('rents')->where("$column", $value)->count();
  }


  public function create(array $payload)
  {
    $hasRegister = $this->findRegisterByParam('book_id_fk', $payload['book_id_fk']);
    if ($hasRegister > 0)
      return response()->json([
        'message' => 'This book is already rented'
      ], 502);

    return $this->query->create($payload);
  }


  public function update(int $id, array $payload)
  {
    $hasRegister =  $this->findRegisterByParam('id', $id);
    if ($hasRegister === 0)
      return response()->json([
        'message' => 'This id not exist'
      ], 404);

    $this->query->find($id)->update($payload);

    return $this->query->find($id);
  }

  public function getPayloadValidated($data)
  {
    $validated = array_merge($data->validated());

    return $validated;
  }

  public function delete(int $id)
  {
    $hasRegister =  $this->findRegisterByParam('id', $id);
    if ($hasRegister === 0)
      return response()->json([
        'message' => 'This address not exist'
      ], 404);

    return $this->query->findOrFail($id)->delete();
  }
}
