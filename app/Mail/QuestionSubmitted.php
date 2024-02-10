<?php

namespace App\Mail;

use App\Models\Question;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuestionSubmitted extends Mailable
{
    use SerializesModels;

    public $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function build()
    {
        return $this->view('email.question-submitted')
                    ->subject('Консультация по оборудованию');
    }
}