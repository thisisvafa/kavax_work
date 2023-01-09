<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Model\Appointment;
use App\Model\MailSetting;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\SendMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function index()
    {
        $users = User::all();
        $mail = MailSetting::first();
        $appointments = Appointment::orderBy('created_at', 'desc')->paginate(20)->onEachSide(2);
        return view('admin.appointments.index', compact('appointments', 'users', 'mail'));
    }

//    protected function getUser()
//    {
//        $response = Http::get('http://127.0.0.1:8080/api/get-user')->body();
//        return $response;
//    }

    public function getBookingPage(Request $request)
    {
        $dates = $request->dates;
        return view('layouts.site.schedule.scheduleFull', compact('dates'));
    }

    public function getRequest(Request $request)
    {
//        dd($request->all());
        $user = User::where('email',$request->email)->first();
        if (!$user) {
            User::create([
                "full_name" => $request->full_name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "contactNumber" => $request->phone,
                "role" => 'customer'
            ]);
        }

//        $login = Http::post('http://127.0.0.1:8080/api/login', [
//            "email" => $request->email,
//            "password" => $request->password
//        ]);



//        $response = Http::post('http://127.0.0.1:8080/api/get-user', [
        $response = Http::post('https://kavax.co.uk/app/api/get-user', [
            "date" => $request->date,
            "time" => $request->time,
            "email" => $request->email,
            "password" => $request->password
        ]);

//        dd($login, 1);
//        return redirect('http://127.0.0.1:8080/app/auth/');
        return redirect()->route('https://kavax.co.uk/app/auth/', ['param' => $request->all()]);
//        return redirect('http://127.0.0.1:8080/app/auth/',['param'=>$request->all()]);
    }

    public function mailSetting(Request $request, MailSetting $mail)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        try {
            $mail->assignMail($request->email);
            return response()->json(['status' => 'success', 'message' => 'Mail Setting Updated Successfully']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function sendMail(Request $request)
    {
        $name = explode(" - ", $request->email);

        $appointment = Appointment::find($request->appointment_id);

        Mail::to($name[1])->send(new SendMail(
            " " . $name[0],
            "Appointment with Kavax",
            "We're glad to inform you that " . $appointment->user->fullName . " has booked a consultation session, " .
                "On " . $appointment->date . " at " . $appointment->time->time . ". <br/> <br/>" .
                "Login here for more information: <br/>" .
                "https://www.kavax.co.uk/ <br/><br/>" .
                "Best Regards, <br/>" .
                "Kavax Family"
            // "Admin",
            // "New Appointment Notification",
            // "You have a new appointment request from " . $appointment->user->fullName . " on " . $appointment->date . " at " . $appointment->time->time . " " . $appointment->time->part->name . "."
        ));
        return response()->json(['status' => 'success', 'message' => 'Mail Sent Successfully']);
    }

    public function mailTest()
    {
        $details = [
            'title' => 'Mail from Tawsif',
            'body' => 'Testing mail.'
        ];

        Mail::to("tawsif@kavax.co.uk")->send(new TestMail($details));

        return "Email Sent";
    }
}
