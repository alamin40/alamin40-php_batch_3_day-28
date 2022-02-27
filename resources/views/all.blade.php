@foreach($students as $student)
    <h1>{{$student['name']}}    =   {{$student['email']}}</h1>

@endforeach
