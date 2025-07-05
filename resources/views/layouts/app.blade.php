<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>PrepUni | Plataforma de exámenes de admisión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon"  href="/assets/images/logos/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/style.css" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="/assets/css/animate.css" />
    <script src="/assets/js/perfect-scrollbar.min.js"></script>
    <script defer src="/assets/js/popper.min.js"></script>
    @yield('link')
</head>

<body
    x-data="main"
    class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]"
>
<!-- sidebar menu overlay -->
<div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>

<!-- screen loader -->
<div class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
    <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
        <path
            d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z"
        >
            <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite" />
        </path>
        <path
            d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z"
        >
            <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite" />
        </path>
    </svg>
</div>

<!-- scroll to top button -->
<div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
    <template x-if="showTopButton">
        <button
            type="button"
            class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary"
            @click="goToTop"
        >
            <svg width="24" height="24" class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    opacity="0.5"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                    fill="currentColor"
                />
                <path
                    d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                    fill="currentColor"
                />
            </svg>
        </button>
    </template>
</div>

<!-- start theme customizer section -->
<div x-data="customizer">
    <div
        class="fixed inset-0 z-[51] hidden bg-[black]/60 px-4 transition-[display]"
        :class="{'!block': showCustomizer}"
        @click="showCustomizer = false"
    ></div>

    <nav
        class="fixed bottom-0 top-0 z-[51] w-full max-w-[400px] bg-white p-4 shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-[right] duration-300 ltr:-right-[400px] rtl:-left-[400px] dark:bg-[#0e1726]"
        :class="{'ltr:!right-0 rtl:!left-0' : showCustomizer}"
    >
        <a
            href="javascript:;"
            class="absolute bottom-0 top-0 my-auto flex h-10 w-12 cursor-pointer items-center justify-center bg-primary text-white ltr:-left-12 ltr:rounded-bl-full ltr:rounded-tl-full rtl:-right-12 rtl:rounded-br-full rtl:rounded-tr-full"
            @click="showCustomizer = !showCustomizer"
        >
            <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 animate-[spin_3s_linear_infinite]"
            >
                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" />
                <path
                    opacity="0.5"
                    d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z"
                    stroke="currentColor"
                    stroke-width="1.5"
                />
            </svg>
        </a>
        <div class="perfect-scrollbar h-full overflow-y-auto overflow-x-hidden">
            <div class="relative pb-5 text-center">
                <a
                    href="javascript:;"
                    class="absolute top-0 opacity-30 hover:opacity-100 ltr:right-0 rtl:left-0 dark:text-white"
                    @click="showCustomizer = false"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24px"
                        height="24px"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="h-5 w-5"
                    >
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </a>
                <h4 class="mb-1 dark:text-white">TEMPLATE CUSTOMIZER</h4>
                <p class="text-white-dark">Set preferences that will be cookied for your live preview demonstration.</p>
            </div>
            <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                <h5 class="mb-1 text-base leading-none dark:text-white">Color Scheme</h5>
                <p class="text-xs text-white-dark">Overall light or dark presentation.</p>
                <div class="mt-3 grid grid-cols-3 gap-2">
                    <button
                        type="button"
                        class="btn"
                        :class="[$store.app.theme === 'light' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleTheme('light')"
                    >
                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                        >
                            <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5"></circle>
                            <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path
                                opacity="0.5"
                                d="M19.7778 4.22266L17.5558 6.25424"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            ></path>
                            <path
                                opacity="0.5"
                                d="M4.22217 4.22266L6.44418 6.25424"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            ></path>
                            <path
                                opacity="0.5"
                                d="M6.44434 17.5557L4.22211 19.7779"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            ></path>
                            <path
                                opacity="0.5"
                                d="M19.7778 19.7773L17.5558 17.5551"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                            ></path>
                        </svg>
                        Light
                    </button>
                    <button
                        type="button"
                        class="btn"
                        :class="[$store.app.theme === 'dark' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleTheme('dark')"
                    >
                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                        >
                            <path
                                d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                fill="currentColor"
                            ></path>
                        </svg>
                        Dark
                    </button>
                    <button
                        type="button"
                        class="btn"
                        :class="[$store.app.theme === 'system' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleTheme('system')"
                    >
                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2"
                        >
                            <path
                                d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                stroke="currentColor"
                                stroke-width="1.5"
                            ></path>
                            <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                        System
                    </button>
                </div>
            </div>

            <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                <h5 class="mb-1 text-base leading-none dark:text-white">Navigation Position</h5>
                <p class="text-xs text-white-dark">Select the primary navigation paradigm for your app.</p>
                <div class="mt-3 grid grid-cols-3 gap-2">
                    <button
                        type="button"
                        class="btn"
                        :class="[$store.app.menu === 'horizontal' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleMenu('horizontal')"
                    >
                        Horizontal
                    </button>
                    <button
                        type="button"
                        class="btn"
                        :class="[$store.app.menu === 'vertical' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleMenu('vertical')"
                    >
                        Vertical
                    </button>
                    <button
                        type="button"
                        class="btn"
                        :class="[$store.app.menu === 'collapsible-vertical' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleMenu('collapsible-vertical')"
                    >
                        Collapsible
                    </button>
                </div>
                <div class="mt-5 text-primary">
                    <label class="mb-0 inline-flex">
                        <input
                            x-model="$store.app.semidark"
                            type="checkbox"
                            :value="true"
                            class="form-checkbox"
                            @change="$store.app.toggleSemidark()"
                        />
                        <span>Semi Dark (Sidebar & Header)</span>
                    </label>
                </div>
            </div>
            <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                <h5 class="mb-1 text-base leading-none dark:text-white">Layout Style</h5>
                <p class="text-xs text-white-dark">Select the primary layout style for your app.</p>
                <div class="mt-3 flex gap-2">
                    <button
                        type="button"
                        class="btn flex-auto"
                        :class="[$store.app.layout === 'boxed-layout' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleLayout('boxed-layout')"
                    >
                        Box
                    </button>
                    <button
                        type="button"
                        class="btn flex-auto"
                        :class="[$store.app.layout === 'full' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleLayout('full')"
                    >
                        Full
                    </button>
                </div>
            </div>
            <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                <h5 class="mb-1 text-base leading-none dark:text-white">Direction</h5>
                <p class="text-xs text-white-dark">Select the direction for your app.</p>
                <div class="mt-3 flex gap-2">
                    <button
                        type="button"
                        class="btn flex-auto"
                        :class="[$store.app.rtlClass === 'ltr' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleRTL('ltr')"
                    >
                        LTR
                    </button>
                    <button
                        type="button"
                        class="btn flex-auto"
                        :class="[$store.app.rtlClass === 'rtl' ? 'btn-primary' :'btn-outline-primary']"
                        @click="$store.app.toggleRTL('rtl')"
                    >
                        RTL
                    </button>
                </div>
            </div>

            <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                <h5 class="mb-1 text-base leading-none dark:text-white">Navbar Type</h5>
                <p class="text-xs text-white-dark">Sticky or Floating.</p>
                <div class="mt-3 flex items-center gap-3 text-primary">
                    <label class="mb-0 inline-flex">
                        <input x-model="$store.app.navbar" type="radio" value="navbar-sticky" class="form-radio" @change="$store.app.toggleNavbar()" />
                        <span>Sticky</span>
                    </label>
                    <label class="mb-0 inline-flex">
                        <input
                            x-model="$store.app.navbar"
                            type="radio"
                            value="navbar-floating"
                            class="form-radio"
                            @change="$store.app.toggleNavbar()"
                        />
                        <span>Floating</span>
                    </label>
                    <label class="mb-0 inline-flex">
                        <input x-model="$store.app.navbar" type="radio" value="navbar-static" class="form-radio" @change="$store.app.toggleNavbar()" />
                        <span>Static</span>
                    </label>
                </div>
            </div>

            <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                <h5 class="mb-1 text-base leading-none dark:text-white">Router Transition</h5>
                <p class="text-xs text-white-dark">Animation of main content.</p>
                <div class="mt-3">
                    <select x-model="$store.app.animation" class="form-select border-primary text-primary" @change="$store.app.toggleAnimation()">
                        <option value="">None</option>
                        <option value="animate__fadeIn">Fade</option>
                        <option value="animate__fadeInDown">Fade Down</option>
                        <option value="animate__fadeInUp">Fade Up</option>
                        <option value="animate__fadeInLeft">Fade Left</option>
                        <option value="animate__fadeInRight">Fade Right</option>
                        <option value="animate__slideInDown">Slide Down</option>
                        <option value="animate__slideInLeft">Slide Left</option>
                        <option value="animate__slideInRight">Slide Right</option>
                        <option value="animate__zoomIn">Zoom In</option>
                    </select>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- end theme customizer section -->

