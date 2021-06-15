<?php


namespace App\Events\Backend\Commandes;
use Illuminate\Queue\SerializesModels;

class CommandeDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $commandes;

    /**
     * @param $commandes
     */
    public function __construct($commandes)
    {
        $this->commandes = $commandes;
    }
}