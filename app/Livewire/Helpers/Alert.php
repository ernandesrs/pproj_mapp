<?php

namespace App\Livewire\Helpers;

class Alert
{
    /**
     * Alert key
     * @var string
     */
    private const ALERT_KEY = 'flash_alert';

    /**
     * Component
     *
     * @var null|\Livewire\Component
     */
    private $component = null;

    /**
     * Data
     *
     * @var array
     */
    public $data = [
        'type' => 'default',
        'text' => '',
        'show' => false,
        'flash' => false,
        'duration' => 5000
    ];

    function toComponent(\Livewire\Component $component)
    {
        $this->component = $component;
        return $this;
    }

    function add(string $text, string $type = 'default', bool $flash = false, int $duration = 3000)
    {
        $this->text = $text;
        $this->type = $type;
        $this->flash = $flash;
        $this->duration = $duration;
        return $this;
    }

    /**
     * Dispatch a event with alert data
     *
     * @return void
     */
    function alertify()
    {
        $this->component->dispatch('server_alert', $this->data);
    }

    function flash()
    {
        session()->flash(self::ALERT_KEY, $this->data);
    }

    static function getFlash()
    {
        return session(self::ALERT_KEY, null);
    }

    /**
     *
     * GETTER/SETTER
     *
     */

    function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
}
