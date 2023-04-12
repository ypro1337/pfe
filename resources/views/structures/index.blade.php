@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Structures</div>

                <div class="card-body">
                    <a href="{{ route('structures.create') }}" class="btn btn-success mb-3">Create Structure</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Parent structure</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($structures as $structure)
                                @if ($structure->is_enabled)

                                <tr>
                                    <td>{{ isset($structure->id) ? $structure->id : 'N/A' }}</td>
                                    <td>{{ $structure->name }}</td>
                                    <td>{{ $structure->description }}</td>
                                    <td>@if ($structure->parent) {{ $structure->parent->name }} @else None @endif</td>
                                    <td>
                                        <a href="{{ route('structures.edit',$structure->slug) }}" class="btn btn-sm btn-primary px-4 ">Edit</a>


                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('structures.destroy',$structure->slug) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button  class="btn btn-sm btn-danger px-3">Delete</button>
                                        </form>


                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Structure Treeview</div>

                <div class="card-body">
                    <ul id="structure-treeview">
                        @foreach($structures as $structure)
                            @if($structure->parent_id == null)
                                @include('structures/structure-treeview-child', ['structure' => $structure])
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

