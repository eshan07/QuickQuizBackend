<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class questionStoreReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'quiz_id' => ['required', 'numeric', 'exists:quizzes,id'],
            'question' => ['required', 'string'],
            'question_type' => ['string', 'in:radio,checkbox','select'],
            'point' => ['required', 'numeric'],
            'options' => ['array'],
            'feedback' => ['string']
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'quiz_id'=>1
        ]);
    }
}
