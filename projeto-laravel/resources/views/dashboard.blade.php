<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Painel de Controle
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mx-auto px-4 py-8">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <x-card
                                title="Fornecedores"
                                description="Acessar listagem de fornecedores"
                                link="{{ url('/fornecedor') }}"
                            />
                            <x-card
                                title="Clientes"
                                description="Acessar listagem de clientes"
                                link="{{ url('/cliente') }}"
                            />
                            <x-card
                                title="Usuários"
                                description="Acessar listagem de usuários"
                                link="{{ url('/user') }}"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
