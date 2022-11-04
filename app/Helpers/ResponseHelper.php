<?php

namespace App\Helpers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Ramsey\Uuid\Type\Integer;

class ResponseHelper
{
	private $response, $status;

	private function __construct($response = [], $status = 200)
	{
		$response['code'] = $status;

		switch ($status) {
			case $status == 422:
				$response['status'] = 'Erro de validação';
				break;
			case $status == 401:
				$response['status'] = 'Não autorizado';
				break;
			case $status == 500:
				$response['status'] = 'Erro desconhecido';
				break;
			default:
				$response['status'] = 'sucesso';
		}
		$this->status = $status;
		$this->response = $response;
	}

	/**
	 * @param string $msg
	 * @param Integer $status
	 * @param string $dados
	 * @param string $filtros
	 * @return ResponseHelper
	 */
	public static function make($msg = "", Integer $status = null, $dados = "", $filtros = "")
	{
		$response = [
			'dados' => $dados,
			'msg' => $msg,
			'filtros' => $filtros
		];
		return new ResponseHelper($response, $status);
	}

	/**
	 * @param $dados
	 * @param string $msg
	 * @return ResponseHelper
	 */
	public static function success($msg = "", $dados = "")
	{
		$response = [
			'data' => $dados,
			'msg' => $msg,
		];
		$response = new ResponseHelper($response, 200);
		return $response->json();
	}

	/**
	 * @param $exception
	 * @return ResponseHelper
	 */
	public static function exception($exception)
	{
		$response = [
			'msg' => $exception->getMessage(),
			'trace' => $exception->getTrace(),
		];
		$response = new ResponseHelper($response, 500);
		return $response->json();
	}

	/**
	 * Retorna o resultado de uma busca e o filtro utilizado
	 * @param $dados
	 * @param $filtro
	 * @param $msg
	 * @return ResponseHelper
	 */
	public static function successSearch($dados, $filtro, $msg = "")
	{
		$response = [
			'msg' => $msg,
			'dados' => $dados,
			'filtros' => $filtro
		];

		$response = new ResponseHelper($response, 200);
		return $response->json();
	}

	/**
	 * @return JsonResponse
	 */
	public function json()
	{
		return response()->json($this->response, (int) $this->status);
	}

	public static function abort($code = 500, $msg = 'Ooops!.')
	{
		abort(response()->json(['msg' => $msg], $code));
	}

	/**
	 * Enviar no data compact('data','file')
	 *
	 * @param array $data
	 * @param int $status
	 *
	 * @return Application|ResponseFactory|Response
	 */
	public static function download($data, int $status = 200)
	{
		$header = [
			'Content-Type' => $data['file']->type,
			'Content-disposition' => 'filename=' . $data['file']->name
		];
		return response($data['data'], 200, $header);
	}

	/**
	 * Retorna uma array de dados
	 *
	 * @param $data
	 * @param int $status código HTTP de retorno
	 *
	 * @return JsonResponse
	 */
	public static function data($data, int $status = 200)
	{
		return response()->json(compact("data"), $status);
	}
}
