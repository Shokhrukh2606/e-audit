<form action="{{route('aac.add_funds')}}" method="POST">
    @csrf
    <label>Платежная система</label><br>
    <input class="form-control" type="radio" id="click" name="payment_sys" value="click">
    <label for="click">Click</label><br>
    <input class="form-control" type="radio" id="payme" name="payment_sys" value="payme">
    <label for="payme">Payme</label><br>
    <label>Сумма</label><br>
    <input class="form-control" type="number" name="amount">
    <button class="btn btn-sm btn-success" type="submit">Add</button>
</form>