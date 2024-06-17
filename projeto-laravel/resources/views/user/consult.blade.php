<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuário: {{$user->nome}}</title>
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
    @include ('layouts.navigation')
</header>
<main class="container mx-auto p-8">
    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6 mb-8">
        <div class="bg-gray-100 border border-gray-200 rounded-t-lg p-4 mb-6">
            <strong>Usuário: {{$user->nome}}</strong>
        </div>
        <form action="" method="post" class="space-y-4">
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="space-y-4">
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome:</label>
                    <input type="text" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="nome" name="nome" value="{{$user->name}}" disabled>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="text" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="email" name="email" value="{{$user->email}}" disabled>
                </div>
                <div>
                    <label for="created_at" class="block text-sm font-medium text-gray-700">Criado em:</label>
                    <input type="datetime-local" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="created_at" name="created_at" value="{{$user->created_at}}" disabled>
                </div>
                <div>
                    <label for="update_at" class="block text-sm font-medium text-gray-700">Alterado em:</label>
                    <input type="datetime-local" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="update_at" name="update_at" value="{{$user->updated_at}}" disabled>
                </div>
            </div>
        </form>
    </div>
    <a href="/user" class="inline-block bg-blue-200 text-blue-800 py-2 px-4 rounded shadow hover:bg-gray-200 border-b border-blue-200">Voltar</a>
</main>
<footer></footer>
</body>
</html>
