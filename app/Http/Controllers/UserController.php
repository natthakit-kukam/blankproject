<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //new
    public function update_pasword()
    {
        $sociallogin = User::find(auth()->user()->id);
        return view('manage-user.update-password', compact('sociallogin'));
    }
    public function manage()
    {
        $sociallogin = User::find(auth()->user()->id);
        return view('manage-user.data-privacy', compact('sociallogin'));
    }
    //new 



    public function index()
    {
        return view('users.index');
    }

    public function name(User $user)
    {
        if (request('name')) {
            $user->name = request('name');
            $user->update();
        }

        return back();
    }

    public function photo(User $user)
    {
        if (request('photo')) {
            $file = Storage::disk('spaces')->putFile('uploads', request('photo'), 'public');
        } else {
            $file = $user->profile_photo_path;
        }
        $user->profile_photo_path = $file;
        $user->update();

        return back();
    }

    public function updatePassword(User $user)
    {
        if (Hash::check(request('old_password'), $user->password)) {
            if (request('new_password') == request('confirm_password')) {
                $user->password = Hash::make(request('new_password'));
                $user->update();

                // alert()->success('แก้ไข', 'สำเร็จ');
            } else {
                // alert()->error('รหัสผ่านไม่ตรงกัน', 'ไม่สำเร็จ');
            }
        } else {
            // alert()->error('รหัสผ่านเดิมไม่ถูกต้อง', 'ไม่สำเร็จ');
        }

        return back();
    }

    public function lists()
    {
        $users = User::all();
        $permissions = Permission::orderBy('note')->get();
        $roles = Role::orderBy('note')->get();

        return view('users.lists', compact('users', 'permissions', 'roles'));
    }

    public function update(User $user)
    {
        if (request('photo')) {
            $file = Storage::disk('spaces')->putFile('uploads', request('photo'), 'public');
        } else {
            $file = $user->profile_photo_path;
        }

        if (request('signature')) {
            $signature = Storage::disk('spaces')->putFile('uploads', request('signature'), 'public');
        } else {
            $signature = $user->signature;
        }

        if (request('password')) {
            $password = Hash::make(request('password'));
        } else {
            $password = $user->password;
        }

        $user->update(array_merge(request()->all(), ['password' => $password]));
        $user->profile_photo_path = $file;
        $user->update();

        if ($user->roles) {
            foreach ($user->roles as $removerole) {
                $user->removeRole($removerole);
            }
        }
        if ($user->permissions) {
            foreach ($user->permissions as $removeperm) {
                $user->revokePermissionTo($removeperm);
            }
        }

        if (request('roles')) {
            foreach (request('roles') as $requestrole) {
                $role = Role::find($requestrole);
                $user->assignRole($role);
            }
        }

        if (request('permissions')) {
            foreach (request('permissions') as $id) {
                $permission = Permission::find($id);
                $user->givePermissionTo($permission);
            }
        }

        // alert()->success('แก้ไข', 'สำเร็จ');

        return back();
    }

    public function store()
    {
        if (request('photo')) {
            $file = Storage::disk('spaces')->putFile('uploads', request('photo'), 'public');
        } else {
            $file = Null;
        }

        if (request('signature')) {
            $signature = Storage::disk('spaces')->putFile('uploads', request('signature'), 'public');
        } else {
            $signature = Null;
        }

        $password = Hash::make(request('password'));

        $user = User::create(array_merge(request()->all(), ['password' => $password, 'photo' => $file, 'signature' => $signature]));

        if (request('roles')) {
            foreach (request('roles') as $requestrole) {
                $role = Role::find($requestrole);
                $user->assignRole($role);
            }
        }

        if (request('permissions')) {
            foreach (request('permissions') as $id) {
                $permission = Permission::find($id);
                $user->givePermissionTo($permission);
            }
        }
        return back();
    }

    public function show()
    {
        $today = Carbon::today();
        $from = request('from') ?: $today->format('Y-m-d');
        $to = request('to') ?: $today->format('Y-m-d');
        $user = auth()->user();
        return view('users.show', compact('user','from', 'to'));
    }

    public function auth_update(User $user)
    {
        if (request('password')) {
            $password = Hash::make(request('password'));
        } else {
            $password = $user->password;
        }

        if (request('photo')) {
            $photo = Storage::disk('spaces')->putFile('uploads', request('photo'), 'public');
        } else {
            $photo = $user->profile_photo_path;
        }

        $user->update(array_merge(request()->all(), ['password' => $password, 'photo' => $photo]));

        // alert()->success('แก้ไข', 'สำเร็จ')->persistent('ตกลง');
        return back();
    }

    public function delete(User $user)
    {
        if(!auth()->user()->hasRole('deverloper')){
            alert()->warning('ผิดพลาด','ไม่มีสิทธ์ยกเลิกผู้ใช้');
            return back();
        }
        $user->delete();
        return back();
    }
}
