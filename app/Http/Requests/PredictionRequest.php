<?php
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class PredictionRequest extends FormRequest
    {
        public function authorize()
        {
            return true;
        }
        public function rules()
        {
            return [
                'league' => 'required|max:100',
                'home_team' => 'required|max:100',
                'away_team' => 'required|max:100',
                'tip' => 'required|max:255',
            ];
        }
    }