<div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
    <!-- start sidebar section -->
    <div :class="{'dark text-white-dark' : $store.app.semidark}">
        <nav
            x-data="sidebar"
            class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300"
        >
            <div class="h-full bg-white dark:bg-[#0e1726]">
                <div class="flex items-center justify-between px-4 py-3">
                    <a href="{{route('home')}}" class="main-logo flex shrink-0 items-center">

                        <span class="align-middle text-2xl font-semibold ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light lg:inline">
                             <img class="" width="150" src="/assets/images/logos/logo_principal.png" alt="image" />
                        </span>
                    </a>
                    <a
                        href="javascript:;"
                        class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                        @click="$store.app.toggleSidebar()"
                    >
                        <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                opacity="0.5"
                                d="M16.9998 19L10.9998 12L16.9998 5"
                                stroke="currentColor"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </a>
                </div>
                <ul
                    class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
                    x-data="{ activeDropdown: 'dashboard' }"
                >
                    <li class="menu nav-item">
                        <a
                            href="{{route('home')}}"
                            type="button"
                            class="nav-link group"
                            :class="{'active' : activeDropdown === 'dashboard'}"
                            @click="activeDropdown === 'dashboard' ? activeDropdown = null : activeDropdown = 'dashboard'"
                        >
                            <div class="flex items-center">
                                <svg
                                    class="shrink-0 group-hover:!text-primary"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        opacity="0.5"
                                        d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                        fill="currentColor"
                                    />
                                </svg>

                                <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                            </div>

                        </a>

                    </li>

                    <h2 class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                        <svg
                            class="hidden h-5 w-4 flex-none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="1.5"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>Estudiante</span>
                    </h2>

                    <li class="nav-item">
                        <ul>
                            <li class="menu nav-item">
                                <button
                                    type="button"
                                    class="nav-link group"
                                    :class="{'active' : activeDropdown === 'invoice'}"
                                    @click="activeDropdown === 'invoice' ? activeDropdown = null : activeDropdown = 'invoice'"
                                >
                                    <div class="flex items-center">
                                        <svg
                                            class="shrink-0 group-hover:!text-primary"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                opacity="0.5"
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                fill="currentColor"
                                            />
                                            <path
                                                fill-rule="evenodd"
                                                clip-rule="evenodd"
                                                d="M12 5.25C12.4142 5.25 12.75 5.58579 12.75 6V6.31673C14.3804 6.60867 15.75 7.83361 15.75 9.5C15.75 9.91421 15.4142 10.25 15 10.25C14.5858 10.25 14.25 9.91421 14.25 9.5C14.25 8.82154 13.6859 8.10339 12.75 7.84748V11.3167C14.3804 11.6087 15.75 12.8336 15.75 14.5C15.75 16.1664 14.3804 17.3913 12.75 17.6833V18C12.75 18.4142 12.4142 18.75 12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V17.6833C9.61957 17.3913 8.25 16.1664 8.25 14.5C8.25 14.0858 8.58579 13.75 9 13.75C9.41421 13.75 9.75 14.0858 9.75 14.5C9.75 15.1785 10.3141 15.8966 11.25 16.1525V12.6833C9.61957 12.3913 8.25 11.1664 8.25 9.5C8.25 7.83361 9.61957 6.60867 11.25 6.31673V6C11.25 5.58579 11.5858 5.25 12 5.25ZM11.25 7.84748C10.3141 8.10339 9.75 8.82154 9.75 9.5C9.75 10.1785 10.3141 10.8966 11.25 11.1525V7.84748ZM14.25 14.5C14.25 13.8215 13.6859 13.1034 12.75 12.8475V16.1525C13.6859 15.8966 14.25 15.1785 14.25 14.5Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                        <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Exámenes</span>
                                    </div>
                                    <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'invoice'}">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 5L15 12L9 19"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </div>
                                </button>
                                <ul x-cloak x-show="activeDropdown === 'invoice'" x-collapse class="sub-menu text-gray-500">
                                    <li>
                                        <a href="{{route('estudiante.examen.historial')}}">Historial</a>
                                    </li>
                                    <li>
                                        <a href="#">Resolver</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end sidebar section -->

    <div class="main-content flex min-h-screen flex-col">
        <!-- start header section -->
        <header class="z-40" :class="{'dark' : $store.app.semidark && $store.app.menu === 'horizontal'}">
            <div class="shadow-sm">
                <div class="relative flex w-full items-center bg-white px-5 py-2.5 dark:bg-[#0e1726]">
                    <div class="horizontal-logo flex items-center justify-between ltr:mr-2 rtl:ml-2 lg:hidden">
                        <a href="{{route('home')}}" class="main-logo flex shrink-0 items-center">
                            <img class="inline w-8 ltr:-ml-1 rtl:-mr-1" src="/assets/images/logos/logo.png" alt="image" />
                            <span
                                class="hidden align-middle text-2xl font-semibold transition-all duration-300 ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light md:inline"
                            ></span
                            >
                        </a>

                        <a
                            href="javascript:;"
                            class="collapse-icon flex flex-none rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary ltr:ml-2 rtl:mr-2 dark:bg-dark/40 dark:text-[#d0d2d6] dark:hover:bg-dark/60 dark:hover:text-primary lg:hidden"
                            @click="$store.app.toggleSidebar()"
                        >
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </a>
                    </div>
                    <div class="hidden ltr:mr-2 rtl:ml-2 sm:block">
                        <ul class="flex items-center space-x-2 rtl:space-x-reverse dark:text-[#d0d2d6]">

                        </ul>
                    </div>
                    <div
                        x-data="header"
                        class="flex items-center space-x-1.5 ltr:ml-auto rtl:mr-auto rtl:space-x-reverse dark:text-[#d0d2d6] sm:flex-1 ltr:sm:ml-0 sm:rtl:mr-0 lg:space-x-2"
                    >
                        <div class="sm:ltr:mr-auto sm:rtl:ml-auto" x-data="{ search: false }" @click.outside="search = false">
                            <form
                                class="absolute inset-x-0 top-1/2 z-10 mx-4 hidden -translate-y-1/2 sm:relative sm:top-0 sm:mx-0 sm:block sm:translate-y-0"
                                :class="{'!block' : search}"
                                @submit.prevent="search = false"
                            >
                                <div class="relative">
                                    <input
                                        type="text"
                                        class="peer form-input bg-gray-100 placeholder:tracking-widest ltr:pl-9 ltr:pr-9 rtl:pl-9 rtl:pr-9 sm:bg-transparent ltr:sm:pr-4 rtl:sm:pl-4"
                                        placeholder="Search..."
                                    />
                                    <button
                                        type="button"
                                        class="absolute inset-0 h-9 w-9 appearance-none peer-focus:text-primary ltr:right-auto rtl:left-auto"
                                    >
                                        <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                    <button
                                        type="button"
                                        class="absolute top-1/2 block -translate-y-1/2 hover:opacity-80 ltr:right-2 rtl:left-2 sm:hidden"
                                        @click="search = false"
                                    >
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                                            <path
                                                d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                            <button
                                type="button"
                                class="search_btn rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 dark:bg-dark/40 dark:hover:bg-dark/60 sm:hidden"
                                @click="search = ! search"
                            >
                                <svg
                                    class="mx-auto h-4.5 w-4.5 dark:text-[#d0d2d6]"
                                    width="20"
                                    height="20"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                                    <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </button>
                        </div>
                        <div>
                            <a
                                href="javascript:;"
                                x-cloak
                                x-show="$store.app.theme === 'light'"
                                href="javascript:;"
                                class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="$store.app.toggleTheme('dark')"
                            >
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.5" />
                                    <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        opacity="0.5"
                                        d="M19.7778 4.22266L17.5558 6.25424"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                    <path
                                        opacity="0.5"
                                        d="M4.22217 4.22266L6.44418 6.25424"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                    <path
                                        opacity="0.5"
                                        d="M6.44434 17.5557L4.22211 19.7779"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                    <path
                                        opacity="0.5"
                                        d="M19.7778 19.7773L17.5558 17.5551"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                </svg>
                            </a>
                            <a
                                href="javascript:;"
                                x-cloak
                                x-show="$store.app.theme === 'dark'"
                                href="javascript:;"
                                class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="$store.app.toggleTheme('system')"
                            >
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                        fill="currentColor"
                                    />
                                </svg>
                            </a>
                            <a
                                href="javascript:;"
                                x-cloak
                                x-show="$store.app.theme === 'system'"
                                href="javascript:;"
                                class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="$store.app.toggleTheme('light')"
                            >
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                    />
                                    <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </a>
                        </div>

                        <div class="dropdown shrink-0" x-data="dropdown" @click.outside="open = false">
                            <a
                                href="javascript:;"
                                class="block rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="toggle"
                            >
                                <img
                                    :src="`/assets/images/flags/${$store.app.locale.toUpperCase()}.svg`"
                                    alt="image"
                                    class="h-5 w-5 rounded-full object-cover"
                                />
                            </a>
                            <ul
                                x-cloak
                                x-show="open"
                                x-transition
                                x-transition.duration.300ms
                                class="top-11 grid w-[280px] grid-cols-2 gap-y-2 !px-2 font-semibold text-dark ltr:-right-14 rtl:-left-14 dark:text-white-dark dark:text-white-light/90 sm:ltr:-right-2 sm:rtl:-left-2"
                            >
                                <template x-for="item in languages">
                                    <li>
                                        <a
                                            href="javascript:;"
                                            class="hover:text-primary"
                                            @click="$store.app.toggleLocale(item.value),toggle()"
                                            :class="{'bg-primary/10 text-primary' : $store.app.locale == item.value}"
                                        >
                                            <img
                                                class="h-5 w-5 rounded-full object-cover"
                                                :src="`assets/images/flags/${item.value.toUpperCase()}.svg`"
                                                alt="image"
                                            />
                                            <span class="ltr:ml-3 rtl:mr-3" x-text="item.key"></span>
                                        </a>
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <div class="dropdown" x-data="dropdown" @click.outside="open = false">
                            <a
                                href="javascript:;"
                                class="block rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="toggle"
                            >
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22 10C22.0185 10.7271 22 11.0542 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H13"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                    <path
                                        d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                    <circle cx="19" cy="5" r="3" stroke="currentColor" stroke-width="1.5" />
                                </svg>
                            </a>
                            <ul
                                x-cloak
                                x-show="open"
                                x-transition
                                x-transition.duration.300ms
                                class="top-11 w-[300px] !py-0 text-xs text-dark ltr:-right-16 rtl:-left-16 dark:text-white-dark sm:w-[375px] sm:ltr:-right-2 sm:rtl:-left-2"
                            >
                                <li class="mb-5">
                                    <div class="relative overflow-hidden rounded-t-md !p-5 text-white">
                                        <div
                                            class="absolute inset-0 h-full w-full bg-[url('../images/menu-heade.jpg')] bg-cover bg-center bg-no-repeat"
                                        ></div>
                                        <h4 class="relative z-10 text-lg font-semibold">Messages</h4>
                                    </div>
                                </li>
                                <template x-for="msg in messages">
                                    <li>
                                        <div class="flex items-center px-5 py-3" @click.self="toggle">
                                            <div x-html="msg.image"></div>
                                            <span class="px-3 dark:text-gray-500">
                                                        <div class="text-sm font-semibold dark:text-white-light/90" x-text="msg.title"></div>
                                                        <div x-text="msg.message"></div>
                                                    </span>
                                            <span
                                                class="whitespace-pre rounded bg-white-dark/20 px-1 font-semibold text-dark/60 ltr:ml-auto ltr:mr-2 rtl:ml-2 rtl:mr-auto dark:text-white-dark"
                                                x-text="msg.time"
                                            ></span>
                                            <button type="button" class="text-neutral-300 hover:text-danger" @click="removeMessage(msg.id)">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                                                    <path
                                                        d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </li>
                                </template>
                                <template x-if="messages.length">
                                    <li class="mt-5 border-t border-white-light text-center dark:border-white/10">
                                        <div
                                            class="group flex cursor-pointer items-center justify-center px-4 py-4 font-semibold text-primary dark:text-gray-400"
                                            @click="toggle"
                                        >
                                            <span class="group-hover:underline ltr:mr-1 rtl:ml-1">VIEW ALL ACTIVITIES</span>
                                            <svg
                                                class="h-4 w-4 transition duration-300 group-hover:translate-x-1 ltr:ml-1 rtl:mr-1"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M4 12H20M20 12L14 6M20 12L14 18"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>
                                        </div>
                                    </li>
                                </template>
                                <template x-if="!messages.length">
                                    <li class="mb-5">
                                        <div class="!grid min-h-[200px] place-content-center text-lg hover:!bg-transparent">
                                            <div class="mx-auto mb-4 rounded-full text-primary ring-4 ring-primary/30">
                                                <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        opacity="0.5"
                                                        d="M20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M10 4.25C10.4142 4.25 10.75 4.58579 10.75 5V11C10.75 11.4142 10.4142 11.75 10 11.75C9.58579 11.75 9.25 11.4142 9.25 11V5C9.25 4.58579 9.58579 4.25 10 4.25Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z"
                                                        fill="currentColor"
                                                    />
                                                </svg>
                                            </div>
                                            No data available.
                                        </div>
                                    </li>
                                </template>
                            </ul>
                        </div>
                        <div class="dropdown" x-data="dropdown" @click.outside="open = false">
                            <a
                                href="javascript:;"
                                class="relative block rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                @click="toggle"
                            >
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                    />
                                    <path
                                        d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                    />
                                    <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>

                                <span class="absolute top-0 flex h-3 w-3 ltr:right-0 rtl:left-0">
                                            <span
                                                class="absolute -top-[3px] inline-flex h-full w-full animate-ping rounded-full bg-success/50 opacity-75 ltr:-left-[3px] rtl:-right-[3px]"
                                            ></span>
                                            <span class="relative inline-flex h-[6px] w-[6px] rounded-full bg-success"></span>
                                        </span>
                            </a>
                            <ul
                                x-cloak
                                x-show="open"
                                x-transition
                                x-transition.duration.300ms
                                class="top-11 w-[300px] divide-y !py-0 text-dark ltr:-right-2 rtl:-left-2 dark:divide-white/10 dark:text-white-dark sm:w-[350px]"
                            >
                                <li>
                                    <div class="flex items-center justify-between px-4 py-2 font-semibold hover:!bg-transparent">
                                        <h4 class="text-lg">Notification</h4>
                                        <template x-if="notifications.length">
                                            <span class="badge bg-primary/80" x-text="notifications.length + 'New'"></span>
                                        </template>
                                    </div>
                                </li>
                                <template x-for="notification in notifications">
                                    <li class="dark:text-white-light/90">
                                        <div class="group flex items-center px-4 py-2" @click.self="toggle">
                                            <div class="grid place-content-center rounded">
                                                <div class="relative h-12 w-12">
                                                    <img
                                                        class="h-12 w-12 rounded-full object-cover"
                                                        :src="`assets/images/${notification.profile}`"
                                                        alt="image"
                                                    />
                                                    <span class="absolute bottom-0 right-[6px] block h-2 w-2 rounded-full bg-success"></span>
                                                </div>
                                            </div>
                                            <div class="flex flex-auto ltr:pl-3 rtl:pr-3">
                                                <div class="ltr:pr-3 rtl:pl-3">
                                                    <h6 x-html="notification.message"></h6>
                                                    <span class="block text-xs font-normal dark:text-gray-500" x-text="notification.time"></span>
                                                </div>
                                                <button
                                                    type="button"
                                                    class="text-neutral-300 opacity-0 hover:text-danger group-hover:opacity-100 ltr:ml-auto rtl:mr-auto"
                                                    @click="removeNotification(notification.id)"
                                                >
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                                                        <path
                                                            d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                            stroke="currentColor"
                                                            stroke-width="1.5"
                                                            stroke-linecap="round"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </template>
                                <template x-if="notifications.length">
                                    <li>
                                        <div class="p-4">
                                            <button class="btn btn-primary btn-small block w-full" @click="toggle">Read All Notifications</button>
                                        </div>
                                    </li>
                                </template>
                                <template x-if="!notifications.length">
                                    <li>
                                        <div class="!grid min-h-[200px] place-content-center text-lg hover:!bg-transparent">
                                            <div class="mx-auto mb-4 rounded-full text-primary ring-4 ring-primary/30">
                                                <svg width="40" height="40" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        opacity="0.5"
                                                        d="M20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M10 4.25C10.4142 4.25 10.75 4.58579 10.75 5V11C10.75 11.4142 10.4142 11.75 10 11.75C9.58579 11.75 9.25 11.4142 9.25 11V5C9.25 4.58579 9.58579 4.25 10 4.25Z"
                                                        fill="currentColor"
                                                    />
                                                    <path
                                                        d="M10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z"
                                                        fill="currentColor"
                                                    />
                                                </svg>
                                            </div>
                                            No data available.
                                        </div>
                                    </li>
                                </template>
                            </ul>
                        </div>
                        <div class="dropdown flex-shrink-0" x-data="dropdown" @click.outside="open = false">
                            <a href="javascript:;" class="group relative" @click="toggle()">
                                        <span
                                        ><img
                                                class="h-9 w-9 rounded-full object-cover saturate-50 group-hover:saturate-100"
                                                src="/assets/images/user-profile.jpeg"
                                                alt="image"
                                            /></span>
                            </a>
                            <ul
                                x-cloak
                                x-show="open"
                                x-transition
                                x-transition.duration.300ms
                                class="top-11 w-[230px] !py-0 font-semibold text-dark ltr:right-0 rtl:left-0 dark:text-white-dark dark:text-white-light/90"
                            >
                                <li>
                                    <div class="flex items-center px-4 py-4">
                                        <div class="flex-none">
                                            <img class="h-10 w-10 rounded-md object-cover" src="/assets/images/user-profile.jpeg" alt="image" />
                                        </div>
                                        <div class="truncate ltr:pl-4 rtl:pr-4">
                                            <h4 class="text-base">
                                                {{Auth::user()->nombres}}<span class="rounded bg-success-light px-1 text-xs text-success ltr:ml-2 rtl:ml-2">Pro</span>
                                            </h4>
                                            <a
                                                class="text-black/60 hover:text-primary dark:text-dark-light/60 dark:hover:text-white"
                                                href="javascript:;"
                                            >{{Auth::user()->email}}</a
                                            >
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="" class="dark:hover:text-white" @click="toggle">
                                        <svg
                                            class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2"
                                            width="18"
                                            height="18"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5" />
                                            <path
                                                opacity="0.5"
                                                d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            />
                                        </svg>
                                        Mi Perfil</a
                                    >
                                </li>
                                <li>
                                    <a href="" class="dark:hover:text-white" @click="toggle">
                                        <svg
                                            class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2"
                                            width="18"
                                            height="18"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                opacity="0.5"
                                                d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                            />
                                            <path
                                                d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                        </svg>
                                        Mensajes</a
                                    >
                                </li>

                                <li class="border-t border-white-light dark:border-white-light/10">
                                    <a href="auth-boxed-signin.html" class="!py-3 text-danger" @click="toggle" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg
                                            class="h-4.5 w-4.5 shrink-0 rotate-90 ltr:mr-2 rtl:ml-2"
                                            width="18"
                                            height="18"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                opacity="0.5"
                                                d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                            />
                                            <path
                                                d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                        Cerrar sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- horizontal menu -->
                <ul
                    class="horizontal-menu hidden border-t border-[#ebedf2] bg-white px-6 py-1.5 font-semibold text-black rtl:space-x-reverse dark:border-[#191e3a] dark:bg-[#0e1726] dark:text-white-dark lg:space-x-1.5 xl:space-x-8"
                >
                    <li class="menu nav-item relative">
                        <a href="{{route('home')}}" class="nav-link active">
                            <div class="flex items-center">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                    <path
                                        opacity="0.5"
                                        d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                        fill="currentColor"
                                    />
                                </svg>
                                <span class="px-1">Dashboard</span>
                            </div>

                        </a>

                    </li>
                    <li class="menu nav-item relative">
                        <a href="javascript:;" class="nav-link">
                            <div class="flex items-center">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                    <g opacity="0.5">
                                        <path
                                            d="M14 2.75C15.9068 2.75 17.2615 2.75159 18.2892 2.88976C19.2952 3.02503 19.8749 3.27869 20.2981 3.7019C20.7213 4.12511 20.975 4.70476 21.1102 5.71085C21.2484 6.73851 21.25 8.09318 21.25 10C21.25 10.4142 21.5858 10.75 22 10.75C22.4142 10.75 22.75 10.4142 22.75 10V9.94359C22.75 8.10583 22.75 6.65019 22.5969 5.51098C22.4392 4.33856 22.1071 3.38961 21.3588 2.64124C20.6104 1.89288 19.6614 1.56076 18.489 1.40314C17.3498 1.24997 15.8942 1.24998 14.0564 1.25H14C13.5858 1.25 13.25 1.58579 13.25 2C13.25 2.41421 13.5858 2.75 14 2.75Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M9.94358 1.25H10C10.4142 1.25 10.75 1.58579 10.75 2C10.75 2.41421 10.4142 2.75 10 2.75C8.09318 2.75 6.73851 2.75159 5.71085 2.88976C4.70476 3.02503 4.12511 3.27869 3.7019 3.7019C3.27869 4.12511 3.02503 4.70476 2.88976 5.71085C2.75159 6.73851 2.75 8.09318 2.75 10C2.75 10.4142 2.41421 10.75 2 10.75C1.58579 10.75 1.25 10.4142 1.25 10V9.94358C1.24998 8.10583 1.24997 6.65019 1.40314 5.51098C1.56076 4.33856 1.89288 3.38961 2.64124 2.64124C3.38961 1.89288 4.33856 1.56076 5.51098 1.40314C6.65019 1.24997 8.10583 1.24998 9.94358 1.25Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M22 13.25C22.4142 13.25 22.75 13.5858 22.75 14V14.0564C22.75 15.8942 22.75 17.3498 22.5969 18.489C22.4392 19.6614 22.1071 20.6104 21.3588 21.3588C20.6104 22.1071 19.6614 22.4392 18.489 22.5969C17.3498 22.75 15.8942 22.75 14.0564 22.75H14C13.5858 22.75 13.25 22.4142 13.25 22C13.25 21.5858 13.5858 21.25 14 21.25C15.9068 21.25 17.2615 21.2484 18.2892 21.1102C19.2952 20.975 19.8749 20.7213 20.2981 20.2981C20.7213 19.8749 20.975 19.2952 21.1102 18.2892C21.2484 17.2615 21.25 15.9068 21.25 14C21.25 13.5858 21.5858 13.25 22 13.25Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M2.75 14C2.75 13.5858 2.41421 13.25 2 13.25C1.58579 13.25 1.25 13.5858 1.25 14V14.0564C1.24998 15.8942 1.24997 17.3498 1.40314 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588C3.38961 22.1071 4.33856 22.4392 5.51098 22.5969C6.65019 22.75 8.10583 22.75 9.94359 22.75H10C10.4142 22.75 10.75 22.4142 10.75 22C10.75 21.5858 10.4142 21.25 10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981C3.27869 19.8749 3.02503 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14Z"
                                            fill="currentColor"
                                        />
                                    </g>
                                    <path
                                        d="M5.52721 5.52721C5 6.05442 5 6.90294 5 8.6C5 9.73137 5 10.2971 5.35147 10.6485C5.70294 11 6.26863 11 7.4 11H8.6C9.73137 11 10.2971 11 10.6485 10.6485C11 10.2971 11 9.73137 11 8.6V7.4C11 6.26863 11 5.70294 10.6485 5.35147C10.2971 5 9.73137 5 8.6 5C6.90294 5 6.05442 5 5.52721 5.52721Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M5.52721 18.4728C5 17.9456 5 17.0971 5 15.4C5 14.2686 5 13.7029 5.35147 13.3515C5.70294 13 6.26863 13 7.4 13H8.6C9.73137 13 10.2971 13 10.6485 13.3515C11 13.7029 11 14.2686 11 15.4V16.6C11 17.7314 11 18.2971 10.6485 18.6485C10.2971 19 9.73138 19 8.60002 19C6.90298 19 6.05441 19 5.52721 18.4728Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M13 7.4C13 6.26863 13 5.70294 13.3515 5.35147C13.7029 5 14.2686 5 15.4 5C17.0971 5 17.9456 5 18.4728 5.52721C19 6.05442 19 6.90294 19 8.6C19 9.73137 19 10.2971 18.6485 10.6485C18.2971 11 17.7314 11 16.6 11H15.4C14.2686 11 13.7029 11 13.3515 10.6485C13 10.2971 13 9.73137 13 8.6V7.4Z"
                                        fill="currentColor"
                                    />
                                    <path
                                        d="M13.3515 18.6485C13 18.2971 13 17.7314 13 16.6V15.4C13 14.2686 13 13.7029 13.3515 13.3515C13.7029 13 14.2686 13 15.4 13H16.6C17.7314 13 18.2971 13 18.6485 13.3515C19 13.7029 19 14.2686 19 15.4C19 17.097 19 17.9456 18.4728 18.4728C17.9456 19 17.0971 19 15.4 19C14.2687 19 13.7029 19 13.3515 18.6485Z"
                                        fill="currentColor"
                                    />
                                </svg>
                                <span class="px-1">Apps</span>
                            </div>
                            <div class="right_arrow">
                                <svg
                                    class="h-4 w-4 rotate-90"
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </a>
                        <ul class="sub-menu">

                        </ul>
                    </li>

                </ul>
            </div>
        </header>
        <!-- end header section -->

        <!-- start main content section -->
        <div class="animate__animated p-6" :class="[$store.app.animation]">
            @yield('content')
        </div>
        <!-- end main content section -->

        <!-- start footer section -->
        <div class="mt-auto p-6 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
            © <span id="footer-year">2025</span>. Grupo 7.
        </div>
        <!-- end footer section -->
    </div>
