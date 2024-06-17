@extends('frontend_views.layout.layout')

@section('title', 'Контакт')

@section('page_header')
<h1>Контакт</h1>
@endsection
@section('content')

<div class="form-container">

    <div class="contact-info">
        <h1>Контактирајте не</h1>
        <p>email: ou-petarpoparsov-karposh@schools.mk</p>
        <p>Телефон: +389 3062436</p>
    </div>
    <form method="POST" action="{{ route('contact.send') }}" class="form">
        @csrf
        <label for="name">Име и презиме</label>
        <input type="text" name="name" required placeholder="Име и презиме">

        <label for="">Вашиот е-маил</label>
        <input type="text" name="email" required placeholder="пример@email.com">

        <label for="subject">Наслов</label>
        <input type="text" name="subject" required placeholder="Наслов">

        <label for="content">Порака</label>
        <textarea name="content" id="" cols="30" rows="10" required placeholder="Порака"></textarea>
    
    <button class="submit-button">ИСПРАТЕТЕ</button>
    </form>

    <div class="contact-info-phone">
        <h1>Контактирајте не</h1>
        <p>email: ou-petarpoparsov-karposh@schools.mk</p>
        <p>Телефон: +389 3062436</p>
    </div>
</div>

@endsection