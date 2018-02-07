@component('mail::message')
# Verification

Za aktivacijo vasega racuna kliknite na spodnjo povezavo!

@component('mail::button', ['url' => $activation_code])
Aktivacija
@endcomponent

Hvala,<br>
{{ config('app.name') }}
@endcomponent
