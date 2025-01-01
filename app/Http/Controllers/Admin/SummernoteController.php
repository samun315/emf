<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SummernoteController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $originalName = $request->file('file')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extention = $request->file('file')->getClientOriginalExtension();

            $fileName = $fileName . '-' . time() . '.' . $extention;

            $request->file('file')->move(public_path('uploads/summernote_image/'), $fileName);

            $url = asset('uploads/summernote_image/' . $fileName);

//            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
            return $url;
        }
    }

    function FileStore($file, $options = [])
    {

        $destination = $options['destination'] ?? 'images';
        $delete_image = $options['delete_image'] ?? null;
        $file_type = $options['file_type'] ?? false;
        if ($file) {
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . Str::random(5) . '.' . $extension;
            switch (strtolower($extension)) {
                case 'jpeg':
                case 'png':
                case 'webp':
                case 'jpg':
                    $ext = 1;

                    $width = $options['width'] ?? imageRatio($file)['width'];
                    $height = $options['height'] ?? imageRatio($file)['height'];
                    $resize = Image::make($file)->resize($width, $height)->encode($extension);
                    Storage::put("public/" . $destination . "/" . $filename, $resize->__toString());
                    break;
                default:
                    $ext = 0;
                    $file->storeAs("public/" . $destination . "/", $filename);
            }
            if ($delete_image) {
                try {
                    Storage::delete("public/" . str_replace("/storage/", "", $delete_image));
                } catch (\Exception $e) {

                }
            }
            $file_final = '/storage/' . $destination . '/' . $filename;
        } else {
            $file_final = $delete_image ? $delete_image : '/storage/' . $destination . '/default.png';
        }
        if ($file_type) {
            return [
                'file' => $file_final,
                'is_image' => $ext
            ];
        }
        return $file_final;
    }

    function imageRatio($file, $min = 1000): array
    {
        $size = getimagesize($file->getRealPath());
        $w = $size[0];
        $h = $size[1];
        if ($h > $w) {
            $height = min($h, $min);
            $width = round($w / ($h / $height));
        } else {
            $width = min($w, $min);
            $height = round($h / ($w / $width));
        }
        return [
            'height' => $height,
            'width' => $width
        ];
    }

    public function editor_image_upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $originalName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);
            $extention = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName . '-' . time() . '.' . $extention;

            $request->file('upload')->move(public_path('uploads/ckeditorImages/'), $fileName);

            $url = asset('uploads/ckeditorImages/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
