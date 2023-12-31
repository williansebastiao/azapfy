<?php

namespace App\Business\Repositories;

use App\Business\Interface\InvoiceInterface;
use App\Models\Invoice;
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

}
