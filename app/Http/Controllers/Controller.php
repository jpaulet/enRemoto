<?php 
namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function import(){
    	echo "import!";
    }

    public function index(){
    	echo " [POST] - api/job (title,description,category,tags,company,email...) ";
    }

}
