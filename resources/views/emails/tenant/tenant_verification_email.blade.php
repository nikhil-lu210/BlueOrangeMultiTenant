@extends('layouts.email.app')


@section('email_title')
    <span style="text-align: center;">Email Verification for {{ $data->name }}</span>
@endsection


@section('content')
<!-- Start Content -->
<div>
    Hello Sir/Mam,
    <br>
    You have requested to create you company profile on {{ config('app.name') }}.
    <br>
    Please verify your email:
    <a href="{{ route('tenant.verify', ['token' => $data->verification_token]) }}">
        <strong>{{ __('Verify Email') }}</strong>
    </a>.
</div>
<!-- End Content -->
@endsection


