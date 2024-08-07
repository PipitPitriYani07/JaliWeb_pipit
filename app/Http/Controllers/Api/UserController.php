<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function changeProfilePicture(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'id_pengguna' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'msg' => false,
                'error' => $validate->errors()->all()
            ], 422);
        }

        $id = $request->id_pengguna;
        $cek = DB::table('pengguna')->where(DB::raw('sha1(id_pengguna)'), $id)->first();
        $oldImage = str_replace('https://is3.cloudhost.id/prilude/', '', $cek->foto_profile);

        /**
         * Delete old image
         */
        Storage::disk('s3')->delete($oldImage);

        $image = $request->file('image');
        $nama = $image->hashName();

        $result = Storage::disk('s3')->putFileAs("images/profile", $image, $nama);
        Storage::disk('s3')->setVisibility("images/profile/" . $nama, "public");

        $path = Storage::disk('s3')->url($result);

        if (DB::table('pengguna')->where(DB::raw('sha1(id_pengguna)'), $id)->update(['foto_profile' => $path])) {
            return response()->json([
                'msg' => true,
                'error' => $validate->errors()->all()
            ], 200);
        } else {
            return response()->json([
                'msg' => false
            ], 400);
        }
    }
}
