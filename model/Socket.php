<?php


class Socket
{
    public function __construct()
    {
        // Crear el socket
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        // Enlazar el socket a una dirección IP y un puerto
        socket_bind($socket, '127.0.0.1', 8080);

        // Escuchar en el puerto especificado
        socket_listen($socket);

        // Esperar la conexión del cliente
        $client = socket_accept($socket);

        // Recibir datos del cliente
        $i = 1024;
        $data = socket_recv($client, $i, MSG_WAITALL);

        // Procesar los datos recibidos
        $data = json_decode($data, true);
        $response = array(
            'message' => 'Hello ' . $data['name'] . '!',
        );
        $response = json_encode($response);

        // Enviar la respuesta al cliente
        socket_send($client, $response, strlen($response), 0);
    }

    public function close(){
        // Cerrar la conexión
        socket_close($client);
        socket_close($socket);
    }
}

