					
@foreach($pageData['students'] as $student)
<tr>
	<td>{{ $student->id }}</td>
	<td>{{ $student->firstname }} {{ $student->lastname }} </td>
	<td>{{ $student->email }}</td>
	<td>{{ $student->gender }}</td>
</tr>			
@endforeach

