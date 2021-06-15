<?php


namespace App\Events\Backend\Commandes;
use Illuminate\Queue\SerializesModels;

class CommandeCreated
{
    use SerializesModels;
    public $commandes;

    /**
     * @param $commandes
     */
    public function __construct($commandes)
    {
        $this->commandes = $commandes;
    }
}