<?php
include ('conexao.php');
class RegistroHorasControl extends DAO {
	public function RegistroHorasControlDAO(PDO $conexao = null) {
		if ($conexao == null) {
			
			parent::DAO ();
		} else
			parent::DAO ( $conexao );
	}
	public function insereRegistroHoras(RegistroHoras $registrohoras) {
		$tz_object = new DateTimeZone ( 'Brazil/East' );
		$datetime = new DateTime ();
		$datetime->setTimezone ( $tz_object );
		$datetime->format ( 'Y-m-d' );
		
		$idFuncionario = $registrohoras->getIdFuncionario ();
		$data = $registrohoras->getData ();
		$horainicial = $registrohoras->getHoraInicial ();
		$saidaalmoco = $registrohoras->getSaidaAlmoco ();
		$retornoalmoco = $registrohoras->getRetornoAlmoco ();
		$saidafinal = $registrohoras->getSaidaFinal ();
		
		// $consulta1 = "select horainicial from registrohoras where data='" . $datetime->format ( 'Y-m-d' ) . "'";
		
		$inserir = "insert into registrohoras(data,idfuncionario)values('$data','$idFuncionario')";
		
		if ($this->conexao->query ( $inserir )) {
			
			return true;
		} else
			return false;
	}
	public function contaRegistro($data, $idfuncionario) {
		$consulta1 = "SELECT COUNT(data) FROM registrohoras where data='$data' and idfuncionario='$idfuncionario'";
		
		$result = mysql_query ( "$consulta1" );
		$row = mysql_fetch_row ( $result );
		
		return $row [0];
	}
	public function consultaHora1($data, $idfuncionario) {
		$consulta1 = "SELECT COUNT(horainicial) FROM registrohoras where data='$data' and idfuncionario='$idfuncionario' and horainicial<>''";
		
		$result = mysql_query ( "$consulta1" );
		$row = mysql_fetch_row ( $result );
		
		return $row [0];
	}
	public function consultaHora2($data, $idfuncionario) {
		$consulta2 = "SELECT COUNT(saidaalmoco) FROM registrohoras where data='$data' and idfuncionario='$idfuncionario' and saidaalmoco<>''";
		
		$result = mysql_query ( "$consulta2" );
		$row = mysql_fetch_row ( $result );
		
		return $row [0];
	}
	public function consultaHora3($data, $idfuncionario) {
		$consulta3 = "SELECT COUNT(retornoalmoco) FROM registrohoras where data='$data' and idfuncionario='$idfuncionario' and retornoalmoco<>''";
		
		$result = mysql_query ( "$consulta3" );
		$row = mysql_fetch_row ( $result );
		
		return $row [0];
	}
	public function consultaHora4($data, $idfuncionario) {
		$consulta4 = "SELECT COUNT(saidafinal) FROM registrohoras where data='$data' and idfuncionario='$idfuncionario' and saidafinal<>''";
		
		$result = mysql_query ( "$consulta4" );
		$row = mysql_fetch_row ( $result );
		
		return $row [0];
	}
	public function insereHora1(RegistroHoras $registrohoras) {
		$idFuncionario = $registrohoras->getIdFuncionario ();
		$data = $registrohoras->getData ();
		$horainicial = $registrohoras->getHoraInicial ();
		$saidaalmoco = $registrohoras->getSaidaAlmoco ();
		$retornoalmoco = $registrohoras->getRetornoAlmoco ();
		$saidafinal = $registrohoras->getSaidaFinal ();
		
		$sql = "update registrohoras set horainicial='$horainicial ' where idfuncionario='$idFuncionario' and data='$data'";
		
		if (mysql_query ( $sql ) === TRUE) {
			// echo "Registro efetuado com sucesso";
		} else {
			// echo "Error updating record: " . $conn->error;
		}
	}
	public function insereHora2(RegistroHoras $registrohoras) {
		$idFuncionario = $registrohoras->getIdFuncionario ();
		$data = $registrohoras->getData ();
		$saidaalmoco = $registrohoras->getSaidaAlmoco ();
		$retornoalmoco = $registrohoras->getRetornoAlmoco ();
		$saidafinal = $registrohoras->getSaidaFinal ();
		
		$sql = "update registrohoras set saidaalmoco='$saidaalmoco' where idfuncionario='$idFuncionario' and data='$data'";
		
		if (mysql_query ( $sql ) === TRUE) {
			// echo "Registro efetuado com sucesso";
		} else {
			// echo "Error updating record: " . $conn->error;
		}
	}
	public function insereHora3(RegistroHoras $registrohoras) {
		$idFuncionario = $registrohoras->getIdFuncionario ();
		$data = $registrohoras->getData ();
		$saidaalmoco = $registrohoras->getSaidaAlmoco ();
		$retornoalmoco = $registrohoras->getRetornoAlmoco ();
		$saidafinal = $registrohoras->getSaidaFinal ();
		
		$sql = "update registrohoras set retornoalmoco='$retornoalmoco' where idfuncionario='$idFuncionario' and data='$data'";
		
		if (mysql_query ( $sql ) === TRUE) {
			// echo "Registro efetuado com sucesso";
		} else {
			// echo "Error updating record: " . $conn->error;
		}
	}
	public function insereHora4(RegistroHoras $registrohoras) {
		$idFuncionario = $registrohoras->getIdFuncionario ();
		$data = $registrohoras->getData ();
		$saidaalmoco = $registrohoras->getSaidaAlmoco ();
		$retornoalmoco = $registrohoras->getRetornoAlmoco ();
		$saidafinal = $registrohoras->getSaidaFinal ();
		
		$sql = "update registrohoras set saidafinal='$saidafinal' where idfuncionario='$idFuncionario' and data='$data'";
		
		if (mysql_query ( $sql ) === TRUE) {
			// echo "Registro efetuado com sucesso";
		} else {
			// echo "Error updating record: " . $conn->error;
		}
	}
	public function retornaRegistroHoras($data) {
		$result = array ();
		
		$listagem = $this->conexao->query ( "select funcionario.nome, registrohoras.horainicial, registrohoras.saidaalmoco, registrohoras.retornoalmoco, registrohoras.saidafinal from funcionario, registrohoras where registrohoras.data='$data'" );
		
		foreach ( $listagem as $linha ) {
			
			$registrohoras = new RegistroHoras ( $linha ['nome'], $linha ['horainicial'] ,$linha['saidaalmoco'],$linha['retornoalmoco'], $linha['saidafinal']);
			
			$registrohoras->setHoraInicial ( $linha ['horainicial'] );
			$registrohoras->setSaidaAlmoco( $linha ['saidaalmoco'] );
			$registrohoras->setRetornoAlmoco( $linha ['retornoalmoco'] );
			$registrohoras->setSaidaFinal( $linha ['saidafinal'] );
			$registrohoras->setNome($linha ['nome']);
			
			$result [] = $registrohoras;
		}
		
		return $result;
	}
}