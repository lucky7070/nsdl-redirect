@extends('layouts.frontend')

@section('content')
    <section class="sub-header-section py-2">
        <div class="container">
            <button type="button" class="px-2 py-1 border border-dark rounded-2 text-dark fs-14">
                Home
            </button>
            <button type="button" class="px-2 py-1 border border-dark rounded-2 text-dark fs-14">
                Reprint Of PAN Card
            </button>
            <button type="button" class="px-2 py-1 border border-dark rounded-2 text-dark fs-14">
                Download e-PAN/ e-PAN XML
            </button>
            <button type="button" class="px-2 py-1 border border-dark rounded-2 text-dark fs-14">
                Know Status Of PAN Application
            </button>
        </div>
    </section>
    <section class="info-section mt-4">
        <div class="container">
            <h3 class='fw-400 mt-3'>Online PAN Application</h3>
            <p class="text-small">
                As per ITD guidelines,'Request for New PAN Card or/and Changes or Correction in PAN Data' application is
                presently to be used only for update/correction in PAN database. For procedure to link Aadhaar with PAN,
                please <a href='https://www.onlineservices.nsdl.com/paam/endUserRegisterContact.html'>click here.</a>
            </p>
            <p class="text-small">
                As per provisions of Section 272B of the Income Tax Act., 1961, a penalty of ₹ 10,000 can be levied on
                possession of more than one PAN.
            </p>
            <hr class='border-green'>
            <h3 class='text-center'>Online PAN Apply</h3>
            <a href="{{ route('create-pan') }}" class="apply-button-link">
                <button type="button" class="apply-button">
                    <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M18 11h-2q-.425 0-.712-.288T15 10t.288-.712T16 9h2V7q0-.425.288-.712T19 6t.713.288T20 7v2h2q.425 0 .713.288T23 10t-.288.713T22 11h-2v2q0 .425-.288.713T19 14t-.712-.288T18 13zm-9 1q-1.65 0-2.825-1.175T5 8t1.175-2.825T9 4t2.825 1.175T13 8t-1.175 2.825T9 12m-8 6v-.8q0-.85.438-1.562T2.6 14.55q1.55-.775 3.15-1.162T9 13t3.25.388t3.15 1.162q.725.375 1.163 1.088T17 17.2v.8q0 .825-.587 1.413T15 20H3q-.825 0-1.412-.587T1 18" />
                    </svg>
                    Apply PAN Now
                </button>
            </a>
        </div>
    </section>

    <section class="contact-section mt-4">
        <div class="container">
            <p class='text-small text-center'>
                Got a question or need assistance? Our dedicated customer care team is ready to help! Just give us a call at
                <a href='tel:02027218080' class="text-black"> 020-27218080 </a> any day between <span class='text-black'>7
                    am to 11 pm</span>. We're here for you!
            </p>
        </div>
    </section>
@endsection