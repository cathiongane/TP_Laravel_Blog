@component('mail::message')
    # Votre article a été publié !

    Bonjour {{ $article->user->name }},

    Votre article **{{ $article->title }}** a été publié avec succès.

    @component('mail::button', ['url' => route('articles.index')])
        Voir mes articles
    @endcomponent

    Merci d'utiliser notre blog !
@endcomponent
