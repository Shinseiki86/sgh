<?php

namespace SGH\Jobs;

use SGH\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

use SGH\Models\User;
use SGH\Models\Prospecto;

class SendEmailRejectedTicket extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $ticket;
    private $userRejects;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ticket, $userRejects)
    {
        $this->ticket = $ticket;
        $this->userRejects = $userRejects;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ticket = $this->ticket;
        $userRejects = $this->userRejects;
        $view   = 'layouts.emails.info_ticket_rechazado';

        //if ($this->attempts() < 3) {
            Mail::send($view, compact('ticket'), function($message) use($ticket, $userRejects) {
                //Remitente
                $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
                //Asunto
                $TICK_ID = str_pad($ticket->TICK_ID, 6, '0', STR_PAD_LEFT);
                $message->subject('Ticket '.$TICK_ID.' rechazado');

                //Correo al usuario que rechazó el ticket y al responsable de GH
                $empl_email = $ticket->contrato->empleador->EMPL_CORREO;
                $message->to([ $userRejects->email, $empl_email ]);

                //Copia al usuario que creó el ticket y al jefe
                $owner = $ticket->usuario;
                $jefe_email =  Prospecto::getJefe($owner->cedula)->PROS_CORREO;
                $message->cc([ $owner->email, $jefe_email ]);
            });
        //}

    }

}
