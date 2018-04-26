<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Jurusan;
use App\Prodi;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use JavaScript;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Profile::where('user_id', '=', Auth::id())->exists()) {
            $data['users'] = User::find(Auth::id());
            $data['jurusan'] = Jurusan::all();
            $data['prodi'] = Prodi::all();
            $data['profile'] = Profile::find(Auth::id());
            return view('users/profil.index', $data);
        } else {
            $data['jurusan'] = Jurusan::all();
            $data['prodi'] = Prodi::all();
            return view('users/profil.create',$data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['jurusan'] = Jurusan::all();
        $data['prodi'] = Prodi::all();
        return view('users/profil.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Profile();
        $data->user_id = Auth::id();
        $data->niph = $request->get('niph');
        $data->name = $request->get('name');
        $nm = $request->get('niph');
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $ext = $avatar->getClientOriginalExtension();
            $newName = Time().'.'.$nm.'.'.$ext;
            Image::make($avatar)->resize(150,150)->save(public_path('uploads/avatar/'.$newName));
            $data->avatar = $newName;
        }
        $data->pangkat = $request->get('pangkat');
        $data->jabatan = $request->get('jabatan');
        $data->jurusan_id = $request->get('jurusan');
        $data->prodi_id = $request->get('prodi');
        $data->lab = $request->get('lab');
        $data->alamat = $request->get('alamat');
        $data->no_telp = $request->get('no_telp');
        $data->save();
        return redirect()->route('profil.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['users'] = User::find($id);
        $data['jurusan'] = Jurusan::all();
        $data['prodi'] = Prodi::all();
        $data['profile'] = Profile::find($id);
        return view('users/profil.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Profile::where('id',$id)->first();
        $data->niph = $request->get('niph');
        $data->pangkat = $request->get('pangkat');
        $data->jabatan = $request->get('jabatan');
        $data->jurusan_id = $request->get('jurusan');
        $data->prodi_id = $request->get('prodi');
        $data->lab = $request->get('lab');
        $data->alamat = $request->get('alamat');
        $data->no_telp = $request->get('no_telp');

        $nm = $request->get('niph');
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $ext = $avatar->getClientOriginalExtension();
            $newName = Time().'.'.$nm.'.'.$ext;
            Image::make($avatar)->resize(150,150)->save(public_path('uploads/avatar/'.$newName));
            $data->avatar = $newName;
        }
        $data->save();
        return redirect('users/profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function getProdis($id) {
        $prodis = DB::table("prodis")->where("jurusan_id",$id)->pluck("nama_prodi","id");
        return json_encode($prodis);
    }
}
