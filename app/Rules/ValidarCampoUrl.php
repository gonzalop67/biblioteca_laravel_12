<?php

namespace App\Rules;

use App\Models\Admin\Menu;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidarCampoUrl implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value != '#') {
            $menu = Menu::where($attribute, $value)->get();
            if (!$menu->isEmpty()) {
                $fail('La URL ' . $value . ' ya está asignada.');
            }
        }
    }
}
