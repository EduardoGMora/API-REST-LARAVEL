<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Recipe;

class RecipePolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Recipe $recipe) : bool {
        return $user->id === $recipe->user_id;
    }

    public function delete(User $user, Recipe $recipe) : bool {
        return $user->id === $recipe->user_id;
    }
}
