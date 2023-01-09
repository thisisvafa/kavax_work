@extends('layouts.admin.dashboard.master')

@section('lib')
    <link rel="stylesheet" href="{{asset('invoice.css')}}">
    <link rel="stylesheet" href="{{asset('assets/divjs.js')}}">
    {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> --}}
    
@endsection

@section('page-title', 'Invoice')

@section('title-page')
    <span class="icon">
        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9.07689 2.41025C8.35894 2.20513 7.23074 2 6.41023 2C5.58973 2 4.46153 2.20513 3.74358 2.41025C3.02564 2.51282 2.51282 3.02564 2.41025 3.74358C2.20513 4.46153 2 5.58973 2 6.41023C2 7.23074 2.20513 8.35894 2.30769 9.07689C2.41025 9.79483 3.02564 10.3076 3.64102 10.4102C4.35896 10.5128 5.48716 10.7179 6.30767 10.7179C7.12818 10.7179 8.25638 10.5128 8.97432 10.4102C9.69227 10.3076 10.2051 9.69227 10.3077 9.07689C10.4102 8.35894 10.6153 7.23074 10.6153 6.41023C10.6153 5.58973 10.4102 4.46153 10.3077 3.74358C10.3077 3.02564 9.79483 2.51282 9.07689 2.41025Z" fill="#030D45"/>
        <path d="M9.07684 13.6923C8.35889 13.5897 7.23069 13.3846 6.41018 13.3846C5.58968 13.3846 4.46148 13.5897 3.74353 13.6923C3.02559 13.7949 2.51277 14.4102 2.4102 15.0256C2.30764 15.7436 2.10251 16.8718 2.10251 17.6923C2.10251 18.5128 2.30764 19.641 2.4102 20.3589C2.51277 21.0769 3.12815 21.5897 3.74353 21.6923C4.46148 21.7948 5.58968 22 6.41018 22C7.23069 22 8.35889 21.7948 9.07684 21.6923C9.79478 21.5897 10.3076 20.9743 10.4102 20.3589C10.5127 19.641 10.7179 18.5128 10.7179 17.6923C10.7179 16.8718 10.5127 15.7436 10.4102 15.0256C10.3076 14.3077 9.79478 13.7949 9.07684 13.6923Z" fill="#030D45"/>
        <path d="M15.0255 10.4104C15.7435 10.513 16.8717 10.7181 17.6922 10.7181C18.5127 10.7181 19.6409 10.513 20.3588 10.4104C21.0768 10.3078 21.5896 9.69246 21.6921 9.07708C21.7947 8.35914 21.9998 7.23094 21.9998 6.41043C21.9998 5.58992 21.7947 4.46172 21.6921 3.74377C21.5896 3.02583 20.9742 2.51301 20.3588 2.41045C19.6409 2.30788 18.5127 2.10276 17.6922 2.10276C16.8717 2.10276 15.7435 2.30788 15.0255 2.41045C14.3076 2.51301 13.7947 3.12839 13.6922 3.74377C13.5896 4.46172 13.3845 5.58992 13.3845 6.41043C13.3845 7.23094 13.5896 8.35914 13.6922 9.07708C13.7947 9.79503 14.3076 10.3078 15.0255 10.4104Z" fill="#030D45"/>
        <path d="M20.3588 13.6923C19.6409 13.5897 18.5127 13.3846 17.6922 13.3846C16.8717 13.3846 15.7435 13.5897 15.0255 13.6923C14.3076 13.7949 13.7947 14.4102 13.6922 15.0256C13.5896 15.7436 13.3845 16.8718 13.3845 17.6923C13.3845 18.5128 13.5896 19.641 13.6922 20.3589C13.7947 21.0769 14.4101 21.5897 15.0255 21.6923C15.7435 21.7948 16.8717 22 17.6922 22C18.5127 22 19.6409 21.7948 20.3588 21.6923C21.0768 21.5897 21.5896 20.9743 21.6921 20.3589C21.7947 19.641 21.9998 18.5128 21.9998 17.6923C21.9998 16.8718 21.7947 15.7436 21.6921 15.0256C21.5896 14.3077 21.0768 13.7949 20.3588 13.6923Z" fill="#030D45"/>
        </svg></span>
    <span class="text">{{ $invoice->invoice_name }} - {{ $invoice->invoice_number }}</span>
@endsection

@section('content')

