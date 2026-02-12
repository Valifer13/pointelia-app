<?php

class Flasher
{
    public function setFlash($message, $type, $action = "")
    {
        $_SESSION['flash'] = [
            "message" => $message,
            "action" => $action,
            "type" => $type
        ];
    }

    public function flash()
    {
        if (isset($_SESSION['flash'])) {
            if ($_SESSION['flash']['type'] == "info") {
                echo "
                    <div id='flashbar' class='absolute right-4 bottom-4 flex gap-4 py-4 ps-4 pe-16 shadow-xl w-fit rounded-lg bg-linear-to-r from-blue-100 from-10% via-white via-40% to-white to-50%'>
                        <div class='text-blue-500 p-2 bg-white rounded-md h-fit shadow-sm'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewbox='0 0 24 24'><g fill='none'><path fill='currentcolor' fill-opacity='0.16' d='m12 22c5.523 0 10-4.477 10-10s17.523 2 12 2s2 6.477 2 12s4.477 10 10 10'/><path stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='1.5' d='m12 8h.008m12 16v-5m10 1c0 5.523-4.477 10-10 10s2 17.523 2 12s6.477 2 12 2s10 4.477 10 10'/></g></svg>
                        </div>
                        <div>
                            <h6 class='font-bold'>information</h6>
                            <p class='text-zinc-600 max-w-[290px]'>" . $_SESSION['flash']['message'] . "</p>
                        </div>
                        <button id='closeflashbtn' class='absolute top-4 right-4'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewbox='0 0 24 24'><path fill='currentcolor' d='m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7l13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z'/></svg>
                        </button>
                    </div>
                ";
            } else if ($_SESSION['flash']['type'] == 'success') {
                echo "
                    <div id='flashbar' class='absolute right-4 bottom-4 flex gap-4 py-4 ps-4 pe-16 shadow-xl w-fit rounded-lg bg-linear-to-r from-green-100 from-10% via-white via-40% to-white to-50%'>
                        <div class='text-green-500 p-2 bg-white rounded-md h-fit shadow-sm'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='48' height='48' viewBox='0 0 48 48'><defs><mask id='SVGBM25vJeV'><g fill='none' stroke='#fff' stroke-linejoin='round' stroke-width='4'><path fill='#555555' d='M24 44a19.94 19.94 0 0 0 14.142-5.858A19.94 19.94 0 0 0 44 24a19.94 19.94 0 0 0-5.858-14.142A19.94 19.94 0 0 0 24 4A19.94 19.94 0 0 0 9.858 9.858A19.94 19.94 0 0 0 4 24a19.94 19.94 0 0 0 5.858 14.142A19.94 19.94 0 0 0 24 44Z'/><path stroke-linecap='round' d='m16 24l6 6l12-12'/></g></mask></defs><path fill='currentColor' d='M0 0h48v48H0z' mask='url(#SVGBM25vJeV)'/></svg>
                        </div>
                        <div>
                            <h6 class='font-bold'>information</h6>
                            <p class='text-zinc-600 max-w-[290px]'>" . $_SESSION['flash']['message'] . "</p>
                        </div>
                        <button id='closeflashbtn' class='absolute top-4 right-4'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewbox='0 0 24 24'><path fill='currentcolor' d='m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7l13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z'/></svg>
                        </button>
                    </div>
                ";
            } else if ($_SESSION['flash']['type'] == 'warning') {
                echo "
                    <div id='flashbar' class='absolute right-4 bottom-4 flex gap-4 py-4 ps-4 pe-16 shadow-xl w-fit rounded-lg bg-linear-to-r from-yellow-100 from-10% via-white via-40% to-white to-50%'>
                        <div class='text-yellow-500 p-2 bg-white rounded-md h-fit shadow-sm'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='1024' height='1024' viewBox='0 0 1024 1024'><path fill='currentColor' d='m955.7 856l-416-720c-6.2-10.7-16.9-16-27.7-16s-21.6 5.3-27.7 16l-416 720C56 877.4 71.4 904 96 904h832c24.6 0 40-26.6 27.7-48m-783.5-27.9L512 239.9l339.8 588.2z'/><path fill='currentColor' fill-opacity='0.15' d='M172.2 828.1h679.6L512 239.9zM560 720a48.01 48.01 0 0 1-96 0a48.01 48.01 0 0 1 96 0m-16-304v184c0 4.4-3.6 8-8 8h-48c-4.4 0-8-3.6-8-8V416c0-4.4 3.6-8 8-8h48c4.4 0 8 3.6 8 8'/><path fill='currentColor' d='M464 720a48 48 0 1 0 96 0a48 48 0 1 0-96 0m16-304v184c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V416c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8'/></svg>
                        </div>
                        <div>
                            <h6 class='font-bold'>information</h6>
                            <p class='text-zinc-600 max-w-[290px]'>" . $_SESSION['flash']['message'] . "</p>
                        </div>
                        <button id='closeflashbtn' class='absolute top-4 right-4'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewbox='0 0 24 24'><path fill='currentcolor' d='m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7l13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z'/></svg>
                        </button>
                    </div>
                ";
            } else if ($_SESSION['flash']['type'] == 'error') {
                echo "
                    <div id='flashbar' class='absolute right-4 bottom-4 flex gap-4 py-4 ps-4 pe-16 shadow-xl w-fit rounded-lg bg-linear-to-r from-red-100 from-10% via-white via-40% to-white to-50%'>
                        <div class='text-red-500 p-2 bg-white rounded-md h-fit shadow-sm'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewbox='0 0 24 24'><g fill='none'><path fill='currentcolor' fill-opacity='0.16' d='m12 22c5.523 0 10-4.477 10-10s17.523 2 12 2s2 6.477 2 12s4.477 10 10 10'/><path stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-miterlimit='10' stroke-width='1.5' d='m12 8h.008m12 16v-5m10 1c0 5.523-4.477 10-10 10s2 17.523 2 12s6.477 2 12 2s10 4.477 10 10'/></g></svg>
                        </div>
                        <div>
                            <h6 class='font-bold'>information</h6>
                            <p class='text-zinc-600 max-w-[290px]'>" . $_SESSION['flash']['message'] . "</p>
                        </div>
                        <button id='closeflashbtn' class='absolute top-4 right-4'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewbox='0 0 24 24'><path fill='currentcolor' d='m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7l13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z'/></svg>
                        </button>
                    </div>
                ";
            }
            unset($_SESSION['flash']);
        }
    }
}
