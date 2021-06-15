<?php


namespace App\Listeners\Backend\Commandes;


/**
 * Class CommandeEventListener.
 */
class BlogEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Commande';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->commandes->id)
            ->withText('Commande created <strong>'.$event->commandes->id.'</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->commandes->id)
            ->withText('Commande updated <strong>'.$event->commandes->id.'</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->log();
    }

    /**
     * @param $event
     */


    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Commandes\CommandeCreated::class,
            'App\Listeners\Backend\Commandes\BlogEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Commandes\CommandeUpdated::class,
            'App\Listeners\Backend\Commandes\BlogEventListener@onUpdated'
        );

    }
}
