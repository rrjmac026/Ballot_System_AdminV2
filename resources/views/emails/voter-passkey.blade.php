@component('mail::message')
# Welcome to BukSU Comelec System!

Dear {{ $voter['name'] }},

Your account has been successfully created. Below are your credentials:

**Student Number:** {{ $voter['student_number'] }}
**Passkey:** {{ $voter['passkey'] }}

Please keep this passkey secure as you will need it to participate in the voting process.

Thank you,<br>
{{ config('app.name') }}
@endcomponent
