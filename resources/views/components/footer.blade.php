<footer class="w-full bg-[#0f0246] text-white py-5">
    <div class="container mx-auto px-8">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="mb-4 md:mb-0 text-center flex flex-col items-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-28 w-auto mb-2">
                <p class="text-sm mt-2 text-gray-300">Simplifique sua gestão financeira</p>
            </div>
            <!-- Links de Navegação -->
            <div class="flex space-x-6 text-sm">
                <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('expenses.index') }}" class="hover:underline">Despesas & Receitas</a>
                <a href="{{ route('profile.show') }}" class="hover:underline">Perfil</a>
                <a href="#" class="hover:underline">Contato</a>
            </div>
            <!-- Redes Sociais -->
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" target="_blank" class="hover:text-green-500"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank" class="hover:text-green-500"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank" class="hover:text-green-500"><i class="fab fa-instagram"></i></a>
                <a href="#" target="_blank" class="hover:text-green-500"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="text-center mt-6 text-gray-400 text-xs">
            &copy; {{ date('Y') }} Despesas & Receitas. Todos os direitos reservados.
        </div>
    </div>
</footer>
