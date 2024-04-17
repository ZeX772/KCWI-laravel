<?php

namespace App\Traits;
use \Illuminate\Support\Facades\Route;

trait ApiRequest
{
    /**
     * Condition Rules to return specific method specified in request file.
     * This is to make the rules dynamic and not create a separate request file for each methods.
     *
     * @return request method
     */
    public function rules(){

        list(, $action) = explode('@', Route::getCurrentRoute()->getActionName());

        $rules = [];

        if( method_exists( $this, $action ) ){

            $rules =  [
                ...$this->{$action}(),
            ];

        }

        return $rules;

    }
}