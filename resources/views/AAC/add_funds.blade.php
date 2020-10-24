<form action="{{route('add_funds')}}" method="POST">
    @csrf
    <label>Тўлов тизими</label><br>
    <input type="radio" id="click" name="payment_sys" value="click">
    <label for="click">Click</label><br>
    <input type="radio" id="payme" name="payment_sys" value="payme">
    <label for="payme">Payme</label><br>
    <label>Суммаси</label><br>
    <input type="number" name="amount">
    <button type="submit">Add</button>
</form>