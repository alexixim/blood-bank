<?php

class DonationsEventHandler {

    
    public function updateLocationProducts($donation)
    {
        $location_product = LocationProduct::where('location_id', '=', $donation->location->id)
                                    ->where('product_id', '=', $donation->product->id)->first();

        $location_product->quantity = $location_product->quantity + $donation->product->quantity;

        $location_product->save();
    }

    public function updateItemInList($donation)
    {
        $item_in = new ItemIn();

        $item_in->donation_id = $donation->id;
        $item_in->product_id = $donation->product->id;
        $item_in->quantity = $donation->product->quantity;
        $item_in->location_id = $donation->location->id;

        $item_in->save();    
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('donation.create', 'DonationsEventHandler@updateLocationProducts');
        $events->listen('donation.create', 'DonationsEventHandler@updateItemInList');
    }

}