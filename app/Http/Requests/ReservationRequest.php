<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//Authが絡む場合はTrueに変える
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reservation_date' => 'required|after:today',
            'reservation_time' => 'required',
            'number_people' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'reservation_date.required' => '予約日を入力ください',
            'reservation_date.after' => '本日以前のご予約はできません',
            'reservation_time.required' => '予約時間を入力ください',
            'number_people.required' => '人数を入力ください',
        ];
    }
}
