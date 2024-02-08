<header class="">
    <nav class="container mx-auto flex justify-between">
        <div class="logo mt-2">
            <h2 class="text-xl font-bold">Medi  <span class="text-[{{ $primaryColor }}]">Connect</span></h2>
        </div>
        <div class="flex gap-2 mt-2">
            @auth
                <a href="/posts/create" class="font-semibold text-white bg-[{{ $primaryColor }}] px-8 py-2 rounded-3xl">Share
                    Post</a>
                <form action="/logout" method="post">
                    <button class="font-semibold text-[{{ $primaryColor }}] border border-[{{ $primaryColor }}] px-8 py-2 rounded-3xl">Logout
                    </button>
                    @csrf
                </form>
            @else
                <a href="/login" class="font-semibold text-white bg-[{{ $primaryColor }}] px-8 py-2 rounded-3xl">login</a>
                <a href="/register" class="font-semibold text-white bg-[{{ $primaryColor }}] px-8 py-2 rounded-3xl">Register</a>
            @endauth
        </div>
    </nav>
</header>
