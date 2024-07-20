<?php

namespace App\Http\Requests;


class FormRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * @return \App\Models\User
     */
    public function user($guard = null)
    {
        return parent::user($guard);
    }
}
