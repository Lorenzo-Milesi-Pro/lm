<?php

namespace App\Http\Livewire\Components\Site\Sections;

use App\Models\Message;
use App\Notifications\NewMessage;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class ContactForm extends Component
{
    public Message $message;
    public bool $isSent = false;

    protected $rules = [
        'message.first_name' => 'required|max:255',
        'message.last_name' => 'required|max:255',
        'message.email' => 'required|email|max:255',
        'message.company' => 'nullable|max:255',
        'message.phone' => 'nullable|max:20',
        'message.content' => 'required|max:500',
        'message.budget' => 'nullable|max:255',
        'message.channel' => 'nullable|max:255'
    ];

    protected $messages = [
        'message.first_name.required' => 'Le prénom est obligatoire',
        'message.first_name.max' => 'Le prénom est limité à :max caractères',
        'message.last_name.required' => 'Le nom est obligatoire',
        'message.last_name.max' => 'Le nom est limité à :max caractères',
        'message.email.required' => 'L\'email est obligatoire',
        'message.email.email' => 'L\'email doit être valide pour vous contacter ;)',
        'message.email.max' => 'L\'email est limité à :max caractères',
        'message.company.max' => 'Le nom de l\'entreprise est limité à :max caractères',
        'message.phone.max' => 'Le téléphone est limité à :max caractères',
        'message.content.required' => 'Il me faudrait un peu de contexte pour une première approche de votre besoin',
        'message.content.max' => 'Je suis sûr que vous pouvez me le dire en moins de :max caractères :D',
        'message.budget.max' => 'La description du budget est limitée à :max caractères',
        'message.channel.max' => 'Je suis sûr que vous pouvez me le dire en moins de :max caractères :D',
    ];

    public function mount()
    {
        $this->message = new Message();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.components.site.sections.contact-form');
    }

    public function send()
    {
        $this->validate();
        $this->message->save();
        $this->isSent = true;
        Notification::route('telegram', config('services.telegram.chat_id'))
            ->notify(new NewMessage($this->message));
    }
}
