<?php

namespace App\Helpers;

class PasskeyGenerator
{
    public static function generate($college_acronym)
    {
        $timestamp = now()->format('ymd');
        $random = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4));
        $passkey = $college_acronym . $timestamp . $random;
        
        // Ensure uniqueness
        while (\App\Models\Voter::where('passkey', $passkey)->exists()) {
            $random = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4));
            $passkey = $college_acronym . $timestamp . $random;
        }
        
        return $passkey;
    }
}
