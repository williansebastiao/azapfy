<?php

namespace App\Business\DTO;

use App\Helpers\Date;
use App\Helpers\Str;

class InvoiceDTO
{

    public $user_id;
    public $document_code;
    public $amount;
    public $date_of_issue;
    public $document_sender;
    public $sender_name;
    public $document_transporter;
    public $transporter_name;

    public function __construct($document_code, $amount, $date_of_issue, $document_sender, $sender_name, $document_transporter, $transporter_name)
    {
        $this->user_id = auth()->user()->id;
        $this->document_code = $document_code;
        $this->amount = Str::monetary($amount);
        $this->date_of_issue = Date::database($date_of_issue);
        $this->document_sender = Str::clearSpecialCharacters($document_sender);
        $this->sender_name = $sender_name;
        $this->document_transporter = Str::clearSpecialCharacters($document_transporter);
        $this->transporter_name = $transporter_name;
    }

}
