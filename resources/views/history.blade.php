@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="task-history-heading" style="font-size: 2rem; font-weight: bold; color: #6c4f3d; margin-bottom: 20px; text-align: center;">Task History</h1>
    
    <table class="task-table" style="width: 80%; margin: 0 auto; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #6c4f3d; color: white;">
                <!-- <th style="padding: 12px; text-align: center; border: 1px solid #ddd;">ID</th> -->
                <th style="padding: 12px; text-align: center; border: 1px solid #ddd;">Description</th>
                <th style="padding: 12px; text-align: center; border: 1px solid #ddd;">Status</th>
                <th style="padding: 12px; text-align: center; border: 1px solid #ddd;">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
            <tr class="{{ $todo->completed ? 'completed' : 'pending' }}">
                <!-- <td style="padding: 12px; text-align: center; border: 1px solid #ddd;">{{ $todo->id }}</td> -->
                <td style="padding: 12px; text-align: center; border: 1px solid #ddd;">{{ $todo->description }}</td>
                <td style="padding: 12px; text-align: center; border: 1px solid #ddd;">{{ $todo->completed ? 'Completed' : 'Pending' }}</td>
                <td style="padding: 12px; text-align: center; border: 1px solid #ddd;">{{ $todo->updated_at->format('Y-m-d') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
