<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class Ilike implements Rule
{
    private $table;
    private $column;
    private $id;
    private $is_tenant;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $column, $id = null, $is_tenant = false)
    {
        $this->table = $table;
        $this->column = $column;
        $this->id = $id;
        $this->is_tenant = $is_tenant;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $connection = ($this->is_tenant) ? 'tenant' : 'system';

        $record = DB::connection($connection)->table("{$this->table}")->select('id')
            ->whereRaw("{$this->column} ilike '" . $value . "'");

        if (is_numeric($this->id)) {
            $record->whereNotIn('id', [$this->id]);
        }

        $record = $record->first();

        if (is_null($record)) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.unique');
    }
}
