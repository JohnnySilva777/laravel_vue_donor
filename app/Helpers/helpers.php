<?php

if(!function_exists('mix_url')){
    /**
     * Get the path to a versioned Mix file.
     *
     * @param  string  $path
     * @param  string  $manifestDirectory
     * @return \Illuminate\Support\HtmlString|string
     *
     * @throws \Exception
     */
    function mix_url($path, $manifestDirectory = '')
    {
        return url(app(\Illuminate\Foundation\Mix::class)(...func_get_args()));
    }
}
