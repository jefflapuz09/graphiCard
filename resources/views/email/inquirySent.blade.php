@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
<img src="url('{{ asset($companyInfo->company_logo) }}"><b style="color:black">{{ $companyInfo->company_name }}</b>
@endcomponent
@endslot

{{-- Body --}}
<!-- Body here -->
<h4>Greetings {{ $mailData->name }},</h4>
<p>Your inquiry message has been receive. Graphicard will get back to you immediately. Thank you and have a nice day.</p>
{{-- Subcopy --}}
@slot('subcopy')
@component('mail::subcopy')
<p>For immediate concerns call us at {{$companyInfo->contactNumber}} or email us at {{ $companyInfo->emailAddress}}. </p>
@endcomponent
@endslot
{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ $companyInfo->company_name }}. All rights reserved.
@endcomponent
@endslot
@endcomponent
