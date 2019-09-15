<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recebimento extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {

		$data = $this->limpandoJSOn();

		$view_data = array(
			'grafico' => $data
		);

		$this->load->view('recebimento', $view_data);
	}

	public function recebe() {

		$url = 'https://painel.nestin.com.br/api/device-data';
		$data = array(
			"req_len" => 200,
			"api_token" => "465c357d-9af0-41a4-a5c6-569c3d838bfb"
		);

		$ch = curl_init($url);
		$json = json_encode($data);
		// use key 'http' even if you send the request to https://...

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		$result = curl_exec($ch);

		return $result;

		// if($distancia < 50) {
		// 	$this->load->model('fila_coleta_model');
		// 	$this->fila_coleta_model->insereFilaColeta($id);

		}

		public function teste(){
			// $url = base_url('recebimento/teste');
			// $ch = curl_init($url);
			$data_json = $this->tempo_real();

			$view_data = array(
				'teste' => $data_json
			);

			$this->load->view('rec_tempo_real', $view_data);
		}

		public function tempo_real () {
			$data = $this->limpandoJSOn();
			$data_json = json_encode($data);

			return $data_json;
		}

		public function limpandoJSOn(){

			$json = $this->recebe();
			$decode = json_decode($json);
			$decode_r = array_reverse($decode);

			$data = array();

			$i = 0;

			foreach ($decode_r as $pacote) {
				if(strlen($pacote->payload) < 4) {
					array_push($data,
						array("x" => $i,
									"y" => ($this->calculaPercentual($pacote->payload))
								)
						);
						$i++;
				}
			}


				return $data;
		}

		public function calculaPercentual($distancia){
			if ($distancia > 50) {
				return 0;
			}
			$porcentagem = ((50 - $distancia) /50)*100;
			// print_r($porcentagem);
			return $porcentagem;
		}
	}
