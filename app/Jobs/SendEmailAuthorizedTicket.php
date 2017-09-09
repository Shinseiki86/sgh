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
    private $authorizer;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ticket, $authorizer)
    {
        $this->ticket = $ticket;
        $this->authorizer   = $authorizer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ticket = $this->ticket;
        $authorizer   = $this->authorizer;
        $view   = 'emails.info_ticket_autorizado';

        //if ($this->attempts() < 3) {
            Mail::send($view, compact('ticket'), function($message) use($ticket, $authorizer) {
                //Remitente
                $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
                //Asunto
                $TICK_ID = str_pad($ticket->TICK_ID, 6, '0', STR_PAD_LEFT);
                $message->subject('Ticket '.$TICK_ID.' autorizado');

                //Correo al usuario que autorizó el ticket y al responsable de GH
                $empl_email = $ticket->contrato->empleador->EMPL_CORREO;
                $message->to([ $authorizer->email, $empl_email ]);

                //Copia al usuario que creó el ticket y al jefe
                $owner = $ticket->usuario;
                $jefe_email =  Prospecto::getJefe($owner->cedula)->PROS_CORREO;
                $message->cc([ $owner->email, $jefe_email ]);
            });
        //}

    }



    // protected function sendEmailRechazo($tickets, $view, $asunto, $user_id)
    // {

    //     try{
    //         Mail::send($view, compact('tickets'), function($message) use ($asunto, $user_id){

    //             //============================================================================
    //             //bloque para determinar los correos a donde se despachara el email
                
    //             //usuario que lo autoriza
    //             $email_user_auto = \Auth::user()->email;
    //             //email del usuario que creo el ticket
    //             $email_user_creo = get_email_user($user_id);
        
    //             //============================================================================

    //             $copiaa = [$email_user_auto];

    //             //remitente
    //             $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
    //             //asunto
    //             $message->subject($asunto);
    //             //setea copia a
    //             $message->cc($copiaa, $name = null);
    //             //receptor
    //             //$message->to( explode(',', $para), $name = null);
    //             $message->to($email_user_creo, $name = null);

                
    //         });
    //     }
    //     catch(\Exception $e){
    //         flash_alert( 'Error: servicio de email no disponible:' . $e->getMessage() . '\n El Ticket fué enviado a G.H pero no se envió notificación', 'danger' );
    //     }

    // }

    // protected function sendEmailCerrar($tickets, $view, $asunto, $user_id)
    // {

    //     try{
    //         Mail::send($view, compact('tickets'), function($message) use ($asunto, $user_id){

    //             //============================================================================
    //             //bloque para determinar los correos a donde se despachara el email
                
    //             //usuario que lo autoriza
    //             $email_user_cierra = \Auth::user()->email;
    //             //email del usuario que creo el ticket
    //             $email_user_creo = get_email_user($user_id);
    //             //se obtiene el model con el usuario (user_id)
    //             $user = User::findOrFail($user_id);
    //             //se extrae la cedula del usuario y se determina quien es el jefe por un helper
    //             $jefe = get_jefe_prospecto($user->cedula);
    //             //se obtiene el email del jefe por un helper
    //             $email_jefe = get_email_jefe($jefe);
    //             //============================================================================

    //             //se envía copia al usuario que cierra el ticket y al que lo creo inicialmente. el mensaje se dirije al jefe que es quien autorizó el ticket
    //             $copiaa = [$email_user_cierra, $email_user_creo];
    //             //remitente
    //             $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
    //             //asunto
    //             $message->subject($asunto);
    //             //setea copia a
    //             $message->cc($copiaa, $name = null);
    //             //receptor
    //             //$message->to( explode(',', $para), $name = null);
    //             $message->to($email_jefe, $name = null);

                
    //         });
    //     }
    //     catch(\Exception $e){
    //         flash_alert( 'Error: servicio de email no disponible:' . $e->getMessage() . '\n El Ticket fué enviado a G.H pero no se envió notificación', 'danger' );
    //     }

    // }



}
