@extends('errors::index')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))
@section('description', __('Terjadi kesalahan pada sisi server, silahkan hubungi administrator'))
