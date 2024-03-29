<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Chat extends Component
{
    public User $user;

    public $message = '';

    public function render()
    {
        return view('livewire.chat', [
            'chats' => \App\Models\Chat::where('from_user_id', auth()->id())
                ->orWhere('from_user_id', $this->user->id)
                ->orWhere('to_user_id', auth()->id())
                ->orWhere('to_user_id', $this->user->id)
                ->get(),
        ]);
    }

    public function sendChat()
    {
        auth()->user()->chats()->create([
            'to_user_id' => $this->user->id,
            'message' => $this->message
        ]);

        $this->reset('message');
    }
}
