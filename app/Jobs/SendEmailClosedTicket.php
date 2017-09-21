<?php

namespace SGH\Jobs;

use SGH\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

use SGH\Models\User;
use SGH\Models\Prospecto;

class SendEmailClosedTicket extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $ticket;
    private $userCloses;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ticket, $userCloses)
    {
        $this->ticket = $ticket;
        $this->userCloses = $userCloses;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ticket = $this->ticket;
        $userCloses = $this->userCloses;
        $view   = 'layouts.emails.info_ticket_cerrado';

        //if ($this->attempts() < 3) {
        try{
            Mail::send($view, compact('ticket'), function($message) use($ticket, $userCloses) {
                //Remitente
                $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
                //Asunto
                $TICK_ID = str_pad($ticket->TICK_ID, 6, '0', STR_PAD_LEFT);
                $message->subject('Ticket '.$TICK_ID.' cerrado por G.H.');

                //Correo al usuario que cerró el ticket y al responsable de GH
                $empleador = $ticket->contrato->empleador;
                $to = [ $userCloses->email ];
                if(isset($empleador->EMPL_CORREO))
                    $to[] = $empleador->EMPL_CORREO;
                $message->to($to);

                //Copia al usuario que creó el ticket y al jefe
                $owner = $ticket->usuario;
                $jefe =  Prospecto::getJefe($owner->cedula);
                $cc = [ $owner->email ];
                if(isset($jefe->PROS_CORREO))
                    $cc[] = $jefe->PROS_CORREO;
                $message->cc($cc);
            });
        } catch(\Exception $e){
            flash_alert( 'Error enviando correo para ticket '.$ticket->TICK_ID.' ('.$e->getMessage().')', 'danger' );
        }
    }
}
