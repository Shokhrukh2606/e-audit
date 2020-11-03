<script>
    // var _form = document.getElementById("filterer");
    var input = document.getElementsByTagName("input");
    var inputList = Array.prototype.slice.call(input);
    inputList.forEach(applyEvents);
    function applyEvents(item, index, ar) {
        item.addEventListener("onfocusout", function(e) {
            document.forms["ism"].setAttribute("target", "_blank");
            _form.submit()
        });
    }
</script>
<a href="{{ route('admin.user_create') }}">Create</a>
<table>
    <thead>
        <th>ID</th>
        <th>Full Name</th>
        <th>Funds</th>
        <th>Group name</th>
        <th>Phone</th>
        <th>INN</th>
        <th>View</th>
    </thead>
            <td></td>
            <td>
                <input type="text" name="name" value="{{ request()->input('full_name') }}">
            </td>
            <td></td>
            <td><select name="group" value={{ request()->input('group') }}>
                    <option value="n">Select</option>
                    @foreach ($groups as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select> </td>
            <td>
                <input type="text" name="phone" value="{{ request()->input('phone') }}">
            </td>
            <td>
                <input type="number" name="inn" value="{{ request()->input('inn') }}">
            </td>
            <td></td>
    </tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->getFullname($user) }}</td>
                <td>{{ $user->funds }}</td>
                <td>{{ $user->group->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->inn }}</td>
                <td><a href="{{ route('admin.user_view', $user->id) }}">View</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
