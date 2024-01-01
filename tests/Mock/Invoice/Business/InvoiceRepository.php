<?php

namespace Tests\Mock\Invoice\Business;

use App\Business\Enum\StatusCode;

class InvoiceRepository
{
    public function findAll()
    {
        return [
            "status_code" => StatusCode::SUCCESS,
            "message" => "Registro de invoices",
            "body" => [
                "current_page" => 1,
                "data" => [
                    [
                        "id" => 4,
                        "user_id" => 2,
                        "document_code" => "000000004",
                        "amount" => 123456.78,
                        "date_of_issue" => "2024-01-01",
                        "document_sender" => "10318601000109",
                        "sender_name" => "Ingrid",
                        "document_transporter" => "10318601000109",
                        "transporter_name" => "Ingrid",
                        "active" => 1,
                        "created_at" => "2024-01-01T18 =>41 =>35.000000Z",
                        "updated_at" => "2024-01-01T18 =>41 =>35.000000Z",
                        "deleted_at" => null,
                        "user" => [
                            "id" => 2,
                            "first_name" => "Ingrid",
                            "last_name" => "Soares",
                            "email" => "ingrid@4vconnect.com",
                            "email_verified_at" => "2024-01-01T18 =>20 =>41.000000Z",
                            "active" => 1,
                            "created_at" => "2024-01-01T18 =>19 =>52.000000Z",
                            "updated_at" => "2024-01-01T18 =>20 =>41.000000Z",
                            "deleted_at" => null
                        ]
                    ],
                    [
                        "id" => 3,
                        "user_id" => 2,
                        "document_code" => "000000003",
                        "amount" => 123456.78,
                        "date_of_issue" => "2024-01-01",
                        "document_sender" => "10318601000109",
                        "sender_name" => "Ingrid",
                        "document_transporter" => "10318601000109",
                        "transporter_name" => "Ingrid",
                        "active" => 1,
                        "created_at" => "2024-01-01T18 =>41 =>28.000000Z",
                        "updated_at" => "2024-01-01T18 =>41 =>28.000000Z",
                        "deleted_at" => null,
                        "user" => [
                            "id" => 2,
                            "first_name" => "Ingrid",
                            "last_name" => "Soares",
                            "email" => "ingrid@4vconnect.com",
                            "email_verified_at" => "2024-01-01T18 =>20 =>41.000000Z",
                            "active" => 1,
                            "created_at" => "2024-01-01T18 =>19 =>52.000000Z",
                            "updated_at" => "2024-01-01T18 =>20 =>41.000000Z",
                            "deleted_at" => null
                        ]
                    ],
                    [
                        "id" => 2,
                        "user_id" => 1,
                        "document_code" => "000000002",
                        "amount" => 123456.78,
                        "date_of_issue" => "2024-01-01",
                        "document_sender" => "10318601000109",
                        "sender_name" => "Willians",
                        "document_transporter" => "10318601000109",
                        "transporter_name" => "Willians",
                        "active" => 1,
                        "created_at" => "2024-01-01T18 =>34 =>14.000000Z",
                        "updated_at" => "2024-01-01T18 =>34 =>14.000000Z",
                        "deleted_at" => null,
                        "user" => [
                            "id" => 1,
                            "first_name" => "Willians",
                            "last_name" => "Pereira",
                            "email" => "willians@4vconnect.com",
                            "email_verified_at" => "2024-01-01T18 =>20 =>26.000000Z",
                            "active" => 1,
                            "created_at" => "2024-01-01T18 =>19 =>17.000000Z",
                            "updated_at" => "2024-01-01T18 =>20 =>26.000000Z",
                            "deleted_at" => null
                        ]
                    ],
                    [
                        "id" => 1,
                        "user_id" => 1,
                        "document_code" => "000000001",
                        "amount" => 123456.78,
                        "date_of_issue" => "2024-01-01",
                        "document_sender" => "10318601000109",
                        "sender_name" => "Willians",
                        "document_transporter" => "10318601000109",
                        "transporter_name" => "Willians",
                        "active" => 1,
                        "created_at" => "2024-01-01T18 =>31 =>58.000000Z",
                        "updated_at" => "2024-01-01T18 =>31 =>58.000000Z",
                        "deleted_at" => null,
                        "user" => [
                            "id" => 1,
                            "first_name" => "Willians",
                            "last_name" => "Pereira",
                            "email" => "willians@4vconnect.com",
                            "email_verified_at" => "2024-01-01T18 =>20 =>26.000000Z",
                            "active" => 1,
                            "created_at" => "2024-01-01T18 =>19 =>17.000000Z",
                            "updated_at" => "2024-01-01T18 =>20 =>26.000000Z",
                            "deleted_at" => null
                        ]
                    ]
                ],
                "first_page_url" => "http://localhost:8000/api/invoice?page=1",
                "from" => 1,
                "last_page" => 1,
                "last_page_url" => "http://localhost:8000/api/invoice?page=1",
                "links" => [
                    [
                        "url" => null,
                        "label" => "&laquo; Anterior",
                        "active" => false
                    ],
                    [
                        "url" => "http://localhost:8000/api/invoice?page=1",
                        "label" => "1",
                        "active" => true
                    ],
                    [
                        "url" => null,
                        "label" => "Próximo &raquo;",
                        "active" => false
                    ]
                ],
                "next_page_url" => null,
                "path" => "http://localhost:8000/api/invoice",
                "per_page" => 15,
                "prev_page_url" => null,
                "to" => 4,
                "total" => 4
            ]
        ];
    }
}
