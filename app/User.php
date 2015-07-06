<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\User;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
	
	//use HasRole;

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function role() {
		return $this->hasMany( 'App\Role' );
	}
   
    public function post() {
		return $this->hasMany( 'App\Post' );
	}

	 public function equipment() {
		return $this->hasMany( 'App\Equipment');
	}
	
	public function isAdministrator() {

		return true;
		//return (int) $this->admin == 1;
	}


	/**
	* http://laravel.com/docs/4.2/mail
	*/
	public function sendWelcomeEmail() {
	# Create an array of data, which will be passed/available in the view
	$data = array('user' => Auth::user());
	Mail::send('emails.welcome', $data, function($message) {
	$recipient_email = $this->email;
	$recipient_name = $this->first_name.' '.$this->last_name;
	$subject = 'Welcome '.$this->first_name.'!';
	$message->to($recipient_email, $recipient_name)->subject($subject);
	});
	}

	
}



