<?php

namespace App\Http\Controllers\Api;

use App\Business\Enum\StatusCode;
use App\Business\Repositories\InvoiceRepository;
use App\Business\Services\InvoiceService;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validators\InvoiceRequest;
use Illuminate\Database\QueryException;
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
    public function store(InvoiceRequest $request): JsonResponse
    {
        try {
            $invoiceService = new InvoiceService();
            return Response::output(StatusCode::CREATED, 'Registro salvo com sucesso', $invoiceService->store($request->validated()));
        } catch (\Exception $e) {
            return Response::output($e->getCode(), $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $invoiceRepository = new InvoiceRepository();
        return Response::output(StatusCode::SUCCESS, 'Registro encontrado', $invoiceRepository->show($id));
    }

    /**
     * @param $id
     * @param InvoiceRequest $request
     * @return JsonResponse
     */
    public function update($id, InvoiceRequest $request): JsonResponse
    {
        try {
            $invoiceService = new InvoiceService();
            return Response::output(StatusCode::SUCCESS, 'Registro atualizado', $invoiceService->update($id, $request->validated()));
        } catch (\Exception $e) {
            return Response::output($e->getCode(), $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy ($id): JsonResponse
    {
        try {
            $invoiceRepository = new InvoiceRepository();
            $invoiceRepository->destroy($id);
            return Response::output(StatusCode::SUCCESS, 'Registro excluído');
        } catch (\Exception $e) {
            return Response::output($e->getCode(), $e->getMessage());
        }
    }
}
