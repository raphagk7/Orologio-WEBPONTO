<?php
class RegistroHorasView {
	const TELA_NOVO_REGISTRO_HORAS = 0;
	const TELA_NOVO_RELATORIO_DIARIO = 1;
	public $registrohorasdao;
	public function RegistroHorasView() {
		$this->registrohorasdao = new RegistroHorasControl ();
	}
	public function mostraTelaNovoRegistroHoras() {
		$tz_object = new DateTimeZone ( 'Brazil/East' );
		$datetime = new DateTime ();
		$datetime->setTimezone ( $tz_object );
		$datetime->format ( 'Y-m-d' );
		
		echo "<div id='tudo'>";
		echo "<div id='tudo1'>";
		echo "<form action='' method='post' >
		
		<div id='entradaForm'>
				

		<span>N&uacute;mero de identifica&ccedil;&atilde;o</span>
		<input type='text' name='idfuncionario' size='15' required style='font-size:24pt;' autocomplete='off'>
				
		</div>
				
		<input type='hidden' name='data' required value='" . $datetime->format ( 'Y-m-d' ) . "'>
		<input type='hidden' name='hora' required value='" . $datetime->format ( 'H:i' ) . "'>
		</div>
				
		<div id='tudo2'>
		<input type='submit'  id='botao' name='enviar' value='ENTRADA'>		
		<input type='submit'  id='botao' name='saidaalmoco' value='SA&Iacute;DA ALMOCO'>
		<input type='submit' id='botao' name='retornoalmoco' value='RETORNO ALMOCO'>
		<input type='submit' id='botao' name='saidafinal' value='SA&Iacute;DA'>
		
		</div>
		</div>
		</form>";
		
		if (isset ( $_POST ['enviar'] )) {
			
			$RegistroHoras = new RegistroHoras ();
			$RegistroHoras->setData ( $_POST ['data'] );
			$RegistroHoras->setIdFuncionario ( $_POST ['idfuncionario'] );
			$RegistroHoras->setHoraInicial ( $_POST ['hora'] );
			$RegistroHoras->setSaidaAlmoco ( $_POST ['hora'] );
			$RegistroHoras->setRetornoAlmoco ( $_POST ['hora'] );
			$RegistroHoras->setSaidaFinal ( $_POST ['hora'] );
			
			if ($this->registrohorasdao->contaRegistro ( $_POST ['data'], $_POST ['idfuncionario'] ) < 1) {
				$this->registrohorasdao->insereRegistroHoras ( $RegistroHoras );
				$this->registrohorasdao->insereHora1 ( $RegistroHoras );
				echo "<br><span style='font-size:26pt;'>Registro efetuado com sucesso Hora ".$datetime->format ( 'H:i' )."</span><br>";
				echo '<meta http-equiv="refresh" content="5;url=novoRegistroHoras.php">';
			} else {
				echo "<br><span style='font-size:26pt;'>O funcionário já teve a entrada registrada</span><br>";
				echo '<meta http-equiv="refresh" content="5;url=novoRegistroHoras.php">';
			}
		}
		
		if (isset ( $_POST ['saidaalmoco'] )) {
			
			$RegistroHoras = new RegistroHoras ();
			$RegistroHoras->setData ( $_POST ['data'] );
			$RegistroHoras->setIdFuncionario ( $_POST ['idfuncionario'] );
			$RegistroHoras->setSaidaAlmoco ( $_POST ['hora'] );
			
			if ($this->registrohorasdao->consultaHora2 ( $_POST ['data'], $_POST ['idfuncionario'] ) < 1) {
				$this->registrohorasdao->insereHora2 ( $RegistroHoras );
				echo "<br><span style='font-size:26pt;'>Registro efetuado com sucesso Hora ".$datetime->format ( 'H:i' )."</span><br>";
				echo '<meta http-equiv="refresh" content="5;url=novoRegistroHoras.php">';
			} else {
				echo "<br><span style='font-size:26pt;'>O funcionário já teve a entrada registrada</span><br>";
				echo '<meta http-equiv="refresh" content="5;url=novoRegistroHoras.php">';
			}
		}
		
		if (isset ( $_POST ['retornoalmoco'] )) {
			
			$RegistroHoras = new RegistroHoras ();
			$RegistroHoras->setData ( $_POST ['data'] );
			$RegistroHoras->setIdFuncionario ( $_POST ['idfuncionario'] );
			$RegistroHoras->setRetornoAlmoco ( $_POST ['hora'] );
			
			if ($this->registrohorasdao->consultaHora3 ( $_POST ['data'], $_POST ['idfuncionario'] ) < 1) {
				$this->registrohorasdao->insereHora3 ( $RegistroHoras );
				echo "<br><span style='font-size:26pt;'>Registro efetuado com sucesso Hora ".$datetime->format ( 'H:i' )."</span><br>";
				echo '<meta http-equiv="refresh" content="5;url=novoRegistroHoras.php">';
			} else {
				echo "<br><span style='font-size:26pt;'>O funcionário já teve a entrada registrada</span><br>";
				echo '<meta http-equiv="refresh" content="5;url=novoRegistroHoras.php">';
			}
		}
		
		if (isset ( $_POST ['saidafinal'] )) {
			
			$RegistroHoras = new RegistroHoras ();
			$RegistroHoras->setData ( $_POST ['data'] );
			$RegistroHoras->setIdFuncionario ( $_POST ['idfuncionario'] );
			$RegistroHoras->setSaidaFinal ( $_POST ['hora'] );
			
			if ($this->registrohorasdao->consultaHora4 ( $_POST ['data'], $_POST ['idfuncionario'] ) < 1) {
				$this->registrohorasdao->insereHora4 ( $RegistroHoras );
				echo "<br><span style='font-size:26pt;'>Registro efetuado com sucesso Hora ".$datetime->format ( 'H:i' )."</span><br>";
				echo '<meta http-equiv="refresh" content="5;url=novoRegistroHoras.php">';
			} else {
				echo "<br><span style='font-size:26pt;'>O funcionário já teve a entrada registrada</span><br>";
				echo '<meta http-equiv="refresh" content="5;url=novoRegistroHoras.php">';
			}
		}
	}
	
