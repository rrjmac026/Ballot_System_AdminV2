@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <h1 class="text-2xl font-bold text-buksu-dark">Bukidnon State University</h1>
        <p class="text-gray-500">Electronic Voting Administration System</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:border-buksu-green transition-colors">
            <div class="flex justify-between items-start">
                <div>
                    
                </div>
                <div class="rounded-full p-2 bg-buksu-light text-buksu-green">
                   
                </div>
            </div>
        </div>
        
    </div>
@endsection
