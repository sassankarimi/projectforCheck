<?php

namespace App;


use File;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Facades\Image;


class Photo extends Model
{
    protected $fillable = ['path','name','thumbnail_path'];
    protected $file;
   // protected $guarded = ['id'];
    public function banner()
    {

        return $this->belongsTo(Banner::class);
    }

    public static function fromfile(UploadedFile $file)
    {

        $photo=new static();
        $photo->file=$file;
        $photo->fill([

            'name'=>$photo->fileName(),
            'path'=>$photo->filePath(),
            'thumbnail_path'=>$photo->thumbnail_path()

        ]);

        //$photo->path = $photo->baseDir.DIRECTORY_SEPARATOR.$name;
        return $photo;
    }

    public function fileName()
    {
        $name=sha1($this->file->getClientOriginalName());
        $extention=$this->file->getClientOriginalExtension();
        return "{$name}.{$extention}";
    }

    public function filePath()
    {
        $path=$this->baseDir().'/'.$this->fileName();
        return "{$path}";
    }

    public function thumbnail_path()
    {
        $thumbnail_path=$this->baseDir().'/tn-'.$this->fileName();
        return "{$thumbnail_path}";
    }

    public function baseDir()
    {
      return "banners/photos/";
    }


    public function upload()
    {
        $this->file->move($this->baseDir(),$this->fileName());
        $img = Image::make($this->filePath())->resize(200,200);
        $img->save($this->thumbnail_path());
        return $this;
    }

    public function delete()
    {
        parent::delete();

        File::delete([
            $this->path,
            $this->thumbnail_path

        ]);
    }
}
