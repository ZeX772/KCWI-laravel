<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiRequest;

class VenueRequest extends FormRequest
{
    use ApiRequest;

    protected $defaultRules = [
        'venue_name'    => ['string', 'required'],
        'short_name'    => ['string', 'required'],
        'contact_person'=> ['string', 'required'],
        'phone_number'  => ['string', 'required'],
        'address'       => ['string', 'required'],
        'remarks'       => ['string'],
    ];
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function list()
    {
        return [
            'id' => ['int'],
        ];
    }

    public function add()
    {
        return $this->defaultRules;
    }

    public function update()
    {
        return array_merge(
            $this->defaultRules,
            [
                'id' => ['int', 'required', 'exists:school_venues,id'],
            ]
        );
    }
    
    public function archive()
    {
        return [
            'id' => ['int', 'required', 'exists:school_venues,id'],
        ];
    }

    public function unarchive()
    {
        return [
            'id' => ['int', 'required', 'exists:school_venues,id'],
        ];
    }

    public function addFacility()
    {
        return [
            'name' => ['int', 'string', 'required'],
            'school_venue_id' => ['int', 'string', 'required'],
        ];
    }

    public function updateFacility()
    {
        return [
            'name' => ['string', 'required'],
            'id' => ['int', 'required', 'exists:school_venue_facilities,id'],
            'school_venue_id' => ['string', 'required'],
            'status' => ['string', 'required', 'in:active,inactive'],
        ];
    }

    public function archiveFacility()
    {
        return [
            'id' => ['int', 'required', 'exists:school_venue_facilities,id'],
        ];
    }

    public function unarchiveFacility()
    {
        return [
            'id' => ['int', 'required', 'exists:school_venue_facilities,id'],
        ];
    }
}
