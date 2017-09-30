<html>
<head></head>
<body>
<h2>¿Que desea Comprar?</h2>

    <form method="post" action="/ventas/resultado">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <label>Marca de gaseosa :<input type="text" name="marca"></label>
        <br>
        <label>Cantidad :<input type="text" name="cantidad"></label>
        <br>
        <label>Monto de dinero para cancelar pedido<input type="text" name="monto"></label>
        <br>
        <input type="submit" value="VER">

</form>
</body>
</html>