<?php

namespace SGH\Jobs;

use SGH\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

use SGH\Models\User;
use SGH\Models\Prospecto;

class SendEmailAuthorizedTicket extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $ticket;
    private $userAuthorizes;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ticket, $userAuthorizes)
    {
        $this->ticket = $ticket;
        $this->userAuthorizes = $userAuthorizes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ticket = $this->ticket;
        $userAuthorizes   = $this->userAuthorizes;
        $view   = 'layouts.emails.info_ticket_autorizado';

        //if ($this->attempts() < 3) {
            Mail::send($view, compact('ticket'), function($message) use($ticket, $userAuthorizes) {
                //Remitente
                $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
                //Asunto
                $TICK_ID = str_pad($ticket->TICK_ID, 6, '0', STR_PAD_LEFT);
                $message->subject('Ticket '.$TICK_ID.' autorizado');

                //Correo al usuario que autorizó el ticket y al responsable de GH
                $empl_email = $ticket->contrato->empleador->EMPL_CORREO;
                $message->to([ $userAuthorizes->email, $empl_email ]);

                //Copia al usuario que creó el ticket y al jefe
                $owner = $ticket->usuario;
                $jefe_email =  Prospecto::getJefe($owner->cedula)->PROS_CORREO;
                $message->cc([ $owner->email, $jefe_email ]);
            });
        //}

    }
}
