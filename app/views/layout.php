<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/output.css">
</head>

<body class="font-main">
    <header class="relative p-4">
        <div class="bg-zinc-50 border border-zinc-100 flex justify-between p-2 rounded-lg">
            <div class="flex gap-8 items-center">
                <a href="/public" class="">
                    <svg class="w-20" viewBox="0 0 782 131" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.8278 6.71411H0V123.874H18.7993V76.5403H22.8278C42.2985 76.5403 69.4905 73.519 69.4905 41.6272C69.4905 9.5676 42.2985 6.71411 22.8278 6.71411ZM6.71405 23.1635H27.6955C37.4308 23.1635 50.6911 24.6742 50.6911 41.6272C50.6911 58.4123 37.4308 60.0909 27.6955 60.0909H18.7993V32.0597L6.71405 23.1635Z" fill="currentColor" />
                        <path d="M143.848 5.03552C109.102 5.03552 81.0713 32.0596 81.0713 65.2942C81.0713 98.5287 109.102 125.553 143.848 125.553C178.425 125.553 206.624 98.5287 206.624 65.2942C206.624 32.0596 178.425 5.03552 143.848 5.03552ZM99.5349 65.2942C99.5349 41.1236 119.341 21.485 143.848 21.485C168.354 21.485 188.16 41.1236 188.16 65.2942C188.16 89.4647 168.354 109.103 143.848 109.103C119.341 109.103 99.5349 89.4647 99.5349 65.2942Z" fill="currentColor" />
                        <path d="M224.919 123.874H243.718V6.71411H224.919V123.874Z" fill="currentColor" />
                        <path d="M354.836 6.71405V88.4577L274.435 6.71405L267.889 0V123.874H286.688V42.1307L366.921 123.874L373.635 130.588V6.71405H354.836Z" fill="currentColor" />
                        <path d="M461.756 6.71411H387.733V23.1635H415.261V123.874H434.228V32.0597L421.975 23.1635H461.756V6.71411Z" fill="currentColor" />
                        <path d="M542.491 23.1635V6.71411H475.854V123.874H542.491V107.425H494.654V67.9799H538.295V51.5304H494.654V33.0668L481.058 23.1635H542.491Z" fill="currentColor" />
                        <path d="M581.097 107.425V6.71411H562.298V123.874H616.514V107.425H581.097Z" fill="currentColor" />
                        <path d="M630.444 123.874H649.244V6.71411H630.444V123.874Z" fill="currentColor" />
                        <path d="M781.678 123.874L731.659 19.6386L722.091 0L662.672 123.874H681.471L691.542 103.061L680.968 95.3395H749.115L762.879 123.874H781.678ZM703.124 78.8901L722.091 39.1094L741.226 78.8901H703.124Z" fill="currentColor" />
                    </svg>
                </a>
                <nav>
                    <ul class="flex transition-all duration-300 text-zinc-700 hover:text-zinc-400 *:hover:transition-colors *:hover:duration-300 *:hover:text-zinc-950 gap-4 *:text-sm *:font-medium *:cursor-pointer *:flex *:gap-2 *:items-center">
                        <li class="group">
                            Produk
                            <svg class="group-hover:rotate-180 transition-transform duration-75" width="10" height="5" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.75 0.75L5.75 5.75L10.75 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </li>
                        <li class="group">
                            Docs
                            <svg class="group-hover:rotate-180 transition-transform duration-75" width="10" height="5" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.75 0.75L5.75 5.75L10.75 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </li>
                        <li class="">
                            <a href="">
                                Changelog
                            </a>
                        </li>
                        <li class="group">
                            Perusahaan
                            <svg class="group-hover:rotate-180 transition-transform duration-75" width="10" height="5" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.75 0.75L5.75 5.75L10.75 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="flex gap-4 *:text-sm">
                <button class="cursor-pointer border border-transparent transition-all duration-300 text-zinc-700 hover:text-zinc-900 hover:border-zinc-300 hover:bg-zinc-100 px-2 py-0.5 rounded-md" onclick="window.location.assign('http://pointeliaapp.test/public/auth/sign-in')">Sign In</button>
                <button class="flex items-center gap-2 cursor-pointer border border-zinc-200 px-2 py-0.5 text-zinc-700 hover:text-zinc-900 bg-white rounded-md">
                    Start App
                    <svg width="4" height="7" viewBox="0 0 4 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.41 6.484C0.298 6.484 0.201667 6.44733 0.121 6.374C0.0403336 6.29933 0 6.20167 0 6.081V0.403999C0 0.282666 0.0413329 0.185 0.124 0.111C0.206666 0.0370001 0.302666 0 0.412 0C0.44 0 0.534667 0.0433325 0.696 0.129999L3.373 2.808C3.435 2.86933 3.48267 2.93567 3.516 3.007C3.54933 3.07833 3.566 3.15667 3.566 3.242C3.566 3.32733 3.54933 3.40567 3.516 3.477C3.48267 3.54833 3.435 3.615 3.373 3.677L0.696 6.354C0.659333 6.39067 0.616334 6.42167 0.567 6.447C0.518334 6.47167 0.466 6.484 0.41 6.484Z" fill="black" />
                    </svg>
                </button>
            </div>
        </div>

        <div></div>
    </header>

    <main>
        <?php require_once "../app/views/" . $viewPath . ".php"; ?>
    </main>
</body>

</html>