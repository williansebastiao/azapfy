<x-mail::message>
# Nota fiscal

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam cursus finibus velit, a luctus metus tempor at.

<table>
    <tr>
        <td>Número: </td>
        <td>{{ $invoice->document_code }}</td>
    </tr>
    <tr>
        <td>Valor: </td>
        <td>{{ \App\Helpers\Str::moneyFormat($invoice->amount) }}</td>
    </tr>
    <tr>
        <td>Data de emissão: </td>
        <td>{{ \App\Helpers\Date::brazil($invoice->date_of_issue) }}</td>
    </tr>
    <tr>
        <td>CNPJ do remetente: </td>
        <td>{{ \App\Helpers\Str::mask('##.###.###/####-##', $invoice->document_sender) }}</td>
    </tr>
    <tr>
        <td>Nome do remetente: </td>
        <td>{{ $invoice->sender_name }}</td>
    </tr>
    <tr>
        <td>CNPJ do transportador: </td>
        <td>{{ \App\Helpers\Str::mask('##.###.###/####-##', $invoice->document_transporter) }}</td>
    </tr>
    <tr>
        <td>Nome do transportador: </td>
        <td>{{ $invoice->transporter_name }}</td>
    </tr>
</table>
<br />

Obrigado!,<br>
{{ config('app.name') }}
</x-mail::message>
