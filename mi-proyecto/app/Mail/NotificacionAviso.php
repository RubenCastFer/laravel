<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionAviso extends Mailable
{
    use Queueable, SerializesModels;
    public $datos;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($peli)
    {
        $this->datos=$peli;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pelis.Aviso');
    }
}
