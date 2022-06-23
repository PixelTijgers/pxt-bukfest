<?php

// Namespacing.
namespace App\Scopes;

// Facades/
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

// Enums
use App\Enums\PublishedState;

class PublishedScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if(!\Request::is('admin/*'))
        {
            $builder->where('status', PublishedState::Published)
                    ->where('published_at', '<', now())
                    ->where(function ($query){
                        $query->whereNull('unpublished_at')
                            ->orWhere('unpublished_at', '>', now());
                    });
        }
    }
}
