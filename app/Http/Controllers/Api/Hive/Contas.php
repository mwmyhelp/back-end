<?php

namespace App\Http\Controllers\Api\Hive;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Api\Controller;
use App\Http\Repositories\ContaRepository;
use App\Http\Repositories\EnderecoRepository;
use App\Http\Repositories\PessoaFisicaRepository;
use App\Http\Repositories\PessoaJuridicaRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\Conta\BeeContaRequest;
use App\Notifications\BemVindoContaNova;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Contas extends Controller
{
    protected $repository, $pessoa;
    /**
     * @var PessoaFisicaRepository
     */
    private $pessoaFisicaRepository;
    /**
     * @var PessoaJuridicaRepository
     */
    private $pessoaJuridicaRepository;
    /**
     * @var EnderecoRepository
     */
    private $enderecoRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ContaRepository $contaRepository,
                                EnderecoRepository $enderecoRepository,
                                PessoaFisicaRepository $pessoaFisicaRepository,
                                UserRepository $userRepository,
                                PessoaJuridicaRepository $pessoaJuridicaRepository)
    {
        $this->repository = $contaRepository;
        $this->pessoaFisicaRepository = $pessoaFisicaRepository;
        $this->pessoaJuridicaRepository = $pessoaJuridicaRepository;
        $this->enderecoRepository = $enderecoRepository;
        $this->userRepository = $userRepository;
    }

    public function store(BeeContaRequest $request)
    {

        DB::beginTransaction();
        try {
            $endereco = $request->get('endereco');
            $endereco = $this->enderecoRepository->create($endereco);

            $empresa = $request->get('pessoaJuridica');
            $empresa = $this->pessoaJuridicaRepository->create($empresa, ['id_endereco' => $endereco->id]);

            $pessoa = $request->get('pessoaFisica');
            $pessoa = $this->pessoaFisicaRepository->create($pessoa, ['id_endereco' => $endereco->id]);

            $usuario = $this->userRepository->createUserBeeConta($empresa, $pessoa);

            $conta = $request->get('conta');
            $conta = $this->repository->createBeeConta($conta, $empresa, $endereco, $pessoa, $usuario);

            DB::commit();

            //Envia notificações
            $usuario->notify(new BemVindoContaNova());

            return ResponseHelper::success("Conta criada com sucesso", $conta);

        } catch (\Exception $exception) {
            DB::rollBack();
            return ResponseHelper::exception($exception);

        }
    }

    public function procurar(Request $request)
    {
        /** Listar todas as BeeContas **/
        $data = $this->repository->all();
        $lista = $data['lista'];
        $filtro = $data['filtro'];

        //Retornar
        return ResponseHelper::successSearch($lista, $filtro);
    }
}
