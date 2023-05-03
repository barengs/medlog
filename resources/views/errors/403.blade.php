@extends('errors::index')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
@section('description', __('Tidak ada akses ke halam ini.'))