<?php

namespace App\Policies;
use Illuminate\Auth\Access\Response;

use App\Models\User;
use App\Models\Product;


class ProductPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
     
    }
    
    public function destroy(User $user, Product $product): bool
    { 
        return $user->id === $product->creator_id || $user->can('is-admin');
    

    }
    
    public function update(User $user, Product $product): bool
    {
        return $user->id === $product->creator_id || $user->can('is-admin');
    }
    
}
