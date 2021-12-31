@extends('students.layout')
@section('content')
    <div class="card">
        <div class="card-header">Contact us Page</div>
        <div class="card-body">

            <form action="{{ route('students.store') }}" method="post">
                {!! csrf_field() !!}
                <label>Name</label></br>
                <input type="text" name="studentName" id="studentName" class="form-control"></br>
                <label>Course</label></br>
                <input type="text" name="Course" id="Course" class="form-control"></br>
                <label>Fees</label></br>
                <input type="text" name="Fees" id="Fees" class="form-control"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>


        </div>
    </div>
@stop
