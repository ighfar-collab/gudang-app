<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Tampilkan daftar user
     */
    public function index()
    {
      //  $users = User::latest()->paginate(10);
            $users = User::with('roles')->paginate(10);

    // INI YANG KURANG
    $roles = Role::pluck('name');
        return view('user.index', compact('users', 'roles'));
    }
    public function create()
    {
        return view('user.create');
    }
        public function store(Request $request): RedirectResponse
    {
     $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
                
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'super-admin',
    ]);

    $user->assignRole('super-admin');
      
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
}
    /**
     * Form Edit User
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
  public function reset($id)
    {
        $user = User::findOrFail($id);
        return view('user.reset', compact('user'));
    }

    /**
     * Update Data User
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$id",
            'password' => 'nullable|min:6'
        ]);

        $user = User::findOrFail($id);

        $user->name  = $request->name;
        $user->email = $request->email;

        // Update password hanya jika diisi
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }
        public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus!');
    }
    public function updateRole(Request $request, $id)
{
    $request->validate([
        'role' => 'required|exists:roles,name',
    ]);

    $user = User::findOrFail($id);
    $user->syncRoles([$request->role]);

    return back()->with('success', 'Role berhasil diubah');
}

  public function makeAdmin(User $user)
    {
        // ❌ cegah ubah diri sendiri (opsional tapi disarankan)
        if ($user->id === auth()->id()) {
            return back()->with('error','Tidak bisa mengubah role sendiri');
        }
    if ($user->hasRole('admin')) {
        $user->syncRoles(['driver']);
         $user->update([
        'role' => 'driver'
    ]);
        return back()->with('success','User berhasil dijadikan driver');
    } else {
        $user->syncRoles(['admin']);
            $user->update([
        'role' => 'admin'
    ]);
        return back()->with('success','User berhasil dijadikan admin');
    }

       
    }
      public function makeMitra(User $user)
    {
        // ❌ cegah ubah diri sendiri (opsional tapi disarankan)
        if ($user->id === auth()->id()) {
            return back()->with('error','Tidak bisa mengubah role sendiri');
        }
    if ($user->hasRole('mitra')) {
        $user->syncRoles(['driver']);
         $user->update([
        'role' => 'driver'
    ]);
        return back()->with('success','User berhasil dijadikan driver');
    } else {
        $user->syncRoles(['mitra']);
            $user->update([
        'role' => 'mitra'
    ]);
        return back()->with('success','User berhasil dijadikan mitra');
    }

       
    }
    
    
      public function makeDriver(User $user)
    {
        // ❌ cegah ubah diri sendiri (opsional tapi disarankan)
        if ($user->id === auth()->id()) {
            return back()->with('error','Tidak bisa mengubah role sendiri');
        }

        // 🔥 ubah role jadi admin
        $user->syncRoles(['driver']);
        $user->update([
        'role' => 'driver'
    ]);

        return back()->with('success','User berhasil dijadikan admin');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // logout user

        // invalidate session
        $request->session()->invalidate();

        // regenerate session token
        $request->session()->regenerateToken();

        // redirect ke halaman login
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
    
  public function resetPassword(Request $request, $id)
{
    $request->validate([
        'password' => 'required|min:6|confirmed'
    ]);

    $user = User::findOrFail($id);
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('user.index')
        ->with('success', 'Password berhasil direset');
}
}
