<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
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
            Cadastrar Usuário
        </div>
        <form action="{{route("user.store")}}" method="post" class="space-y-4">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Informe o nome do usuário:</label>
                    <input type="text" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="name" name="name" required>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mt-3">Informe o email do usuário:</label>
                    <input type="email" class="block w-full mt-1 border-gray-300  rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="email" name="email" required>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mt-3">Informe a senha:</label>
                    <input type="password" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="password" name="password" required>
                </div>
            </div>
            <div>
                <button type="submit" class="bg-green-400 text-green-800 border-green-200 py-2 px-4 rounded shadow hover:bg-green-200 mt-5">Cadastrar</button>
            </div>
        </form>
    </div>
    <a href="/user" class="inline-block bg-blue-200 text-blue-800 border-blue-200 py-2 px-4 rounded shadow hover:bg-gray-200 mt-5 mb-5">Voltar</a>
</main>
<footer></footer>
</body>
</html>
