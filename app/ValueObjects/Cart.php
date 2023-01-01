<?php
namespace App\ValueObjects;

use App\Models\Product;
use Illuminate\Support\Collection;
use Closure;

class Cart {

    private Collection $items;


  /**
     * @param Collection|null $items
     */ 

    public function __construct(Collection $items = null) 
    {
        $this->items = $items ?? Collection::empty();
    }

    /**
     * @return Collection
     */ 
    public function getItems()
    {
        return $this->items;
    }

    public function hasItems(): bool {
        return $this->items->isNotEmpty();
    }



    public function getQuantity(): int {
        return $this->items->sum(function ($item){
            return $item->getQuantity();
        });
    }

    public function getSum() {
        return $this->items->sum(function ($item){
            return $item->getSum();
        });
    }

    public function addItem(Product $product): Cart {
        $items = $this->items;
        $item = $items->first($this->isProductIdSameAsItemProduct($product));

        if (!is_null($item)) {
            $items = $this->removeItemFromCollection($items,$product);
            $newItem = $item->addQuantity($product);
        } else {
                $newItem = new CartItem($product);
        }
        $items->add($newItem);
        return new Cart($items);
    }


    public function removeItem(Product $product): Cart {        
        $items = $this->removeItemFromCollection($this->items, $product);
        return new Cart($items);        
    }


    private function removeItemFromCollection(Collection $items, Product $product): Collection
    {
        return $items->reject($this->isProductIdSameAsItemProduct($product));
    }

    private function isProductIdSameAsItemProduct(Product $product): Closure {
        return function ($item) use ($product) {
            return $product->id == $item->getProductId();
        };
    }

    

}