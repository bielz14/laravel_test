<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\View;
use App\Image;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {	
        return View::make('image.inserting_image');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {	
    	$this->validate($request, [
		    'title' => 'required|unique:images',
		    'img' => 'required|unique:images',
		]);

    	$file = $request->file('img');
    	$filename = $request->get('title');
    	$dir = resource_path() . '\uploads\images\\';
    	$filepath = $dir . $file->getClientOriginalName();
    	Image::create(['title' => $filename, 'img' => $filepath]);
    	if (is_dir($dir) && is_uploaded_file($file)) {
    		move_uploaded_file($file, $filepath);
    		if(Auth::check()) {
    			$username = Auth::User()->name;
    			echo '<h1 style="color: green">Изображение успешно загружено пользователем' . $username . '</h1>';
    		} else {
    			echo '<h1 style="color: green">Изображение успешно загружено неизвестным пользователем</h1>';
    		} 	
    	} else {
    		echo '<h1 style="color: red">Ошибка загрузки изображения</h1>';
    	}
    }
}