</div>

<script src="/assets/js/alpine-collaspe.min.js"></script>
<script src="/assets/js/alpine-persist.min.js"></script>
<script defer src="/assets/js/alpine-ui.min.js"></script>
<script defer src="/assets/js/alpine-focus.min.js"></script>
<script defer src="/assets/js/alpine.min.js"></script>
<script src="/assets/js/custom.js"></script>

<script>
    document.addEventListener('alpine:init', () => {
        // main section
        Alpine.data('scrollToTop', () => ({
            showTopButton: false,
            init() {
                window.onscroll = () => {
                    this.scrollFunction();
                };
            },

            scrollFunction() {
                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    this.showTopButton = true;
                } else {
                    this.showTopButton = false;
                }
            },

            goToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            },
        }));

        // theme customization
        Alpine.data('customizer', () => ({
            showCustomizer: false,
        }));

        // sidebar section
        Alpine.data('sidebar', () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));

        // header section
        Alpine.data('header', () => ({
            init() {
                const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.classList.add('active');
                            });
                        }
                    }
                }
            },

            notifications: [

            ],

            messages: [

            ],

            languages: [

            ],

            removeNotification(value) {
                this.notifications = this.notifications.filter((d) => d.id !== value);
            },

            removeMessage(value) {
                this.messages = this.messages.filter((d) => d.id !== value);
            },
        }));
    });
</script>

@yield('script')
</body>
</html>
