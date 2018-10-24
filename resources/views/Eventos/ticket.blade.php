<table name = "TablaTicket">
    <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
        
    </tr>
    @foreach($tickets as $ticket)
        <tr>
            <th>{{ $ticket->id }}</th>
            <th>{{ $ticket->nombre }}</th>
            <input type= "text">
            
        </tr>
    @endforeach
</table>