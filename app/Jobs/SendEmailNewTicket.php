<?php

namespace SGH\Jobs;

use SGH\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Mail;

class SendEmailNewTicket extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $ticket;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $view = 'emails.info_ticket_creado';

            Mail::send($view,['ticket'=>$this->ticket], function($message) {//use ($user){

                $message->to('shinseiki86@gmail.com', 'Diego Cortés');

                //============================================================================
                //bloque para determinar los correos a donde se despachara el email
                
                //obtiene la cedula del usuario
                $cedula = $user->cedula;
                //obtiene el id del prospecto que se encuentra como jefe en el contrato
                $jefe = get_jefe_prospecto($cedula);
                //obtiene el email del jefe
                $jefe_email = get_email_jefe($jefe);
                //============================================================================

                //Se obtiene el usuario que creó el ticket
                $user = auth()->user();
                //remitente
                $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
                //asunto
                $message->subject($asunto);
                //email del creador del ticket
                $copiaa = $user->email;
                //setea copia a
                $message->cc($copiaa, $name = null);
                //receptor
                //$message->to( explode(',', $para), $name = null);
                $message->to($jefe_email, $name = null);
            });

    }




    // protected function sendEmailAutorizacion($tickets, $view, $asunto, $empl_id, $user_id)
    // {

    //     try{
    //         Mail::send($view, compact('tickets'), function($message) use ($asunto, $empl_id, $user_id){

    //             //============================================================================
    //             //bloque para determinar los correos a donde se despachara el email
                
    //             //usuario que lo autoriza
    //             $email_user_auto = \Auth::user()->email;
    //             //email de la persona encargada del empleador
    //             $empl_email = get_email_empleador($empl_id);
    //             //email del usuario que creo el ticket
    //             $email_user_creo = get_email_user($user_id);
        
    //             //============================================================================

    //             $copiaa = [$email_user_auto, $email_user_creo];

    //             //remitente
    //             $message->from(env('MAIL_USERNAME'), env('MAIL_NAME'));
    //             //asunto
    //             $message->subject($asunto);
    //             //setea copia a
    //             $message->cc($copiaa, $name = null);
    //             //receptor
    //             //$message->to( explode(',', $para), $name = null);
    //             $message->to($empl_email, $name = null);

                
    //         });
    //     }
    //     catch(\Exception $e){
    //         flash_alert( 'Error: servicio de email no disponible:' . $e->getMessage() . '\n El Ticket fué enviado a G.H pero no se envió notificación', 'danger' );
    //     }

    // }

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
