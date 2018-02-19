<?php

namespace Bhavinjr\Wishlist;

use Bhavinjr\Wishlist\Models\Wishlist as WishlistModel;

class Wishlist
{
	public $instance;

	public function __construct()
    {
    	$this->instance     =   $this->getWishlist();   
    }

    protected function getWishlist()
    {
    	$wishlistModel = new WishlistModel;
    	return $wishlistModel;
    }

    public function add($product_id,$user_id)
    {
    	$this->create($product_id,$user_id);
    }

    public function getUserWishlist($user_id)
    {
    	return $this->instance->ofUser($user_id)->get();
    }

    public function remove($id)
    {
    	$this->instance->where('id', $id)->first()->delete();
    }

    public function removeUserWishlist($user_id)
    {
    	$this->instance->ofUser($user_id)->delete();
    }

    public function removeByProduct($product_id,$user_id)
    {
        $this->getWishlistItem($product_id,$user_id)->delete();
    }

    protected function create($product_id,$user_id)
    {
    	$matchThese	=   ['product_id'   =>  $product_id,'user_id' => $user_id];

    	$wishlist 	=	WishlistModel::updateOrcreate($matchThese, 
        				$matchThese);
    	return $wishlist;
    }

    public function count($user_id)
    {
        return $this->instance->ofUser($user_id)->count();
    }

    public function getWishlistItem($product_id,$user_id)
    {
        return $this->instance->byProduct($product_id)
                              ->ofUser($user_id)->first();
    }

}