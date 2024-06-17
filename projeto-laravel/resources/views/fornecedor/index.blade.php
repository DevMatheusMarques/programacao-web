<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exibir Fornecedores</title>

    <!-- Icon -->
    <link rel="icon" href="{{ asset('assets/book-solid.png') }}" type="image/x-icon">

    <!-- Tailwind CSS -->
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- CDN Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.tailwind.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.tailwind.min.js"></script>

    <script src="https://kit.fontawesome.com/9c74bfc2b8.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .dataTables_filter {
            margin-bottom: 2rem;
        }
        .dataTables_info {
            margin-top: 2rem;
        }
        .dataTables_paginate {
            margin-top: 2rem;
        }
        .fa-solid {
            padding-left: 1rem;
        }
    </style>
</head>
<body class="bg-gray-100">
<header>
    @include('layouts.navigation')
</header>
<main class="container mx-auto p-8">
    <a href="{{ route('fornecedor.create') }}" class="mb-5 inline-block">
        <button type="button" class="bg-blue-200 text-blue-800 py-2 px-4 rounded shadow hover:bg-gray-200">Cadastrar Novo Fornecedor</button>
    </a>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="mb-4 pb-4 border-b border-blue-200">
            <strong class="text-lg text-blue-800">Fornecedores Cadastrados</strong>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white mt-5" id="table">
                <thead>
                <tr>
                    <th class="py-2 px-4 bg-blue-100 border-b border-blue-200 text-center">ID</th>
                    <th class="py-2 px-4 bg-blue-100 border-b border-blue-200 text-center">Nome</th>
                    <th class="py-2 px-4 bg-blue-100 border-b border-blue-200 text-center">CNPJ</th>
                    <th class="py-2 px-4 bg-blue-100 border-b border-blue-200 text-center">Endereço</th>
                    <th class="py-2 px-4 bg-blue-100 border-b border-blue-200 text-center">Telefone</th>
                    <th class="py-2 px-4 bg-blue-100 border-b border-blue-200 text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($fornecedores as $fornecedor)
                    <tr class="border-b border-blue-200 hover:bg-gray-50 text-center">
                        <td class="py-2 px-4">{{ $fornecedor->id }}</td>
                        <td class="py-2 px-4">{{ $fornecedor->nome }}</td>
                        <td class="py-2 px-4">{{ $fornecedor->cnpj }}</td>
                        <td class="py-2 px-4">{{ $fornecedor->endereco }}</td>
                        <td class="py-2 px-4">{{ $fornecedor->telefone }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('fornecedor.show', $fornecedor->id) }}"><i class="fa-solid fa-magnifying-glass"></i></a>
                            <a href="{{ route('fornecedor.edit', $fornecedor->id) }}" class="text-blue-500 hover:text-blue-700">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form action="{{ route('fornecedor.destroy', $fornecedor->id) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn-delete" data-id="{{ $fornecedor->id }}">
                                    <i class="fa-solid fa-trash-can text-red-500 hover:text-red-700"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
<footer></footer>
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/Portuguese-Brasil.json'
            }
        });
    });

    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function (event) {
            event.preventDefault();
            const form = this.closest('form');
            Swal.fire({
                title: "Tem certeza?",
                text: "Você não poderá reverter isso!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, excluir!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
</body>
</html>

@if (session('message'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "{{ session('message')['icon'] }}",
                title: "{{ session('message')['title'] }}",
                text: "{{ session('message')['text'] }}",
            }).then(function() {
                window.location.href = "/fornecedor";
            });
        });
    </script>
@endif
