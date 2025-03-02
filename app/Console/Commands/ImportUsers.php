<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:users';
    private $role;
    private $permission_group_id;
    private $store_id;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import users from the old KACA md50f system to the new DB in MD530f SIMS';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = DB::connection('md530f')->table('users')->get();
        foreach ($users as $user){
            $serviceNumber = decryptProperty($user->ServiceNumber);
            $userExists = User::where('service_number',$serviceNumber)->first();
//            if ($userExists == 0 && $user->id != 80){
            if (!$userExists){
                echo "##################user is ";

                $newUser = new User();
                $newUser->_id = Str::uuid();
                $newUser->username = decryptProperty($user->Username);
                $newUser->full_name = decryptProperty($user->FullName);
                $newUser->service_number = decryptProperty($user->ServiceNumber);
                $newUser->rank = decryptProperty($user->Rank);
                $newUser->email = decryptProperty($user->EmailAddress);
                $newUser->phone = decryptProperty($user->TelephoneNumber);
                $newUser->created_at = Carbon::parse(decryptProperty($user->EntryDate))->toDateTimeString();
                $newUser->status = $user->Status;
                $newUser->password = bcrypt($user->Username);
                $newUser->old_password = $user->Password;
                $this->setRole($newUser,$user->Usertype);
                $newUser->created_by =1;
                $newUser->save();

            }

//            echo "hey there".decryptProperty($user)."<br>";

        }
        return 0;
    }

    private function setRole($newUser, $userLevel){
        // Store 1 QM Tech
        // Store 2 ASSD
        switch ($userLevel){
            case 1:
                $newUser->role = 'admin';
                $newUser->permission_group_id = 1;
                break;
            case 2:
                $newUser->role = 'technician';
                break;
            case 3:
                $newUser->role = 'mo';
                break;
            case 4:
                // OC QM TECH
                $newUser->role = 'store';
                $newUser->permission_group_id = 3;
                $newUser->store_id = 1;
                break;
            case 5:
                $newUser->role = 'store';
                $newUser->permission_group_id = 3;
                $newUser->store_id = 2;
                break;
            case 6:
                $newUser->role = 'store';
                $newUser->permission_group_id = 4;
                break;
            case 7:
                $newUser->role = 'store';
                $newUser->permission_group_id = 2;
                $newUser->store_id = 1;
                break;
            case 8:
                $newUser->role = 'store';
                $newUser->permission_group_id = 2;
                $newUser->store_id = 2;
                break;
        }
//        $this->role = $department;
    }
}
