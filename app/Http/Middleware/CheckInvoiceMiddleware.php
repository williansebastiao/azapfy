<?php

namespace App\Http\Middleware;

use App\Business\Enum\StatusCode;
use App\Models\Invoice;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckInvoiceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $invoiceId = $request->route('id');
        $invoice = Invoice::find($invoiceId);

        if (auth()->user()->id !== $invoice->user_id)
        {
            return \App\Helpers\Response::output(StatusCode::UNAUTHORIZED, 'Você não permissão para acessar este registro');
        }

        return $next($request);
    }
}
