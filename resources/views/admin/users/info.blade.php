<table class="viewinfo" >
    <tr>
        <td>
            <label>Name:</label>
        </td>
        <td>{{ $pageData->firstname }} {{ $pageData->lastname }} </td>
    </tr>

    <tr>
        <td>
            <label>Email:</label>
        </td>
        <td>{{ $pageData->email }}</td>
    </tr>

    <tr>
        <td>
            <label>Image:</label>
        </td>
        <td>                                                
            @if(trim($pageData->profile_photo) != '' && file_exists(storage_path('app/public/user_photos/'.$pageData->profile_photo)))
                <img src="{{ asset('storage/user_photos/'.$pageData->profile_photo) }}" width="50" />
            @endif
        </td>
    </tr>

</table>