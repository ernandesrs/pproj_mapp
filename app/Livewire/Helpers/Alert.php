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

    /**
     * To component
     *
     * @param \Livewire\Component $component
     * @return Alert
     */
    function toComponent(\Livewire\Component $component)
    {
        $this->component = $component;
        return $this;
    }

    /**
     * Default alert
     *
     * @param string $text
     * @return Alert
     */
    function default(string $text)
    {
        return $this->add($text, 'default');
    }

    /**
     * Success alert
     *
     * @param string $text
     * @return Alert
     */
    function success(string $text)
    {
        return $this->add($text, 'success');
    }

    /**
     * Info alert
     *
     * @param string $text
     * @return Alert
     */
    function info(string $text)
    {
        return $this->add($text, 'info');
    }

    /**
     * Danger alert
     *
     * @param string $text
     * @return Alert
     */
    function danger(string $text)
    {
        return $this->add($text, 'danger');
    }

    /**
     * Error alert
     *
     * @param string $text
     * @return Alert
     */
    function error(string $text)
    {
        return $this->add($text, 'error');
    }

    /**
     * Warning alert
     *
     * @param string $text
     * @return Alert
     */
    function warning(string $text)
    {
        return $this->add($text, 'warning');
    }

    /**
     * Add alert data
     *
     * @param string $text
     * @param string $type
     * @param boolean $flash
     * @param integer $duration
     * @return Alert
     */
    function add(string $text, string $type = 'default', bool $flash = false, int $duration = 3000)
    {
        if (!in_array($this->type, ['default', 'light', 'success', 'info', 'danger', 'error', 'warning'])) {
            throw new \Exception('Invalid type');
        }

        $this->text = $text;
        $this->type = $type == 'light' ? 'default' : $type;
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

    /**
     * Add a flash alert
     *
     * @return void
     */
    function flash()
    {
        session()->flash(self::ALERT_KEY, $this->data);
    }

    /**
     * Get flash alert
     *
     * @return void
     */
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
