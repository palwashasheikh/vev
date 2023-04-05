<?php

namespace App\Helper;
class CustomValidationRules
{

    public const textRules=[
        'LongText'=>"required|string|min:10",
        'ShortText'=>'regex:/^[0-9a-zA-Z ]+$/u',
        'NameText'=>"required|string|min:3|regex:/^[a-zA-Z-.,! ]+$/u",
        'AddressText'=>'regex:/^[a-zA-Z ]+$/u',
        'LocationsText'=>'regex:/^[a-zA-Z ]+$/u',
        'email_phone'=>['regex:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})|([0-9]{10})+/'],

    ];
    public const questionsCommon=[
        'Id' =>'required|numeric|exists:TrendsforeCategory,CategoryId,deleted_at,NULL',
        'Location'=>'required|array|min:1|max:5',
        'Location.*'=>'required|string|regex:/^[a-zA-Z ]+$/u',
        'Community'=>'required|array|min:1|max:5',
        'Community.*'=>'required|numeric|exists:TrendsforeCommunity,CommunityId,deleted_at,NULL',
        'Video'=>'nullable|mimes:mp4,mov|max:25600',
        'Image'=>'nullable|mimes:jpeg,jpg,png|max:1024',
        'Link'=>'nullable|url',
        /*
        'Content.Videos'=>'nullable|array|min:1',
        'Content.Videos.*'=>'required|mimes:mp4,mov|max:25600',
        'Content.Images'=>'nullable|array|min:1|max:3',
        'Content.Images.*'=>'required|mimes:jpeg,jpg,png|max:1024',
        'Content.Links'=>'nullable|array|min:1|max:3',
        'Content.Links.*'=>'required|url',
        */
    ];
    public static function object_to_array($data)
    {
        if (is_array($data) || is_object($data))
        {
            $result = [];
            foreach ($data as $key => $value)
            {
                $result[$key] = (is_array($data) || is_object($data)) ? CustomValidationRules::object_to_array($value) : $value;
            }
            return $result;
        }
        return $data;
    }

}
