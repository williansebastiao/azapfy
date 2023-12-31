<?php

namespace App\Business\Interface;

interface InvoiceInterface
{
    public function findAll();
    public function store(array $data);
    public function show(int $id);
    public function update(int $id, array $data);
    public function destroy(int $id);
}
