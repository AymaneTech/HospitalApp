<header class="">
    <nav class="container mx-auto flex justify-between items-center">
        <div class="logo mt-2">
            <img src="/assets/images/logo.png" class="w-[150px] h-[60px]" alt="logo">
        </div>
        <div class="text-gray-900">
            <ul class="nav-list hidden lg:flex gap-12 items-center font-semibold">
                <li class="hover:text-blue-500"><a href="/">Home</a></li>
                <li class="hover:text-blue-500"><a href="/#about">About</a></li>
                <li class="hover:text-blue-500"><a href="/#doctors">Doctors</a></li>
                <li class="hover:text-blue-500"><a href="/#speciaities">speciaities</a></li>
                <li class="main-button">
                    <a href="#">Book
                        Appointement</a>
                </li>
                <li class="hover:cursor-pointer">
                    <x-icon name="search"/>
                </li>
                <li>
                    <a href="">
                        <img class="w-10 h-10 rounded-full	"
                             src="/storage/{{ auth('patient')->user()->image->path }}" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
