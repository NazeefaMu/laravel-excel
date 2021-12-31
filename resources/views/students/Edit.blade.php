
@extends('students.layout')
@section('content')

    <div class="card">
        <div class="card-header">Contactus Page</div>
        <div class="card-body">

            <form action="{{ url('students/' .$students->id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$students->id}}" id="id" />
                <label>Name</label></br>
                <input type="text" name="studentName" id="studentName" value="{{$students->studentName}}" class="form-control"></br>
                <label>Course</label></br>
                <input type="text" name="Course" id="Course" value="{{$students->Course}}" class="form-control"></br>
                <label>Fees</label></br>
                <input type="text" name="Fees" id="Fees" value="{{$students->Fees}}" class="form-control"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>

@stop
