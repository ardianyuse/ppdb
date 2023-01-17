@extends('layouts.admin')
@section('content')

      <h1>Students Data</h1>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Menu</th>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>

        <!-- https://laravel.com/docs/9.x/blade -->

        @foreach($students as $student)
        
            <tr>
              <td>
                <a href="{{ route('students.edit', $student) }}">
                  Edit
                </a>
              </td>
              <td>{{ $student->id }}</td>
              <td>{{ $student->nama }}</td>
              <td>{{ $student->email }}</td>
            </tr>

        @endforeach

        </tbody>
        </table>
        
        
@stop