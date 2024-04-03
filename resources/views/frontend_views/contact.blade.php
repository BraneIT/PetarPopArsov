@extends('frontend_views.layout.layout')

@section('title', 'Контакт')

@section('content')
<div class="pages-intro">
    <div class="pages-intro-container">
        <h1>КОНТАКТ</h1>
    </div>
</div>  
<div class="form-container">

    <div class="contact-info">
        <h1>Контактирајте не</h1>
        <p>email: oou-petarpoparsov-karposh@schools.mk</p>
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
        <p>email: email@email.com</p>
        <p>Телефон: 12345678</p>
    </div>
</div>

@endsection