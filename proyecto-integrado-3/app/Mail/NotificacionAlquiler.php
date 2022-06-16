<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * NotificacionAlquiler
 * @author Rubén Castellano Fernández
 * @version 1.0
 * @since 08-04-2022
 */
class NotificacionAlquiler extends Mailable
{
    use Queueable, SerializesModels;
    public $datos;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alquiler)
    {
        $this->datos=$alquiler;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('cliente.emailalquiler');
    }
}
