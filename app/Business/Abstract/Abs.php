<?php

namespace App\Business\Abstract;

abstract class Abs
{
    abstract public function store(array $data);
    abstract public function findAll();
    abstract public function findByID();
    abstract public function update();
    abstract public function destroy();
}
