<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;

class Files extends Model
{
    use HasFactory;

    public function Upload(&$file, $base64)
    {
        // dd($base64);
        if ($base64) {

            $contents = file_get_contents($base64);
            $mimeType = Image::make($contents)->mime();

            switch ($mimeType) {
                case 'image/jpeg':
                case 'image/jpg':
                    $extension = '.jpg';
                    break;

                case 'image/png':
                    $extension = '.png';
                    break;

                case 'image/bmp';
                    $extension = '.bmp';
                    break;

                case 'image/gif':
                    $extension = '.gif';
                    break;

                case 'image/tiff':
                case 'image/x-tiff':
                    $extension = '.tiff';
                    break;

                default:
                    throw new \Exception("Invalid Mime-Type file.");
            }

            $imageName = md5(microtime()) . $extension;            
            $path = public_path('storage/'. $imageName);

            try {
                Image::make($contents)->save($path);
                
                $file->name = $imageName;
                $file->filename = $imageName;
                $file->path = 'storage/' . $imageName;
                $file->save();

                return true;
            } catch (\Throwable $th) {
                throw $th;
            }

            return  false;
        }
    }
}
