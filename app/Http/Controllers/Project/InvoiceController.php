<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProjectInvoice;
use App\Model\Project;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProjectInvoice $invoice, Project $project)
    {
        try {
            $invoices = $invoice->allData($project->id);
            return view('admin.project.invoice.index', compact('invoices', 'project'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $invoice_number = ProjectInvoice::where('project_id', $id)->max('id');
        return view('admin.project.invoice.create', compact('id', 'invoice_number'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectInvoice $invoice, Request $request)
    {
        $request->validate([
            'project_id' => 'required',
            'invoice_number' => 'required',
            'invoice_name' => 'required|string',
            'description' => 'nullable|string',
        ]);
        $data = $request->all();
        try {
            $invoice = (array)$invoice->create($data);
            return redirect()->route('invoices.index', $request->project_id)->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Invoice Created Successfully.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectInvoice $invoice)
    {
        try {
            return view('admin.project.invoice.edit', compact('invoice'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectInvoice $invoice)
    {
        $request->validate([
            'invoice_number' => 'required',
            'invoice_name' => 'required|string',
            'description' => 'nullable|string',
        ]);

        try {
            $invoice->edit($invoice->id, (array)$request->all());
            return redirect()->route('invoices.index', $invoice->project_id)->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Invoice Updated Successfully.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectInvoice $invoice, Request $request)
    {
        try {
            foreach ($request->delete_item as $key => $val) {
                $invoice->find($val)->delete();
            }
            return redirect()->route('invoices.index', $invoice->project_id)->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Invoice Deleted.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function invoice($id, ProjectInvoice $invoice)
    {
        try {
            $invoice = $invoice->find($id);
            return view('admin.project.invoice', compact('invoice'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function addPayment(Request $request, ProjectInvoice $invoice)
    {
        $request->validate([
            'description' => 'required',
            'amount' => 'required',
            'invoice_id' => 'required',
            'project_id' => 'required',
        ]);

        $data = [
            'description' => $request->description,
            'project_id' => $request->project_id,
            'invoice_id' => $request->invoice_id,
            'amount' => $request->amount,
        ];

        try {
            $invoice->addPayment($data);
            return back()->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Item Added.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function changeStatus(Request $request, $id, ProjectInvoice $invoice)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $data = [
            'status' => $request->status,
        ];

        try {
            $invoice->changeStatus($id, $data);
            return back()->with(
                'notification',
                [
                    'class' => 'success',
                    'message' => 'Payment Status Changed.'
                ]
            );
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
