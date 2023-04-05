<?php

namespace App\Http\Controllers\admin;
use App\Helper\ApiResponseBuilder;
use App\Http\Controllers\Controller;

use App\Models\veveUser;
use Illuminate\Http\Request;
use App\Models\veveStores;
use App\Models\veveProduct;
use App\Models\veveService;
use App\Models\veveProductDetail;
use App\Models\veveProductImage;
use App\Models\veveProductmodifer;
use App\Models\veveCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Datatables;
use Auth;
use DB;
use Response;
use Validator;

use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    private $authorizedUser;
    private $profileImage = '/vev/content/user/user-default/';

    public function editProfile(Request $request)
    {

        $this->authorizedUser = $request->user();
        $user = veveUser::find($request->user()->id);
        return view('admin.dashboard.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $this->authorizedUser = $request->user();

        $rules = [
            'user_name' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:5000',
            'IsUserMale' => 'required|boolean',
            'address' => 'required',
            'phone' => 'required|numeric|min:8',
            'userBirthDate' => 'required',
            'email' => 'required|email',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $this->authorizedUser->user_name = $request->user_name;
            $this->authorizedUser->user_address = $request->address;
            $this->authorizedUser->IsUserMale = $request->IsUserMale;
            $this->authorizedUser->user_phonenumber = $request->phone;
            $this->authorizedUser->UserBirthDate = $request->userBirthDate;
            $this->authorizedUser->user_email = $request->email;
            $this->profilePicture = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $extension = $request->image->extension();
                $fileName = uniqid() . "." . $extension;
                if ($request->file('image')->move(public_path($this->profileImage), $fileName)) {
                    $this->profilePicture = $this->profileImage . $fileName;
                    $this->authorizedUser->UserImage = $this->profilePicture;
                }
            }
            if ($this->authorizedUser->save()) {
                return Redirect::back()->with('success', "user  Successfully Updated");
            } else {
                return Redirect::back()->with('error', "Some Thing Error");
            }

        }

    }

    public function changePassword(Request $request)
    {
        $this->authorizedUser = $request->user();
        $user = veveUser::find($request->user()->id);
        return view('admin.dashboard.changePassword', compact('user'));

    }

    public function updatePassword(Request $request)
    {
        $this->authorizedUser = $request->user();
        $rules = [
            'CurrentPassword' => 'required|min:8',
            'NewPassword' => 'required|min:8',
            'ConfirmPassword' => 'min:6|required_with:NewPassword|same:NewPassword'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            if (Hash::check($request->currentPassword, $this->authorizedUser->password)) {
                if ($this->authorizedUser->update()) {
                    return Redirect::back()->with('success', "user  Successfully Updated");
                } else {
                    return Redirect::back()->with('error', "Some Thing Error");
                }
            }
        }
    }
}
