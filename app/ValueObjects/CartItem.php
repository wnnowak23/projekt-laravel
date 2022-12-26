<?php
namespace App\ValueObjects;

use App\Models\Product;
use Illuminate\Support\Collection;

class CartItem {
    private int $productId;
    private string $name;
    private float $price;
    private ?string $imagePath;
    private int $quantity = 0;



    /**
     * Get the value of productId
     * 
     * @param Product $product
     * @param int $quantity
     */ 

	public function __construct(Product $product, int $quantity = 1) {
        
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->imagePath = $product->image_path;
        $this->quantity += $quantity;

    }



    /**
     * Get the value of productId
     * @return int
     */ 
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Get the value of name
     * @return string
     */ 
    public function getName()
    {
        return $this->name;
    }


    /**
     * Get the value of price
     * @return float
     */ 
    public function getPrice()
    {
        return $this->price;
    }



    /**
     * Get the value of quantity
     * @return int
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }


    /**
     * Get the value of imagePath
     * @return string|null
     */ 
    public function getImagePath()
    {
        return $this->imagePath;
    }


    /**
     * Get the value of imagePath
     * @return float
     */ 

    public function getSum() {
        return $this->price * $this->quantity;
    }

    public function addQuantity(Product $product): CartItem 
    {
        return new CartItem($product, ++$this->quantity);
    }

}