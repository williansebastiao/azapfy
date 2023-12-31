<?php

namespace App\Business\Repositories;

use App\Business\Interface\InvoiceInterface;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class InvoiceRepository implements InvoiceInterface
{

    /**
     * @return LengthAwarePaginator
     */
    public function findAll(): LengthAwarePaginator
    {
        return Invoice::where('active', 1)
            ->orderBy('id', 'desc')
            ->with('user')
            ->paginate();
    }

    /**
     * @param array $data
     * @return Invoice
     */
    public function store(array $data): Invoice
    {
        return Invoice::create($data);
    }

    /**
     * @param int $id
     * @return Invoice
     */
    public function show(int $id): Invoice
    {
        return Invoice::with('user')->find($id);
    }

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        return Invoice::find($id)->update($data);
    }

    public function destroy(int $id): bool
    {
        return Invoice::find($id)->delete();
    }

}
