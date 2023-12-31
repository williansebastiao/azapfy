<?php

namespace App\Business\Interface;

interface InvoiceInterface
{
    public function findAll();
    public function store(array $data);
}
