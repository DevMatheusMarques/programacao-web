<?php
    namespace Php\Primeiroprojeto\Controller;

    use Php\Primeiroprojeto\Model\DAO\CategoriaDAO;
    use Php\Primeiroprojeto\Model\DAO\ProdutoDAO;
    use Php\Primeiroprojeto\Model\DAO\FornecedorDAO;
    use Php\Primeiroprojeto\Model\DAO\ClienteDAO;

    class SearchController {
        private $categoriaDAO;
        private $produtoDAO;
        private $fornecedorDAO;
        private $clienteDAO;

        public function __construct() {
        $this->categoriaDAO = new CategoriaDAO();
        $this->produtoDAO = new ProdutoDAO();
        $this->fornecedorDAO = new FornecedorDAO();
        $this->clienteDAO = new ClienteDAO();
        }

        public function search($query) {
        $categorias = $this->categoriaDAO->search($query);
        $produtos = $this->produtoDAO->search($query);
        $fornecedores = $this->fornecedorDAO->search($query);
        $clientes = $this->clienteDAO->search($query);

        // Consolidate results
        $results = [
        'categorias' => $categorias,
        'produtos' => $produtos,
        'fornecedores' => $fornecedores,
        'clientes' => $clientes
        ];

        // Render the results as JSON (or use your preferred rendering method)
//        header('Content-Type: application/json');
//        echo json_encode($results);
        require_once '../src/View/Navegacao/search.php';
    }
}
