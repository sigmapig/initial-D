@extends('layouts.app')

@section('content')

@php
    $isCreate = Request::route()->getName() == 'employees.create';
@endphp

<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            @if (session()->has('save_status'))
            <div class="alert alert-{{ session()->get('save_status')['status'] }}">
                {{ session()->get('save_status')['message'] }}
            </div>
            @endif
            <form class="card" method="post" action="{{ $isCreate ? (route('employees.store')) : route('employees.update', $employee->id ?? 0) }}">
                @csrf
                @method($isCreate ? 'post' : 'put')
                
                <div class="card-header">
                    <h3 class="card-title">{{ $isCreate ? 'Create' : 'Edit' }} employee</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="employee">Name</label>
                        <input value="{{ $employee->name ?? '' }}" class="form-control {{ $errors->has('Name') ? 'is-invalid' : '' }}" name="name"></input>
                        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="employee">Age</label>
                        <input value="{{ $employee->age ?? '' }}" class="form-control {{ $errors->has('Age') ? 'is-invalid' : '' }}" name="age"></input>
                        <span class="invalid-feedback">{{ $errors->first('age') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="employee">BirthDate</label>
                        <input value="{{ $employee->birthdate ?? '' }}" class="form-control {{ $errors->has('BirthDate') ? 'is-invalid' : '' }}" name="birthdate"></input>
                        <span class="invalid-feedback">{{ $errors->first('birthdate') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="employee">Position</label>
                        <input value="{{ $employee->position ?? '' }}" class="form-control {{ $errors->has('Position') ? 'is-invalid' : '' }}" name="position"></input>
                        <span class="invalid-feedback">{{ $errors->first('position') }}</span>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success">{{ $isCreate ? 'New' : 'Update' }} employee</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection