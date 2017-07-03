<?php

namespace App\Http\Controllers;
use Input;
use Schema;
use DB;
use Hash;
use Session;
use stdClass;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends BaseController
{

    use DispatchesJobs, ValidatesRequests;
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
    public function login()
    {
        $inputs =Input::all();
        if (!(Session::get('username')))
        {

        	
        	//return $inputs;
        	$view = DB::table('users')->where('email',$inputs['uname'])->orWhere('username',$inputs['uname'])->get();
        	
        

        
        	if(Hash::check($inputs['password'], $view[0]->password))
        	{
                
                Session::put('username', $inputs['uname']);    
                Session::put('designation', $view[0]->designation);    

            

    		  if ($view[0]->designation=='hr') 
    		  {
    		  	return redirect('/hr');
    		  }
    	      else
    		  {
    		  	return view('homepage');
    		  }
    	   }
    	   return view('home');
        }
        
    }
    
    public function admin()
    {
    	$view = DB::table('new_users')->distinct('name')->get();
    	//return $view;
   	    $data1 = array('view');
   	    return view('admin', compact($data1));
	    

    }
    public function uname()
    {
    	$inputs = Input::all();
    	if ($inputs) 
    	{
    	
    	
	    	
	    	//return $inputs['id'];
	    	$wid_array =[];
	    	
			for($i=0;$i<6;$i++)
			{
				array_push($wid_array, $this->random_username($inputs));
			}
			return $wid_array;
		}


    }
    private function random_username($string) 
    {
		    $pattern = " ";
		    if($string['id'])
		    {
		    $firstPart = strstr(strtolower($string['id']), $pattern, true);
		    $secondPart = substr(strstr(strtolower($string['id']), $pattern, false), 0, 3);
		    $nrRand = rand(0, 999);

		    $username = $firstPart.$nrRand;
		    return $username;
			}
	}
	public function add_user() 
	{
		$inputs = Input::all();

		$view = DB::table('new_users')->where('name',$inputs['name'])->get();
		//return $view;
		DB::table('users')->insert(['email'  => $view[0]->email , 'username' => $inputs['username'] ,'password'=>$view[0]->password, 'name'=>$view[0]->name , 'designation'=>$view[0]->designation]
							
							);
        $empid = DB::table('users')->where('email',$view[0]->email)->get(['empid']);
        //return $empid[0]->empid;
    	DB::table('empinfo')->insert(['empid'  => $empid[0]->empid , 'dob' => $view[0]->dob ,'address'=>$view[0]->address, 'name'=>$view[0]->name , 'doj' => date('Y-m-d')]
                            
                            );

		return redirect('/hr');
	}
    public function hr()
    {
        //$this->checking();
        $view = DB::table('users')->distinct()->get();
        //return $view;
        $data1 = array('view');
        return view('hr', compact($data1));
        
     
     
    }
    public function check($name)
    {
        $inputs = Input::all();

        return json_encode($inputs); 

    }
    public function  getDetails()
    {
        $inputs = Input::all();
        $view = DB::table('empinfo')->where('empid','=',$inputs['id'])->get();
        $view1 = DB::table('users')->where('empid','=',$inputs['id'])->get();
        $return_value = (array) array_merge((array) $view, (array) $view1);
        return $return_value;

    }
    public function  new_emp()
    {
        $inputs = Input::all();
        $result = DB::table('new_users')->insert(['rcode'  => $inputs['rcode'] , 'designation' => $inputs['designation'] ,'reg_url'=>$inputs['url'], 'name'=> $inputs['name']]);
        if ($result) {
            return redirect('/hr');
        }
        else
            return "Failed Entry";
                
        return $inputs;

    }
    public function register()
    {
        $inputs =Input::all();
        $inputs['password']=Hash::make($inputs['password']);
        
        foreach ($inputs as $key => $value) {
            //echo $key.":".$value."<br>";
            if($key!="_token")
            {
                DB::table('new_users')->where(['rcode' => $inputs['rcode']])->update([$key => $value]);
            }

        }
        return "Entry Successfully Updated wait for response
        <script>self.close();</script>
        ";

    }
    public function rec($rcode)
    {
        $data1 = 'rcode';
        return view('recruit', compact($data1));        
    }
    public function mark($log)
    {

        $inputs = Input::all();
        $view = DB::table('users')->where('email',$inputs['empid'])->orWhere('username',$inputs['empid'])->get();
        $result = "USER NOT AVAILABLE";
        if(count($view))
        {
            if(Hash::check($inputs['password'], $view[0]->password))
            {
                if ($log == "in")   
                {
                    $result = $this->loggingin($inputs,$view);
                }
                if ($log == "out")   
                {
                    $result = $this->loggingout($inputs,$view);
                }
            }    
            else
            {
                return "PASSWORD MISMATCH";
            }
        }
        return $result;

        
        
         
        //return $views;
        //
        //return view('recruit', compact($data1));        
    }
    public function checking()
    {   

        if (Session::get('username'))
        {

            if (Session::get('designation')=='hr') 
            {

                return redirect('/hr');
            }
            else
            {

              return view('homepage');
            }
        }
        else
        {
            
            return redirect('/');
        }
    }
    public function loggingin($inputs,$view)
    {
        $DB2 = DB::connection('mysql1');
            $table_name = 'headrun_'.date('d-m-Y');
            $return = "";
            if(!(Schema::connection('mysql1')->hasTable($table_name)))        
            {
                $return .= ("First To Login Today!");
                Schema::connection('mysql1')->create($table_name, function($table)
                {
                    $table->string('empid');
                    $table->primary('empid');
                    $table->date('login_date');
                    $table->time('login_time');
                    $table->time('logout_time');
                    $table->string('login_ip');
                    $table->string('logout_ip')->default('NULL');
                });
                
            }
            $empid = DB::table('users')->where('email',$view[0]->email)->get(['empid']);
            $result = $DB2->table($table_name)->where('empid',$empid[0]->empid)->get();
            $result = count($result);
            //return $result;
            $ip = $_SERVER['REMOTE_ADDR'];
            $success = false;
            if(!$result)
            {
                $success = $DB2->table($table_name)->insert(['empid'  => $empid[0]->empid , 'login_date' => date('Y-m-d'),
                'login_time' => date('G:i:s'),'login_ip' => $ip]);
            }
            else
            {
                return $return."Already Logged in";
            }
            
              
            if ($success) {
                return($return."Entry Success");
            }
            else
            {
                return($return."Entry Failed");   
            }

    }
    public function loggingout($inputs,$view)
    {
        $DB2 = DB::connection('mysql1');
        $table_name = 'headrun_'.date('d-m-Y');
       if(!(Schema::connection('mysql1')->hasTable($table_name)))        
        {
            return("You Havent Logged In today <br> Please  Login!");
        }
        $empid = DB::table('users')->where('email',$view[0]->email)->get(['empid']);
        $result = $DB2->table($table_name)->where('empid',$empid[0]->empid)->get();
        $result_c = count($result);
        $may_log_out = false;
        if ($result_c) 
        {
            if($result[0]->logout_ip=='NULL')
            {
                $may_log_out = true;
            }
        }
        
        
        $ip = $_SERVER['REMOTE_ADDR'];
        $success = false;
        if(!$result_c)
        {
            return "Please Login before loggingout";
        }
        else if($may_log_out)
        {
            $success = $DB2->table($table_name)->where('empid',$empid[0]->empid)->update(['logout_time' => date('h:i:s'),'logout_ip'=> $ip]);
        }
        else
        {
            return "Already Logged Out";
        }
        
          
        if ($success) {
            return ("Entry Success");
        }
        else
        {
            return("Entry Failed");   
        }

    }
    public function logged_in()
    {
        $DB2 = DB::connection('mysql1');
        $table_name = 'headrun_'.date('d-m-Y');
        if(!(Schema::connection('mysql1')->hasTable($table_name)))
        {
            return "No one logged In Today";
        }                
        $db2 = $DB2->table($table_name)->get();
        //return $db2;
        $empid = array();
        foreach ($db2 as $key => $value) {
            $empid[] = $value->empid;
            
        }
        //return $empid;

        $view = DB::table('users')->whereIn('empid',$empid)->get();
        $result = array(array());
        $i = 0;
        foreach ($view as $key => $value) {
            $result[$i]['empid'] = $value->empid;
            $result[$i]['name'] = $value->name;
            foreach ($db2 as $val) {
                if($value->empid == $val->empid )
                {
                    $result[$i]['login_time'] = $val->login_time;
                    $result[$i]['time_log'] = (date('H:i:s') - $val->login_time) . " Hours" ;
                    //print $val->logout_ip;
                     if ($val->logout_ip== 'NULL') 
                    {
                        $result[$i]['availability'] = "Logged In";
                    }
                    else
                    {
                        $result[$i]['availability'] = "Logged out";
                    }

                }
               
            }
            
            $i++;
        }
        return view('logged_in')->with('result',$result);
        
    }
    private function check_date($to_time,$from_time)
    {
        return round(abs($to_time - $from_time)). " minute";
    }
    

}
