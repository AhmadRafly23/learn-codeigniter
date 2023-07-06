<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $header; ?></title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div>
        <div class="drawer">
            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content flex">
                <!-- Page content here -->
                <?= $this->include("layouts/sidebar"); ?>
                <div class="w-full min-h-screen flex flex-col ml-0 lg:ml-80">
                    <?= $this->include("layouts/navbar"); ?>
                    <div class="flex-1 p-6">
                        <?= $this->renderSection("content"); ?>
                    </div>
                </div>
            </div>
            <div class="drawer-side">
                <label for="my-drawer" class="drawer-overlay"></label>
                <div class="p-4 w-60 md:w-80 h-full bg-base-200 text-base-content">
                    <div class="flex items-center justify-center space-x-2 mb-5">
                        <svg class="h-8 w-8 text-blue-800" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p class="font-medium text-xl">Comics App</p>
                    </div>
                    <ul class="space-y-4">
                        <!-- Sidebar content here -->
                        <li class="dashboard rounded-2xl cursor-pointer hover:scale-105 transition-all duration-300">
                            <a class="flex gap-3 items-center p-3" href="/">
                                <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="comic rounded-2xl cursor-pointer hover:scale-105 transition-all duration-300">
                            <a class="flex gap-3 items-center p-3" href="/comic">
                                <svg class=" w-6 h-6" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <span>List Comic</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const route = window.location.pathname;

    const dashboard = document.querySelectorAll(".dashboard");
    const comic = document.querySelectorAll(".comic");

    const checkSize = () => {
        let width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        if (width > 1024) {
            document.getElementById("my-drawer").checked = false;
        }
    }

    window.addEventListener("resize", checkSize);

    const activeMenu = () => {
        if (route == "/") {
            dashboard.forEach((item) => {
                item.classList.add("bg-blue-700", "text-white");
            });

            comic.forEach((item) => {
                comic[0].classList.add("bg-white");
                comic[0].classList.remove("bg-blue-700", "text-white");
            });
        } else if (route.includes("/comic")) {
            comic.forEach((item) => {
                item.classList.add("bg-blue-700", "text-white");
            });

            dashboard.forEach((item) => {
                item.classList.add("bg-white");
                item.classList.remove("bg-blue-700", "text-white");
            });
        }
    }

    activeMenu();
</script>

</html>