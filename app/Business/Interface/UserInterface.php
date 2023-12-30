<?php

namespace App\Business\Interface;

interface UserInterface
{
    public function store(array $data);
    public function findAll();
    public function findByID(int $id);
    public function update(int $id, array $data);
    public function destroy();
}
