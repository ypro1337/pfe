@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit structure</div>

                <div class="card-body">
                <form method="POST" action="">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $structure->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description', $structure->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Parent Structure</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                @if($structure->parent != null)

                                <option value="{{ old('parent_id', $structure->parent_id) }}">{{ $structure->parent->name }}</option>

                                @elseif($structure->parent == null)

                                  <option value="">--no parent --</option>

                                @endif

                                {!! recursiveStructureDropdown($structures, $structure->parent_id) !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="siege_id">Sieges</label>
                            <select name="siege_id" id="siege_id" class="form-control @error('siege_id') is-invalid @enderror">
                                <option value="{{old('siege_id', $structure->siege_id)}}">{{$structure->siege->designation}}</option>
                                @foreach ( $sieges as $siege )
                                @if ($structure->siege_id===$siege->id)
                                    @continue
                                @endif
                                <option value="{{$siege->id}}">{{$siege->designation}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-check">
                            <input type='hidden' value='0' name='is_enabled'>
                            @if ($structure->is_enabled)

                            <input class="form-check-input" type="checkbox" value="1" id="is_enabled" name="is_enabled" checked>
                            <label class="form-check-label" for="is_enabled">
                              Is Enabled
                            </label>

                            @else
                            <input class="form-check-input" type="checkbox" value="1" id="is_enabled" name="is_enabled" >
                            <label class="form-check-label" for="is_enabled">
                              Is Enabled
                            </label>
                            @endif

                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
