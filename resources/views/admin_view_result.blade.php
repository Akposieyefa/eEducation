@extends('layouts.app')
@section('content')
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block">
                                    <div class="invoice">
                                        <div class="invoice-wrap">
                                            <div class="invoice-head mt-3 mb-3 row">
                                                <div class="invoice-contact col-12">
                                                    <h2 class=" text-center text-bold" style="color:#006600;">View Result</h2>
                                                </div>
                                            </div>
                                            @if($errors->any())
                                                <div class="form-group row">
                                                    <div class="col-md-6 offset-3">
                                                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <form action="{{ route('admin/all-result') }}" method="POST" name="frmResult">
                                                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                                <x-alerts.success />
                                                <x-alerts.error />
                                                <x-alerts.info />
                                                {{--<div class="form-group row">
                                                    <div class="col-md-4 offset-4">
                                                            <label class="form-label">Select Class <small class="text-danger">*</small></label>
                                                            <x-forms.select wire:model="selectedClass" title="Student Class">
                                                                @foreach($levels as $level)
                                                                                <x-forms.option value="{{ $level->id }}"> {{ $level->name }}</x-forms.option>
                                                                @endforeach
                                                            </x-forms.select>
                                                            @error('selectedClass') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>--}}
                                                <div class="form-group row">
                                                    <div class="col-md-6 offset-3">
                                                            <label class="form-label">Select Session <small class="text-danger">*</small></label>
                                                            <select name="session" class="form-control">
                                                                <option value="-1"> Select Session </option>
                                                                @foreach($sessions as $session)
                                                                    <option value="{{ $session->id }}"> {{ $session->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('session') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 offset-3">
                                                            <label class="form-label">Select Term <small class="text-danger">*</small></label>
                                                            <select name="term" class="form-control">
                                                                <option value="-1"> Select Term </option>
                                                                @foreach($terms as $term)
                                                                    <option value="{{ $term->id }}"> {{ $term->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 offset-3">
                                                            <label class="form-label">Select Level <small class="text-danger">*</small></label>
                                                            <select name="level" class="form-control">
                                                                <option value="-1"> Select Level </option>
                                                                @foreach($levels as $level)
                                                                    <option value="{{ $level->id }}"> {{ $level->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 offset-3">
                                                        <button class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!-- .invoice-wrap -->
                                    </div><!-- .invoice -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
@endsection
