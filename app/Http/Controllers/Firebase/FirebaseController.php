<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class FirebaseController extends Controller
{
    // public $database = $factory->createDatabase();

    public function __construct(Database $database){
        $this->database = $database;
        $this->table_name = 'contacts';
    }

    public function index()
    {

        $reference = $this->database->getReference($this->table_name)
                                    ->orderByChild('fname')
                                    ->getValue();
        // ->orderByKey()
        // ->orderByValue()
        // ->limitTolast(2)
        // ->limitTofirst(2)
        // ->orderByChild()// require to set parameter
        // ->getValue();
        // dd($reference);
        return view('firebase', ['values' => $reference]);
    }

    public function show($key){

        $person = $this->database->getReference($this->table_name)
                                 ->getChild($key)
                                 ->getValue();
        dd($person);
    }

    public function store()
    {
        $postData = [
            'fname' => 'Shako',
            'lname' => 'De',
            'email' => 'Shako@gmail.com'
        ];
        $postRef = $this->database->getReference($this->table_name)
                                  ->push($postData);

                if($postRef){

                    return redirect('/index');
                }

                return 'error';
                

    }

    public function update($key)
    {
        $data = [
            'fname' => 'updated',
            'lname' => 'updated',
            'email' => 'updated@gmail.com',
        ];

        $updatedName =  $this->database->getReference($this->table_name.'/'.$key)
                                       ->update($data);
        
        if($updatedName){
            return redirect('/index');
        }

        return back()->with(['msg' => 'User message was not updated']);
        
    }

    public function destroy($key)
    {
        $delete_user = $this->database->getReference($this->table_name.'/'.$key)
                                      ->remove();
        if($delete_user){

                return redirect('/index')->with(['msg' => 'user deleted']);
    
        }
        return back()->with(['msg' => 'User record was not deleted']);
    }
}
