<?php

namespace App\Http\Controllers;

use App\Enums\OrderProductState;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\EventBannerResource;
use App\Models\Category;
use App\Models\EventBanner;
use App\Models\Template;
use App\Models\User;
use App\Models\VerifyNumber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

class UserController extends \ShinHyungJune\SocialLogin\Http\UserController
{
    public function login(Request $request)
    {
        $data = $request->validate([
            "ids" => "required|string|max:500",
            "password" => "required|string|max:500",
        ]);

        if(auth()->attempt($request->all())) {
            session()->regenerate();

            return redirect()->intended();
        }

        return Inertia::render("Shopping/Users/Login", [
            "errors" => [
                "ids" => __("socialLogin.invalid")
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "ids" => "required|string|min:4|max:20|unique:users",
            "contact" => "required|string|max:500",
            "name" => "required|string|max:500",
            "password" => "required|string|min:8|max:30|confirmed",
            "email" => "required|email|max:500",
            "address" => "required|string|max:500",
            "address_detail" => "required|string|max:500",
            "address_zipcode" => "required|string|max:500",
        ]);

        $verifyNumber = VerifyNumber::where('contact', $request->contact)
            ->where('verified', true)->first();

        if(!$verifyNumber)
            return redirect()->back()->with("error", "인증된 전화번호만 사용할 수 있습니다.");

        User::create([
            "ids" => $request->ids,
            "contact" => $request->contact,
            "name" => $request->name,
            "password" => Hash::make($request->password),
            "email" => $request->email,
            "address" => $request->address,
            "address_detail" => $request->address_detail,
            "address_zipcode" => $request->address_zipcode,
        ]);

        $verifyNumber->delete();

        return redirect("/shopping/login")->with("success", "성공적으로 가입되었습니다.");
    }

    public function socialLogin(Request $request, $social)
    {
        $socialUser = Socialite::driver($social)->user();

        // 일단 네이버
        $user = User::where("social_id", $socialUser->id)->where("social_platform", $social)->first();

        if(!$user) {
            $user = User::create([
                "name" => isset($socialUser->name) ? $socialUser->name : null,
                "email" => isset($socialUser->email) ? $socialUser->email : null,
                // "contact" => $socialUser->contact,
                "social_id" => $socialUser->id,
                "social_platform" => $social
            ]);
        }

        Auth::login($user);

        return redirect()->intended();
    }

    public function update(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:500",
            "contact" => "required|string|max:500",
            "email" => "required|email|max:500",
            "address" => "required|string|max:500",
            "address_detail" => "required|string|max:500",
            "address_zipcode" => "required|string|max:500",
            "elevator" => "required|boolean",
            "password" => "nullable|string|min:8|max:20|confirmed"
        ]);

        auth()->user()->update($request->except("password"));

        if($request->password)
            auth()->user()->update([
                "password" => Hash::make($request->password)
            ]);

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }

    public function updateTemplate(Request $request)
    {
        $request->validate([
            "template_id" => "required|integer"
        ]);

        $template = Template::find($request->template_id);

        if(!$template)
            return redirect()->back()->with("error", "존재하지 않는 템플릿입니다.");

        if($template->level_required > auth()->user()->level)
            return redirect()->back()->with("error", "요구레벨을 충족하지 않습니다.");
        
        auth()->user()->update([
            "template_id" => $request->template_id
        ]);

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }

    /*
    public function update(Request $request)
    {
        $request->validate([
            "contact_change" => "nullable|string|max:500|unique:users,contact",
            "name" => "nullable|string|max:500",
            "password" => "nullable|string|max:500|min:8|confirmed",
            "agree_ad" => "nullable|boolean",

            "bank" => "nullable|string|max:500",
            "account" => "nullable|string|max:500",
            "owner" => "nullable|string|max:500",
        ]);

        if($request->contact_change){
            $verifyNumber = VerifyNumber::where('contact', $request->contact_change)
                ->where('verified', true)->first();

            if(!$verifyNumber)
                return redirect()->back()->with("error", "인증된 전화번호만 사용할 수 있습니다.");

            auth()->user()->update(["contact" => $request->contact_change]);

            $verifyNumber->delete();
        }

        if($request->name)
            auth()->user()->update(["name" => $request->name]);

        if($request->password)
            auth()->user()->update(["password" => Hash::make($request->password)]);

        if($request->bank)
            auth()->user()->update(["bank" => $request->bank]);

        if($request->owner)
            auth()->user()->update(["owner" => $request->owner]);

        if($request->account)
            auth()->user()->update(["account" => $request->account]);

        if(isset($request->agree_ad))
            auth()->user()->update(["agree_ad" => $request->boolean("agree_ad")]);

        return redirect()->back()->with("success", "성공적으로 처리되었습니다.");
    }
    */

    public function loginForm()
    {
        return Inertia::render("Users/Login",[]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/login");
    }
}
