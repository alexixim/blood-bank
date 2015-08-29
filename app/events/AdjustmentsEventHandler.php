<?php

class AdjustmentsEventHandler {

    //


    public function updateAdjustmentProducts($adjustment,$extra)
    {
        $current_adj_id =  $adjustment->id;

        print_r($extra);


        $adjustment_product = new AdjustmentProduct();

        $adjustment_product->adjustment_id = $current_adj_id;
        $adjustment_product->product_id = $extra->$product->id;
        $adjustment_product->location_id = $extra->$location->id;
        $adjustment_product->quantity = $extra->$quantity;

        $adjustment_product->save();

    }

    public function updateLocationProducts($adjustment, $extra)
    {
        $type = $adjustment->type;

        $location_product = LocationProduct::where('location_id', '=', $adjustment->location->id)
                                    ->where('product_id', '=', $adjustment->product->id)->first();

        if($type == 1) //Positive Adjustment
        {
             $location_product->quantity = $location_product->quantity + $extra->product->quantity;
        }

        else if($type == 2) //Negative Adjustment
        {
             $location_product->quantity = $location_product->quantity - $extra->product->quantity;
        }

        $location_product->save();
    }

    public function updateItemInAndOut($adjustment)
    {

        $type = $adjustment->type;

        if($type == 1)
        {
            //Item_in -> If POSITIVE

            $item_in = new ItemIn();

            $item_in->location_id = $location->id;
            $item_in->product_id = $product->id;
            $item_in->quantity = $quantity;
            $item_in->adjustment_id = $current_adj_id;

            $item_in->save();    
        }

        else if ($type == 2)
        {
            //Item_out -> If NEGATIVE

            $item_in = new ItemOut();

            $item_out->location_id = $location->id;
            $item_out->product_id = $product->id;
            $item_out->quantity = $quantity;
            $item_in->adjustment_id = $current_adj_id;

            $item_in->save();   

        }

       
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return array
     */
    public function subscribe($events)
    {
        $events->listen('adjustment.create', 'AdjustmentsEventHandler@updateAdjustmentProducts');
        $events->listen('adjustment.create', 'AdjustmentsEventHandler@updateLocationProducts');
        $events->listen('adjustment.create', 'AdjustmentsEventHandler@updateItemInAndOut');
    }


    
   

}