<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
        	$this->items = $oldCart->items;
        	$this->totalQty = $oldCart->totalQty;
        }
    }

    public function add($item, $sp_id){
    	$storedItem = ['qty' => 0,'item' => $item];
    	if ($this->items){
    		if (array_key_exists($sp_id, $this->items)){
    			$storedItem = $this->items[$sp_id];
    		}
    	}
    	$storedItem['qty']++;
    	$this->items[$sp_id] = $storedItem;
    	$this->totalQty++;
    	
    }

    public function reduceByOne($sp_id){
        $this->items[$sp_id]['qty']--;
        $this->totalQty--;

        if ($this->items[$id]['qty'] <= 0){
            unset($this->items[$sp_id]);
        }
    }

    public function removeItem($sp_id){
        $this->totalQty -= $this->items[$sp_id]['qty'];
        unset($this->items[$sp_id]);
    }
}
