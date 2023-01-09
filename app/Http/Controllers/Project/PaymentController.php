<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Model\ProjectInvoice;
use App\User;

class PaymentController extends Controller
{
    public function list()
    {
        $payments = ProjectInvoice::paginate(12)->onEachSide(2);
        $users = User::all();
        return view('admin.project.payment.list', compact('payments', 'users'));
    }
}
