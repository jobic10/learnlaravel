@extends('main')
    <h1>Hello World! My name is {{ $biodata['name'] }}</h1>
    <x-header name="Lomonbeth" :biodata="$biodata" />
