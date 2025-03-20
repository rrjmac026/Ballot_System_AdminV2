@component('mail::message')
# Security Alert: Passkey Reset

Dear {{ $voter->name }},

Your passkey for the BukSU Comelec System has been reset by an administrator.

**Your new passkey is:** {{ $voter->passkey }}

Please keep this passkey secure as you will need it to participate in the voting process.
If you did not request this reset, please contact the administrator immediately.

Thank you,<br>
{{ config('app.name') }}
@endcomponent
