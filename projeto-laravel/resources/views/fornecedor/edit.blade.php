<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Fornecedor</title>
    <!-- Icon -->
    <link rel="icon" href="./../public/assets/book-solid.png" type="image/x-icon">

    <!-- Tailwind CSS -->
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- CDN Data Tables -->
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>

    <script src="https://kit.fontawesome.com/9c74bfc2b8.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<header>
    @include('layouts.navigation')
</header>
<main class="container mx-auto p-8">
    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6 mb-8">
        <div class="bg-gray-100 border-b border-gray-200 rounded-t-lg p-4 mb-6">
            Fornecedor: {{$fornecedor->nome}}
        </div>
        <form action="{{ route('fornecedor.update', $fornecedor->id) }}" method="post" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $fornecedor->id }}">
            <div class="space-y-4">
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                    <input type="text" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="nome" name="nome" value="{{ $fornecedor->nome }}">
                </div>
                <div>
                    <label for="cnpj" class="block text-sm font-medium text-gray-700 mt-3">CNPJ:</label>
                    <input type="text" class="block w-full mt-1 border-gray-300 bg-gray-100 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="cnpj" name="cnpj" value="{{ $fornecedor->cnpj }}" readonly>
                </div>
                <div>
                    <label for="endereco" class="block text-sm font-medium text-gray-700 mt-3">Endereço:</label>
                    <input type="text" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="endereco" name="endereco" value="{{ $fornecedor->endereco }}">
                </div>
                <div>
                    <label for="telefone" class="block text-sm font-medium text-gray-700 mt-3">Telefone:</label>
                    <input type="tel" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="telefone" name="telefone" value="{{ $fornecedor->telefone }}">
                </div>
            </div>
            <div>
                <button type="submit" class="bg-green-400 text-green-800 border-green-200 py-2 px-4 rounded shadow hover:bg-green-200 mt-5">Alterar</button>
            </div>
        </form>
    </div>
    <a href="/fornecedor" class="inline-block bg-blue-200 text-blue-800 border-blue-200 py-2 px-4 rounded shadow hover:bg-gray-200 mt-5 mb-5">Voltar</a>
</main>
<footer></footer>
</body>
</html>