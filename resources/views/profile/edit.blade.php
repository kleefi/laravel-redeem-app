@extends('layouts.admin')
@section('title','Profile')
@section('content')
@include('profile.partials.update-profile-information-form')
@include('profile.partials.update-password-form')
@include('profile.partials.delete-user-form')
@endsection