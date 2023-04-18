<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>


        <!--  -->
        <div class=" min-h-screen bg-gray-100  ">
            <nav class="bg-dark border-b border-gray-100 sticky-top p-2 ">
                <!-- Primary Navigation Menu -->

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
                    <div class="flex justify-between h-26 ">


                        <div class="flex  ">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">

                                <svg width="50px" height="50px" viewBox="0 0 1024 1024" class="icon" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M519.232137 503.49783l267.977124-443.100669s195.514642 98.992076 221.338662 334.724454C594.799146 485.36457 519.232137 503.49783 519.232137 503.49783z"
                                        fill="#EBA824" />
                                    <path
                                        d="M953.372011 405.70523c17.427686-2.398953 36.337077-7.97299 55.175912-10.583615-25.753462-235.66182-221.338662-334.724454-221.338662-334.724454l-30.410253 47.767381c48.825742 37.465996 167.29167 122.911045 196.573003 297.540688z"
                                        fill="#6E4921" />
                                    <path
                                        d="M426.872459 568.340109l209.202784-354.198305c-61.314408-36.26652-132.789086-57.151519-209.202784-57.151519-227.194929 0-411.349824 184.154896-411.349824 411.349824s184.154896 411.349824 411.349824 411.349824 411.349824-184.154896 411.349824-411.349824c0-31.609729-3.668986-62.302212-10.442499-91.865776L426.872459 568.340109z"
                                        fill="#EBA824" />
                                    <path
                                        d="M787.420933 485.717357c6.067939 26.600152 9.384138 54.188107 9.384138 82.622752 0 204.334321-165.598291 369.932612-369.932612 369.932612S56.939847 772.67443 56.939847 568.340109c0-204.334321 165.598291-369.932612 369.932612-369.932612 68.722938 0 133.000758 18.768277 188.106112 51.436367l21.026114-35.631503c-61.314408-36.26652-132.789086-57.151519-209.202783-57.151519-227.194929 0-411.349824 184.154896-411.349825 411.349824s184.154896 411.349824 411.349825 411.349825 411.349824-184.154896 411.349824-411.349825c0-31.609729-3.668986-62.302212-10.4425-91.865775l-40.288293 9.172466z"
                                        fill="#6E4921" />
                                    <path
                                        d="M444.088472 671.283401m-48.825742 0a48.825742 48.825742 0 1 0 97.651485 0 48.825742 48.825742 0 1 0-97.651485 0Z"
                                        fill="#4C2510" />
                                    <path
                                        d="M781.846896 219.574726m-35.913733 0a35.913733 35.913733 0 1 0 71.827465 0 35.913733 35.913733 0 1 0-71.827465 0Z"
                                        fill="#4C2510" />
                                    <path
                                        d="M655.549094 582.87494m-19.826638 0a19.826638 19.826638 0 1 0 39.653276 0 19.826638 19.826638 0 1 0-39.653276 0Z"
                                        fill="#4C2510" />
                                    <path
                                        d="M406.058017 897.278853m-19.050506 0a19.050506 19.050506 0 1 0 38.101012 0 19.050506 19.050506 0 1 0-38.101012 0Z"
                                        fill="#4C2510" />
                                    <path
                                        d="M165.245504 591.624061m-35.913732 0a35.913733 35.913733 0 1 0 71.827465 0 35.913733 35.913733 0 1 0-71.827465 0Z"
                                        fill="#623520" />
                                    <path
                                        d="M358.502308 515.704265m-23.848411 0a23.848412 23.848412 0 1 0 47.696823 0 23.848412 23.848412 0 1 0-47.696823 0Z"
                                        fill="#FFFCF4" />
                                    <path
                                        d="M492.7731 312.781093m-13.758699 0a13.758699 13.758699 0 1 0 27.517398 0 13.758699 13.758699 0 1 0-27.517398 0Z"
                                        fill="#FFFCF4" />
                                    <path
                                        d="M868.914766 373.460484m-13.758699 0a13.758699 13.758699 0 1 0 27.517398 0 13.758699 13.758699 0 1 0-27.517398 0Z"
                                        fill="#FFFCF4" />
                                    <path
                                        d="M284.417005 851.416523m-44.592296 0a44.592297 44.592297 0 1 0 89.184593 0 44.592297 44.592297 0 1 0-89.184593 0Z"
                                        fill="#FDFDEC" />
                                    <path
                                        d="M211.672294 534.543099l53.341418-6.702956s-29.493006-92.641907-22.79005-108.164542c4.162888-3.598429 18.13326-6.209054 16.580996 17.568801-1.058361 7.620203 41.20554 14.464273 27.446841-39.371047-5.715152-17.074898-39.018259-42.122786-85.092262-27.587956-21.237787 8.255219-58.844898 30.551368-40.217736 76.272583 5.362365 8.608007 17.074898 13.617584 20.179425-1.90505 3.104527-18.486047 13.829257-31.256942 17.921588-13.617584S211.672294 534.543099 211.672294 534.543099zM532.779164 775.073382l31.115827 38.242128s57.786536-67.876249 73.097498-70.204644c4.797905 1.481706 13.617584 11.077517-5.644594 21.449459-6.420726 2.892855 8.749121 39.088817 43.886722 2.257838 10.513057-12.700338 13.829257-50.730793-19.756081-79.588782-16.722111-12.488665-52.283057-30.974712-78.81265 5.715151-4.092331 8.325777-2.328395 19.897196 11.289189 14.817061 15.875422-6.561841 30.974712-4.374561 19.332736 7.337973-11.783091 11.712534-74.508647 59.973817-74.508647 59.973816zM643.977675 375.153862L635.722456 403.517949s53.200303 5.362365 59.550472 12.135879c0.917247 2.892855-0.846689 10.513057-12.488666 4.515675-3.598429-2.18728-16.298767 17.639358 13.829257 22.437263 9.87804 0.846689 29.775236-10.4425 32.526976-36.830979 0.493902-12.488665-2.540068-36.337077-29.704679-36.972094-5.50348 0.846689-10.583615 5.644595-3.457314 10.583615 8.608007 5.574037 12.700338 13.758699 2.963412 11.994763s-54.964239-16.228209-54.964239-16.228209z"
                                        fill="#E8BC38" />
                                    <path
                                        d="M327.315924 384.114656s27.940743-105.342245 110.069592-102.096603c-1.552263 35.067043-10.301385 102.096603-110.069592 102.096603zM254.35954 627.537794s61.878867 3.810101 69.287397 49.954661c-19.756081 3.03397-58.139323 5.644595-69.287397-49.954661zM781.846896 295.776752s37.113209 2.257838 41.558327 29.986908c-11.853648 1.763936-34.855371 3.386757-41.558327-29.986908z"
                                        fill="#3D7C38" />
                                </svg>
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class=" hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-house text-white" viewBox="0 0 16 16">
                                        <path
                                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                                    </svg>
                                </NavLink>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                                <NavLink :href="route('cart')" :active="route().current('cart')" class="bi bi-cart-plus">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-cart-plus text-white" viewBox="0 0 16 16">
                                        <path
                                            d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                </NavLink>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                                <NavLink :href="route('completeorder')" :active="route().current('completeorder')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-clock-history text-white" viewBox="0 0 16 16">
                                        <path
                                            d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                        <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                        <path
                                            d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>
                                </NavLink>
                            </div>




                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{
                                        hidden: showingNavigationDropdown,
                                        'inline-flex': !showingNavigationDropdown,
                                    }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{
                                        hidden: !showingNavigationDropdown,
                                        'inline-flex': showingNavigationDropdown,
                                    }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Меню
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('cart')" :active="route().current('cart')">
                            Корзина
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('completeorder')" :active="route().current('completeorder')">
                            Заказы
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">
                                {{ $page.props.auth.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <!-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"> -->
                <div>
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
            <div class="bg-dark">
                <div class="container ">

<footer class="text-white text-center text-lg-start bg-success">
<!-- Grid container -->
<div class="container p-4">
  <!--Grid row-->
  <div class="row mt-4">
    <!--Grid column-->
    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
      <h5 class="text-uppercase mb-4">О нас</h5>

      <p>
        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
        voluptatum deleniti atque corrupti.
      </p>

      <p>
        Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
        molestias.
      </p>

     
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
      <h5 class="text-uppercase mb-4 pb-1">Контактная информация</h5>

      <!-- <div class="form-outline form-white mb-4">
        <input type="text" id="formControlLg" class="form-control form-control-lg" />
        <label class="form-label" for="formControlLg">Search</label>
      </div> -->

      <ul class="fa-ul" style="margin-left: 1.65em;">
        <li class="mb-3">
          <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Донецк, ДНР</span>
        </li>
        <li class="mb-3">
          <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">pizza@mail.com</span>
        </li>
        <li class="mb-3">
          <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 7(949) 234 567 88</span>
        </li>
        <li class="mb-3">
          <span class="fa-li"><i class="fas fa-print"></i></span><span class="ms-2">+ 7(949) 234 567 89</span>
        </li>
      </ul>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
      <h5 class="text-uppercase mb-4">Мы открыты</h5>

      <table class="table text-center text-white">
        <tbody class="font-weight-normal">
          <tr>
            <td>Пн - Вт:</td>
            <td>8 - 21</td>
          </tr>
          <tr>
            <td>Пт - Сб:</td>
            <td>8 - 19</td>
          </tr>
          <tr>
            <td>Вс:</td>
            <td>9 - 16  </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!--Grid column-->
  </div>
  <!--Grid row-->
</div>
<!-- Grid container -->

<!-- Copyright -->
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
  © 2023 
</div>
<!-- Copyright -->
</footer>
</div>
</div>
</div>
</div>
</template>
<style>
main{
    min-height: 45vh;
}
</style>