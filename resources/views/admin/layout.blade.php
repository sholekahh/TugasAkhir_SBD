@extends('templates.default');
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body class="antialiased">
        <a class="navbar-brand" href="{{ route('admin.index') }}">Data Admin</a>
    </body>
</html>