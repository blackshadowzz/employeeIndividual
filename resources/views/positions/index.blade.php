
@extends('layouts.master')
@section('title','Position')
@push('Header')
    <h5>Position: {{ $count }}</h5>
@endpush
@push('sub_Header')
     position
@endpush

@section('content')
<div>
    @if(Session::has('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{Session::get('message')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
    @include('positions.create')
    <div class="mt-3">
        <table class="table table-bordered table-striped table-hover shadow mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Position</th>
                    <th>Roll</th>
                    <th>Department</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $pos)
                    <tr>
                        <td>{{ $pos->id }}</td>
                        <td>{{ $pos->position_name }}</td>
                        <td>{{ $pos->roll }}</td>
                        <td>{{ $pos->Department->department_name }}</td>
                        <td>{{ $pos->created_at->format('d-m-Y') }}</td>
                        <td>
                            <form action="/positions/{{$pos->id}}" method="post" class="d-flex justify-content-between">
                                @csrf
                                @method('DELETE')
                                <a href="javascript:void(0)" onclick="this.parentElement.submit();return confirm('Do want to delete this record?');" class="bi bi-trash text-danger"></a> |
                                <a href="/positions/{{$pos->id}}/edit"  class="bi bi-folder-plus"></a> |
                                {{-- data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="" --}}
                                <a href="/positions/{{$pos->id}}" class="bi bi-text-paragraph"></a>
                           </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- create form --}}
    <div>

    </div>
@endsection