<?php

namespace App\Business\Abstract;

abstract class Abs
{
    abstract public function store(array $data);
    abstract public function findAll();
    abstract public function findByID(int $id);
    abstract public function update(int $id, array $data);
    abstract public function destroy();
}
