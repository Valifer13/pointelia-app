<?php

class Flasher
{
    public static function setFlash($message, $type, $action = "")
    {
        $_SESSION['flash'] = [
            "message" => $message,
            "action" => $action,
            "type" => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            if ($_SESSION['flash']['type'] == "info") {
                echo "
                    <div id='flashbar' class='flash fixed z-50 right-4 bottom-4 flex gap-4 py-4 ps-4 pe-16 shadow-xl w-fit rounded-lg bg-white bg-linear-to-r from-blue-100 from-10% via-white via-40% to-white to-50%'>
                        <div class='text-blue-500 p-2 bg-white rounded-md h-fit shadow-sm'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-info'><circle cx='12' cy='12' r='10'></circle><line x1='12' y1='16' x2='12' y2='12'></line><line x1='12' y1='8' x2='12.01' y2='8'></line></svg>
                        </div>
                        <div>
                            <h6 class='font-bold'>Informasi</h6>
                            <p class='text-zinc-600 max-w-[290px]'>" . $_SESSION['flash']['message'] . "</p>
                        </div>
                        <button class='close-flash-btn absolute top-4 right-4 cursor-pointer'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14'>
                                <path fill='currentColor' fill-rule='evenodd' d='M1.707.293A1 1 0 0 0 .293 1.707L5.586 7L.293 12.293a1 1 0 1 0 1.414 1.414L7 8.414l5.293 5.293a1 1 0 0 0 1.414-1.414L8.414 7l5.293-5.293A1 1 0 0 0 12.293.293L7 5.586z' clip-rule='evenodd' />
                            </svg>
                        </button>
                    </div>
                ";
            } else if ($_SESSION['flash']['type'] == 'success') {
                echo "
                    <div class='flash fixed z-50 right-4 bottom-4 flex gap-4 py-4 ps-4 pe-16 shadow-xl w-fit rounded-lg bg-white bg-linear-to-r from-green-100 from-10% via-white via-40% to-white to-50%'>
                        <div class='text-green-500 p-2 bg-white rounded-md h-fit shadow-sm'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check-circle'><path d='M22 11.08V12a10 10 0 1 1-5.93-9.14'></path><polyline points='22 4 12 14.01 9 11.01'></polyline></svg>
                        </div>
                        <div>
                            <h6 class='font-bold'>Sukses</h6>
                            <p class='text-zinc-600 max-w-[290px]'>" . $_SESSION['flash']['message'] . "</p>
                        </div>
                        <button class='close-flash-btn absolute top-4 right-4 cursor-pointer'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14'>
                                <path fill='currentColor' fill-rule='evenodd' d='M1.707.293A1 1 0 0 0 .293 1.707L5.586 7L.293 12.293a1 1 0 1 0 1.414 1.414L7 8.414l5.293 5.293a1 1 0 0 0 1.414-1.414L8.414 7l5.293-5.293A1 1 0 0 0 12.293.293L7 5.586z' clip-rule='evenodd' />
                            </svg>
                        </button>
                    </div>
                ";
            } else if ($_SESSION['flash']['type'] == 'warning') {
                echo "
                    <div class='flash fixed z-50 right-4 bottom-4 flex gap-4 py-4 ps-4 pe-16 shadow-xl w-fit rounded-lg bg-white bg-linear-to-r from-yellow-100 from-10% via-white via-40% to-white to-50%'>
                        <div class='text-yellow-500 p-2 bg-white rounded-md h-fit shadow-sm'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-alert-triangle'><path d='M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z'></path><line x1='12' y1='9' x2='12' y2='13'></line><line x1='12' y1='17' x2='12.01' y2='17'></line></svg>
                        </div>
                        <div>
                            <h6 class='font-bold'>Peringatan</h6>
                            <p class='text-zinc-600 max-w-[290px]'>" . $_SESSION['flash']['message'] . "</p>
                        </div>
                        <button class='close-flash-btn absolute top-4 right-4 cursor-pointer'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14'>
                                <path fill='currentColor' fill-rule='evenodd' d='M1.707.293A1 1 0 0 0 .293 1.707L5.586 7L.293 12.293a1 1 0 1 0 1.414 1.414L7 8.414l5.293 5.293a1 1 0 0 0 1.414-1.414L8.414 7l5.293-5.293A1 1 0 0 0 12.293.293L7 5.586z' clip-rule='evenodd' />
                            </svg>
                        </button>
                    </div>
                ";
            } else if ($_SESSION['flash']['type'] == 'error') {
                echo "
                    <div class='flash fixed z-50 right-4 bottom-4 flex gap-4 py-4 ps-4 pe-16 shadow-xl w-fit rounded-lg bg-white bg-linear-to-r from-red-100 from-10% via-white via-40% to-white to-50%'>
                        <div class='text-red-500 p-2 bg-white rounded-md h-fit shadow-sm'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x-octagon'><polygon points='7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2'></polygon><line x1='15' y1='9' x2='9' y2='15'></line><line x1='9' y1='9' x2='15' y2='15'></line></svg>
                        </div>
                        <div>
                            <h6 class='font-bold'>Error</h6>
                            <p class='text-zinc-600 max-w-[290px]'>" . $_SESSION['flash']['message'] . "</p>
                        </div>
                        <button class='close-flash-btn absolute top-4 right-4 cursor-pointer'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 14 14'>
                                <path fill='currentColor' fill-rule='evenodd' d='M1.707.293A1 1 0 0 0 .293 1.707L5.586 7L.293 12.293a1 1 0 1 0 1.414 1.414L7 8.414l5.293 5.293a1 1 0 0 0 1.414-1.414L8.414 7l5.293-5.293A1 1 0 0 0 12.293.293L7 5.586z' clip-rule='evenodd' />
                            </svg>
                        </button>
                    </div>
                ";
            }
            unset($_SESSION['flash']);
        }
    }
}
