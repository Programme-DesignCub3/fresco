<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MinWord implements ValidationRule
{
    private $column;
    private $limit;
    private $language;

    public function __construct($column, $limit, $language)
    {
        $this->column = $column;
        $this->limit = $limit;
        $this->language = $language;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->language == 'en') {
            if(str_word_count($value) < $this->limit) {
                $fail($this->column . ' must have at least ' . $this->limit . ' words');
            }
        } else if($this->language == 'id') {
            if(str_word_count($value) < $this->limit) {
                $fail($this->column . ' harus memiliki setidaknya ' . $this->limit . ' kata');
            }
        }
    }
}
