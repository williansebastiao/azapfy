<?php

namespace App\Http\Controllers\Api;

use App\Business\Enum\StatusCode;
use App\Business\Repositories\InvoiceRepository;
use App\Business\Services\InvoiceService;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validators\InvoiceRequest;
use Illuminate\Http\JsonResponse;

class InvoiceController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $invoiceRepository = new InvoiceRepository();
            return Response::output(StatusCode::SUCCESS, 'Registro de invoices', $invoiceRepository->findAll());
        } catch (\Exception $e) {
            return Response::output($e->getCode(), $e->getMessage());
        }
    }

    /**
     * @param InvoiceRequest $request
     * @return JsonResponse
     */
    public function store(InvoiceRequest $request)
    {
        try {
            $invoiceService = new InvoiceService();
            return $invoiceService->store($request->validated());
        } catch (\Exception $e) {
            return Response::output($e->getCode(), $e->getMessage());
        }
    }

    public function show($id)
    {

    }

    public function update($id, InvoiceRequest $request)
    {

    }

    public function destroy ($id)
    {

    }
}
