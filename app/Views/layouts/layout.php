<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comics App</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div>
        <div class="drawer">
            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content flex">
                <!-- Page content here -->
                <div class="-ml-80 lg:ml-0 lg:drawer-open transition-all duration-500">
                    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
                    <div class="drawer-side">
                        <label for="my-drawer-2" class="drawer-overlay"></label>
                        <ul class="p-8 w-80 h-full bg-base-200 text-base-content">
                            <!-- Sidebar content here -->
                            <li class="flex gap-3 items-center">
                                <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <a>Dashboard</a>
                            </li>
                            <li class="flex gap-3 items-center">
                                <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <a>List Comics</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full ml-80 lg:ml-0">
                    <?= $this->include("layouts/navbar"); ?>
                    <div class="p-6">
                        <?= $this->renderSection("content"); ?>
                    </div>
                </div>
            </div>
            <div class="drawer-side">
                <label for="my-drawer" class="drawer-overlay"></label>
                <ul class="menu p-4 w-80 h-full bg-base-200 text-base-content">
                    <!-- Sidebar content here -->
                    <li class="flex">
                        <p>ada</p>
                        <a>Sidebar Item 1</a>
                    </li>
                    <li><a>Sidebar Item 2</a></li>

                </ul>
            </div>
        </div>
    </div>
</body>

</html>