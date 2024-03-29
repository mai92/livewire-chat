<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" wire:poll>
                    @foreach($chats as $chat)
                        <div class="chat @if($chat->fromUser->id == auth()->id()) chat-end @else chat-start @endif">
                            <div class="chat-image avatar">
                                <div class="w-10 rounded-full">
                                    <img alt="Tailwind CSS chat bubble component" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                            </div>
                            <div class="chat-header">
                                {{ $chat->fromUser->name }}
                                <time class="text-xs opacity-50">{{ $chat->created_at->diffForHumans() }}</time>
                            </div>
                            <div class="chat-bubble">{{ $chat->message }}</div>
                            <div class="chat-footer opacity-50">
                                Delivered
                            </div>
                        </div>
                    @endforeach


                    <div>
                        <form wire:submit.prevent="sendChat" class="form-control space-y-4">
                            <textarea wire:model="message" class="textarea textarea-bordered" placeholder="Send your chat..."></textarea>
                            <button class="btn btn-primary" type="submit">Send</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
