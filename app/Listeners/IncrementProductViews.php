<?php

namespace App\Listeners;

use App\Events\ProductViews;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IncrementProductViews
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ProductViews $event)
    {
        $this->incrementViews($event->product);
    }

    private function incrementViews($product)
    {
        $product->increment('views');
    }
}
