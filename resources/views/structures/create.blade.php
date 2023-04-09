@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Structure</div>

                <div class="card-body">
                    <form action="{{ route('structures.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Parent Structure</label>
                            <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                                <option value="">None</option>
                                {!! recursiveStructureDropdown($structures) !!}
                            </select>
                            @error('parent_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="siege_id">Sieges</label>
                            <select name="siege_id" id="siege_id" class="form-control @error('siege_id') is-invalid @enderror">
                                @foreach ( $sieges as $siege )
                                <option value="{{$siege->id}}">{{$siege->designation}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-check">
                            <input type='hidden' value='0' name='is_enabled'>
                            <input class="form-check-input" type="checkbox" value="1" id="is_enabled" name="is_enabled">
                            <label class="form-check-label" for="is_enabled">
                              Is Enabled
                            </label>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('structures.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
