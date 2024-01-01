<?php

namespace Tests\Unit\Invoice;

use PHPUnit\Framework\TestCase;
use Tests\Mock\Invoice\Business\InvoiceRepository;

class InvoiceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testShouldReturnTrueWhenHaveData(): void
    {
        $invoiceRepository = new InvoiceRepository();
        $response = $invoiceRepository->findAll();
        $this->assertIsArray($response);
    }

    public function testShouldReturnFalseWhenNotHaveData(): void
    {
        $invoiceRepository = new InvoiceRepository();
        $response = $invoiceRepository->findAll();
        $this->assertIsNotObject($response);
    }
}