<section class="report-table">
    <div class="col-12">
        <div class="row row-broken">
            <div class="page-content container bg-white">
                <div class="page-header text-blue-d2">
                    <h1 class="page-title text-secondary-d1">
                        Create Invoice - {{ $invoice->invoice_number }}
                    </h1>
            
                    <div class="page-tools">
                        <div class="action-buttons">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="mr-1 fa fa-plus text-dark-m1 text-120 w-2 mr-2"></i>
                                Add Item
                            </button>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changeStatus">
                                <i class="mr-1 fa fa-check-square-o text-dark-m1 text-120 w-2 mr-2"></i>
                                Change status
                            </button>

                            <button type="button" onclick="printInvoice('#invoice')" class="btn btn-primary">
                                <i class="mr-1 fa fa-print text-dark-m1 text-120 w-2 mr-2"></i>
                                Print
                            </button>
                        </div>
                    </div>
                </div>
            
                <div class="container px-0" id="invoice">
                    <div class="row mt-4">
                        <div class="col-12 col-lg-10 offset-lg-1">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center text-150">
                                        <i class="fa fa-tasks fa-1x text-success-m2 mr-1"></i>
                                        <span class="text-default-d3">{{ $invoice->project->name }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- .row -->
            
                            <hr class="row brc-default-l1 mx-n1 mb-4" />
            
                            <div class="row">            
                                <div class="text-95 col-sm-6">
                                    <hr class="d-sm-none" />
                                    <div class="text-grey-m2">
                                        <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                            Invoice
                                        </div>
            
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> {{$invoice->invoice_number}}</div>
            
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Date:</span> {{ date("d M Y") }} </div>

                                        
                                        <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> 
                                            <span class="text-600 text-90">Status:</span>
                                            <span class="text-info"><td>{{ $invoice->status }}</td></span>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
            
                            <div class="mt-4">
                                <div class="row text-600 text-white bgc-default-tp1 py-25">
                                    <div class="d-none d-sm-block col-1">#</div>
                                    <div class="col-12 col-sm-9">Description</div>
                                    <div class="col-2">Amount</div>
                                </div>
            
                                <div class="text-95 text-secondary-d3">
                                    @foreach ($invoice->payments as $payment)
                                        <div class="row mb-2 mb-sm-0 py-25 {{ $loop->even ? 'bgc-default-l4' : '' }}">
                                            <div class="d-none d-sm-block col-1">{{ $loop->iteration }}</div>
                                            <div class="col-12 col-sm-9">{{ $payment->description }}</div>
                                            <div class="col-2 text-secondary-d2">{{ $payment->amount }}</div>
                                        </div>
                                    @endforeach
                                </div>
            
                                <div class="row border-b-2 brc-default-l2"></div>
            
            
                                <div class="row mt-3">
                                    <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0"></div>
            
                                    <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                        <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                            <div class="col-7 text-right">
                                                Total Amount
                                            </div>
                                            <div class="col-5">
                                                <span class="text-150 text-success-d3 opacity-2">{{ $invoice->totalAmount() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <hr />
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('projects.add.payment', $invoice->id) }}" method="post">
            @csrf
            <input type="hidden" name="project_id" value="{{$invoice->project->id}}">
            <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="Software Development">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Amount</label>
                <input type="text" name="amount" class="form-control" id="exampleFormControlInput2" placeholder="10000">
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="changeStatus" tabindex="-1" aria-labelledby="changeStatusLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changeStatusLabel">
            Change Status
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('projects.payment.status', $invoice->id) }}" method="post">
            @csrf
            <input type="hidden" name="project_id" value="{{$invoice->project->id}}">
            <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Status</label>
                <select class="form-control" id="exampleFormControlInput1" name="status" id="status">
                    <option value="Pending" {{ $invoice->status == "Pending" ? 'selected' : '' }}>Pending</option>
                    <option value="Paid" {{ $invoice->status == "Paid" ? 'selected' : '' }}>Paid</option>
                    <option value="Unpaid" {{ $invoice->status == "Unpaid" ? 'selected' : '' }}>Unpaid</option>
                </select>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
</div>

@endsection

@section('footer')
<script type="text/javascript">
    
    function printInvoice(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Invoice', 'height=900,width=1200');
        mywindow.document.write('<html><head><title>Invoice</title>');
        mywindow.document.write('<link rel="stylesheet" href="{{asset('invoice.css')}}" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="{{asset('assets/admin/css/admin-style.min.css')}}" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        return true;
    }
    
    </script>
@endsection