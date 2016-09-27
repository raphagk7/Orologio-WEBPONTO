<?php
//chama o arquivo de conexão com o bd
include('conexao.php');
 
$sql = "update registrohoras set horainicial='09:30' where idfuncionario='11'";

if (mysql_query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


?>