<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Page;
use Auth;

class PageController extends Controller
{
    public function index()
    {
    	return view('backend.home');
    }

    public function create()
	{
	   return view('backend.page.create');
	}
	

	public function store(PageRequest $request)
	{ //dd($request->all()); die();
		$page = new Page;
		$root_folder = '141090';
        $year = date('Y');
        $internal_dir = 'pages';
       
        // check the existence of the folders
		if (!file_exists("$root_folder")) {
				mkdir("$root_folder", 0777);
				
				//Create a redirect file.
				$myfile = fopen("$root_folder/index.php", "w") or die("Unable to open file!");
				$txt = "<?php\n";
				$txt .= "header('Location: http://google.com');\n";
				$txt .= "exit();\n";
				fwrite($myfile, $txt);
				fclose($myfile);
		}

		if (!file_exists("$root_folder/$year")) {
				mkdir("$root_folder/$year", 0777);
				
				//Create a redirect file.
				$myfile = fopen("$root_folder/$year/index.php", "w") or die("Unable to open file!");
				$txt = "<?php\n";
				$txt .= "header('Location: http://google.com');\n";
				$txt .= "exit();\n";
				fwrite($myfile, $txt);
				fclose($myfile);
		}
        if (!file_exists("$root_folder/$year/$internal_dir")) {
				mkdir("$root_folder/$year/$internal_dir", 0777);
				
				//Create a redirect file.
				$myfile = fopen("$root_folder/$year/$internal_dir/index.php", "w") or die("Unable to open file!");
				$txt = "<?php\n";
				$txt .= "header('Location: http://google.com');\n";
				$txt .= "exit();\n";
				fwrite($myfile, $txt);
				fclose($myfile);
		}
        // End of checks
		
        //The final path
		$destinationpath = $root_folder . '/' . $year . '/' . $internal_dir . '/';
		
        //Renaming the file to encrypted name
		$file = $request->file('image_url');
		$filename = $file->getClientOriginalName();
		$exe = explode('.', $filename);
		$extension = $exe[1];
		$newfilename = md5(rand().date("Ymd")).".".$extension; 
        
        //finally move the file to the server
		$file->move($destinationpath, $newfilename);
		
		$image_url = $root_folder . $newfilename;
        // End of file's upload	

        $page->title_en = $request->title_en;
        $page->title_ar = $request->title_ar;
        $page->body_en = $request->body_en;
        $page->body_ar = $request->body_ar;
        $page->page_link = $request->page_link;
        $page->tags_en = $request->tags_en;
        $page->tags_ar = $request->tags_ar;
        $page->meta_desc = $request->meta_desc;
        $page->image_url = $image_url; 
        $page->created_by = Auth::user()->name;      
        $page->save();
        return view('backend/page/index');
	}

	public function show()
	{
		$pages = Page::all();
	    return view('backend/page/index',compact('pages'));
	}

	public function edit($id)
    {
        $data['page'] = Page::find($id);
        return view('backend.page.edit',$data);
    }

    public function update(PageRequest $request)
    {
    	//dd($request->all());

    	$page = new Page;
		$root_folder = '141090';
        $year = date('Y');
        $internal_dir = 'pages';
       
        // check the existence of the folders
		if (!file_exists("$root_folder")) {
				mkdir("$root_folder", 0777);
				
				//Create a redirect file.
				$myfile = fopen("$root_folder/index.php", "w") or die("Unable to open file!");
				$txt = "<?php\n";
				$txt .= "header('Location: http://google.com');\n";
				$txt .= "exit();\n";
				fwrite($myfile, $txt);
				fclose($myfile);
		}

		if (!file_exists("$root_folder/$year")) {
				mkdir("$root_folder/$year", 0777);
				
				//Create a redirect file.
				$myfile = fopen("$root_folder/$year/index.php", "w") or die("Unable to open file!");
				$txt = "<?php\n";
				$txt .= "header('Location: http://google.com');\n";
				$txt .= "exit();\n";
				fwrite($myfile, $txt);
				fclose($myfile);
		}
        if (!file_exists("$root_folder/$year/$internal_dir")) {
				mkdir("$root_folder/$year/$internal_dir", 0777);
				
				//Create a redirect file.
				$myfile = fopen("$root_folder/$year/$internal_dir/index.php", "w") or die("Unable to open file!");
				$txt = "<?php\n";
				$txt .= "header('Location: http://google.com');\n";
				$txt .= "exit();\n";
				fwrite($myfile, $txt);
				fclose($myfile);
		}
        // End of checks
		
        //The final path
		$destinationpath = $root_folder . '/' . $year . '/' . $internal_dir . '/';
		
        //Renaming the file to encrypted name
		$file = $request->file('image_url');
		$filename = $file->getClientOriginalName();
		$exe = explode('.', $filename);
		$extension = $exe[1];
		$newfilename = md5(rand().date("Ymd")).".".$extension; 
        
        //finally move the file to the server
		$file->move($destinationpath, $newfilename);
		
		$image_url = $root_folder . $newfilename;
        // End of file's upload	

        $page->title_en = $request->title_en;
        $page->title_ar = $request->title_ar;
        $page->body_en = $request->body_en;
        $page->body_ar = $request->body_ar;
        $page->page_link = $request->page_link;
        $page->tags_en = $request->tags_en;
        $page->tags_ar = $request->tags_ar;
        $page->meta_desc = $request->meta_desc;
        $page->image_url = $image_url; 
        $page->created_by = Auth::user()->name;      
        $pageupdate = $request->all();
        $page->update($pageupdate);    
        $page->save();
        return redirect()->back(); 
    }

    public function destroy($id)
    {
		$Page = Page::find($id)->delete();
		return redirect()->back();
    }

	
}
