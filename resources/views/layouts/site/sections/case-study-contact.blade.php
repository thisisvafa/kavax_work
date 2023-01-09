<div class="row case-study-contact">
    <div class="col-7">
        <div class="contact-us-form">
            <div class="heading-form">Let's get talking!</div>
            <p class="desc-form">Our team would love the opportunity to discuss your challenge over a quick email or call!</p>
            @php
                $msg = \Session::get('notification')
            @endphp

            @if($msg)
                <div class="message-session {{ $msg['class'] }}">{{ $msg['message'] }}</div>
            @endif

            <form action="{{ route('lets-talk') }}" method="POST">
                @csrf
                <div class="form-block">
                    <div class="row gy-4">
                        <div class="col-6">
                            <div class="field-block on-line-input text-field">
                                <div class="row g-0">
                                    {!! Form::text('name',null,[ 'required', 'id'=>'name' , 'class'=>'col-12 order-1']) !!}
                                    {!! Form::label('name','Name:',['class'=>'col-12 order-0']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="field-block on-line-input text-field">
                                <div class="row g-0">
                                    {!! Form::text('email',null,[ 'required', 'id'=>'email' , 'class'=>'col-12 order-1']) !!}
                                    {!! Form::label('email','Email:',['class'=>'col-12 order-0']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="field-block on-line-input text-field">
                                <div class="row g-0">
                                    {!! Form::text('phone',null,[ 'required', 'id'=>'phone' , 'class'=>'col-12 order-1']) !!}
                                    {!! Form::label('phone','phone number:',['class'=>'col-12 order-0']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="field-block on-line-input text-field">
                                <div class="row g-0">
                                    {!! Form::text('business_name',null,[ 'id'=>'business_name' , 'class'=>'col-12 order-1']) !!}
                                    {!! Form::label('business_name','business name:',['class'=>'col-12 order-0']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="field-block on-line-input text-field">
                                <div class="row g-0">
                                    {!! Form::textarea('message',null,[ 'required', 'id'=>'message' , 'class'=>'col-12 order-1']) !!}
                                    {!! Form::label('message','your message:',['class'=>'col-12 order-0']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="field-block submit-form">
                                <input type="submit" value="SEND message">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