	public function mostraTelaRelatorioDiario() {
		echo "Relat&oacute;rio Di&aacute;rio<p>";
		
		echo '<form action="" method="post">
				<input type="date" name="data">
				<input type=submit name="enviar">
				
				</form><p>';
		
		
		if (isset($_POST['enviar'])){
		
			$lista = $this->registrohorasdao->retornaRegistroHoras($_POST['data']);
		
		echo "<table border='1' width='100%' cellspacing='0'>";
		echo "<tr>
				<th>Nome</th>
				<th>Entrada</th>
				<th>S. Almo&ccedil;o</th>
				<th>R. Almo&ccedil;o</th>
				<th>Sa&iacute;da</th>
				<th>Assinatura</th>
				</tr>";
		
		foreach ( $lista as $reg ) {
			echo "<tr>";
			echo "<td>" . $reg->getNome() . "</td>";
			echo "<td>" . $reg->getHoraInicial(). "</td>";
			echo "<td>" . $reg->getSaidaAlmoco() . "</td>";
			echo "<td>" . $reg->getRetornoAlmoco() . "</td>";
			echo "<td>" . $reg->getSaidaFinal(). "</td>";
			echo "<td></td>";
		
			echo "</tr>";
		}
		
		echo "</table><br>";
		
		echo '<form action="" method="Post">
		
			<input type=button value=imprimir onclick=window.print();>
		
			</form>';
		}
		
	}
	public static function main($tela) {
		switch ($tela) {
			
			case self::TELA_NOVO_REGISTRO_HORAS :
				$telaRegistroHoras = new RegistroHorasView ();
				$telaRegistroHoras->mostraTelaNovoRegistroHoras ();
				break;
				
			case self::TELA_NOVO_RELATORIO_DIARIO :
				$telaRegistroHoras = new RegistroHorasView ();
				$telaRegistroHoras->mostraTelaRelatorioDiario();
				break;
			
			default :
				echo "PADRÃO";
				break;
		}
	}
}