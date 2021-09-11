@extends('back.layouts.layout')

@section('tab')
<div class="container-fluid">
    <div class="row">
        @if($users)
            <x-back.box
                type='success'
                :number='$users'
                title='New users'
                route='back.admin'
                model='user'>
            </x-back.box>
        @endif
    </div>
</div>
@endsection
