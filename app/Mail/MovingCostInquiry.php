<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MovingCostInquiry extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;
    public $objects;
    public $totalVolume;
    public $loadingPoint;
    public $unloadingPoint;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $validated,
        $objects = [],
        $totalVolume = 0,
        $loadingPoint = [],
        $unloadingPoint = []
    ) {
        $this->data = $validated;
        $this->objects = $objects;
        $this->totalVolume = $totalVolume;
        $this->loadingPoint = $loadingPoint;
        $this->unloadingPoint = $unloadingPoint;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.inquiry');
    }
}
