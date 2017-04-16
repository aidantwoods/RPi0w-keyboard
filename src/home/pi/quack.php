#!/usr/local/bin/php
<?php

sleep(1);

press(['left-meta', 'space']);
sleep(0.01);

type('terminal');
sleep(0.2);

press(['return']);
sleep(0.5);

press(['left-meta', 'n']);
sleep(0.5);

if ( ! isset($argv[1]))
{
    type('say Hello');
    press(['return']);

    type('say I am watching you!');
    press(['return']);
}
else
{
    type("say ${argv[1]}");
    press(['return']);
}

function press(array $keys)
{
    $command = implode($keys, ' ');

    `echo "$command" | /home/pi/hid_gadget_test /dev/hidg0 keyboard`;
}

function type(string $string)
{
    foreach (str_split($string) as $l)
    {
        $keys = translate($l);

        press($keys);
    }
}

function translate(string $l) : array
{
    $keys = [];

    if ($l === ' ')
    {
        $keys[] = 'space';
    }
    elseif (ctype_upper($l))
    {
        $keys[] = 'left-shift';
        $keys[] = strtolower($l);
    }
    elseif ($l === '!')
    {
        $keys[] = 'left-shift';
        $keys[] = '1';
    }
    else
    {
        $keys = explode(' ', $l);
    }

    return $keys;
}
