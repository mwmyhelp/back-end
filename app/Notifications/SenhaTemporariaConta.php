<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SenhaTemporariaConta extends Notification
{
    use Queueable;
    private $cpf;
    private $senha;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($cpf, $senha)
    {
        $this->cpf = $cpf;
        $this->senha = $senha;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Seja bem vindo a MyHelp - Uma nova conta foi criada')
            ->line('Olá! Seja bem vindo ao MyHelp, uma conta foi criada para o CPF ' . substr($this->cpf,0,3) . '.***.***-'.substr($this->cpf,8,2).' e a senha temporária é: ' . $this->senha)
            ->action('Acessar o BeeApp', 'https://plataforma.mwmyhelp.com.br/')
            ->line('Em seu primeiro acesso será necessário a troca de senha.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
