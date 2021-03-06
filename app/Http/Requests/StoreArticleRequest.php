<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreArticleRequest extends FormRequest
{
    public function complete()
    {
        $this->all()['completed'] = 1;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }


    public function prepareForValidation(): void
    {
        $this->merge([
            'completed' => $this->completed ? 1 : 0,
            'tags' => collect(explode(',', $this->tags))->keyBy(function ($item) {
                return $item;
            })
        ]);
    }


    public function rules(): array
    {
        return [
            'title' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'max:255'],
            'body' => ['required'],
            'tags'=> [],
            'completed' => [],
        ];
    }
}
