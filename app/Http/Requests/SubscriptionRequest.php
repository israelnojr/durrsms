<?php
    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class SubscriptionRequest extends FormRequest
    {
        public function authorize()
        {
            return true;
        }

        public function rules()
        { 
            $rules = [
                    'user_id' => 'unique:subscriptions',
                    'type' => 'required',
                    'payment_type' => 'required',
            ];
            return $rules; 
        }

        public function messages()
        { 
            return [
                    'user_id.unique' => 'You have aready subsbscribed, consider renewing if subscription is expired'
                ];
        }
        
    }