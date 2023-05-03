@extends('errors::index')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
@section('description', __('Permintaan akses terlalu lama, mungkin ada masalah jaringan'))
