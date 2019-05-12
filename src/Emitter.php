<?php
namespace Event;

class Emitter
{
    
    //TODO: comment this
    private static $_instance = null;
    /**
     */
    private $listeners = [];
    
    /**
     * getInstance Get the instance of Emitter (Singleton)
     *
     * @return Emitter
     */
    public static function getInstance(): Emitter 
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * emit Emit an Event 
     *
     * @param  string $event Event name
     * @param  array ...$args
     *
     * @return void
     */
    public function emit(string $event, ...$args)
    {
        if ($this->hasListener($event)) {
            foreach($this->listeners[$event] as $listener) {
                call_user_func_array($listener, $args);
            }
        }
    }

    /**
     * on Allow to listen an Event
     *
     * @param  string $event Event name
     * @param  callable $callable 
     *
     * @return void
     */
    public function on(string $event, callable $callable)
    {
        if (!$this->hasListener($event)) {
            $this->listeners[$event] = [];
        }
        $this->listeners[$event][] = $callable;
    }

    private function hasListener(string $event): bool
    {
        return array_key_exists($event, $this->listeners);
    }




}

