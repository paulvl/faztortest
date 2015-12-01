<?php

namespace FaztorCart;

use Exception;
use Illuminate\Support\Collection;

class Cart implements CartInterface
{
	protected $cartSessionId;

	public function __construct()
	{
		$this->cartSessionId = config('session.cookie') . 'faztor_cart';
		$this->validateCartSession();
	}

	public function add(array $itemData)
	{
		$itemData = $this->validateItemData($itemData);

		$cartItems = $this->getCartCollection();

		if($cartItems->has($itemData['id']))
		{
			$item = $cartItems->get($itemData['id']);
			$item->quantity += $itemData['quantity'];
			$this->updateCartSession($cartItems->put($itemData['id'], $item));
		}
		else{
			$this->updateCartSession($cartItems->put($itemData['id'], (object)$itemData));			
		}
	}

	public function update(array $itemData)
	{
		$itemData = $this->validateItemData($itemData);

		if(! $cartItems->has($itemData['id']))
			throw new Exception("Cart does not containt and item with id = " . $itemData['id']);

		$cartItems = $this->getCartCollection();

		$this->updateCartSession($cartItems->put($itemData['id'], (object)$itemData));
	}

	public function remove($itemId, $quantity = null)
	{
		$cartItems = $this->getCartCollection();

		if(! $cartItems->has($itemId))
			throw new Exception("Cart does not containt and item with id = " . $itemId);

		if(! is_null($quantity) )
		{
			$item = $cartItems->get($itemId);

			if( $item->quantity > $quantity )
			{
				$item->quantity -= $quantity;
				$this->updateCartSession($cartItems->put($itemId, $item));
			}
			elseif( $item->quantity == $quantity ){
				$cartItems->forget($itemId);
			}
			else{				
				throw new Exception("Can not remove the quantity of $quantity from item with id = " . $itemId . " because it only has $item->quantity on the cart");
			}
		}
		else{
			$cartItems->forget($itemId);		
		}
	}

	public function clear()
	{
		$this->createCartSession();
	}

	public function all()
	{
		return $this->getCartCollection()->all();
	}

	public function count($distinct = false)
	{
		return $this->getCartCollection()->count();
	}

	public function total($summarized = false)
	{
		$subTotal = $this->getCartCollection()->sum(function ($item) {
			return $item->quantity * $item->price;
		});

		$discount = $this->getCartCollection()->sum(function ($item) {
			return $item->quantity * $item->price * $this->getPercentageValue($item->discount);
		});

		$taxes = $this->getCartCollection()->sum(function ($item) {
			$subTotal = $item->quantity * $item->price;
			$discount = $item->quantity * $item->price * $this->getPercentageValue($item->discount);
			return ( $subTotal + $discount ) * $this->getPercentageValue($item->tax);
		});

		$summary = [
			'amount'	=> $subTotal,
			'discount'	=> $discount,
			'subTotal'	=> $subTotal + $discount,
			'taxes'		=> $taxes,
			'total'		=> $subTotal + $discount + $taxes,
		];

		if($summarized)
			return (object)$summary;

		return $summary['total']; 
	}

	protected function validateCartSession()
	{
		if(! session()->has($this->cartSessionId))
			$this->createCartSession();
	}

	private function createCartSession()
	{
		session()->put($this->cartSessionId, collect());
	}

	private function getCartCollection()
	{
		return session()->get($this->cartSessionId);
	}

	private function updateCartSession(Collection $cart)
	{
		session()->put($this->cartSessionId, $cart);
	}

	protected function validateItemData(array $itemData)
	{
		if(isset($itemData['id']) && isset($itemData['name']) && isset($itemData['quantity']) && isset($itemData['price']))
		{
			if(isset($itemData['tax']))
			{
				if(! $this->validateTaxPercentage($itemData['tax']))
					throw new Exception("Tax value must be a String representing a positive number and finishes with %, for example '5.27%'");
			}
			else{
				$itemData['tax'] = '0%';
			}

			if(isset($itemData['discount']))
			{
				if(! $this->validateDiscountPercentage($itemData['discount']))
					throw new Exception("Discount value must be a String representing a negative number and finishes with %, for example '-15.50%'");
			}
			else{
				$itemData['discount'] = '0%';
			}

			return $itemData;
		}
		
		throw new Exception("Item array MUST have the following key elements: id, name, quantity and price");		
	}

	protected function getPercentageValue($value)
	{
		return rtrim($value, "%") / 100;
	}

	protected function validateTaxPercentage($value)
	{
		return preg_match("/^[0-9]*\.{0,1}\d{1,2}\%/", $value);
	}

	protected function validateDiscountPercentage($value)
	{
		return preg_match("/^\-[0-9]*\.{0,1}\d{1,2}\%/", $value);
	}
}