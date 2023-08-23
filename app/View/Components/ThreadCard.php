<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Thread;

class ThreadCard extends Component
{
    public $thread;
    /**
     * Create a new component instance.
     */
    public function __construct(Thread $thread)
    {
        $this->thread = $thread;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.thread-card');
    }
}
